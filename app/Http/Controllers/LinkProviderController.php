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
            $price = $request->input("price");
            $searchProducts = Product::where('internal_number', 'LIKE', "%$dato%")->get();
            $countProducts = $searchProducts->count();
            $providers = Provider::all();

            return response()->json(['product' => $searchProducts, 'providers' => $providers, 'countProducts' => $countProducts]);

        }

    }

    public function saveProvider(Request $request) {

        if($request->ajax()){
            $id_product = $request->input("id_product");
            $id_provider = $request->input("id_provider");
            $price = $request->input("price");

            DB::table('product_provider')->insert(
                ['id_product' => $id_product, 'id_provider' => $id_provider, 'price' => $price]);

            $provider = Provider::where('id', $id_provider)->first();

            $nameProvider = $provider->name;

            return response()->json(['success' => 'Proveedor '.$nameProvider.' Añadido. '.'Precio: '.$price.'€']);

        }

    }

    public function save(Request $request) {
      
        
        
        $id_product = $request->input("id_product");
        $id_provider = $request->input("id_provider");
        $price = $request->input("price");

        try {

        DB::table('product_provider')->insert(
            ['id_product' => $id_product, 'id_provider' => $id_provider, 'price' => $price]);

        Session::flash('success_prov', 'Proveedor Vinculado Satisfactoriamente');

        return back();
        
        }catch(\Illuminate\Database\QueryException $e) {
            
            Session::flash('failed', 'Ese proveedor ya esta vinculado a ese producto');
            return back();

        }
        
    
    }
}
