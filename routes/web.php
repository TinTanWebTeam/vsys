<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Route::group(['middleware' => []],function(){
    
    // Route::any('{slug}', function () {
    //     return "Hello World Xinh";
    // })->where('slug', '([A-z\d-\/_.]+)?');

    Route::get('/{any}', function ($any) {
        return File::get(public_path() . '/home/index.html');
    })->where('any', '.*');
});

