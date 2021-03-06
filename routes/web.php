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
//}

Route::get('/sms',function(){
//    $sms = new \App\KodeSms();
//    var_dump( $sms->SendSms("Hello Ghana",'233577690501'));
    return \App\Store::inRandomOrder()->get();

});


$menu = new \Lavary\Menu\Menu();
$menu->make('MyNavBar', function($menu){
    $menu->add('Home',array('url'=>'https://www.shopaholicks.com'));
    $menu->add('All Shops',array('url'=>'https://www.shopaholicks.com/all-shops'));
    if(\App\ProductCategory::first()){
        foreach(\App\ProductCategory::whereEnable(true)->get(['id','name']) as $category){
            $menu->add($category->name,array('url' => "https://www.shopaholicks.com/category/$category->id"));
        }
    }

    $menu->add('Blog',array('url'=>''));
});

$menu = new \Lavary\Menu\Menu();
$menu->make('AdminNav', function($menu){
    if(\Illuminate\Support\Facades\Auth::check()  && \Illuminate\Support\Facades\Auth::user()->has_store){

        if(\Illuminate\Support\Facades\Auth::user()->admin){
            $menu->add('Admin Dashboard',array('url'=>'/admin/dashboard'));
        }

        $menu->add('Dashboard',array('url'=>'/store/dashboard'));
        $menu->add('Orders',array('url'=>'/store/orders'));
        $menu->add('Products',array('url'=>'/store/add-product'));

        $menu->add('MarketPlace',array('url'=>'/store/marketplace-signup'));
        $menu->add('Settings',array('url'=>'/store/store-settings'));
        if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->has_store){
            $id = \Illuminate\Support\Facades\Auth::id();
            $store = \App\Store::whereUserId($id)->first();
            $menu->add('My Shop',array('url'=>"stores/$store->slug/$id"));
        }

    }elseif(\Illuminate\Support\Facades\Auth::check() &&!\Illuminate\Support\Facades\Auth::user()->has_store ) {
        $menu->add('Back Home ',array('url'=>''));
    }


});


Route::get('/try',function(){
    return \Webpatser\Uuid\Uuid::generate();
});

Route::group(['prefix' => 'admin'], function () {


    Route::get('/payments-data', 'AdminController@getPaymentsData');

    Route::get('/dashboard', 'AdminController@getDashboard');

    Route::get('/users','AdminController@getUsers');

    Route::get('/orders','AdminController@getAllOrders');

    Route::get('/order-items/{order_id}','AdminController@getOrderItems');

    Route::get('/packages','AdminController@getPackages');

    Route::post('/add-new-package','AdminController@postAddNewPackage');

    Route::get('/product-categories','AdminController@getProductCategories');

    Route::post('/add-new-category','AdminController@postAddNewProductCategory');

    Route::post('/update-category','AdminController@postUpdateCategory');

    Route::post('add-new-subcategory','AdminController@postAddSubCategories');

    Route::post('/confirm-token/{token}','AdminController@postConfirmToken');

});

Route::post('/direct-pay/{amount}','StoreController@postMpowerDirectPay');





Auth::routes();
Route::get('/redirect/{provider}', 'SocialAuthController@redirect');

//Route::get('/redirect', 'SocialAuthController@redirect');
//Route::get('/callback', 'SocialAuthController@callback');
Route::get('/callback/{provider}', 'SocialAuthController@callback');

Route::any('/', 'HomeController@index');

Route::any('/all-shops', 'HomeController@getAllShops');

Route::get('/search-query', 'HomeController@getSearchQuery');

Route::get('/quick-view-product/{id}','HomeController@getQuickView');

Route::get('/profile','HomeController@getProfile');

Route::get('/search-market','HomeController@getSearchMarket');

//   return view('all_feeds');
//});


Route::get('/follow-user/{id}','HomeController@getFollowUser');

Route::get('/fetch-feeds','HomeController@getFetchFeeds');

