<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Customer extends Authenticatable   implements JWTSubject,MustVerifyEmail
{
    use Notifiable;
    protected $table = "customers";
    protected $guard= 'customer';

    protected $guarded = [];
    public $timestamps = true;

    public function activeBy() {
        return $this->belongsTo(Admin::class, 'active_by' , 'id')->select(['id','first_name','last_name']);
    }
    public function deal() {
        return $this->hasOne(Deal::class, "customer_id", "id");
    }
    public function allDeals() {
        return $this->hasMany(Deal::class, "customer_id", "id");
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
