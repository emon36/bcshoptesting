<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function orderDetails()
    {
        return $this->hasOne(OrderDetails::class);
    }
    public function customers()
    {
        return $this->belongsTo(User::class,'customer_id','id');
    }

    public function shipping()
    {
        return $this->hasOne(Shipping::class,'order_id', 'id');
    }
    public function courier()
    {
        return $this->hasOne(Courier::class);
    }
}

