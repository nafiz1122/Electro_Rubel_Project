<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function payment()
    {
        return $this->belongsTo('App\Models\Payment', 'payment_id', 'id');
    }
    public function shipping()
    {
        return $this->belongsTo('App\Models\Shipping', 'shipping_id', 'id');
    }

    public function orderdetail()
    {
        return $this->hasMany('App\Models\OrderDetail', 'order_id', 'id');
    }
}
