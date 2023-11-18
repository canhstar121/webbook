<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function ParentCate()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }
    public function ParentCateBe()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }
    public function CateToPro()
    {
        return $this->hasMany('App\Models\Product', 'cateId', 'id');
    }
}