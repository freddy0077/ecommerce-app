<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageReceived;
use App\Events\FeedsEvent;
use App\Events\FollowersEvent;
use App\Events\LikeEvent;
use App\Fancy;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UserRequest;
use App\Jobs\FeedsJob;
use App\Like;
use App\MarketplaceSignup;
use App\Notifications\NewShop;
use App\Notifications\NewSignUp;
use App\Product;
use App\ProductCategory;
use App\ProductGallery;
use App\Store;
use App\StreamFeed;
use App\SubCategory;
use App\User;
use App\WatchedShop;
use Carbon\Carbon;
use GetStream\Stream\Client;
use GetStream\Stream\Feed;
use GetStream\StreamLaravel\Enrich;
use GetStream\StreamLaravel\Facades\FeedManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Lavary\Menu\Menu;
use Webpatser\Uuid\Uuid;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = User::where('has_store',true)->get();
        $allProducts = collect();


        foreach($users as $user){
             $signup = MarketplaceSignup::leftJoin('packages','packages.id','=','marketplace_signups.package_id')->where('user_id',$user->id)->first();
            $number_of_products = $signup ? $signup->number_of_products : 50;
             $products = Product::leftJoin('stores','stores.user_id','=','products.user_id')
                 ->selectRaw('products.*,stores.id as store_id,stores.name as store_name,stores.slug as store_slug,stores.image as store_image,stores.user_id')
                 ->where('products.user_id',$user->id)
                 ->where('stores.enabled',true)
                 ->take($number_of_products)->get();
            $allProducts->push($products);
        }

          $products = $allProducts->collapse()->shuffle(1)->all();
          $second_set = $allProducts->collapse()->shuffle(7)->all();

//        return collect($products)->all();

        $best_deals = $allProducts->collapse()->map(function($item,$key){
            if($item->sale == true){
                return [$key => $item];
            }else {
              return '';
            }

        });

         $best_deals =$best_deals->collapse()->all();

         $featured_stores =  MarketplaceSignup::leftJoin('stores','stores.id','marketplace_signups.store_id')
             ->take(3)
             ->get();

        $categories = ProductCategory::leftJoin('sub_categories','sub_categories.product_category_id','=','product_categories.id')
            ->leftJoin('products','products.sub_category_id','=','sub_categories.id')
            ->distinct()
//            ->orderBy('products.like_counts')
            ->selectRaw('product_categories.*')
            ->take(10)
            ->get();

        $most_viewed_products =  $allProducts->collapse()->sortByDesc('view_counts')->take(10);
        $most_viewed_products = $most_viewed_products->values()->all();

//        if($request->ajax()){
//            return view('market.partials.more_popular_products',compact('second_set','nextpageurl'));
//        }

