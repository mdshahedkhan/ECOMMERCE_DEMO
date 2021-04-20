<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'shipping_id', 'total', 'status'];


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id')->select('id', 'first_name', 'last_name', 'phone', 'email', 'address');
    }

    public function shipping()
    {
        return $this->belongsTo(Shipping::class, 'shipping_id')->select('id', 'first_name', 'last_name', 'address', 'phone');
    }

    public function order_info()
    {
        return $this->hasMany(OrderInfo::class, 'order_id');
        /*->select('order_id', 'product_id', 'product_name', 'product_price', 'selling_price', 'product_qty')*/
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id', 'order_id')->select('id', 'order_id', 'type', 'status');
    }

}
