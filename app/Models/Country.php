<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table = "countries";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'full_name',
        'iso_code',
        'calling_code',
        'capital',
        'citizenship',
        'eea',
        'status',
        'timezone_id',
        'currency_id',
        'admin_id',
    ];

    
    /**
     * Get the country wise all products.
     */
    public function products() {
        return $this->hasMany(Product::class, 'country_id', 'id');
    }
}
