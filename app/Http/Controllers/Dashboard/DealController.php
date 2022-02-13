<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Alert;
use App\Models\Deal;
use App\Models\Reward;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DealController extends Controller
{

    public function index() {

        $deals =  Deal::with(['customer', 'employee'])->latest()->paginate(20);

        return view("dashboard.deals.index",compact('deals'));
    }
    public function  show($id) {
            $deal =  Deal::with(['customer','employee','projects.plan'])->findOrFail($id);
//        $deal->projects->sum("after_discount")
            return view("dashboard.deals.show",compact('deal'));
    }

    public function accept($id) {

        $deal =  Deal::where('status' ,'!=', 'accepted')->with(['employee','projects'])->find($id);
        if(!$deal) {
            return redirect()->back()->withErrors(['error' => "هذة الصفقة غير موجودة او تم التوافق عليها"] );
        }
        try{
            DB::beginTransaction();

            $percentage = 10;
            $totalOfDeal =    $deal->projects->sum("after_discount");
            $employeeReward = ($totalOfDeal * $percentage) / 100 ;

            // What Deal Status;
            $deal->update([
                'status' => 'accepted',
                'admin_id' => auth()->user()->id
            ]);

            // Send Alert For Customer
            $alertCustomer = Alert::create([
                "sender_id" => auth()->user()->id,
                'to_customer' => $deal->customer_id,
                'to_employee' => null,
                'deal_id' => $deal->id,
                'sendTo' => 'customer',
                'deal_id' => $deal->id,
                'msg' => ' تم الموافقة على العرض المقدم من سيداتكم برجاء التواصل معنا لدافع 30 % من قيمة التعاقد  ',
                'readable' => 0,

            ]);

           if($deal->employee_id != NULL) {
               // Create Reward For Seller
               $reward = Reward::create([
                   'deal_cost' => $totalOfDeal,
                   'reward_percentage' =>  $percentage,
                   'reward' =>  $employeeReward,
                   'seller_id' => $deal->employee_id,
                   'customer_id' => $deal->customer_id,
                   'deal_id' => $deal->id,
                   'admin_id' =>  auth()->user()->id,
                   'status' => 0,
               ]);

               // Send Alert For Employee
               $alertEmployee = Alert::create([
                   "sender_id" => auth()->user()->id,
                   'to_employee' => $deal->employee_id,
                   'to_customer' => null,
                   'deal_id' => $deal->id,
                   'sendTo' => 'employee',
                   'msg' => ' تم على الموافقه على العرض المقدم بوسطتكم وتم اضاف نسبه المكافة وسوفة تتمكن من سحب المبلغ المكافة عندم يقوم العميل بدافع نسبة التعاقد وهى 30 % ',
                   'readable' => 0,
               ]);
           }

            DB::commit();

            toastr()->success(__("global.deal_accepted"));
            return redirect()->route("dashboard.deal.show", $deal->id);
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }// Accept

    public function  refused($id) {
        $deal =  Deal::where('status' ,'=', 'pending')->with(['employee','projects'])->find($id);
        if(!$deal) {
            return redirect()->back()->withErrors(['error' => "هذة العملية غير موجده او تم الموافقه عليه من قبل او مرفوضة"] );
        }

        try{
            DB::beginTransaction();

            $percentage = 10;
            $totalOfDeal =    $deal->projects->sum("after_discount");
            $employeeReward = ($totalOfDeal * $percentage) / 100 ;

            // What Deal Status;
            $deal->update([
                'status' => 'refused',
                'admin_id' => auth()->user()->id
            ]);
            // Create Reward For Seller

            // Send Alert For Customer
            $alertCustomer = Alert::create([
                "sender_id" => auth()->user()->id,
                'to_customer' => $deal->customer_id,
                'to_employee' => null,
                'deal_id' => $deal->id,
                'sendTo' => 'customer',
                'deal_id' => $deal->id,
                'msg' => ' تم رفض العرض المقدم لعدم وصول اتفاق بين الطرفين  ',
                'readable' => 0,
            ]);

            // Send Alert For Employee
            if($deal->employee_id !== NULL) {
                $alertEmployee = Alert::create([
                    "sender_id" => auth()->user()->id,
                    'to_employee' => $deal->employee_id,
                    'to_customer' => null,
                    'deal_id' => $deal->id,
                    'sendTo' => 'employee',
                    'msg' => ' تم رفض العرض المقدم بواسطتك لعدم وصول اتفاق',
                    'readable' => 0,
                ]);
            }

            DB::commit();
            toastr()->success(__("global.deal_refused"));
            return redirect()->back();
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }
    public function new() {

        $deals =  Deal::where("status", 'pending')->latest()->paginate(20);
        return view("dashboard.deals.new", compact('deals'));
    }// End New

    public function complete($id) {
        try {
            $deal =  Deal::where("status" , 'accepted')->findOrFail($id);

           $deal->update([
                'status' => 'complete'
           ]);
            toastr()->success("تهانيا على اتمام المشروع");
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }
    public function underWork() {
        $deals =  Deal::where("status" , 'accepted')->latest()->paginate(20);
        return view("dashboard.deals.underWork",compact('deals'));
    }

    public function done() {
        $deals =  Deal::where("status" , 'complete')->latest()->paginate(20);
        return view("dashboard.deals.complete",compact('deals'));
    }
}
