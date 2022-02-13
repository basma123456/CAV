<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\SubCategory;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApiSubCategoryController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        $subCategory = SubCategory::where('status' , '1')->select(['id','name','category_id'])->get();
        return $this->returnData('subCategory',$subCategory,'Data Retrieve Successfully');

    }// End Index
    public function getPlans($id) {
        $plan =  Plan::select(['id','name','description','plan_price','discount','discount_type'])
            ->with([
                'features' => function($q) {
                    $q->where('status' , 1);
                }
            ])
            ->where('sub_category_id' ,$id)
            ->get();
        return $this->returnData('plan',$plan,'Data Retrieve Successfully');
    }// End GetPlans
}
