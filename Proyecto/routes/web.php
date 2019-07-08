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

Route::get('/', 'TestController@welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}/', 'ProductController@show');
Route::get('/categories/{category}/', 'CategoryController@show');

Route:: post('/cart/', 'CartDetailController@store');
Route::delete('/cart/', 'CartDetailController@destroy');
Route::post('/order/', 'CartController@update');
Route::get('/pdf/{tipo}', 'CartController@export_pdf');

Route::get('/qrcode/', 'HomeController@qrcode');


Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {

        Route::get('/products', 'ProductController@index'); //listado editar, eliminar
        Route::get('/products/create', 'ProductController@create'); //registrar , crear, nuevos productos formulario
        Route::post('/products', 'ProductController@store');//crear //registrar
        Route::get('/products/{id}/edit', 'ProductController@edit'); //formaulario de edición
        Route::post('/products/{id}/edit', 'ProductController@update'); //actualizar los datos de los productos seleccionados
        Route::delete('/products/{id}/', 'ProductController@destroy'); //formaulario eliminar
        // Route::delete('/products/{id}', 'ProductController@destroy'); //formaulario eliminar

        Route::get('/products/{id}/images', 'ImageController@index'); //listado
        Route::post('/products/{id}/images', 'ImageController@store');
        Route::delete('/products/{id}/images', 'ImageController@destroy');
        Route::get('/products/{id}/images/select/{image}', 'ImageController@select');

        Route::get('/categories', 'CategoryController@index'); //listado editar, eliminar
        Route::get('/categories/create', 'CategoryController@create'); //registrar , crear, nuevos productos formulario
        Route::post('/categories', 'CategoryController@store');//crear //registrar
        Route::get('/categories/{category}/edit', 'CategoryController@edit'); //formaulario de edición
        Route::post('/categories/{category}/edit', 'CategoryController@update'); //actualizar los datos de los productos seleccionados
        Route::delete('/categories/{category}', 'CategoryController@destroy'); //formaulario eliminar
});





//CR crear leer
//UD
