<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class,'product_id', 'product_id');
    }
}
