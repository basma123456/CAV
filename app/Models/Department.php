<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Department extends Model
{
    use HasTranslations;
    protected $table = 'departments';
    public $translatable = ['name'];
    protected $guarded = [];
    public $timestamps = true;

    public function admin() {
        return $this->belongsTo(Admin::class, "admin_id", 'id')->select(["id",'first_name', 'last_name']);

    }

}
