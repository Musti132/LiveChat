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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('search', 'WebApi\\SearchController@index');

/**
 * Authentication routes
 */
Route::group([
    'prefix' => 'web/auth',
    'namespace' => 'WebApi\\',
    'as' => 'auth.',
], function(){;

    Route::post('login', 'AuthController@login')->name('login');
    Route::post('register', 'AuthController@register')->name('register');

    Route::middleware('auth:api')->group(function(){
        Route::get('user', 'AuthController@user')->name('user');
        Route::get('refresh', 'AuthController@refresh')->name('refresh');
        Route::post('logout', 'AuthController@logout')->name('logout');
    });
});

/**
 * Authenticated user routes
 */
Route::group([
    'prefix' => 'web',
    'namespace' => 'WebApi\\',
    'middleware' => 'auth:api',
], function(){;

    /**
     * Friends routes
     */
    Route::group(['as' => 'friends'], function(){
        Route::get('friends', 'FriendController@index');
        Route::get('friends/requests', 'FriendController@getFriendRequest');
        Route::delete('friends/decline', 'FriendController@decline');
        Route::post('friends/accept', 'FriendController@accept');
        Route::post('friends/add', 'FriendController@add');
    });

    /**
     * Search routes
     */
    Route::group(['as' => 'search'], function(){
        Route::get('search', 'SearchController@search');
    });

    /**
     * Dashboard routes
     */
    Route::group(['as' => 'dashboard'], function(){
        Route::get('details', 'HomeController@details');
    });

    /**
     * Profile routes
     */
    Route::group(['as' => 'profile'], function(){
        Route::get('profile', 'ProfileController@get');
        Route::get('profile/{id}', 'ProfileController@show');
    });

    /**
     * Channel routes
     */
    Route::group(['as' => 'chat'], function(){
        Route::get('channel/{id}/details', 'ChannelController@details');
        Route::post('channel/{id}/message', 'ChannelController@sendMessage');
    });
    
});

/*
Route::get('users', 'ChatController@showUsers')->name('apiUsers');
Route::post('post', 'ChatController@post')->name('testing');
Route::post('sendMessage', 'ChatController@sendMessage')->name('sendChatMessage');
Route::post('login', 'AuthController@login')->name('api_login');
Route::get('logout', 'AuthController@logout')->name('api_logout');*/
