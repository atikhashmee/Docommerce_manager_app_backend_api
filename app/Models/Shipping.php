<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'charge',
        'product_id',
        'zone_id',
        'carrier_id',
    ];

    /**
     * Get the store that owns the shipping.
     */
    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }

    /**
     * Get the zone that owns the shipping.
     */
    public function zones()
    {
        return $this->belongsToMany('App\Models\Zone');
    }

    /**
     * Get the carrier that owns the shipping.
     */
    public function carriers()
    {
        return $this->belongsToMany('App\Models\Carrier');
    }

    /**
     * Get the product that owns the shipping.
     */
    public function products()
    {
        return $this->belongsTo('App\Models\Product')->withTrashed();
    }

    /**
     * Get single carrier that owns the shipping.
     */
    public function singleCarrier()
    {
        return $this->belongsTo('App\Models\Carrier', 'carrier_id', 'id')->withTrashed();
    }

    /**
     * Get single carrier that owns the shipping.
     */
    public function singleZone()
    {
        return $this->belongsTo('App\Models\Zone', 'zone_id', 'id')->withTrashed();
    }
}
