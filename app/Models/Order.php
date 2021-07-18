<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'retailer_id',
        'product_id',
        'location',
        'quantity',
        'salesdata',
        'order_date',
        'status_order',
        'is_ordered'
    ];

    public function product()
    {
        return $this->belongsTo('\App\Models\Product', 'product_id', 'id');
    }
}
