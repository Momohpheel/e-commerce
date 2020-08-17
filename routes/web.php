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


Auth::routes();
//Route::group(['prefix' => 'User']){
Route::get('/', 'User\UserController@index');
Route::post('/like/{id}', 'User\UserController@like');
Route::get('/item/{id}', 'User\UserController@view');
Route::post('/cart/{id}', 'User\UserController@addToCart');
Route::post('comment/{id}', 'User\UserController@comment');
Route::get('/cart/get', 'User\UserController@cart');
Route::get('/super', 'User\UserController@super');
Route::post('/super', 'User\UserController@addSeller');
Route::get('filter/{id}', 'User\UserController@filter');
Route::get('category/{id}', 'User\UserController@category');

Route::group(['prefix' => 'super-user'], function () {
    Route::get('/add-item', 'SuperUser\SuperUsercontroller@getaddItem');
    Route::post('/add-item', 'SuperUser\SuperUsercontroller@addItem');
    Route::post('/items/delete/{id}', 'SuperUser\SuperUsercontroller@deleteItem');
    Route::get('/items/update/{id}', 'SuperUser\SuperUsercontroller@getaddItem');
    Route::post('/items/{id}/update', 'SuperUser\SuperUsercontroller@updateItem');
    Route::get('/items', 'SuperUser\SuperUsercontroller@viewItems');

});

