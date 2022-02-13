<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sku',
        'sequence_id',
        'product_cost',
        'quantity',
        'order_stock_id',
        'return_stock_id',
        'product_id',
        'product_variant_id',
        'warehouse_id',
        'store_id',
    ];

    /**
     * Get the store that owns the stock.
     */
    public function store(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Store');
    }

    /**
     * Get the product that owns the stock.
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product')->withTrashed();
    }
    /**
     * Get the product that owns the stock.
     */
    public function warehouse()
    {
        return $this->belongsTo('App\Models\Warehouse')->withTrashed();
    }

    /**
     * Get the product_variant that owns the stock.
     */
    public function product_variant(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\ProductVariant');
    }

    /**
     * Get the order_stocks of the stock.
     */
    public function order_stocks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\OrderStock');
    }
}
