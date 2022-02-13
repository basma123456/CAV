<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentStoreRequest;
use App\Http\Requests\DepartmentUpdateRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index() {
        $departments = Department::with("admin")->latest()->paginate(10);
        return view("dashboard.department.index",compact('departments'));
    }// end index

    public function create() {
        return view("dashboard.department.create");
    }//end create

    public function store(DepartmentStoreRequest $request) {

      try{
          $name = ["ar" => $request->name_ar , "en" => $request->name_en];
          $department = Department::create([
               "name" => $name,
              'descriptions' => $request->description,
              'status'  => $request->status,
              'admin_id' => auth()->user()->id,
          ]);

          toastr()->success(__("global.success_create"));
          return redirect()->route("dashboard.department.index");

      }catch(\Exception $e) {

          return redirect()->back()->withErrors(['error' => $e->getMessage()] );
      }
    }// End Of Store

    public function edit($id) {

        $department = Department::findOrFail($id);
        return view("dashboard.department.edit", compact("department"));
    }//end edit

    public function update(DepartmentUpdateRequest  $request, $id) {
        try{

            $department = Department::findOrFail($id);

            $department->update([
              "name" => ["ar" => $request->name_ar , "en" => $request->name_en],
                "descriptions" =>  $request->description,
                "status" =>  $request->status
            ]);
            toastr()->info(__("global.success_update"));
            return redirect()->route("dashboard.department.edit" , $id);
        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }
}
