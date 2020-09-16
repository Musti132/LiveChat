<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('users', 'ChatController@showUsers')->name('apiUsers');
Route::post('post', 'ChatController@post')->name('testing');
Route::post('sendMessage', 'ChatController@sendMessage')->name('sendChatMessage');
Route::post('login', 'AuthController@login')->name('api_login');