<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sequence_id',
        'manufacturer_name',
        'website_url',
        'logo',
        'status',
        'short_description',
        'country_id',
        'store_id',
    ];



    /**
     * Get the store that owns the manufacturer.
     */
    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }

    /**
     * Get the country that owns the manufacturer.
     */
    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Country');
    }

    /**
     * The countries that belong to the manufacturer.
     */
    public function countries()
    {
        return $this->belongsTo('App\Models\Country');
    }

    /**
     * Get the manufacturer wise all products.
     */
    public function products() {
        return $this->hasMany(Product::class, 'manufacturer_id', 'id');
    }
}
