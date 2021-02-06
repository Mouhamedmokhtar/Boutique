<?php

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

	/* PRODUCT */
Route::get('/products','ProductController@index')->name('products')	;
Route::get('/products/create','ProductController@create')->name('products.create')	;
Route::get('/products/edit/{id}','ProductController@edit')->name('products.edit')	;
Route::get('/products/show/{id}','ProductController@show')->name('products.show')	;
Route::post('/products/store','ProductController@store')->name('products.store')	;
Route::put('/products/update/{id}','ProductController@update')->name('products.update')	;
Route::delete('/products/destroy/{id}','ProductController@destroy')->name('products.destroy')	;
	
		/* clients */

	Route::get('/clients','ClientController@index')->name('clients')	;
	Route::get('/clients/create','ClientController@create')->name('clients.create')	;
	Route::get('/clients/edit/{id}','ClientController@edit')->name('clients.edit')	;
	Route::get('/clients/show/{id}','ClientController@show')->name('clients.show')	;
	Route::post('/clients/store','ClientController@store')->name('clients.store')	;
	Route::put('/clients/update/{id}','ClientController@update')->name('clients.update')	;
	Route::delete('/clients/destroy/{id}','ClientController@destroy')->name('clients.destroy')	;

							/* employers */
	
Route::get('/employers','EmployersController@index')->name('employers')	;
Route::get('/employers/create','EmployersController@create')->name('employers.create')	;
Route::get('/employers/edit/{id}','EmployersController@edit')->name('employers.edit')	;
Route::get('/employers/show/{id}','EmployersController@show')->name('employers.show')	;
Route::post('/employers/store','EmployersController@store')->name('employers.store')	;
Route::put('/employers/update/{id}','EmployersController@update')->name('employers.update')	;
Route::delete('/employers/destroy/{id}','EmployersController@destroy')->name('employers.destroy');

							/* categorys */

			Route::get('/categorys','CategorysController@index')->name('categorys')	;
			Route::get('/categorys/create','CategorysController@create')->name('categorys.create')	;
			Route::get('/categorys/edit/{id}','CategorysController@edit')->name('categorys.edit')	;
			Route::get('/categorys/show/{id}','CategorysController@show')->name('categorys.show')	;
			Route::post('/categorys/store','CategorysController@store')->name('categorys.store')	;
			Route::put('/categorys/update/{id}','CategorysController@update')->name('categorys.update');
			Route::delete('/categorys/destroy/{id}','CategorysController@destroy')->name('categorys.destroy')	;

Route::post('/categorys', 'CategorysController@search');
Route::post('/employers', 'EmployersController@search');
Route::post('/clients', 'ClientController@search');
Route::post('/products', 'ProductController@search');


Route::get('/', function () {
    return view('welcome');
})

;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
