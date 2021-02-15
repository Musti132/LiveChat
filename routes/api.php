<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebApi\AuthController;
use App\Http\Controllers\WebApi\ChannelController;
use App\Http\Controllers\WebApi\SearchController;
use App\Http\Controllers\WebApi\FriendController;

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
    'as' => 'auth.',
], function(){;

    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');

    Route::middleware('auth:api')->group(function(){
        Route::get('user', [AuthController::class, 'user'])->name('user');
        Route::get('refresh', [AuthController::class, 'refresh'])->name('refresh');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
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
        Route::delete('friends/decline/{id}', 'FriendController@decline');
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
    Route::group(['as' => 'chat.'], function(){
        Route::post('channel/create', 'ChannelController@store')->name('store');
        Route::get('channel/{id}/details', 'ChannelController@details')->name('details');
        Route::post('channel/{id}/message', 'ChannelController@sendMessage')->name('message');
        Route::get('channel/list', [ChannelController::class, 'list'])->name('list');
    });
    
});
