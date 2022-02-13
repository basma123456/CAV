<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function index() {
        $categories = Category::with('admin')->latest()->paginate();
        return view("dashboard.category.index",compact('categories'));
   }// End Index


    public function store(CategoryStoreRequest $request) {
        try {
            $category =  Category::create([
                'name' => ['ar' =>  $request->name_ar , 'en' => $request->name_en],
                'status' => $request->status,
                'admin_id' => auth()->user()->id
            ]);
            toastr()->success(__("global.success_create"));
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );

        }
    }// End Store


    public function update(CategoryUpdateRequest $request,$id) {

        try {
            $category = Category::findOrFail($id);
            $category->update([
                'name' => ['ar' =>  $request->name_ar , 'en' => $request->name_en],
                'status' => $request->status,
            ]);
            toastr()->success(__("global.success_update"));
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );

        }
    }// End Update


}
