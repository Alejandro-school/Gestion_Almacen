<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Provider;
use DB;
use Carbon\Carbon;
class ProductController extends Controller
{




    public function index() 
    {

        $products = Product::all();
        $dataPage = "";
        

        return view('product.index', ['products' => $products, 'dataPage' => $dataPage]);
    }

    public function create() 
    {

    
        $providers = Provider::all();
        
        $dataPage = "setupProduct";

        return view('product.create', ['providers' => $providers, 'dataPage' => $dataPage]);
    }

    public function save(Request $request)
    {

        $validate = $this->validate($request, [
            'id_user' => 'required|integer',
            'name' => 'required|string',
            'id_prodfab' => 'required|string',
            'internal_number' => 'required|string',
            'imagen' => 'required|max:2048|mimes:jpeg,jpg,png',
            'price' => 'required',
          ]);


        $id_user = $request->input('id_user');
        $name = $request->input('name');
        $id_prodfab = $request->input('id_prodfab');
        $internal_number = $request->input('internal_number');
        $picture = $request->file('imagen');
        $id_provider = $request->input('provider_id');
        $price = $request->input('price');

        if ($picture) {
            
            $namePicture=$picture->getClientOriginalName();
            $picture->move(public_path().'/images',$namePicture);
            $imagen = $namePicture;
        }

        $data=array(
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            'name'=>$name,
            'id_prodfab'=>$id_prodfab,
            'internal_number'=>$internal_number,
            'image'=>$imagen,
            'id_user' => $id_user
        
            );
           
    
           Product::insert($data);

           $id_product = Product::latest('id')->first();

            

          


        return back();
    }
    
    
    public function modify($id)
    {
        $dataPage = "";
        $product = Product::where('id', $id)->first();
        

        return view('product.modify', ['product' => $product,'dataPage' => $dataPage]);
    }
}
