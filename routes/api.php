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

// Route::middleware('auth:sanctum')->get('/user', feunction (Request $request) {
//     return $request->user();
// });

Route::namespace('Api')->group(function () {
    Route::resource('post', 'PostController');
    Route::get('post-search/{keyword?}', 'PostController@search');
    Route::resource('sliders', 'ImageSliderController');
    Route::resource('services', 'ServicesController');
});
