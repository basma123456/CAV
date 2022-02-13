<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Customer;
use App\Models\Deal;
use App\Models\Department;
use App\Models\Employee;

use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeesController extends Controller
{
    use ImageTrait;
    public function index()
    {
         $employees =  Employee::with([
             "departmentId",'adminId'
             ])
             ->latest()->paginate(20);
        return view("dashboard.employee.index" , compact("employees"));
    } // End Index


    public function create()
    {
        $departments = Department::where("status" ,'1')->get();
        return view("dashboard.employee.create" ,compact('departments'));
    }// End Create


    public function store(EmployeeStoreRequest $request)
    {

        try{
            // Check If The Salary Employee Isset
            $check = Customer::where("nid", $request->nid)
                ->orWhere('phone' , $request->phone)
                ->orWhere('email',  $request->email)
                ->get();



            if($check->isEmpty()) {

                $randomSerialNumber = Str::random(3) . random_int(10000, 9999999);
                $employee = Employee::create([
                    "full_name" => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'balance' => $request->balance,
                    'phone' => $request->phone,
                    'nid'   => $request->nid,
                    "roles" => "-",
                    'personal_id' => $randomSerialNumber,
                    'department_id' => $request->department,
                    'status'    => $request->status,
                    'avatar'    => $request->hasFile('avatar' ) ? $this->imageStore($request->avatar ,'cav', 'Employee') : '',
                    'pic_nid'   => $request->hasFile('pic_nid') ? $this->imageStore($request->pic_nid ,'cav' , 'Employee') : '',
                    'admin_id'  => auth()->user()->id,
                ]);
                toastr()->success(__("global.success_create"));
                return redirect()->route("dashboard.employee.index");
            }else{
                return redirect()->back()->withErrors(['error' => __('global.cant_be_seller')] );
            }// End If
        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }

    }// End Store


    public function show($id)
    {
        $employee = Employee::with("departmentId")->findOrFail($id);
        $deals =  Deal::where('employee_id' , $employee->id)->with([
           'customer', 'projects'
        ])->latest()->paginate()->withQueryString();
//       return $deals;
        return view("dashboard.employee.show" ,compact('employee','deals'));
    } // End Show


    public function edit($id)
    {
        $departments = Department::where("status" ,'1')->get();
        $employee = Employee::findOrFail($id);

        return view("dashboard.employee.edit" ,compact('departments','employee'));
    }// End Edit


    public function update(EmployeeUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $employee = Employee::findOrFail($id);
            if($request->hasFile('avatar')) {
                $avatar =  $this->imageStore($request->avatar ,'cav', 'Employee');
                $this->imageDestroy('cav', 'Employee',$employee->avatar);
            }else {
                $avatar = $employee->avatar;
            }

            if($request->hasFile('pic_nid')) {
                $pic_nid =  $this->imageStore($request->pic_nid ,'cav', 'Employee');
                $this->imageDestroy('cav', 'Employee',$employee->pic_nid);
            }else {
                $pic_nid = $employee->pic_nid;
            }
            $employee->update([
                "full_name" => $request->fName,
                'email' => $request->email,
                'password' => isset($request->password) && !empty($request->password) ? bcrypt($request->password) : $employee->password,
                'balance' => $request->balance,
                'phone' => $request->phone,
                'nid'   => $request->nid,
                'status'    => $request->status,
                "roles" => "-",
                'department_id' => $request->department,
                'avatar'    =>  $avatar,
                'pic_nid'   => $pic_nid,
            ]);

            DB::commit();
            toastr()->info(__("global.success_update"));
            return redirect()->route("dashboard.employee.edit", $id);
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    } // End Update


    public function destroy($id)
    {

    }// End Destroy
}
