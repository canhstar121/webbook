<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderCustomer extends Model
{
    protected $table = "order_customers";
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function CusToUser()
    {
        return $this->belongsTo('App\Models\User', 'userId', 'id');
    }
}