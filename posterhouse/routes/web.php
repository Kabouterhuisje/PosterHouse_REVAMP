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

Route::get('/cms', array('as' => 'cms_home', function () {
    return view('cms.cms_home');
}));

Route::post('send_message', array('as' => 'send_message', 'uses' => 'MessageController@sendMessage'));

Route::get('/cms/producten', array('as' => 'cms_products', function () {
    return view('cms.cms_products');
}));

Route::get('cms/nieuw_product', array('as' => 'newProduct', function () {
    return view('cms.cms_new_product');
}));

Route::get('cms/wijzig_product/{productNummer}', array('as' => 'editProduct', function ($productNummer) {
    $data = array(
        'id' => $productNummer
    );
    return view('cms.cms_edit_product', $data);
}));

Route::post('cms/wijzigProduct', array('as' => 'wijzigProduct', 'uses' => 'ProductController@editProduct'));
Route::post('cms/nieuwProduct', array('as' => 'nieuwProduct', 'uses' => 'ProductController@newProduct'));
Route::get('cms/verwijderProduct/{id}', ['uses' => 'ProductController@removeProduct']);

Route::get('/cms/categories', array('as' => 'cms_categories', function () {
    return view('cms.cms_categories');
}));

Route::get('cms/nieuw_category', array('as' => 'newCategory', function () {
    return view('cms.cms_new_category');
}));

Route::get('cms/wijzig_category/{categoryNummer}', array('as' => 'editCategory', function ($categoryNummer) {
    $data = array(
        'id' => $categoryNummer
    );
    return view('cms.cms_edit_category', $data);
}));

Route::post('cms/wijzigCategory', array('as' => 'wijzigCategory', 'uses' => 'CategoryController@editCategory'));
Route::post('cms/nieuwCategory', array('as' => 'nieuwCategory', 'uses' => 'CategoryController@newCategory'));
Route::get('cms/verwijderCategory/{id}', ['uses' => 'CategoryController@removeCategory']);

Route::get('/cms/subcategories', array('as' => 'cms_subcategories', function () {
    return view('cms.cms_subcategories');
}));

Route::get('cms/nieuw_subcategory', array('as' => 'newSubcategory', function () {
    return view('cms.cms_new_subcategory');
}));

Route::get('cms/wijzig_subcategory/{subcategoryNummer}', array('as' => 'editSubcategory', function ($subcategoryNummer) {
    $data = array(
        'id' => $subcategoryNummer
    );
    return view('cms.cms_edit_subcategory', $data);
}));

Route::post('cms/wijzigSubcategory', array('as' => 'wijzigSubcategory', 'uses' => 'SubcategoryController@editSubcategory'));
Route::post('cms/nieuwSubcategory', array('as' => 'nieuwSubcategory', 'uses' => 'SubcategoryController@newSubcategory'));
Route::get('cms/verwijderSubcategory/{id}', ['uses' => 'SubcategoryController@removeSubcategory']);

Route::get('/cms/orders', array('as' => 'cms_orders', function () {
    return view('cms.cms_orders');
}));

Route::get('cms/verwijderOrder/{id}', ['uses' => 'OrderController@removeOrder']);

