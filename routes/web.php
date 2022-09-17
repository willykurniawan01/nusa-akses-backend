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

    Route::prefix('page')->group(function () {
        Route::get('', 'PageController@index')->name('page.index');
        Route::get('home', 'PageController@home')->name('page.home');
        Route::get('create', 'PageController@create')->name('page.create');
        Route::post('store', 'PageController@store')->name('page.store');
        Route::get('edit/{page}', 'PageController@edit')->name('page.edit');
        Route::post('update/{page}', 'PageController@update')->name('page.update');
        Route::delete('destroy/{page}', 'PageController@destroy')->name('page.destroy');
    });

    Route::prefix('slider')->group(function () {
        Route::get('', 'SliderController@index')->name('slider.index');
        Route::get('/create', 'SliderController@create')->name('slider.create');
        Route::post('/store', 'SliderController@store')->name('slider.store');
        Route::get('show/{id}', 'SliderController@show')->name('slider.show');
        Route::put('update/{id}', 'SliderController@update')->name('slider.update');
        Route::delete('destroy', 'SliderController@destroy')->name('slider.destroy');

        //ajax get route
        Route::prefix('get')->group(function () {
            Route::get('get-all-slider', 'SliderController@getAllslider')->name('slider.get.get-all-slider');
        });
    });

    Route::prefix('service')->group(function () {
        Route::get('', 'ServiceController@index')->name('service.index');
        Route::get('/create', 'ServiceController@create')->name('service.create');
        Route::post('/store', 'ServiceController@store')->name('service.store');
        Route::get('edit/{id}', 'ServiceController@edit')->name('service.edit');
        Route::put('update/{id}', 'ServiceController@update')->name('service.update');
        Route::delete('destroy', 'ServiceController@destroy')->name('service.destroy');

        //ajax get route
        Route::prefix('get')->group(function () {
            Route::get('get-all-services', 'ServiceController@getAllservicesForDatatable')->name('service.get.get-all-services');
        });
    });



    Route::prefix('chat')->group(function () {
        Route::get('', 'ChatController@index')->name('chat.index');
        Route::get('/chat-room', 'ChatController@getChatRoom')->name('chat.get.chat-room');
        Route::get('/messages', 'ChatController@getMessages')->name('chat.get.messages');
    });

    Route::prefix('report')->group(function () {
        Route::get('', 'ReportController@index')->name('report.index');
    });

    Route::prefix('setting')->group(function () {
        Route::prefix('account')->group(function () {
            Route::get('', 'SettingController@indexAccount')->name('setting.account-setting.index');
            Route::post('{user}/update', 'SettingController@updateAccount')->name('setting.account-setting.update');
        });
    });
});

Route::namespace("Guest")->group(function () {
    Route::get("/", "HomeController@index")->name("guest.home");
    Route::get("/berita", "HomeController@berita")->name("guest.berita");
    Route::get("/page/{id}", "HomeController@page")->name("guest.page");
    Route::get("/perusahaan", "HomeController@perusahaan")->name("guest.perusahaan");
});
