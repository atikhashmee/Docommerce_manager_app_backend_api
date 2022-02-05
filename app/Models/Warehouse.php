<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'warehouse_id',
        'address',
        'contact_name',
        'contact_phone',
        'contact_email',
        'admin_id',
        'store_id',
        'status',
    ];
    /**
     * Get the admin that owns the warehouse.
     */
    public function admin(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Admin');
    }
}
