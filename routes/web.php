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

Route::get('/', 'BerandaController@index');
Route::get('/product', 'BerandaController@product');
Route::get('/category/{slug}', 'BerandaController@productbycategory')->name('category.product');
Route::get('/supplier/{id}', 'BerandaController@productbysupplier');
Route::get('product/detail/{slug}','BerandaController@detail');
Route::get('/supplier','BerandaController@supplier');

Auth::routes();



Route::prefix('admin')->group(function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('media','HomeController@media')->name('media.index');
	Route::get('dashboard','HomeController@index');
	// Route::get('category','CategoryController@index');
	// Route::post('category','CategoryController@store')->name('admin.category');
	Route::resource('category','CategoryController');
	Route::resource('product','ProductController');
	// user
	Route::get('user','UserController@index')->name('admin.user');
	Route::get('user/status/{id}','UserController@changestatus');
	Route::get('user/add','UserController@create')->name('admin.user.create');
	Route::post('user/add','UserController@store')->name('admin.user.store');
	Route::get('user/edit/{id}','UserController@edit');
	Route::post('user/update','UserController@update');
	Route::get('user/delete/{id}','UserController@delete');

});
