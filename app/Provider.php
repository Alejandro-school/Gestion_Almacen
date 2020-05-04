<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';
    
    
    public function products() {
        return $this->belongsToMany(Product::class, 'product_provider', 'id_provider', 'id_product');
    }
}
