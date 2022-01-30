<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Admin extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sequence_id',
        'name',
        'nice_name',
        'image',
        'email',
        'email_verified_at',
        'phone',
        'zip_code',
        'city',
        'address_line_1',
        'address_line_2',
        'sex',
        'dob',
        'password',
        'status',
        'type',
        'delivery_manage',
        'allowed_permissions',
        'website',
        'contact_person_name',
        'contact_email',
        'contact_phone_number',
        'commission_type',
        'sales_commission',
        'super_administrative_pin',
        'balance',
        'admin_id',
        'state_id',
        'country_id',
        'store_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        //'image_full_url',
//        'permitted_categories_list',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'allowed_permissions' => 'array',
    ];

     /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
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

    /**
     * Get the store of the client.
     */
    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }
}
