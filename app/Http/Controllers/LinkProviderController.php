<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Provider;
use DB;
use Session;

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

    public function save(Request $request) {
       
        $id_product = $request->input("id_product");
        $id_provider = $request->input("id_provider");
        $price = $request->input("price");

        DB::table('product_provider')->insert(
            ['id_product' => $id_product, 'id_provider' => $id_provider, 'price' => $price]);

        Session::flash('success', 'Proveedor Vinculado Satisfactoriamente');

        return back();
    
    }
}
