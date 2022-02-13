<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Translatable\HasTranslations;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Employee extends Authenticatable   implements JWTSubject,MustVerifyEmail
{

    protected $table = 'employees';
    protected $guard= 'employee';

    protected $guarded = [];
    public $timestamps = true;



    public function departmentId() {
        return $this->belongsTo(Department::class, 'department_id', 'id')->select(['id', 'name']);
    }
    public function activeBy() {
        return $this->belongsTo(Admin::class, 'admin_id' , 'id')->select(['id','first_name','last_name']);
    }
    public function adminId() {
        return $this->belongsTo(Admin::class, 'admin_id', 'id')->select(['id', 'first_name', 'last_name']);
    }
    public function deals() {
        return  $this->hasMany(Deal::class,'employee_id', 'id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


}