Route::get('/category/{name}', 'HomeController@getCategory');

Route::get('/sub-category/{name}', 'HomeController@getSubCategory');

Route::post('/fancy-it/{product_id}','HomeController@postFancyIt');

Route::post('/like-it/{product_id}','HomeController@postLikeIt');

Route::post('/watch-shop/{product_id}/{store_id}/{user_id}','HomeController@postWatchShop');

Route::get('form',function(){
    return view('auth.login_2');
});




//Route::get('/category', 'HomeController@getCategory');

Route::post('/register-user','HomeController@postRegisterUser');

Route::get('/sms-validation','HomeController@getSmsValidation');

Route::group(['domain' => '{slug}.shopaholicks.com'], function () {
//    if (\Illuminate\Support\Facades\Auth::check()){
        Route::get("shop", function ($slug) {
            $store = \App\Store::whereSlug($slug)->first();

            return redirect("stores/$slug/$store->user_id");
        });
//    }else {

//    }
});

Route::group(['prefix' => 'stores'], function () {

    Route::get('/{slug}/{user_id}','StoreController@getStore');

    Route::get('/category/{slug}/{user_id}/{category_id}','StoreController@getStoreCategory');

    Route::get('/sub-category/{slug}/{user_id}/{category_id}','StoreController@getStoreSubCategory');

});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/feeds','HomeController@getFeeds');
    Route::get('/all-feeds','HomeController@getAllFeeds');

    Route::post('/add-to-timeline','HomeController@postAddToTimeline');

    Route::post('/add-feed-reaction','HomeController@postAddFeedReaction');

    Route::post('/like-feed-reaction/{id}','HomeController@postLikeFeedReaction');

    Route::post('save-profile','HomeController@postSaveProfile');
    Route::post('change-password','HomeController@postChangePassword');

    Route::post('/add-new-shop','HomeController@postAddNewShop');

    Route::get('/check-name','HomeController@getCheckName');

    Route::get('/fancies','HomeController@getFancies');
    Route::get('send-sms/{recipient}/{message}/{alias}','StoreController@sendSms');

});

Route::get('/privacy-policy','HomeController@getPrivacyPolicy');
Route::get('/terms-of-use','HomeController@getTermsOfUse');
Route::get('/our-team','HomeController@getOurTeam');

Route::group(['middleware' => 'auth','prefix'=>'store'], function () {
    Route::get('/dashboard','StoreController@getDashboard');
    Route::get('/orders','StoreController@getOrders');
    Route::get('/order-items/{order_id}','StoreController@getOrderItems');

    Route::get('/marketplace-signup','StoreController@getMarketPlaceSignUp');

    Route::get('/marketplace-packages/{package_id}','StoreController@getMarketPlacePackages');

    Route::get('/add-product','StoreController@getAddProduct');

    Route::get('/edit-product/{product_id}','StoreController@getEditProduct');

    Route::post('/update-product/{product_id}','StoreController@postUpdateProduct');

    Route::post('/product-update-published','StoreController@postProductUpdatePublished');

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

    Route::get('/packages','StoreController@getPackages');

});

Route::group(['prefix' => 'store'], function () {


    Route::get('/cart-contents','StoreController@getCartContents');
    Route::get('/cart-destroy','StoreController@getCartDestroy');
    Route::get('/checkout/{id}','StoreController@getCheckOut');
    Route::post('/check-out/{id}','StoreController@postCheckOut');
    Route::get('/cart-view/{user_id}','StoreController@getCartView');



    Route::get('/','StoreController@getIndex');




    Route::post('/add-to-cart/{id}/{name}/{qty}/{price}/{user_id}','StoreController@postAddToCart');

    Route::post('/update-cart/{rowId}/{qty}/{user_id}','StoreController@postUpdateCart');

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

Route::post('/register-new-user','HomeController@postRegisterNewUser');
Route::get('/home', 'HomeController@index');


