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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/try',function(){
    return \Webpatser\Uuid\Uuid::generate();
});



Auth::routes();
Route::get('/redirect/{provider}', 'SocialAuthController@redirect');

//Route::get('/redirect', 'SocialAuthController@redirect');
//Route::get('/callback', 'SocialAuthController@callback');
Route::get('/callback/{provider}', 'SocialAuthController@callback');

Route::any('/', 'HomeController@index');

Route::get('/search-query', 'HomeController@getSearchQuery');

Route::get('/quick-view-product/{id}','HomeController@getQuickView');



Route::get('/profile','HomeController@getProfile');

Route::get('/feeds','HomeController@getFeeds');

Route::get('/follow-user/{id}','HomeController@getFollowUser');

Route::get('/fetch-feeds','HomeController@getFetchFeeds');

Route::get('/category/{name}', 'HomeController@getCategory');

Route::get('/sub-category/{name}', 'HomeController@getSubCategory');

Route::post('/fancy-it/{product_id}','HomeController@postFancyIt');

Route::post('/like-it/{product_id}','HomeController@postLikeIt');

Route::post('/watch-shop/{product_id}/{store_id}/{user_id}','HomeController@postWatchShop');




//Route::get('/category', 'HomeController@getCategory');

Route::post('/register-user','HomeController@postRegisterUser');

Route::group(['domain' => '{slug}.shopaholicks.com'], function () {
    Route::get('/', function ($slug) {
        return $store = \App\Store::whereSlug($slug)->first();
//        redirect("stores/$slug/$store->user_id");
    });
});

Route::group(['prefix' => 'stores'], function () {

    Route::get('/{slug}/{user_id}','StoreController@getStore');

    Route::get('/category/{slug}/{user_id}/{category_id}','StoreController@getStoreCategory');

    Route::get('/sub-category/{slug}/{user_id}/{category_id}','StoreController@getStoreSubCategory');

});

Route::group(['prefix' => 'store'], function () {

    Route::get('/dashboard','StoreController@getDashboard');

    Route::get('/cart-contents','StoreController@getCartContents');
    Route::get('/cart-destroy','StoreController@getCartDestroy');
    Route::get('/checkout/{id}','StoreController@getCheckOut');
    Route::post('/check-out/{id}','StoreController@postCheckOut');
    Route::get('/cart-view/{user_id}','StoreController@getCartView');

    Route::get('/orders','StoreController@getOrders');
    Route::get('/order-items/{order_id}','StoreController@getOrderItems');

    Route::get('/marketplace-signup','StoreController@getMarketPlaceSignUp');

    Route::get('/marketplace-packages/{package_id}','StoreController@getMarketPlacePackages');



    Route::get('/','StoreController@getIndex');


    Route::get('/add-product','StoreController@getAddProduct');

    Route::get('/edit-product/{product_id}','StoreController@getEditProduct');

    Route::post('/update-product/{product_id}','StoreController@postUpdateProduct');

    Route::post('/delete-product/{product_id}','StoreController@postDeleteProduct');

    Route::get('/quick-add-products','StoreController@getQuickAddProducts');

    Route::post('/quick-add-products','StoreController@postQuickAddProducts');

    Route::get('/quick-add-product-partial/{count}','StoreController@getQuickAddProductPartial');

    Route::post('/add-product','StoreController@postAddProduct');

    Route::get('/sub-categories-partial/{category_id}','StoreController@getSubCategoriesPartial');

    Route::get('/all-products','StoreController@getAllProducts');

    Route::get('/{user_id}/add-store','StoreController@getAddStore');

    Route::get('/{user_id}/edit-store','StoreController@getEditStore');

    Route::post('/update-store','StoreController@postUpdateStore');

    Route::post('/add-store','StoreController@postAddStore');

    Route::get('/store-settings','StoreController@getStoreSettings');

    Route::post('/store-settings','StoreController@postStoreSettings');

    Route::post('/add-store-banner','StoreController@postAddStoreBanner');

    Route::get('/{slug}/single-product','StoreController@getSingleProduct');

    Route::post('/add-to-cart/{id}/{name}/{qty}/{price}/{user_id}','StoreController@postAddToCart');

    Route::post('/update-cart/{rowId}/{qty}','StoreController@postUpdateCart');

    Route::post('/remove-from-cart/{id}/{user_id}','StoreController@postRemoveFromCart');

    Route::post('/checkout-remove-from-cart/{id}','StoreController@postCheckOutRemoveFromCart');


});


Route::get('/image',function(){
    $image = new Intervention\Image\Image();
    $image->make(\Illuminate\Support\Facades\Input::file('photo'))->resize(300, 200)->save('foo.jpg');
});

Route::get('/resizeImage', 'ImageController@resizeImage');
Route::post('/resizeImagePost',['as'=>'resizeImagePost','uses'=>'ImageController@resizeImagePost']);

Auth::routes();

Route::get('logout',function(){
    Auth::logout();
    return redirect()->back();
});

Route::get('/home', 'HomeController@index');


