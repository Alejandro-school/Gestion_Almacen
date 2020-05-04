<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function providers() {
        return $this->belongsToMany(Provider::class, 'product_provider','id_product', 'id_provider');
    }
}
