<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'admins';
    
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
}
