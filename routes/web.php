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

Route::get('/', function () {
    // return \App\models\type::all();
    return view('module.index-content');
});
Route::get('/danhmuc', function () {
    // return \App\models\type::all();
    return view('module.danhmuc');
});
Route::get('/chitiet', function () {
    // return \App\models\type::all();
    return view('module.chitiet');
});
Route::get('/lienhe', function () {
    // return \App\models\type::all();
    return view('module.lienhe');
});
Route::prefix('admin')->group(function () {
    Route::get('login', 'AdminController@getLogin')->name('getLogin');
    Route::post('login', 'AdminController@postLogin')->name('postLogin');

    Route::group(['middleware' => ['LoginAdmin']], function () {
        Route::get('logout', 'AdminController@logout')->name('logout');
        Route::get('/', 'AdminController@index')->name('index');
        Route::get('city', 'AdminController@city')->name('city');
        Route::post('createCity', 'AdminController@createCity')->name('createCity');
        Route::post('updateCity', 'AdminController@updateCity')->name('updateCity');
        Route::post('deleteCity', 'AdminController@deleteCity')->name('deleteCity');
        Route::get('district', 'AdminController@district')->name('district');
        Route::post('createDistrict', 'AdminController@createDistrict')->name('createDistrict');
        Route::post('updateDistrict', 'AdminController@updateDistrict')->name('updateDistrict');
        Route::post('deleteDistrict', 'AdminController@deleteDistrict')->name('deleteDistrict');
        Route::prefix('product')->group(function () {
            Route::get('/','AdminController@product')->name('product');
            Route::get('create','AdminController@getCreateProduct')->name('createProduct');
            Route::post('getDistrict','AdminController@getDistrict')->name('getDistrict');
            Route::post('create','AdminController@postCreateProduct')->name('postCreateProduct');
            Route::get('image/{id}','AdminController@image')->name('image');
            Route::post('image/{id}','AdminController@postCreateImage')->name('postCreateImage');
            Route::post('deleteImage','AdminController@deleteImage')->name('deleteImage');
            Route::get('edit/{id}','AdminController@editProduct')->name('editProduct');
            Route::post('edit/{id}','AdminController@postEditProduct')->name('postEditProduct');
            Route::post('delete','AdminController@deleteProduct')->name('deleteProduct');
        });
    });

});

