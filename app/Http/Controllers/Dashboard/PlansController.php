<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanStoreRequest;
use App\Http\Requests\PlanUpdateRequest;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Plan;
use App\Models\SubCategory;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class   PlansController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $plans = Plan::with([
            "adminId",'subCategory.category',
        ])->latest()->paginate(20);
//        return $plans;
        return view("dashboard.plan.index",compact('plans'));
}


    public function create()
    {
        $subCategories = SubCategory::where("status" , 1)->get();
        return view("dashboard.plan.create" ,compact('subCategories'));
    }


    public function store(PlanStoreRequest $request)
    {
        DB::beginTransaction();
        try{
            $plan = Plan::create([
                    'name' => ["ar" => $request->name_ar , "en" => $request->name_en],
                    'description' => ['ar' => $request->description_ar , 'en' =>  $request->description_en],
                    'plan_image'   => $this->imageStore($request->image,'cav', 'Plans'),
                    'plan_price' => $request->price,
                    'discount'  => $request->discount,
                    'discount_type' => $request->discount_type,
                    'status'   => $request->status,
                    'sub_category_id' => $request->subCategory,
                    'admin_id'  => auth()->user()->id,
            ]);

            foreach($request->features as $feature) {
              $f =  new Feature();
              $f->name = ['ar' => $feature['feature_name_ar'] , 'en' => $feature['feature_name_en']];
              $f->status = $feature['feature_status'];
              $f->admin_id = auth()->user()->id;
              $plan->features()->save($f);
            }
            DB::commit();
            toastr()->success(__("global.success_create"));
            return redirect()->route("dashboard.plan.create");

        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        $subCategories = SubCategory::get();
       return view("dashboard.plan.edit",compact('plan','subCategories'));
    }


    public function update(PlanUpdateRequest $request, $id)
    {
        try{
            $plan = Plan::findOrFail($id);
            if($request->hasFile('image')) {
                $image =  $this->imageStore($request->image,'cav', 'Plans');
                $this->imageDestroy('cav' ,'Plans', $plan->plan_image);
            }else {
                $image = $plan->plan_image;
            }

            $plan->update([
                'name' => ["ar" => $request->name_ar , "en" => $request->name_en],
                'description' => ['ar' => $request->description_ar , 'en' =>  $request->description_en],
                'plan_image'   => $image,
                'plan_price' => $request->price,
                'discount'  => $request->discount,
                'discount_type' => $request->discount_type,
                'status'   => $request->status,
                'sub_category_id' => $request->subCategory,

            ]);
            toastr()->info(__("global.success_update"));
            return redirect()->route("dashboard.plan.edit", $id);
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );
        }

    }


    public function destroy($id)
    {
        //
    }// End Destroy

    public function addFeatures($id) {
       return view("dashboard.plan.add_features" ,compact('id'));
    }// End Details

    public function storeFeatures(Request $request,$id) {
        try {
            $plan = Plan::findOrFail($id);
            foreach ($request->features  as $feature) {
                $f =  new Feature();
                $f->name = ['ar' => $feature['feature_name_ar'] , 'en' => $feature['feature_name_en']];
                $f->status = $feature['feature_status'];
                $f->admin_id = auth()->user()->id;
                $plan->features()->save($f);
            }

            toastr()->success(__('global.success_create'));
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );

        }
    }// End StoreFeatures

    public function editFeatures($id) {
        $plan = Plan::findOrFail($id);
        $features = Feature::where("plan_id" , $id)->get();
        return view("dashboard.plan.edit_features", compact('plan','features'));
    }

    public function updateFeatures(Request $request,$id) {
        try {
            $feature = Feature::findOrFail($id);
            $feature->update([
                'name' => ['ar' => $request->feature_name_ar , 'en' =>  $request->feature_name_en],
                'status' => $request->feature_status,
            ]);
            toastr()->success(__('global.success_update'));
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );

        }
    }// End UpdateFeature

    public function  destroyFeatures($id) {
        try {
            $feature = Feature::findOrFail($id);
            $feature->delete();
            toastr()->error(__('global.success_delete'));
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()] );

        }
    }// End Destroy Features



}
