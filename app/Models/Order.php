<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function OrderToCus()
    {
        return $this->belongsTo('App\Models\OrderCustomer', 'cusId', 'id');
    }
    public function OrderToDetail()
    {
        return $this->hasMany('App\Models\OrderDetail', 'orderId', 'id');
    }
}
