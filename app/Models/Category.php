<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslations;
    protected $table = 'categories';
    public $translatable = ['name'];
//    protected $guarded = [];
    protected $fillable = [
        'name',
        'status',
        'admin_id',
        'deleted_at'
    ];


    public $timestamps = true;

    public function admin() {
        return $this->belongsTo(Admin::class, "admin_id", 'id')->select(["id",'first_name', 'last_name']);
    }

    public function subCategories() {
        return $this->hasMany(SubCategory::class,'category_id' , 'id');
    }

}
