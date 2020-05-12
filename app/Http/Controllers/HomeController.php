<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dataPage = "setupHome";
        return view('home',['dataPage' => $dataPage]);
    }

    public function search(Request $request)
    {

        $dataPage = "";
        $intNumber = $request->input('internal_number');
        $productNumber = $request->input('id_prodfab');
        
        if($intNumber!=null && $productNumber!=null) {
           $product = Product::where('internal_number', $intNumber)->first();
        }else if($intNumber!=null && $productNumber==null) {
            $product = Product::where('internal_number', $intNumber)->first();
        }else{
            $product = Product::where('id_prodfab', $productNumber)->first();
        }

        return view('home', ['products'=>$product, 'dataPage' => $dataPage]);
    }
}
