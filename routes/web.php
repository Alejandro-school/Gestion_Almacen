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


/*Route::get('/', function () {

    
    $product = App\Product::all();

    foreach($product->providers as $provider) {
        var_dump($provider->name);
        var_dump($product->id_prodfab);
    }

    foreach($product as $prod) {
       var_dump($prod);
    }

  foreach($product as $products) {
        echo $products."<br/><br/>";
    }

    foreach($product as $prod) {
        var_dump($prod->name);
        
       for($i=0; $i<sizeof($prod->providers);$i++) {
            echo $prod->providers[$i]->name."<br/>";
        }
    }

    var_dump($product->image);

    for($i=0; $i<sizeof($product->providers); $i++) {
        echo $product->providers[$i]->name."<br/>";
    }
    

   


    foreach($product as $prod) {
        var_dump($prod->id_prodfab);
        echo $prod->providers[0]->id;
        
    }

});
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('search', 'HomeController@search');

//Providers
Route::resource('Providers', 'ProviderController');

//product
Route::get('detailProduct/{id}', 'ProductController@modify')->name('modify.product');
Route::get('Products', 'ProductController@index');
Route::get('createProduct', 'ProductController@create');
Route::post('saveProduct', 'ProductController@save');
