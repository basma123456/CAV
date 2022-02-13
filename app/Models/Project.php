<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $guarded = [];
    public $timestamps = true;
    protected $appends = ['after_discount'];
    public function deal() {
        return $this->belongsTo(Deal::class, "deal_id", 'id');
    }
    public function plan() {
        return $this->belongsTo(Plan::class , 'plan_id' , 'id')
            ->select(["id",'name','description']);
    }
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
