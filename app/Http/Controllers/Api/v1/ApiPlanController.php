<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Plan;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ApiPlanController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        $plans =  Plan::where('status', 1)->get();

        return $this->returnData('plans',$plans,'Data Retrieve Successfully');
    }// End Index

    public function store(Request $request) {
        DB::beginTransaction();
        try{
            $rules = [
                'name_ar' => 'required|unique:plans,name->ar',
                'name_en' => 'required|unique:plans,name->en',
                'description_ar' => 'required',
                'description_en' => 'required',
                'status'    => 'required|boolean',
                'discount'  => 'required',
                'discount_type' => 'required|' . Rule::in(['percentage', 'fixed']),
                'sub_category' => 'required|exists:sub_categories,id',
                'plan_price' => 'required'
            ];
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code , $validator);
            }
            $name = ['ar' => $request->name_ar , 'en' => $request->name_en];
            $description = ['ar' => $request->description_ar , 'en' => $request->description_en];

            $plan = Plan::create([
                'name' => $name,
                'description' => $description,
                'status' => $request->status,
                'plan_price' => $request->plan_price,
                'discount' =>  $request->discount,
                'discount_type' => $request->discount_type,
                'sub_category_id' => $request->sub_category,
                'admin_id' => 1
            ]);

            DB::commit();

            return $this->returnSuccessMessage('Created Successfully');


        }
        catch (\Exception $e) {
            DB::rollback();
            return $this->returnError('E001' ,'Something Is invalid Try Again Later...' . $e->getMessage());
        }

    }

    public function getFeature($id) {

        $features =  Feature::where([
            ['plan_id' ,$id],
            ['status', 1]
        ])->get();
        return $this->returnData('features',$features,'Data Retrieve Successfully');

    }

}
