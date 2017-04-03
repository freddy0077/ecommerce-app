<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageReceived;
use App\Fancy;
use App\Http\Requests\UserRequest;
use App\Like;
use App\MarketplaceSignup;
use App\Product;
use App\ProductCategory;
use App\ProductGallery;
use App\Store;
use App\StreamFeed;
use App\SubCategory;
use App\User;
use App\WatchedShop;
use GetStream\Stream\Client;
use GetStream\Stream\Feed;
use GetStream\StreamLaravel\Enrich;
use GetStream\StreamLaravel\Facades\FeedManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
                 ->where('products.user_id',$user->id)->take($number_of_products)->get();
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

//        if($request->ajax()){
//            return view('market.partials.more_popular_products',compact('second_set','nextpageurl'));
//        }

//        return view('market.index',compact('products','nextpageurl'));
        return view('market.index_3',compact('products','categories','second_set','nextpageurl','best_deals','featured_stores'));
    }

    public function getProfile(){
        return view('profile');
    }

    public function getFeeds(Request $request){

         $user = Auth::user();
        $store = Store::whereUserId($user->id)->first();

        $builder = DB::table('watched_shops');
        $feeds = $builder->whereStoreId($store->id)->get();
//        $feeds = $builder->get();
        $following = $builder->where('user_id',$user->id)->get();

//        $stream = new StreamFeed($user->id);
//        $stream->deleteFeed();
//         $activities = $stream->getActivities()['results'];
//         $following   = $stream->getFollowing()['results'];
//         $followers   = $stream->getFollowers()['results'];


        if($request->ajax()){
            return view('partials.feed_partials',compact('activities','following','followers'));
        }

        return view('feeds',compact('feeds','following','user'));
    }

    public function postSaveProfile(Request $request){
        $user = Auth::user();
        User::find($user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number
        ]);

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
            ->selectRaw('products.*,stores.id as store_id,stores.name as store_name,stores.slug as store_slug,product_categories.name as category_name')
            ->orderBy('products.like_counts','desc');

        $products = $builder->take(10)->get();

          $second_set = $builder->skip(10)->paginate(8);


         $nextpageurl = $second_set->nextpageurl();

        $featured_stores =  MarketplaceSignup::leftJoin('stores','stores.id','marketplace_signups.store_id')
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
        if(Auth::check() && !Fancy::whereUserId(Auth::user()->id)->whereProductId($product_id)->first()) {
            Fancy::create([
                'id' => Uuid::generate(),
                'product_id' => $product_id,
                'user_id' => Auth::user()->id
            ]);
            return ['message' => 'Product has been added to your fancies !', 'status' => 200];
        }elseif(Auth::guest()){
            return ['message' => 'You need to login to add to fancies !','status' => 401];

        }else{
            $fancy_exists = Fancy::whereUserId(Auth::user()->id)->whereProductId($product_id)->first();
            if($fancy_exists){
                $fancy_exists->delete();
            }
            return ['message' => "You have unfancy'd this product!",'status' => 401];
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

            $user = Auth::user();

            event(new ChatMessageReceived("$user->name just liked a product",$user));

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
        return view('market.partials.quick_view',compact('product','gallery'));
    }

    public function postWatchShop($product_id,$store_id,$user_id)
    {
        if (Auth::check() && $store = Store::whereUserId(Auth::user()->id)->first()->id != $store_id && !$watchedshop = WatchedShop::whereUserId(Auth::user()->id)->first()) {
            $user = Auth::user();

            WatchedShop::create([
                'id' => Uuid::generate(),
                'product_id' => $product_id,
                'store_id' => $store_id,
                'user_id' => $user->id,
                'action' => "$user->name just followed your shop"
            ]);
            $store_builder = Store::find($store_id);
            $builder = Product::find($product_id);

//            $stream = new StreamFeed($user->id);
//            $stream->addActivity('You', 'just followed', $store_builder->name,$user->id);
//            $stream->followFeed("flat",$user_id);

//            $stream->addToManyFeeds($user->name,"just followed", "$store_builder->name",["user:$user->id","user:$user_id"]);

            event(new ChatMessageReceived("you just followed $store_builder->name", $user));

            return ['status' => 200, 'image_url' => asset("images/stores/$store_builder->image"), 'product_name' => $builder->name, 'store' => $store_builder->name];

        } elseif (Auth::check() && Store::whereUserId(Auth::user()->id)->first()->id  == $store_id) {
            return ['status' => 403, 'message' => 'You can not follow your shop'];

        } elseif (Auth::check() && WatchedShop::whereUserId(Auth::user()->id)->first()) {

            $watchedshop_exists = WatchedShop::whereUserId(\Illuminate\Support\Facades\Auth::user()->id)->whereStoreId($store_id)->first();

//            $product = Product::find($product_id);
            if($watchedshop_exists){
                $watchedshop_exists->delete();
            }

            return ['message' => "You just unfollwed a shop",'status' => 404];

//            return ['status' => 404, 'message' => 'You are already following this shop !'];
        } else {

            return ['status' => 401, 'message' => 'Log in to watch a shop'];
        }
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

            Store::create([
                'id' => Uuid::generate(),
                'user_id' => $user_id,
                'name' => $request->store_name
            ]);
        }

    }
}
