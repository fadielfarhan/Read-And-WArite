<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::get('/', 'HomeController@welcome');

Route::get('/test', function (){
    return view('test');
});
Route::get('/updatePage/{id}', 'HomeController@updatePage')->name('updatePage')->middleware('admin');
Route::post('/updateProduct/{id}', 'HomeController@updateProduct')->middleware('admin');
Route::post('/addCart/{id}', 'ProductController@addCart')->middleware('member');
Route::post('/deleteProduct/{id}/{type}', 'ProductController@deleteProduct')->middleware('admin');

Auth::routes();

Route::get('/detailPage', 'HomeController@detailPage')->name('detailPage')->middleware('loginware');

Route::get('/addProduct', 'HomeController@addProduct')->name('addProduct')->middleware('admin');
Route::post('/addProduct', 'HomeController@addProductt')->name('add.Product')->middleware('admin');

Route::get('/cartPage', 'HomeController@cartPage')->name('cartPage')->middleware('member');

Route::get('/editCart/{product_id}', 'HomeController@editCart')->middleware('member');
Route::post('/editCart/{product_id}', 'HomeController@updateCart')->middleware('member');

Route::get('/editProduct', 'HomeController@editProduct')->name('editProduct')->middleware('admin');
Route::post('/editProduct/{id}', 'HomeController@editTypeProduct')->middleware('admin');
Route::post('/deleteCategory/{id}', 'HomeController@deleteCategory')->middleware('admin');

Route::get('/historyPage', 'HomeController@historyPage')->name('historyPage')->middleware('member');

Route::get('/typeProduct', 'HomeController@typeProduct')->name('typeProduct')->middleware('admin');
Route::post('/addTypeProduct', 'HomeController@addTypeProduct')->middleware('admin');
Route::post('/checkout', 'HomeController@checkout')->middleware('member');

Route::get('/{name}/{id}', 'ProductController@detail')->middleware('loginware');
Route::get('/{name}', 'ProductController@index');