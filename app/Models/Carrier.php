<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sequence_id',
        'name',
        'carrier_type',
        'details',
        'status',
        'admin_id',
        'store_id',
    ];

    /**
     * Get the store that owns the carrier.
     */
    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }

    /**
     * Get the localShippings record associated with the carrier.
     */
    public function localShippings()
    {
        return $this->hasMany('App\Models\LocalShipping');
    }
}
