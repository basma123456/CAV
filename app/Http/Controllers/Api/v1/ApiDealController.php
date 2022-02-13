<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Deal;
use App\Models\Employee;
use App\Models\Project;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ApiDealController extends Controller
{

        use GeneralTrait;
    public function store(Request  $request) {



        DB::beginTransaction();
        try{
            $rules = [
               'sellerCode' => 'sometimes|nullable|exists:employees,personal_id'
            ];
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code , $validator);
            }
            $carts = Cart::where("customer_id", auth()->user()->id)->get();
            $seller = NULL;
            $totalOfPlans = "";

            if(isset($request->sellerCode) && !empty($request->sellerCode)){
                $sellerId = Employee::where('personal_id' , $request->sellerCode)->select(['id'])->first();
                $seller = $sellerId->id;
            }
            // Create Deal First The Bind The Plan In Project Tables
            $deal =  Deal::create([
                'customer_id' =>  auth()->user()->id,
                'employee_id' => $seller,
                'status' => 'pending',
            ]);


            // ForEach Carts To Create The Projects and Bind Projects By Deal
            foreach($carts as $cart) {
                $project =  New Project();
                $project->customer_id = $cart['customer_id'];
                $project->plan_id  = $cart['plan_id'];
                $project->project_status = 'Pending';
                $project->discount = $cart["discount"] ;
                $project->discount_type = $cart["discount_type"];
                $project->plan_price = $cart["plan_price"];
                $deal->projects()->save($project);
            }

            $DestroyCarts = Cart::where('customer_id' , auth()->user()->id)->delete();
            // Empty The Carts

            DB::commit();

            return $this->returnSuccessMessage('Created Successfully');
        }
        catch (\Exception $e) {
            DB::rollback();
            return $this->returnError('E001' ,'Something Is invalid Try Again Later...' . $e->getMessage());
        }

    }// End Store
}
