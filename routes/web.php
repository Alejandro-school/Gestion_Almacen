<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {

    $product = App\Product::all();
    $provider = App\Provider::find(1);

    /*foreach($product->providers as $provider) {
        var_dump($provider->name);
        var_dump($product->id_prodfab);
    }*/

    /*foreach($product as $prod) {
       var_dump($prod);
    }*/

    foreach($provider->products as $prov) {
        var_dump($prov->image);
        
    }

    /*foreach($product as $prod) {
        var_dump($prod->id_prodfab);
        echo $prod->providers[0]->id;
        
    }*/

    



   
    die();
    return view('welcome');
});
