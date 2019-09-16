<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'id', 'product_name', 'product_price', 'product_description', 'created_at', 'updated_at'
    ];
}
