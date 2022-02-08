<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'global_district_id',
        'state_id',
        'name',
        'status',
    ];
    /**
     * Get the state that own the district.
     */
    public function state(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\District');
    }

    /**
     * Get the localShippings of the district.
     */
    public function localShippings(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany('App\Models\LocalShipping');
    }
}
