<?php

use App\Http\Controllers\Api\PostController;
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



Route::namespace('Api')->group(function () {
    Route::resource('post', 'PostController');
    Route::resource('sliders', 'ImageSliderController');
    Route::resource('services', 'ServiceController');
    Route::resource('page', 'PageController');

    Route::prefix('chat')->group(function () {
        Route::post("", "ChatController@getChat")->name("api.chat");
        Route::post("login", "ChatController@login")->name("api.chat.login");
        Route::post("send", "ChatController@sendMessage")->name("api.chat.send");
    });

    Route::post("send-report", "ReportController@send");
});
