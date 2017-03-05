<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use App\Store;
use App\SubCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->leftjoin('stores','stores.id','=','products.store_id');

//        $ad_products = $builder
//            ->where('ad',true)
//            ->selectRaw('products.*,sub_categories.name as category_name,stores.name as store_name,stores.id as store_id')
//            ->take(20)->get();

        $products = $builder
            ->where('ad',true)
            ->selectRaw('products.*,sub_categories.name as category_name,stores.name as store_name,stores.id as store_id')
            ->orderBy('like_counts','desc')
            ->paginate(20);

        $nextpageurl = $products->nextPageUrl();

        if($request->ajax()){
            return view('market.partials.more_popular_products',compact('ad_products','products','nextpageurl'));
        }

        return view('market.index',compact('ad_products','products','nextpageurl'));
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
            ->where('product_categories.slug',$category_slug);

         $products = $builder
            ->selectRaw('products.*,sub_categories.name as category_name,
              product_categories.name as product_category_name,product_categories.slug as category_slug')
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

    public function postRegisterUser(Request $request){


        return 'worked';
    }
}
