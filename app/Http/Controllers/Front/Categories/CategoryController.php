<?php

namespace App\Http\Controllers\Front\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Plan;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function f(Request $request ,$catID=0 , $subID=0)
    {


        $subCats = [];
        $big_cats = Category::with('subCategories')->where('status' , 1)->get();
        $plans = '';


        if (count($big_cats) > 0) {
            foreach ($big_cats as $key => $val) {
                $mySubCats = $big_cats[$key]->subCategories;
                $subCats[] = $mySubCats;


            }
        }



        if(count($subCats[$catID][$subID]->plans) > 0) {
            $plansall = Plan::where('sub_category_id', $subCats[$catID][$subID]->id)->get();
            if($plansall != null){
                $plans = $plansall;
            }
        }

        return view('front.categories.index' , ['big_cats'=>$big_cats , 'subCats'=>$subCats , 'plans'=>$plans , 'catID'=>$catID , 'subID'=>$subID]);
    }
    ////////////////////////////////////////////////////////////////
    ///
    ///     /////////////////////////////////////////////////////////////////////////////
    //
    ////    public function showPlans($sid)
    ////    {
    ////        $plans = Plan::pluck('id');
    ////        echo json_encode($plans);
    ////
    ////    }
    //    //////////////////////////////////////////////////////////////////////////
}
