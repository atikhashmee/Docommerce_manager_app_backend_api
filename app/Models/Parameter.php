<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'label',
        'required',
        'store_id',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'value_list',
    ];



    /**
     * Get parameter values.
     *
     * @return string
     */
    public function getValueListAttribute()
    {
        return $this->parameterValues->pluck('id');
    }

    /**
     * Get the store that owns the parameter.
     */
    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }

    /**
     * Get the parameter values of the parameter.
     */

    public function parameterValues()
    {
        return $this->hasMany('App\Models\ParameterValue');
    }
}
