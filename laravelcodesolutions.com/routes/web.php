<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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


Route::get('/', 'FrontController@index')->name('index');
Route::get('article-list/{slug?}', 'FrontController@viewPostsByCategory')->name('post-list');
Route::get('article/{category}/{slug?}', 'FrontController@singleView')->name('single');
Route::get('search', 'FrontController@search')->name('front.search');
Route::get('faq', 'FrontController@faq')->name('faq');
Route::get('privacy-policy', 'FrontController@privacyPolicy')->name('privacy.policy');
Route::get('term-and-conditions', 'FrontController@termAndConditions')->name('term.and.conditions');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin',  'middleware' =>  ['auth', 'is_admin' ]], function() {
    Route::resource('categories', 'CategoryController');
    Route::resource('post','PostController');
    Route::resource('slider','SliderController');
    Route::resource('site','SiteController');
});



Route::get('/testfail', function() {
    $hashed_random_password = Hash::make('admin#123');
    return $hashed_random_password;
});

Route::get('/clear', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    return 'DONE'; //Return anything
});

Route::get('/logout', 'HomeController@logout')->name('logout');

Auth::routes();