//        return view('market.index',compact('products','nextpageurl'));
        return view('market.index_3',compact('products','categories','second_set','nextpageurl','best_deals','featured_stores','most_viewed_products'));
    }



    public function getSearchMarket(Request $request){

    }

    public function getPrivacyPolicy(){

        return view('market.privacy_policy');
    }

    public function getTermsOfUse(){
        return view('market.terms_of_use');
    }

    public function getOurTeam(){
        return view('market.our_team');
    }

    public function getAllShops(){
        $shops = Store::whereEnabled(true)->inRandomOrder()->paginate();
//        $second_set = Store::inRandomOrder()->skip(6)->paginate();
        return view('all_shops',compact('shops','second_set'));
    }

    public function getFancies(){
        $user = Auth::user();
        $user_id = Auth::id();
        if($user->has_store){
            $store = Store::whereUserId($user->id)->first();
            $slug = $store->slug;
        }else {
            $store = collect();
            $slug = collect();
        }
        $categories = ProductCategory::all();
        $store = Store::whereUserId($user_id)->first();
        $sub_categories = SubCategory::inRandomOrder()->get();
        $fancies = Fancy::leftJoin('products','products.id','=','fancies.product_id')
            ->leftJoin('stores','stores.id','=','products.store_id')
            ->where('fancies.user_id',$user->id)
            ->selectRaw('products.*,stores.id as store_id,stores.name as store_name')
            ->paginate();

        return view('store.fancies',compact('fancies','store',"user_id",'slug','categories','sub_categories'));
    }

    public function getProfile(){
        return view('profile');
    }

    public function getFeeds(Request $request){

        $builder = DB::table('watched_shops')->leftJoin('users','users.id','=','watched_shops.user_id');

         $user = Auth::user();
        if($user->has_store){
            $store = Store::whereUserId($user->id)->first();
            $feeds = \App\Feed::whereUserId(Auth::id())->orderBy('created_at','desc')->get();
            $followers = $builder->whereStoreId($store->id)->get();
            $following = WatchedShop::leftJoin('stores','stores.id','=','watched_shops.store_id')->where('watched_shops.user_id',$user->id)->get();
//
        }else {
            $feeds = collect();
            $followers = collect();
            $following = collect();
        }

//        $stream = new StreamFeed($user->id);
//        $stream->deleteFeed();
//         $activities = $stream->getActivities()['results'];
//         $following   = $stream->getFollowing()['results'];
//         $followers   = $stream->getFollowers()['results'];


        if($request->ajax()){
            return view('partials.feed_partials',compact('feeds','activities','following','followers'));
        }

        return view('feeds',compact('feeds','following','user','followers'));
    }

    public function getAllFeeds(Request $request){
        $builder = DB::table('watched_shops')->leftJoin('users','users.id','=','watched_shops.user_id');

        $user = Auth::user();
        if($user->has_store){
            $store = Store::whereUserId($user->id)->first();
            $feeds = \App\Feed::whereUserId(Auth::id())->orderBy('created_at','desc')->paginate(7);
            $followers = $builder->whereStoreId($store->id)->get();
            $following = WatchedShop::leftJoin('stores','stores.id','=','watched_shops.store_id')->where('watched_shops.user_id',$user->id)->get();
//
        }else {
            $feeds = collect();
            $followers = collect();
            $following = collect();
        }

//        $stream = new StreamFeed($user->id);
//        $stream->deleteFeed();
//         $activities = $stream->getActivities()['results'];
//         $following   = $stream->getFollowing()['results'];
//         $followers   = $stream->getFollowers()['results'];


        if($request->ajax()){
            return view('partials.all_feed_partials',compact('feeds','activities','following','followers'));
        }

        return view('all_feeds',compact('feeds','following','user','followers'));
    }

    public function postSaveProfile(Request $request){
        $user = Auth::user();
        User::find($user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number
        ]);
    }

    public function postChangePassword(Request $request)
    {
        if (Hash::check($request->password, Auth::user()->getAuthPassword())) {
            // The passwords match...
            $request->user()->fill([
            'password' => Hash::make($request->new_password)
        ])->save();

            return ['status' => 200,'message' => 'success'];

        } else{
            return ['status' => 401,'message' => 'fail'];


        }
//

    }

    public function getFetchFeeds(){
        return view('partials.feed_partials');
    }
    // category page view action
    public function getCategory(Request $request,$category_id){

        $builder =  Product::leftJoin('stores','stores.user_id','=','products.user_id')
            ->leftJoin('sub_categories','sub_categories.id','=','products.sub_category_id')
            ->leftJoin('product_categories','product_categories.id','=','sub_categories.product_category_id')
            ->where('product_categories.id',$category_id)
            ->where('stores.enabled',true)
            ->inRandomOrder()
            ->selectRaw('products.*,stores.id as store_id,stores.name as store_name,stores.slug as store_slug,product_categories.name as category_name')
            ->orderBy('products.like_counts','desc');

        $products = $builder->take(10)->get();

          $second_set = $builder->skip(10)->paginate(8);


         $nextpageurl = $second_set->nextpageurl();

        $featured_stores =  MarketplaceSignup::leftJoin('stores','stores.id','marketplace_signups.store_id')
            ->where('stores.enabled',true)
            ->inRandomOrder()
            ->take(3)
            ->get();

        if($request->ajax()){
            return view('market.partials.more_popular_products',compact('products','second_set','nextpageurl'));
        }

        if($builder->first()){
            $category_name = $builder->first()->category_name;
        }

        return view('market.category',compact('products','categories','category_id','second_set','nextpageurl','category_name','featured_stores'));
    }

    public function getSubCategory(Request $request,$id){

        $builder = Product::leftJoin('sub_categories','products.sub_category_id','=','sub_categories.id')
            ->where('sub_categories.id','=',$id);

        $products = $builder->where('products.ad',true)
                       ->selectRaw('products.*,sub_categories.name as category_name')
                       ->paginate(8);

        $category = SubCategory::where('id',$id)->first();

        $nextpageurl = $products->nextPageUrl();

        if($request->ajax()){
            return view('market.partials.more_popular_products',compact('products','nextpageurl'));
        }

        return view('market.sub_categories',compact('products','id','category','nextpageurl'));

    }

    public function postFancyIt($product_id){

        $product = Product::find($product_id);

        if(Auth::check() && !Fancy::whereUserId(Auth::user()->id)->whereProductId($product_id)->first()) {
            $user = Auth::user();
            Fancy::create([
                'id' => Uuid::generate(),
                'product_id' => $product_id,
                'user_id' => $user->id
            ]);
            \App\Feed::sendFeedToJob($product,'fancy');
            return ['message' => "You just fancy'd $product->name", 'status' => 200];
        }elseif(Auth::guest()){
            return ['message' => 'You need to login to add to fancies !','status' => 401];

        }else{
            $fancy_exists = Fancy::whereUserId(Auth::user()->id)->whereProductId($product_id)->first();
            if($fancy_exists){
                $fancy_exists->delete();
            }
            \App\Feed::sendFeedToJob($product,'unfancy');

            return ['message' => "You just unfancy'd this product!",'status' => 401];
        }
    }

    public function postLikeIt($product_id){

        $user_id = Auth::check() ? Auth::user()->id:"";
        $product = Auth::check() ? Like::whereUserId($user_id)->whereProductId($product_id)->first():"";
        if(Auth::check() && !$product ) {
            Like::create([
                'id' => Uuid::generate(),
                'user_id' => Auth::user()->id,
                'product_id' => $product_id
            ]);

            $product = Product::find($product_id);

            $product->update([
                'like_counts' => $product->like_counts + 1
            ]);

            \App\Feed::sendFeedToJob($product,'like');

            return ['message' => 'You just liked a product', 'status' => 200, 'likes' => $product->like_counts];
        }

            elseif(Auth::guest()){
                return ['message' => 'You need to login to like a product', 'status' => 403];

            }else{

            $like_exists_for_product = Like::whereUserId(Auth::user()->id)->whereProductId($product_id)->first();

            $product = Product::find($product_id);
            if($like_exists_for_product){
                $like_exists_for_product->delete();

                $product->update([
                    'like_counts' => $product->like_counts - 1
                ]);
            }

            \App\Feed::sendFeedToJob($product,'unlike');

            return ['message' => "You just unliked a product",'status' => 401,'likes'=>$product->like_counts];
        }
    }

    public function getSearchQuery(Request $request){

        $query = $request->query('q');
        return Product::where('name', 'LIKE', "%$query%")->pluck('name');
    }

    public function postRegisterUser(Request $request){


        return 'worked';
    }

    public function getQuickView($product_id){
        $gallery = ProductGallery::whereProductId($product_id)->orderBy('created_at','desc')->take(3)->get();
        $product = Product::find($product_id);
        $product->update([
            'view_counts' => $product->view_counts+1
        ]);
        return view('market.partials.quick_view',compact('product','gallery'));
    }

    public function postWatchShop($product_id,$store_id,$user_id)
    {
        $store_builder = Store::find($store_id);

        if (Auth::guest()) {
            return ['status' => 401, 'message' => 'Log in to watch a shop'];
        } elseif (Auth::check() && WatchedShop::whereUserId(Auth::user()->id)->whereStoreId($store_id)->first()) {
            $watchedshop_exists = WatchedShop::whereUserId(\Illuminate\Support\Facades\Auth::user()->id)->whereStoreId($store_id)->first();
//            if ($watchedshop_exists) {
            $watchedshop_exists->delete();
            \App\Feed::sendFeedToJob($store_builder,'unfollow');

            return ['message' => "You just unfollowed a shop", 'status' => 404];
        } else {

            $user = Auth::user();

            WatchedShop::create([
                'id' => Uuid::generate(),
                'product_id' => $product_id,
                'store_id' => $store_id,
                'user_id' => $user->id,
                'action' => "$user->name just followed your shop"
            ]);
//            $store_builder = Store::find($store_id);
            $builder = Product::find($product_id);
            \App\Feed::sendFeedToJob($store_builder,'follow');
//            event(new FeedsEvent("you just followed $store_builder->name", $user));
            $image = $store_builder->image == null ? "https://placehold.it/60x60":$store_builder->image;

            return ['status' => 200, 'image_url' => asset("images/stores/$image"),  'store' => $store_builder->name];
        }
    }


   public function postAddToTimeline(Request $request){
       $user = Auth::user();
//       \App\Feed::recordAction($user->id,$request->message);
       \App\Feed::sendFeedToJob($request->message,'timeline');
   }

    public function getFollowUser($id){
            $user = Auth::user();
            $stream = new StreamFeed($user->id);
            $stream->followFeed("flat",$id);
        }

    public function postRegisterNewUser(UserRequest $request){
              User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone_number' => $request->phone_number,
                'gender'    => $request->gender,
                'has_store' => $request->store == "on"? true: false
            ]);



        if($request->store == "on"){

            $user_id = User::where('email',$request->email)->first()->id;
            $store_id = Uuid::generate();

            Store::create([
                'id' => $store_id ,
                'user_id' => $user_id,
                'name' => $request->store_name
            ]);
            $store = Store::find($store_id);

            Notification::send(Store::first(), new NewShop($store));
        }

        $user_id= User::whereEmail($request->email)->first();

        $user = User::find($user_id->id);

        Notification::send(User::first(), new NewSignUp($user));

        Auth::login($user_id);

    }

    public function getCheckName(StoreRequest $request){
        return $request;
    }

    public function postAddNewShop(StoreRequest $request){
        $user_id = Auth::user()->id;
        $store_id = Uuid::generate();
        Store::create([
            'id' => $store_id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email'  => $request->email,
            'domain' => $request->domain,
            'city'   => $request->city,
            'user_id' => $user_id
        ]);


        User::find($user_id)->update([
            'has_store' => true
        ]);

        $store = Store::find($store_id);

        Notification::send(Store::first(), new NewShop($store));
    }
}
