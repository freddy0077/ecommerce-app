<?php

namespace App\Http\Controllers;

use App\Fancy;
use App\Like;
use App\Product;
use App\ProductCategory;
use App\Store;
use App\SubCategory;
use App\User;
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
        $builder = DB::table('products')
            ->leftJoin('sub_categories','sub_categories.id','=','products.sub_category_id')
            ->leftjoin('stores','stores.id','=','products.store_id')
            ->leftJoin('users','users.id','=','stores.user_id');

//        $ad_products = $builder
//            ->where('ad',true)
//            ->selectRaw('products.*,sub_categories.name as category_name,stores.name as store_name,stores.id as store_id')
//            ->take(20)->get();

         $products = $builder
            ->where('ad',true)
            ->selectRaw('products.*,sub_categories.name as category_name,stores.name as store_name,stores.id as store_id,stores.slug as store_slug,users.id as user_id')
            ->orderBy('created_at','desc')
            ->paginate(20);
//        $products->setPath('https://' . $request->getHttpHost(). $request->path());


         $nextpageurl = $products->nextPageUrl();

        if($request->ajax()){
            return view('market.partials.more_popular_products',compact('products','nextpageurl'));
        }

        return view('market.index',compact('products','nextpageurl'));
    }

    public function getProfile(){
        return view('profile');
    }

    public function getFeeds(){
        return view('feeds');
    }
    // category page view action
    public function getCategory($category_slug){

        $builder = Product::leftJoin('sub_categories','sub_categories.id','=','products.sub_category_id')
            ->leftJoin('product_categories','product_categories.id','=','sub_categories.product_category_id')
            ->leftjoin('stores','stores.id','=','products.store_id')
            ->leftJoin('users','users.id','=','stores.user_id')
            ->where('product_categories.slug',$category_slug);

         $products = $builder
            ->selectRaw('products.*,sub_categories.name as category_name,
              product_categories.name as product_category_name,product_categories.slug as category_slug,stores.name as store_name')
            ->paginate(36);


//          $f = new \NumberFormatter("en", \NumberFormatter::SPELLOUT);

       $category = ProductCategory::where('slug',$category_slug)->first();


        return view('market.category',compact('products','category'));
    }

    public function getSubCategory($slug){

        $builder = Product::leftJoin('sub_categories','products.sub_category_id','=','sub_categories.id')
            ->where('sub_categories.slug','=',$slug);

        $ad_products = $builder->where('products.ad',true)
                       ->selectRaw('products.*,sub_categories.name as category_name')
                       ->paginate(8);

        $products = $builder
            ->selectRaw('products.*,sub_categories.name as category_name')
            ->get();

        $category = SubCategory::where('slug',$slug)->first();


        return view('market.sub_categories',compact('products','ad_products','category'));

    }

    public function postFancyIt($product_id){
        Fancy::create([
            'id' => Uuid::generate(),
            'product_id' => $product_id,
            'user_id' => Auth::user()->id
        ]);

        return ['message' => 'success','status' => 200];

    }

    public function postLikeIt($product_id){
        $user_id = Auth::user()->id;
        $product =Like::whereUserId($user_id)->whereProductId($product_id)->first();
        if(!$product){
            Like::create([
                'id' => Uuid::generate(),
                'user_id' => Auth::user()->id,
                'product_id'=> $product_id
            ]);

            $product = Product::find($product_id);

            $product->update([
                'like_counts' => $product->like_counts+1
            ]);

            return ['message' => 'success','status' => 200,'likes' =>$product->like_counts];

        }else{
            return ['message' => 'user already liked it','status' => 401];
        }
    }

    public function getSearchQuery(Request $request){

        $query = $request->query('q');
        return Product::where('name', 'LIKE', "%$query%")->pluck('name');
    }

    public function postRegisterUser(Request $request){


        return 'worked';
    }
}
