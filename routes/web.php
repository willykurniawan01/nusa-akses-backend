<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {


    //route post
    Route::prefix('post')->group(function () {
        Route::get('', 'PostController@index')->name('post.index');
        Route::get('create', 'PostController@create')->name('post.create');
        Route::post('store', 'PostController@store')->name('post.store');
        Route::get('edit/{id}', 'PostController@edit')->name('post.edit');
        Route::put('update/{id}', 'PostController@update')->name('post.update');
        Route::delete('destroy', 'PostController@destroy')->name('post.destroy');

        //ajax get route
        Route::prefix('get')->group(function () {
            Route::get('get-all-post', 'PostController@getAllPost')->name('post.get.get-all-post');
        });
    });
});
