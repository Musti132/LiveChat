<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

/*
Auth::routes();
*/
Route::get('/', 'HomeController@index')->name('home');

Route::post('broadcast', function (Request $request){ 
    $pusher = new Pusher\Pusher(env('PUSHER_APP_KEY'),env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'));
    return $pusher->socket_auth($request->channel_name, $request->socket_id);
}); 

Route::get('notify', "HomeController@notify");

Route::get('/{any?}', function (){
    return view('welcome');
})->where('any', '^(?!api\/)[\/\w\.-]*');