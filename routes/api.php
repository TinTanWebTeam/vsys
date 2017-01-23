<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => []],function(){
    Route::post('/authenticate', 'AuthenticateController@authenticate');
});

// Co header la "Bearer + token" thi duoc vao
Route::group(['middleware' => 'jwt.auth'],function(){
    Route::get('/authenticate', 'AuthenticateController@getAuthenticatedUser');

    Route::get('/nhapdulieu', function(Request $request) {
    	error_log('========================');
    	error_log($_GET['param']);
    	error_log('========================');
        return response()->json(json_decode($_GET['param']), 200);
    });

    Route::group(['middleware' => 'product'], function () {
        Route::get('/product', 'ProductController@getAll');
        Route::get('/product/{id}', 'ProductController@getOne');
        Route::post('/product', 'ProductController@postAddOne');
        Route::put('/product', 'ProductController@putUpdateOne');
        Route::patch('/product', 'ProductController@patchDeactiveOne');
        Route::delete('/product/{id}', 'ProductController@deleteDeleteOne');
    });

    Route::group(['middleware' => 'collection'], function () {
        Route::get('/collection', 'CollectionController@getAll');
        Route::get('/collection/{id}', 'CollectionController@getOne');
        Route::post('/collection', 'CollectionController@postAddOne');
        Route::put('/collection', 'CollectionController@putUpdateOne');
        Route::patch('/collection', 'CollectionController@patchDeactiveOne');
        Route::delete('/collection/{id}', 'CollectionController@deleteDeleteOne');
    });
    
    Route::group(['middleware' => 'device'], function () {
        Route::get('/device', 'DeviceController@getAll');
        Route::get('/device/{id}', 'DeviceController@getOne');
        Route::post('/device', 'DeviceController@postAddOne');
        Route::put('/device', 'DeviceController@putUpdateOne');
        Route::patch('/device', 'DeviceController@patchDeactiveOne');
        Route::delete('/device/{id}', 'DeviceController@deleteDeleteOne');
    });
});


