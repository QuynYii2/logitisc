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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('', 'HomeController@index');


Route::get('/restaurant/list', '\App\Http\Controllers\RestaurantController@index')->name('restaurant.list')->middleware('restaurant');
Route::get('/restaurant/add', '\App\Http\Controllers\RestaurantController@add')->name('restaurant.creat')->middleware('restaurant');
Route::post('/restaurant/add', '\App\Http\Controllers\RestaurantController@save')->name('restaurant.save');
Route::get('/restaurant/{id}/edit', '\App\Http\Controllers\RestaurantController@edit')->name('restaurant.edit');
Route::post('/restaurant/update', '\App\Http\Controllers\RestaurantController@update')->name('restaurant.update');
Route::get('/restaurant/{id}/delete', '\App\Http\Controllers\RestaurantController@delete')->name('restaurant.delete');

Route::get('/user/list', '\App\Http\Controllers\UserController@index')->name('user.list')->middleware('permission');
Route::get('/user/add', '\App\Http\Controllers\UserController@add')->name('user.creat')->middleware('restaurant');
Route::post('/user/add', '\App\Http\Controllers\UserController@save')->name('user.save');
Route::get('/user/{id}/edit', '\App\Http\Controllers\UserController@edit')->name('user.edit')->middleware('restaurant');
Route::post('/user/update', '\App\Http\Controllers\UserController@update')->name('user.update');
Route::get('/user/{id}/delete', '\App\Http\Controllers\UserController@delete')->name('user.delete');

Route::get('/material/list', '\App\Http\Controllers\MaterialController@index')->name('material.list')->middleware('permission');
Route::get('/material/add', '\App\Http\Controllers\MaterialController@add')->name('material.creat')->middleware('permission');
Route::post('/material/add', '\App\Http\Controllers\MaterialController@save')->name('material.save');
Route::get('/material/{id}/edit', '\App\Http\Controllers\MaterialController@edit')->name('material.edit');
Route::post('/material/update', '\App\Http\Controllers\MaterialController@update')->name('material.update');
Route::get('/material/{id}/delete', '\App\Http\Controllers\MaterialController@delete')->name('material.delete');

Route::get('/order/list', '\App\Http\Controllers\OrderController@index')->name('order.list');
Route::get('/order/{id}/detail', '\App\Http\Controllers\OrderController@detail')->name('order.detail');
Route::get('/order/add', '\App\Http\Controllers\OrderController@add')->name('order.creat');
Route::post('/order/add', '\App\Http\Controllers\OrderController@save')->name('order.save');
Route::get('/order/{id}/edit', '\App\Http\Controllers\OrderController@edit')->name('order.edit');
Route::post('/order/update', '\App\Http\Controllers\OrderController@update')->name('order.update');
Route::get('/order/{id}/delete', '\App\Http\Controllers\OrderController@delete')->name('order.delete');

Route::get('/menu/list', '\App\Http\Controllers\MenuController@index')->name('menu.list')->middleware('permission');
Route::get('/menu/{id}/detail', '\App\Http\Controllers\MenuController@detail')->name('menu.detail')->middleware('permission');
Route::get('/menu/add', '\App\Http\Controllers\MenuController@add')->name('menu.creat')->middleware('permission');
Route::post('/menu/add', '\App\Http\Controllers\MenuController@save')->name('menu.save');
Route::get('/menu/{id}/edit', '\App\Http\Controllers\MenuController@edit')->name('menu.edit');
Route::post('/menu/update', '\App\Http\Controllers\MenuController@update')->name('menu.update');
Route::get('/menu/{id}/delete', '\App\Http\Controllers\MenuController@delete')->name('menu.delete');

Route::get('/table/list', '\App\Http\Controllers\TableController@index')->name('table.list')->middleware('permission');
Route::get('/table/{id}/detail', '\App\Http\Controllers\TableController@detail')->name('table.detail')->middleware('permission');
Route::get('/table/add', '\App\Http\Controllers\TableController@add')->name('table.creat')->middleware('permission');
Route::post('/table/add', '\App\Http\Controllers\TableController@save')->name('table.save');
Route::get('/table/{id}/edit', '\App\Http\Controllers\TableController@edit')->name('table.edit');
Route::post('/table/update', '\App\Http\Controllers\TableController@update')->name('table.update');
Route::get('/table/{id}/delete', '\App\Http\Controllers\TableController@delete')->name('table.delete');

Route::post('/statistical', '\App\Http\Controllers\HomeController@statistical')->name('statistical');

