<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApiCategoryController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        $categories = Category::where('status' , '1')->select(['id','name'])->get();
        return $this->returnData('categories',$categories,'Data Retrieve Successfully');

    }// End Index


    public function create(Request $request)
    {

    }//End Create


    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $rules = [
                'name_ar' => 'required|unique:categories,name->ar',
                'name_en' => 'required|unique:categories,name->en',
            ];
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code , $validator);
            }
            $name = ['ar' => $request->name_ar , 'en' => $request->name_en];
            $category = Category::create([
                'name' => $name,
                'status' =>1,
                'admin_id' => 1,
            ]);
            DB::commit();

            return $this->returnSuccessMessage('Created Successfully');


        }
        catch (\Exception $e) {
            DB::rollback();
            return $this->returnError('E001' ,'Something Is invalid Try Again Later...' . $e->getMessage());
        }


    } // End Store


    public function subCategories($id) {

        $subCategories =  SubCategory::select(['id','name'])->where('category_id' ,$id)->get();
        return $this->returnData('subCategories',$subCategories,'Data Retrieve Successfully');

    }
}
