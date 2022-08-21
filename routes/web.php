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

Auth::routes();


Route::prefix('admin')->namespace("Admin")->middleware('auth')->group(function () {
    Route::get("/dashboard", "DashboardController@index")->name("dashboard.index");

    //route post
    Route::prefix('post')->group(function () {
        Route::get('', 'PostController@index')->name('post.index');
        Route::get('create', 'PostController@create')->name('post.create');
        Route::post('store', 'PostController@store')->name('post.store');
        Route::get('show/{id}', 'PostController@show')->name('post.show');
        Route::put('update/{id}', 'PostController@update')->name('post.update');
        Route::delete('destroy', 'PostController@destroy')->name('post.destroy');

        //ajax get route
        Route::prefix('get')->group(function () {
            Route::get('get-all-post', 'PostController@getAllPostForDatatable')->name('post.get.get-all-post');
            Route::get('get-post-category', 'PostCategoryController@getPostCategory')->name('post.get.get-post-category');
        });
    });

    Route::prefix('settings')->group(function () {
        Route::prefix('theme')->group(function () {
            Route::get("", "ThemeSettingController@index")->name("setting.theme.index");
            Route::post("save", "ThemeSettingController@save")->name("setting.theme.save");
        });
    });

    Route::prefix('pages')->group(function () {
        Route::get('', 'PageController@index')->name('pages.index');
        Route::get('create', 'PageController@create')->name('pages.create');
        Route::post('store', 'PageController@store')->name('pages.store');
        Route::get('edit/{page}', 'PageController@edit')->name('pages.edit');
        Route::delete('destroy/{page}', 'PageController@destroy')->name('pages.destroy');
    });


    Route::prefix('report')->group(function () {
        Route::get('', 'ReportController@index')->name('report.index');
    });
});
