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

    
    $product = App\Product::find(2);

    /*foreach($product->providers as $provider) {
        var_dump($provider->name);
        var_dump($product->id_prodfab);
    }*/

    /*foreach($product as $prod) {
       var_dump($prod);
    }*/

    return $product->providers;

    /*foreach($product as $prod) {
        var_dump($prod->id_prodfab);
        echo $prod->providers[0]->id;
        
    }*/

});
