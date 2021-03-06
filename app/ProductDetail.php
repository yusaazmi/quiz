<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = 'product_details';
    protected $fillable = [
        'id',
        'description'
    ];
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
