<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Customer;

use App\Models\Employee;
use App\Models\Plan;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $customers =  Customer::with(['activeBy'])->latest()->paginate(20);
        return view("dashboard.customer.index",compact("customers"));
    }// End Index

    public function create()
    {
       return view("dashboard.customer.create");
    }// End Create


    public function store(CustomerStoreRequest $request)
    {

        try{
            // Check If The Salary Employee Isset
            $check = Employee::where("nid", $request->nid)
                ->orWhere('phone' , $request->phone)
                ->orWhere('email',  $request->email)
                ->get();

            if($check->count() > 0) {
                return redirect()->back()->withErrors(['error' => __('global.cant_be_customer')] );
            }else {
                $customer = Customer::create([
                    "full_name" => $request->full_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => bcrypt($request->password),
                    'nid' => $this->imageStore($request->nid,'cav','Customers'),
                    'cr_no' => $request->file('cr_no') !== NULL ? $this->imageStore($request->cr_no,'cav','Customers') : '',
                    'address' => $request->address,
                    'customer_type' => $request->customer_type,
                    'status' => 0
                ]);


                toastr()->success(__("global.success_create"));
                return redirect()->route("dashboard.customer.index");
            }
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }// End Store


    public function show($id)
    {
        $customer = Customer::with([
            'activeBy',
            'allDeals.employee',
            'allDeals.projects',
            'allDeals.projects.plan',
        ])->findOrFail($id);

        return view("dashboard.customer.show", compact('customer'));
    }// End Show


    public function edit($id)
    {
        $customer = Customer::findORFail($id);
        return view("dashboard.customer.edit",compact('customer'));
    }// End Edit


    public function update(CustomerUpdateRequest $request, $id)
    {
        try{
            $customer = Customer::findOrFail($id);

            $customer->update([
                "full_name" => $request->full_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => !empty($request->password) ? bcrypt($request->password) : $customer->password,
                'nid' => $request->nid,
                'address' => $request->address,
                'customer_type' => $request->customer_type,
                'status' => $request->status
            ]);
            toastr()->success(__("global.success_create"));
            return redirect()->route("dashboard.customer.index");
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }// End Update


    public function destroy($id)
    {

    }// End Destroy

    public function active($id) {
        try {
            $customer = Customer::find($id);


            if($customer->status == 0) {
                $customer->status = 1;
                $customer->active_by = auth()->user()->id;
                $customer->save();
                $message = __("global.customer_active");

            }else {
                $customer->status = 0;
                $customer->active_by = auth()->user()->id;
                $customer->save();
                $message = __("global.customer_deactivated");
            }
            toastr()->success($message);
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );

        }
    }// End Active
}
