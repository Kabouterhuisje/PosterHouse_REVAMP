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

Route::get('/orderoverview', array('as' => 'orderoverview', function () {
    return view('orderoverview');
}));

Route::get('/winkelmandje', array('as' => 'winkelmandje','uses' => 'ShoppingcartController@viewCart'));

Route::post('/addToCart', array('as' => 'addToCart','uses' => 'ShoppingcartController@addToCart'));

Route::post('/winkelmandje', array('as' => 'continuePurchase','uses' => 'ShoppingcartController@continuePurchase'));

Route::get('/winkelmandje/{key}', array('as' => 'flushItem','uses' => 'ShoppingcartController@flushItem'));

Route::get('/orderoverview', array('as' => 'orderOverview','uses' => 'OrderController@orderOverview'));

Route::post('/', array('as' => 'insertOrder','uses' => 'OrderController@insertOrder'));

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/producten', 'ProductController@index')->name('producten');

Route::get('/productdetails/{product}', 'ProductDetailsController@index')->name('productdetails');

Route::get('/cms', ['as' => 'cms_home', 'uses' => 'HomeController@createCMS']);

Route::post('send_message', array('as' => 'send_message', 'uses' => 'MessageController@sendMessage'));

Route::get('/cms/producten', ['as' => 'cms_products', 'uses' => 'ProductController@create']);

Route::get('/cms/nieuw_product', ['as' => 'newProduct', 'uses' => 'ProductController@createNewProduct']);

Route::get('cms/wijzig_product/{productNummer}', ['as' => 'editProduct', 'uses' => 'ProductController@editView']);

Route::post('cms/wijzigProduct', array('as' => 'wijzigProduct', 'uses' => 'ProductController@editProduct'));
Route::post('cms/nieuwProduct', array('as' => 'nieuwProduct', 'uses' => 'ProductController@newProduct'));
Route::get('cms/verwijderProduct/{id}', ['uses' => 'ProductController@removeProduct']);

Route::get('/cms/categories', ['as' => 'cms_categories', 'uses' => 'CategoryController@create']);

Route::get('/cms/nieuw_category', ['as' => 'newCategory', 'uses' => 'CategoryController@createNewCategory']);

Route::get('cms/wijzig_category/{categoryNummer}', ['as' => 'editCategory', 'uses' => 'CategoryController@editView']);

Route::post('cms/wijzigCategory', array('as' => 'wijzigCategory', 'uses' => 'CategoryController@editCategory'));
Route::post('cms/nieuwCategory', array('as' => 'nieuwCategory', 'uses' => 'CategoryController@newCategory'));
Route::get('cms/verwijderCategory/{id}', ['uses' => 'CategoryController@removeCategory']);

Route::get('/cms/subcategories', ['as' => 'cms_subcategories', 'uses' => 'SubcategoryController@create']);

Route::get('/cms/nieuw_subcategory', ['as' => 'newSubcategory', 'uses' => 'SubcategoryController@createNewSubcategory']);

Route::get('cms/wijzig_subcategory/{subcategoryNummer}', ['as' => 'editSubcategory', 'uses' => 'SubcategoryController@editView']);

Route::post('cms/wijzigSubcategory', array('as' => 'wijzigSubcategory', 'uses' => 'SubcategoryController@editSubcategory'));
Route::post('cms/nieuwSubcategory', array('as' => 'nieuwSubcategory', 'uses' => 'SubcategoryController@newSubcategory'));
Route::get('cms/verwijderSubcategory/{id}', ['uses' => 'SubcategoryController@removeSubcategory']);

Route::get('/cms/orders', ['as' => 'cms_orders', 'uses' => 'OrderController@create']);

Route::get('cms/verwijderOrder/{id}', ['uses' => 'OrderController@removeOrder']);

Route::get('403', ["as" => "403", function()
{
    return view('errors/403');
}]);

Route::get('422', ["as" => "422", function()
{
    return view('errors/422');
}]);

