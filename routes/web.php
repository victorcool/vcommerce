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
Route::group(['mainSite' => 'mainSite'], function(){
    Route::get('/','PagesController@index');
    Route::get('/about', 'pagesController@about');
    Route::get('/services', 'PagesController@services');
    Route::get('/products', 'PagesController@products');
    Route::get('/contact', 'PagesController@contact');
});


// for the market routes

Route::group(['market' => 'market'], function(){
    Route::get('/market','market\MarketPagesController@index');
    Route::get('market/showroom/{id}', 'market\MarketPagesController@showroom');
});

// for the administartor routes
Route::get('administrator/dashboard','AdminPagesController@dashboard');
Route::get('administrator/checkpoint','AdminPagesController@login');
Route::resource('administrator/posts','PostsController');
Route::resource('administrator/products','admin\ProductsController');
Route::resource('administrator/categories','admin\CategoriesController');
Route::resource('administrator/subcateg','admin\subCategsController');

// Performing actions with Ajax here
Route::get('/categsSubcategs','admin\ProductsController@loadsubcategs');
Route::get('/removeTag','admin\TagsController@destroy');


Route::group(['administrator' => 'administrator'], function(){
    Route::get('/administrator','AdminPagesController@index');
    Route::resource('administrator/tags','admin\TagsController');
// Route::resource('administrator/products','admin\AjaxController');

    //Route::get('administrator/posts/create', 'PostsController@create');
    //Route::post('administrator/posts/create', 'PostsController@store');
});