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
    Route::get("page", "PageController@index");
    Route::get("");


    Route::prefix('chat')->group(function () {
        Route::get("", "ChatController@getChat")->name("api.chat");
        Route::post("login", "ChatController@login")->name("api.chat.login");
        Route::post("send", "ChatController@sendMessage")->name("api.chat.send");
    });
});
