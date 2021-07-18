<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product',
        'stock',
        'product_date'
    ];
    static function uploadPhoto($photo)
    {
        $image_path = null;
        if ($photo && $photo->isValid()) {
            $image_path = $photo->store('public/products');
        }
        return $image_path ? explode('public/products/', $image_path)[1] : $image_path;
    }
}
