<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    
    public function modify($id)
    {
        $product = Product::where('id', $id)->first();
        

        return view('product.modify', ['product' => $product]);
    }
}
