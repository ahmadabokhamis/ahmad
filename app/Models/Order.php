<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['user_id','payment_id','total','status'];

    public function product_order()
    {
        return $this->belongsToMany(Product::class, 'product_orders', 'order_id', 'product_id');
    }

    public function products()
    {
        return $this->hasMany(Product_Order::class, 'order_id', 'id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function histories()
    {
        return $this->hasMany(OrderHistory::class, 'order_id', 'id');
    }

    use HasFactory;
}
