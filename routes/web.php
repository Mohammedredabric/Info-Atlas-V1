<?php

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



Route::group(['namespace' => 'frontend'], function(){
 Route::get('/' , 'HomeController@index');
});

Auth::routes(['verify' => true]);
Route::group(['middleware' => ['verified'], 'prefix' => 'admin'],function () {

    Route::Resource('category', 'CategoryController');

    Route::Resource('amenities', 'AmenitiesController');

    Route::Resource('city', 'CityController');

    Route::Resource('listing', 'ListingController');

    Route::Resource('post', 'PostController');

    Route::get('/claimed', 'ListingController@claimed');

    Route::post('/claimed/{id}', 'ListingController@active')->name("active.claimed");

    Route::Resource('quality', 'ReviewQualityController');

    Route::Resource('mailbox', 'MailBoxController');

    Route::Resource('user', 'UserController');

    Route::get('/settings/back','SettingsController@getbacksettings')->name('backsettings');

    Route::post('/settings/back','SettingsController@setbacksettings')->name('backsettings');

    Route::get('/settings/front','SettingsController@getfrontsettings')->name('frontsettings');

    Route::post('/settings/front','SettingsController@setfrontsettings')->name('frontsettings');

});

Route::get('/home', 'HomeController@index')
    ->name('home')
    ->middleware(['verified']);
