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


Route::prefix('admin')->middleware('auth')->group(function () {

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


    Route::prefix('services')->group(function () {
        Route::get('', 'ServicesController@index')->name('services.index');
        Route::get('/create', 'ServicesController@create')->name('services.create');
        Route::post('/store', 'ServicesController@store')->name('services.store');
        Route::get('show/{id}', 'ServicesController@show')->name('services.show');
        Route::put('update/{id}', 'ServicesController@update')->name('services.update');
        Route::delete('destroy', 'ServicesController@destroy')->name('services.destroy');

        //ajax get route
        Route::prefix('get')->group(function () {
            Route::get('get-all-services', 'ServicesController@getAllservicesForDatatable')->name('services.get.get-all-services');
        });
    });


    Route::prefix('sliders')->group(function () {
        Route::get('', 'SlidersController@index')->name('sliders.index');
        Route::get('/create', 'SlidersController@create')->name('sliders.create');
        Route::post('/store', 'SlidersController@store')->name('sliders.store');
        Route::get('show/{id}', 'SlidersController@show')->name('sliders.show');
        Route::put('update/{id}', 'SlidersController@update')->name('sliders.update');
        Route::delete('destroy', 'SlidersController@destroy')->name('sliders.destroy');

        //ajax get route
        Route::prefix('get')->group(function () {
            Route::get('get-all-sliders', 'SlidersController@getAllsliders')->name('sliders.get.get-all-sliders');
        });
    });

    Route::prefix('settings')->group(function () {
        Route::prefix('theme')->group(function () {
            Route::get("", "ThemeSettingController@index")->name("setting.theme.index");
        });

        // Route::get('', 'SettingController@index')->name('settings.index');
        // Route::get('pengaturan-perusahaan', 'SettingController@companySetting')->name('settings.company-setting');
        // Route::post('save-setting', 'SettingController@saveSetting')->name('settings.save-setting');

        // Route::prefix('account')->group(function () {
        //     Route::get('change_password/', 'SettingController@changePassword')->name('settings.account_setting.change_password');
        // });
    });

    Route::prefix('pages')->group(function () {
        Route::get('', 'PagesController@index')->name('pages.index');
        Route::get('create', 'PagesController@create')->name('pages.create');
        Route::post('store', 'PagesController@store')->name('pages.store');
        Route::get('edit/{page}', 'PagesController@edit')->name('pages.edit');
        Route::delete('destroy/{page}', 'PagesController@destroy')->name('pages.destroy');
    });
});
