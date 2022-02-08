<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocalShipping extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sequence_id',
        'charge',
        'status',
        'carrier_id',
        'admin_id',
        'store_id',
    ];

    /**
     * Get the districts of the local shipping.
     */
    public function districts(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany('App\Models\District');
    }

    /**
     * Get the carrier of the local shipping.
     */
    public function carrier(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Carrier');
    }
}
