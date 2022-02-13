<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'store_id',
    ];

    /**
     * Get the store that owns the tag.
     */
    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }
}
