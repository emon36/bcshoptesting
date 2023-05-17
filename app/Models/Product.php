<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Translation\t;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'attribute',
        'value',
    ];

    public function categories()
    {
        return $this->hasMany(ProductCategory::class);
    }

    public function attributes(){
        return $this->hasMany(ProductAttribute::class);
    }

    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    public function fImage(){
        return $this->hasOne(ProductImage::class)->where('position_key', 1);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }


}
