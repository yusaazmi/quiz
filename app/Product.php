<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = [
        'id',
        'product_name',
        'category_id',
        'product_detail',
        'price'
    ];

    public function productDetail()
    {
        return $this->hasOne('App\ProductDetail');
    }
    public function category()
    {
        return $this->hasOne('App\Category');
    }
}
