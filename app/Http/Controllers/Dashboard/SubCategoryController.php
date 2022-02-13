<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryStoreRequest;
use App\Http\Requests\SubCategoryUpdateRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index() {
        $subCategories  = SubCategory::with(['admin', 'category'])->latest()->paginate();
        $categories = Category::get();
//        return $subCategories;
        return view("dashboard.sub_cate.index",compact('categories','subCategories'));
    }// End Index

    public function store(SubCategoryStoreRequest $request) {
        try {

            $subCategory = SubCategory::create([
                'name'          => ['ar' => $request->name_ar , 'en' => $request->name_en],
                'category_id'   => $request->category,
                'admin_id'      => auth()->user()->id,
                'status'        => $request->status,
            ]);
            toastr()->success(__('global.success_create'));
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );

        }
    }
    public function update(SubCategoryUpdateRequest $request , $id) {
        try {
            $sub_categories = SubCategory::findOrFail($id);
            $sub_categories->update([
                'name'          => ['ar' => $request->name_ar , 'en' => $request->name_en],
                'category_id'   => $request->category,
                'status'        => $request->status,
            ]);
            toastr()->success(__('global.success_update'));
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );

        }
    }
}
