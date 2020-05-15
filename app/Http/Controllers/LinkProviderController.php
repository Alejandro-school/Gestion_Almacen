<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Provider;

class LinkProviderController extends Controller
{
    public function index() {

        $products = Product::all();
        $providers = Provider::all();
        $dataPage = 'setupLinkProvider';

    
        

        return view('product.linkProviders', ['dataPage' => $dataPage, 'products' => $products, 'providers' => $providers]);
    }

    public function search(Request $request) {

        if($request->ajax()){
            $dato = $request->input("internal_number");

            $searchProducts = Product::where('internal_number', 'LIKE', "%$dato%")->get();
            $countProducts = $searchProducts->count();
            $providers = Provider::all();

            return response()->json(['product' => $searchProducts, 'providers' => $providers, 'countProducts' => $countProducts]);

        }

    }
}
