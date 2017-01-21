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
});


