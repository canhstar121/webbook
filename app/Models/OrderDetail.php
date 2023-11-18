<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "order_details";
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function OrderDetailToProduct()
    {
        return $this->belongsTo('App\Models\Product', 'proId', 'id');
    }
}
