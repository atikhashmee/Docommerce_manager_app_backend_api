<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'short_description',
        'description',
        'price',
        'old_price',
        'tax',
        'barcode',
        'show_in_facebook',
        'show_product_when_of_stock',
        'check_stock_during_add_to_cart',
        'international_shipping',
        'local_delivery',
        'feature',
        'new_arrival',
        'weight',
        'length',
        'width',
        'height',
        'international_min_order_qty',
        'international_max_order_qty',
        'local_min_order_qty',
        'local_max_order_qty',
        'local_delivery_qty',
        'page_title',
        'meta_keyword',
        'meta_description',
        'view',
        'status',
        'slug',
        'disabled_at',
        'tax_amount',
        'original_product_id',
        'original_store_id',
        'original_price',
        'category_id',
        'country_id',
        'brand_id',
        'manufacturer_id',
        'store_id',
        'admin_id',
        'sequence_id',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
//        'category_list',
//        'tag_list',
    ];

    /**
     * Get products categories.
     *
     * @return string
     */
    public function getCategoryListAttribute()
    {
        return $this->categories->pluck('id');
    }

    /**
     * Get products tags.
     *
     * @return string
     */
    public function getTagListAttribute()
    {
        return $this->tags->pluck('id');
    }

    public function getFeatureImageAttribute($value)
    {
        $store_id = isset(auth()->user()->store_id)?auth()->user()->store_id:session()->get('api_store_id');
        $image = isset($this->images[0])?$this->images[0]->media:null;
        $returnUrl = asset('storage/' . $store_id . '/product/' . $image);
        if (!file_exists($returnUrl)) {
            $returnUrl = asset('common/images/default_product.jpg');
        }
        return $returnUrl;
    }

    /**
     * Get the country that owns the products.
     */

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    /**
     * Get the category that owns the products.
     */
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * Get the store that owns the products.
     */
    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }

    /**
     * Get the provider that owns the products.
     */
    public function provider(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Store', 'original_store_id');
    }

    /**
     * Get the tag that owns the products.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    /**
     * Get the category that owns the products.
     */
    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany('App\Models\Category');
    }

    /**
     * Get the parameters of the product.
     */
    public function parameters()
    {
        return $this->belongsToMany('App\Models\Parameter')->withPivot('value');
    }

    /**
     * Get the manufacturer that owns the products.
     */
    public function manufacturer()
    {
        return $this->belongsTo('App\Models\Manufacturer')->withTrashed();
    }

    /**
     * Get the brand that owns the products.
     */
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand')->withTrashed();
    }

    /**
     * Get the shippings of the products.
     */
    public function shippings()
    {
        return $this->hasMany('App\Models\Shipping');
    }

    /**
     * Get the localDeliveries of the products.
     */
    public function localDeliveries()
    {
        return $this->hasMany('App\Models\LocalDelivery');
    }

    /**
     * Get the images of the product.
     */
    public function images()
    {
        return $this->hasMany('App\Models\MediaProduct')->orderBy('order_id', 'ASC');
    }

    /**
     * Get the images of the product.
     */
    public function originalImages()
    {
        return $this
            ->hasMany('App\Models\MediaProduct', 'product_id', 'original_product_id')
            ->orderBy('order_id', 'ASC');
    }

    /**
     * Get the images of the product.
     */
    public function mainimg()
    {
        return $this->hasOne('App\Models\MediaProduct')->orderBy('order_id', 'ASC');
    }

    /**
     * Get the stocks of the product.
     */
    public function stocks()
    {
        return $this->hasMany('App\Models\Stock');
    }

    /**
     * Get the variants of the product.
     */
    public function variants()
    {
        return $this->hasMany('App\Models\ProductVariant');
    }

    /**
     * Get the admin of the product.
     */
    public function admin(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Admin');
    }

    public static function getSequenceId()
    {
        $storeId = auth()->user()->store_id ?? \request()->store->id;
        $product = Product::select('sequence_id')->where('store_id', $storeId)->orderBy('sequence_id', 'DESC')->first();

        if (!empty($product) && $product->sequence_id > 0) {
            $number = $product->sequence_id + 1;
        } else {
            $number = 1;
        }
        return $number;
    }

    /**
     * Get the resellerProduct of the product.
     */
    public function resellerProduct(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\ResellerProduct');
    }

    /**
     * Get the orderDetails of the product.
     */
    public function orderDetails(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

    /**
     * Get the liveVideos of the product.
     */
    public function liveVideos(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(LiveVideo::class);
    }
}
