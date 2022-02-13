<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Plan extends Model
{
    use HasTranslations;
    protected $table = 'plans';
    public $translatable = ['name','description'];

    protected $guarded = [];
    public $timestamps = true;
    protected $appends = ['after_discount'];



    public function adminId() {
        return $this->belongsTo(Admin::class, 'admin_id', 'id')->select(['id','first_name', 'last_name']);
    }
    public function features() {
        return $this->hasMany(Feature::class,'plan_id','id')->select(['id','name','plan_id', 'status']);
    }
    public function subCategory() {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }

//    public function getPlanImageAttribute() {
//            return 'https://compuavision.com/ca/public/cav/Plans/' . $this->plan_image;
//        }

    public function getAfterDiscountAttribute() {
        $afterDiscount = "";
        if($this->discount_type == "fixed") {
             $afterDiscount =   $this->plan_price - $this->discount;
        }elseif($this->discount_type == 'percentage') {
            $discount = ($this->plan_price  / 100) * $this->discount   ;
            $afterDiscount = $this->plan_price - $discount;
        }
        return $afterDiscount;
    }


}
