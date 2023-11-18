<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function ProToCate()
    {
        return $this->belongsTo('App\Models\Category', 'cateId', 'id');
    }

    public function ProToGall()
    {
        return $this->belongsTo('App\Models\Gallery', 'galleryId', 'id');
    }

    public function ProToInfo()
    {
        return $this->belongsTo('App\Models\ProductInfo', 'productInfoId', 'id');
    }

    public function ProToOrderDetail()
    {
        return $this->hasMany('App\Models\OrderDetail', 'proId', 'id');
    }
    public function ProToWhish()
    {
        return $this->belongsTo('App\Models\Wishlist', 'id', 'pro_id');
    }
}
