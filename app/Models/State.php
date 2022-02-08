<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sequence_id',
        'global_state_id',
        'name',
        'status',
        'country_id',
        'store_id',
    ];

  
    /**
     * Get the districts record associated with the states.
     */
    public function districts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\District');
    }

    /**
     * Get the country record associated with the states.
     */
    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Country');
    }
}
