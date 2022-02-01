<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'category_slug',
        'category_name',
        'hide_from_cat_menu',
        'category_details',
        'category_image',
        'category_banner',
        'sorting',
        'featured_category',
        'route_title',
        'route_keyword',
        'route_description',
        'status',
        'banner_size',
        'created_by',
        'updated_by',
        'store_id',
        'sequence_id',
    ];
    
    /**
     * Get the products of the category.
     */
    public function mainCatProducts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Product')->where('products.status', '!=', 'unassigned');
    }

    /**
     * Get the products that owns the category.
     */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    /**
     * Get the store that owns the category.
     */
    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }

    public function nested()
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    }

    public function items()
    {
        return $this->nested()->select('id', 'parent_id', 'category_name');
    }

    /**
     * Get the parent of the category.
     */
    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public static function getSequenceId()
    {
        $storeId = auth()->user()->store_id ?? \request()->store->id;
        $category = Category::select('sequence_id')->where('store_id', $storeId)->orderBy('sequence_id', 'DESC')->first();

        if (!empty($category) && $category->sequence_id > 0) {
            $number = $category->sequence_id + 1;
        } else {
            $number = 1;
        }
        return $number;
    }
}
