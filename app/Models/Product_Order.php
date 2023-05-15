<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Order extends Model
{

    /**
     * Get the user that owns the Product_Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    protected $fillable= ['product_id','order_id','price','quantity','rate'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    use HasFactory;
}
