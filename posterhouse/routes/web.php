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

Route::get('/', array('as' => 'home', function () {
    return view('welcome');
}));

Route::get('/producten', array('as' => 'producten', function () {
    return view('producten');
}));

Route::get('/contact', array('as' => 'contact', function () {
    return view('contact');
}));
