<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Cart extends Model
{

    protected $table = 'carts';
    protected $guarded = [];
    public $timestamps = true;

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function plans() {
        return $this->hasMany(Plan::class, 'id' , 'plan_id')
            ->select([
                'id','name',
                'description','plan_price','discount_type','discount'
            ]);
    }

}
