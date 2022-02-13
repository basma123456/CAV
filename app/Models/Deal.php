<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{

    protected $table = 'deals';

    protected $guarded = [];
    public $timestamps = true;

    public function projects() {
        return $this->hasMany(Project::class, "deal_id", 'id');
    }
    public function customer() {
        return $this->belongsTo(Customer::class,'customer_id','id')
            ->select(['id','full_name','email','phone']);
    }
    public function employee() {
        return $this->belongsTo( Employee::class, 'employee_id', 'id')
            ->select(['id','full_name', 'phone' ,'email']);
    }
}
