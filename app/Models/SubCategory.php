<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SubCategory extends Model
{
    use HasTranslations;
    protected $table = 'sub_categories';
    public $translatable = ['name'];
    protected $guarded = [];
    public $timestamps = true;

    public function admin() {
        return $this->belongsTo(Admin::class, "admin_id", 'id')->select(["id",'first_name', 'last_name']);
    }
    public function category() {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }

    public function plans(){
        return $this->hasMany(Plan::class,'sub_category_id');


    }
}
