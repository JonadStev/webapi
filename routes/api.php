<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');
Route::post('refresh','App\Http\Controllers\UserController@refresh');

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::get('user','App\Http\Controllers\UserController@getAuthenticatedUser');
    Route::post('logout','App\Http\Controllers\UserController@logout');
    Route::put('update','App\Http\Controllers\UserController@updateUser');
    Route::get('getUsers','App\Http\Controllers\UserController@getUsers');
    Route::delete('deleteUser/{id}','App\Http\Controllers\UserController@deleteUser');
    
});
