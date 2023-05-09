<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }
    public function orderCommission()
    {
        return $this->hasMany(OrderCommission::class);
    }

    public function vendorAccount()
    {
        return $this->hasOne(VendorAccounts::class);
    }
}
