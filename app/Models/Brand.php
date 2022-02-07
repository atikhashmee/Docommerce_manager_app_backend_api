<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sequence_id',
        'slug',
        'name',
        'logo',
        'show_on_home',
        'status',
        'store_id',
    ];

    /**
     * Get the store that owns the brand.
     */
    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }

    /**
     * Get the brand wise all products.
     */
    public function products() {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }
}
