<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ApiFeatureController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        $features =  Feature::where('status', 1)->get();

        return $this->returnData('features',$features,'Data Retrieve Successfully');
    }// End Index

    public function store(Request $request) {
        DB::beginTransaction();
        try{
            $rules = [
                'name_ar' => 'required|unique:features,name->ar',
                'name_en' => 'required|unique:features,name->en',
                'description_ar' => 'required',
                'description_en' => 'required',
                'plan' => 'required|exists:plans,id',
                'status' => 'required|' . Rule::in(['1','0']),

            ];
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code , $validator);
            }
            $name = ['ar' => $request->name_ar , 'en' => $request->name_en];
            $description = ['ar' => $request->description_ar , 'en' => $request->description_en];

            $plan = Feature::create([
                'name' => $name,
                'description' =>  $description,
                'plan_id' => $request->plan,
                'status' => $request->status,
                'admin_id' =>1
            ]);

            DB::commit();

            return $this->returnSuccessMessage('Created Successfully');


        }
        catch (\Exception $e) {
            DB::rollback();
            return $this->returnError('E001' ,'Something Is invalid Try Again Later...' . $e->getMessage());
        }

    }
}
