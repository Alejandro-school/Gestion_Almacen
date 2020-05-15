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

Route::middleware(['auth'])->group(function () {

    Route::post('Roles/store', 'RoleController@store')->name('Roles.store')
        ->middleware('can:Roles.create');

    Route::get('Roles', 'RoleController@index')->name('Roles.index')
        ->middleware('can:Roles.index');

    Route::get('Roles/create', 'RoleController@create')->name('Roles.create')
        ->middleware('can:Roles.create');

    Route::put('Roles/{role}', 'RoleController@update')->name('Roles.update')
        ->middleware('can:Roles.edit');

    Route::get('Roles/{role}', 'RoleController@show')->name('Roles.show')
        ->middleware('can:Roles.show');

    Route::delete('Roles/{role}', 'RoleController@destroy')->name('Roles.destroy')
        ->middleware('can:Roles.destroy');

    Route::get('Roles/{role}/edit', 'RoleController@edit')->name('Roles.edit')
        ->middleware('can:Roles.edit');

    //Product

    Route::post('Products/store', 'ProductController@store')->name('product.store')
        ->middleware('can:product.create');

    Route::get('Products', 'ProductController@index')->name('product.index')
        ->middleware('can:product.index');

    Route::get('Products/create', 'ProductController@create')->name('product.create')
        ->middleware('can:product.create');

    Route::put('Products/{role}', 'ProductController@update')->name('product.update')
        ->middleware('can:product.edit');

    Route::get('Products/{role}', 'ProductController@show')->name('product.show')
        ->middleware('can:product.show');

    Route::delete('Products/{role}', 'ProductController@destroy')->name('product.destroy')
        ->middleware('can:product.destroy');

    Route::get('Products/{role}/edit', 'ProductController@edit')->name('product.modify')
        ->middleware('can:product.modify');

    //Provider

    Route::post('Providers/store', 'ProviderController@store')->name('Providers.store')
        ->middleware('can:Provider.create');

    Route::get('Providers', 'ProviderController@index')->name('Providers.index')
        ->middleware('can:Providers.index');

    Route::get('Providers/create', 'ProviderController@create')->name('Providers.create')
        ->middleware('can:Providers.create');

    Route::put('Providers/{provider}', 'ProviderController@update')->name('Providers.update')
        ->middleware('can:Providers.edit');

    Route::get('Providers/{provider}', 'ProviderController@show')->name('Providers.show')
        ->middleware('can:Providers.show');

    Route::delete('Providers/{provider}', 'ProviderController@destroy')->name('Providers.destroy')
        ->middleware('can:Providers.destroy');

    Route::get('Providers/{provider}/edit', 'ProviderController@edit')->name('Providers.edit')
        ->middleware('can:Providers.edit');

    //Users

    Route::get('Users', 'UserController@index')->name('Users.index')
        ->middleware('can:Users.index');

    Route::put('Users/{user}', 'UserController@update')->name('Users.update')
        ->middleware('can:Users.edit');

    Route::get('Users/{user}', 'UserController@show')->name('Users.show')
        ->middleware('can:Users.show');

    Route::delete('Users/{user}', 'UserController@destroy')->name('Users.destroy')
        ->middleware('can:Users.destroy');

    Route::get('Users/{user}/edit', 'UserController@edit')->name('Users.edit')
        ->middleware('can:Users.edit');

});
