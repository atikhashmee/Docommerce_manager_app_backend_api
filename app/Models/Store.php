<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'domain_by',
        'domain_type',
        'sub_domain',
        'domain',
        'slogan',
        'logo',
        'logo_text',
        'logo_width',
        'icon',
        'theme_style',
        'theme_color',
        'theme_id',
        'timezone_id',
        'language_id',
        'currency_id',
        'image_visibility',
        'image_layout',
        'image_type',
        'cover_image',
        'category_search_visibility',
        'is_profile_completed',
        'is_settings_completed',
        'is_maintenance_mode',
        'is_theme_customized',
        'facebook_shop',
        'is_facebook_shop_on',
        'parent_cat_clickable',
        'merchant_id',
        'plan_id',
        'total_price',
        'android_app',
        'ios_app',
        'maximum_order_quantity',
        'additional_order_price',
        'handover_at',
        'expiry_date',
        'invoice_sent_at',
        'store_plan',
        'plan_type',
        'theme_settings',
        'footer',
        'reseller',
        'email_service',
        'email_service_on',
        'status',
        'is_category_hide',
        'is_demo_store',
        'api_key',
        'tax_enable',
        'tax_amount',
        'created_by',
        'updated_by',
        'is_shopping_disabled',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        // 'logo_type',
        // 'icon_full_url',
        // 'logo_full_url',
        // 'cover_picture_full_url',
    ];
}
