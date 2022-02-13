<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'opt1_name',
        'opt2_name',
        'opt3_name',
        'opt1_value',
        'opt2_value',
        'opt3_value',
        'old_price',
        'price',
        'barcode',
        'original_product_id',
        'original_product_variant_id',
        'product_id',
    ];
}
