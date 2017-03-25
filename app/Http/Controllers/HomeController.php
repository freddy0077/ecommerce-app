<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageReceived;
use App\Fancy;
use App\Like;
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
        $builder =  Product::leftJoin('stores','stores.user_id','=','products.user_id')
            ->selectRaw('products.*,stores.id as store_id,stores.name as store_name,stores.slug as store_slug')
            ->orderBy('products.like_counts','desc');

        $products = $builder->take(10)->get();

        $second_set = $builder->skip(10)->take(10)->get();

        $second_set = $builder->skip(10)->take(10)->paginate();

        $nextpageurl = $second_set->nextpageurl();

        $categories = ProductCategory::leftJoin('sub_categories','sub_categories.product_category_id','=','product_categories.id')
            ->leftJoin('products','products.sub_category_id','=','sub_categories.id')
            ->distinct()
//            ->orderBy('products.like_counts')
            ->selectRaw('product_categories.*')
            ->take(10)
            ->get();

        if($request->ajax()){
            return view('market.partials.more_popular_products',compact('second_set','nextpageurl'));
        }

//        return view('market.index',compact('products','nextpageurl'));
        return view('market.index_3',compact('products','categories','second_set','nextpageurl'));
    }

    public function getProfile(){
        return view('profile');
    }

    public function getFeeds(Request $request){

        $user = Auth::user();

        $stream = new StreamFeed($user->id);
//        $stream->deleteFeed();
         $activities = $stream->getActivities()['results'];
         $following   = $stream->getFollowing()['results'];
         $followers   = $stream->getFollowers()['results'];


        if($request->ajax()){
            return view('partials.feed_partials',compact('activities','following','followers'));
        }

        return view('feeds',compact('activities','user','following','followers'));
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
            ->selectRaw('products.*,stores.id as store_id,stores.name as store_name,stores.slug as store_slug')
            ->orderBy('products.like_counts','desc');

        $products = $builder->take(10)->get();

          $second_set = $builder->skip(10)->take(10)->paginate();

         $nextpageurl = $second_set->nextpageurl();

        if($request->ajax()){
            return view('market.partials.more_popular_products',compact('products','second_set','nextpageurl'));
        }


        return view('market.category',compact('products','categories','category_id','second_set','nextpageurl'));
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
            return ['message' => 'You have this product in your fancies!','status' => 401];
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

            return ['message' => "You have already liked this product",'status' => 401];
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

            $stream = new StreamFeed($user->id);
            $stream->addActivity('You', 'just followed', $store_builder->name,$user->id);
            $stream->followFeed($store_id);

            event(new ChatMessageReceived("you just followed $store_builder->name", $user));

            return ['status' => 200, 'image_url' => asset("images/stores/$store_builder->image"), 'product_name' => $builder->name, 'store' => $store_builder->name];

        } elseif (Auth::check() && $store == $store_id) {
            return ['status' => 403, 'message' => 'You can not follow your shop'];

        } elseif (Auth::check() && $watchedshop) {
            return ['status' => 404, 'message' => 'You are already following this shop !'];
        } else {
            return ['status' => 401, 'message' => 'Log in to watch a shop'];
        }
    }

        public function getFollowUser($id){
            $user = Auth::user();
            $stream = new StreamFeed($user->id);
            $stream->followFeed("flat",$id);
        }

}
