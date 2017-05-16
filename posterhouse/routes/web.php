<?php

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

Route::get('/', array('as' => 'welcome', function () {
    return view('welcome');
}));

Route::get('/contact', array('as' => 'contact', function () {
    return view('contact');
}));

Route::get('/winkelmandje', array('as' => 'winkelmandje', function () {
    return view('winkelmandje');
}));

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/producten', 'ProductController@index')->name('producten');

Route::get('/productdetails/{product}', 'ProductDetailsController@index')->name('productdetails');

Route::get('/cms', array('as' => 'cms_home', function () {
    return view('cms.cms_home');
}));

Route::post('send_message', array('as' => 'send_message', 'uses' => 'MessageController@sendMessage'));