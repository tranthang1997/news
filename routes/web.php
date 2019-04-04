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
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('/home', ['as' => 'home', 'uses' => 'CateController@getList']);
	Route::get('/', ['as' => 'home', 'uses' => 'CateController@getList']);
	Route::group(['prefix' => 'cate'], function() {
		Route::get('list', ['as' => 'admin.cate.getList', 'uses' => 'CateController@getList']);
		Route::get('add', ['as' => 'admin.cate.getAdd', 'uses' => 'CateController@getAdd']);
		Route::post('add', ['as' => 'admin.cate.postAdd', 'uses' => 'CateController@postAdd']);
		Route::get('edit/{id}', ['as' => 'admin.cate.getEdit', 'uses' => 'CateController@getEdit']);
		Route::post('edit/{id}', ['as' => 'admin.cate.postEdit', 'uses' => 'CateController@postEdit']);
		Route::get('delete/{id}', ['as' => 'admin.cate.getDelete', 'uses' => 'CateController@getDelete']);
	});
	Route::group(['prefix' => 'product'], function() {
		Route::get('list', ['as' => 'admin.product.getList', 'uses' => 'ProductController@getList']);
		Route::get('add', ['as' => 'admin.product.getAdd', 'uses' => 'ProductController@getAdd']);
		Route::post('add', ['as' => 'admin.product.postAdd', 'uses' => 'ProductController@postAdd']);
		Route::get('delete/{id}', ['as' => 'admin.product.getDelete', 'uses' => 'ProductController@getDelete']);
		Route::get('edit/{id}', ['as' => 'admin.product.getEdit', 'uses' => 'ProductController@getEdit']);
		Route::post('edit/{id}', ['as' => 'admin.product.postEdit', 'uses' => 'ProductController@postEdit']);
		Route::get('delimg/{id}', ['as' => 'admin.product.getDelImg', 'uses' => 'ProductController@getDelImg']);
	});
	Route::group(['prefix' => 'user'], function() {
		Route::get('list', ['as' => 'admin.user.getList', 'uses' => 'UserController@getList']);
		Route::get('add', ['as' => 'admin.user.getAdd', 'uses' => 'UserController@getAdd']);
		Route::post('add', ['as' => 'admin.user.postAdd', 'uses' => 'UserController@postAdd']);
		Route::get('delete/{id}', ['as' => 'admin.user.getDelete', 'uses' => 'UserController@getDelete']);
		Route::get('edit/{id}', ['as' => 'admin.user.getEdit', 'uses' => 'UserController@getEdit']);
		Route::post('edit/{id}', ['as' => 'admin.user.postEdit', 'uses' => 'UserController@postEdit']);
	});
});
Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
// Route::get('home', function() {
// 	return view('user.pages.home');
// });
Route::get('tin-tuc/{id}/{tenloai}', ['as' => 'tintuc', 'uses' => 'HomeController@tintuc']);
Route::get('chi-tiet/{loai_tin}/{id}/{product_detail}', ['as' => 'product_detail', 'uses' => 'HomeController@product']);
// send Mail
Route::get('contact', ['as' => 'getContact', 'uses' => 'HomeController@getContact']);
Route::post('contact', ['as' => 'postContact', 'uses' => 'HomeController@postContact']);

Route::post('shopping/{id}/{product}', ['as' => 'postShopping', 'uses' => 'HomeController@postShopping']);
Route::get('cart', ['as' => 'getCart', 'uses' => 'HomeController@getCart']);

//update cart
Route::get('delete-product/{id}', ['as' => 'deleteproduct', 'uses' => 'HomeController@deleteProduct']);
Route::get('update/{id}{qty}', ['as' => 'update', 'uses' => 'HomeController@update']);