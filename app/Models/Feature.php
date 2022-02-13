<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Feature extends Model
{
    use HasTranslations;
    protected $table = 'features';
    public $translatable = ['name'];
    protected $guarded = [];
    public $timestamps = true;

    public function plan() {
        return $this->belongsTo(Plan::class,'plan_id', 'id');
    }

}
