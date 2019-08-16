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


// For
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
    Route::get('market/showroom/category/{id}', 'market\MarketPagesController@categoryAdsOnly');
    Route::get('market/showroom/subcategory/{id}', 'market\MarketPagesController@subcategoryAdsOnly');
});




Route::group(['administrator' => 'administrator'], function(){
    // For the AOB controller
    Route::post('administrator/services/edit/{id}','admin\AOBcontroller@update')->name('serviceUpdate');
    Route::post('administrator/services/img/{id}','admin\AOBcontroller@updateServiceImg')->name('updateServiceImg');
    // for the services routes
    Route::get('administrator/services', 'admin\AOBcontroller@index');
    Route::get('administrator/services/create', 'admin\AOBcontroller@create');
    Route::post('administrator/services', 'admin\AOBcontroller@store');
    Route::get('administrator/services/edit/{id}', 'admin\AOBcontroller@edit');
    // Performing actions with Ajax here
    Route::get('/categsSubcategs','admin\ProductsController@loadsubcategs');
    Route::get('/removeTag','admin\TagsController@destroy');
    Route::get('/removeService','admin\servicesController@destroy');
    Route::get('/removeRole','admin\RolesController@destroy');
    // for the administartor routes
    Route::get('administrator/dashboard','AdminPagesController@dashboard');
    Route::get('administrator/checkpoint','AdminPagesController@login');
    Route::resource('administrator/posts','PostsController');
    Route::resource('administrator/products','admin\ProductsController');
    Route::resource('administrator/categories','admin\CategoriesController');
    Route::resource('administrator/subcateg','admin\subCategsController');
    Route::resource('administrator/about','admin\AboutController');

    Route::get('/administrator','AdminPagesController@index');
    Route::resource('administrator/tags','admin\TagsController');
    Route::resource('administrator/configurations','admin\SettingsController');
   
    // for the UserRoles routes resource
    Route::resource('administrator/UserRoles','admin\RolesController');
});