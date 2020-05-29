<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Provider;
use DB;

use Session;
use Carbon\Carbon;
class ProductController extends Controller
{

    public function index() 
    {

        $products = Product::paginate(3);
        $dataPage = "searchProducts";

     
        
        

        return view('product.index', ['products' => $products, 'dataPage' => $dataPage]);
    }

    public function create() 
    {

    
        
        $dataPage = "";

        return view('product.create', ['dataPage' => $dataPage]);
    }

    public function save(Request $request)
    {

        $providers = Provider::all();
        
        //Creamos un dataPage para cuando le de a crear producto podamos hacer el formulario de añadir proveedores con ajax
        $dataPage = 'setupProduct';

        
        $validate = $this->validate($request, [
            'id_user' => 'required|integer',
            'name' => 'required|string',
            'id_prodfab' => 'required|string',
            'internal_number' => 'required|string',
            'imagen' => 'required|max:2048|mimes:jpeg,jpg,png',
          ]);


        $id_user = $request->input('id_user');
        $name = $request->input('name');
        $id_prodfab = $request->input('id_prodfab');
        $internal_number = $request->input('internal_number');
        $picture = $request->file('imagen');
        $id_provider = $request->input('provider_id');
        

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

           $lastId = Product::latest('id')->first();

           $products = Product::orderBy('created_at','desc')->paginate(10);

           Session::flash('success', 'Producto creado, elige un proveedor');

           
           return view('product.create', ['providers' => $providers, 'product'=>$lastId, 'products' => $products, 'dataPage' => $dataPage]);
    }
    
    
    public function modify($id)
    {
        $dataPage = "";
        $product = Product::where('id', $id)->first();
        

        return view('product.modify', ['product' => $product,'dataPage' => $dataPage]);
    }

    public function update(Request $request)
    {


        $validate = $this->validate($request, [
            'id_user' => 'required|integer',
            'name' => 'required|string',
            'id_prodfab' => 'required|string',
            'internal_number' => 'required|string',
            
          ]);

          $id_product = $request->input('id_product');
          $id_user = $request->input('id_user');
          $name = $request->input('name');
          $id_prodfab = $request->input('id_prodfab');
          $internal_number = $request->input('internal_number');
          $picture = $request->file('imagen');
          $current_image = $request->input('current_image');

          
  
          if ($picture) {
              
              $namePicture=$picture->getClientOriginalName();
              $picture->move(public_path().'/images',$namePicture);
              $imagen = $namePicture;
          }else{
              $imagen=$current_image;
          }
  
          $data=array(
        
              'updated_at'=>Carbon::now(),
              'name'=>$name,
              'id_prodfab'=>$id_prodfab,
              'internal_number'=>$internal_number,
              'image'=>$imagen,
              'id_user' => $id_user
          
              );

            

              $test = Product::where('id','=',$id_product)->update($data);
              
             
              
              return redirect()->action('ProductController@index')->with('success', 'Producto Actualizado Satisfactoriamente');

    }


    public function modifyPriceProviders($id_product, $id_provider) {
        
        
        $ids = array('id_product' => $id_product, 'id_provider' => $id_provider);

        $provider = Provider::where('id', $id_provider)->first();
        $product = Product::where('id', $id_product)->first();
        $providers = Provider::all();

        return view('Product.modifyPrice', ['product' => $product, 'provider' => $provider , 'providers' => $providers, 'id_prod_prov' => $ids]);
    }

    public function updatePriceProviders(Request $request) {
        
        
        try {
        $id_product = $request->input('id_product');
        $id_providerActual = $request->input('id_prov_actual');
        $id_providerNew= $request->input('id_new_provider');
        $price = $request->input('price');


        DB::table('product_provider')
              ->where('id_product', $id_product)->where('id_provider', $id_providerActual)
              ->update(['id_provider' => $id_providerNew, 'price' => $price]);
        
              Session::flash('success', 'Proveedor Actualizado Satisfactoriamente');
              return back();
              
         }catch(\Illuminate\Database\QueryException $e) {
            Session::flash('failed', 'Ese proveedor ya esta vinculado a ese producto');
            return back();
        }

    }

    public function deletePriceProviders($id_product, $id_provider) {
        
        
        DB::table('product_provider')->where('id_product', $id_product)->where('id_provider', $id_provider)->delete();
        return redirect()->action('HomeController@index')->with('success', 'Proveedor borrado del producto');


    }

    public function linkProv() {

        $products = Product::all();
        $providers = Provider::all();

        return view('product.linkProviders', ['products' => $products, 'providers' => $providers]);
    }

    

    public function delete(Request $request) {

        $id_product = $request->input('id_product');
        Product::destroy($id_product);
        return redirect()->action('ProductController@index')->with('success', 'Producto Borrado Satisfactoriamente');
    }
}
