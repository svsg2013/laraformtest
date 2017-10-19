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
//route index front end
Route::get('/', function () {
    return view('bodycare.frontend.home');
});
//route 404
Route::get('/error',function(){
	return abort('404');
});
//auth::routes bat buoc phai co, trong day khai bao route mac dinh cho authentication
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('controllpanel',function(){
	return view('admin.dashboard');
});
//route quan tri
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
	Route::get('ajaxNews/{idCate}','AjaxController@getTypecate');
	Route::resource('user','UserController');
	Route::resource('category','CateController');
	Route::resource('typecate','TypeCateController');
	Route::resource('slide','SlideController');
	//nguyen cum nhung controller xu ly Article
	Route::resource('article','ArtController',['except'=>'destroy']);
	Route::get('article/destroy/{idDestroy}','ArtController@destroy')->name('article.destroy');
	Route::post('article/deletall','ArtController@deleteall')->name('deletAllArt');
	//----------------phan san pham
	Route::resource('catepro','CateProController');
	//nguyen cum xu ly Product
	Route::resource('product','ProduceController',['except'=>'destroy']);
	Route::get('product/destroy/{idDestroy}','ProduceController@destroy')->name('product.destroy');
	Route::post('product/deletall','ProduceController@deleteall')->name('deletAll');
});

