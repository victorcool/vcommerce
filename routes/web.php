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
    Route::get('/introduction', 'pagesController@introduction');
    Route::get('/history', 'pagesController@history')->name('history-strategy');
    Route::get('/services', 'PagesController@services');
    Route::get('/products', 'PagesController@products');
    Route::get('/contact', 'PagesController@contact');
});


// for the market routes

Route::group(['market' => 'market'], function(){
    Route::get('/market','market\MarketPagesController@index')->name('market.index');
    Route::get('market/showroom/category/{id}', 'market\MarketPagesController@categoryAdsOnly')->name('market.show');
    Route::get('market/showroom/subcategory/{id}', 'market\MarketPagesController@subcategoryAdsOnly')->name('market.subcategory');
    Route::get('market/state/{state}', 'market\MarketPagesController@stateAds')->name('market.states');
});

Route::delete('market/saveForLater/{product}', 'CartController@destroyWishlist')->name('cart.destroyWishlist');
Route::get('market/saveForLater/empty', 'CartController@empty')->name('cart.empty');
Route::post('market/saveForLater/moveToCart/{product}', 'CartController@moveToCart')->name('cart.moveToCart');

Route::get('market/cart', 'CartController@index')->name('cart.index');
Route::post('market/cart', 'CartController@store')->name('cart.store');
Route::get('/updateCartQty/{product}', 'CartController@update')->name('cart.update');
Route::delete('market/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::get('market/cart/empty', 'CartController@empty')->name('cart.empty');
Route::post('market/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

Route::get('market/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('market/checkout', 'CheckoutController@store')->name('checkout.store');


Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay'); 
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::get('market/cart/payment', 'PaymentController@index')->name('payment.index');




Route::group(['administrator' => 'administrator'], function(){
    // For the AOB controller
    Route::post('administrator/services/edit/{id}','admin\AOBcontroller@update')->name('serviceUpdate');
    Route::post('administrator/services/img/{id}','admin\AOBcontroller@updateServiceImg')->name('updateServiceImg');
    Route::post('administrator/product/img/{id}','admin\AOBcontroller@updateProductImg')->name('updateProductImg');
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
    Route::get('/removeUtility','admin\AboutController@destroy');
    Route::get('/removeProduct','admin\ProductsController@destroy');
    // for the administartor routes
    Route::get('administrator/dashboard','AdminController@dashboard');
    // for the users
    Route::post('storeUser','admin\UsersController@store')->name('storeUser');
    Route::resource('/users','admin\UsersController');
    Route::get('administrator/members','AdminController@members');
    Route::get('administrator/newMember','AdminController@newMember');
    Route::resource('administrator/posts','PostsController');
    Route::post('administrator/products/edit/{id}','admin\ProductsController@update')->name('productUpdate');
    Route::resource('administrator/products','admin\ProductsController');
    Route::resource('administrator/categories','admin\CategoriesController');
    Route::resource('administrator/subcateg','admin\subCategsController');
    Route::post('administrator/utility/edit/{id}','admin\AboutController@update')->name('utilityUpdate');
    Route::post('administrator/utility/image/{id}','admin\AboutController@imageUpdate')->name('utility.image.update');
    Route::resource('administrator/utility','admin\AboutController');

    
   
    // for the UserRoles routes resource   
    Route::get('administrator/checkpoint','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::get('/administrator', 'AdminController@index')->name('admin.dashboard');
    Route::post('administrator/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('administrator/logout','Auth\AdminLoginController@logout')->name('admin.logout');

    Route::resource('administrator/UserRoles','admin\RolesController');
    Route::resource('administrator/tags','admin\TagsController');
    Route::resource('administrator/configurations','admin\SettingsController');
    Route::resource('administrator/team','admin\TeamController');

  
});

Auth::routes();

// all the routes relating when a user logs in

    Route::get('/myaccount', 'HomeController@index')->name('myaccount');
    Route::get('/myaccount/profile', 'HomeController@profile')->name('profile');
    Route::get('/myaccount/logout', 'Auth\LoginController@userLogout')->name('user.logout');
