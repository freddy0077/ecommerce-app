<?php

namespace App\Http\Controllers;

use App\Feed;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\StoreRequest;
use App\Notifications\NewOrder;
use App\Order;
use App\OrderItem;
use App\Package;
use App\Product;
use App\ProductCategory;
use App\ProductGallery;
use App\Store;
use App\SubCategory;
use App\TopSellingProduct;
use App\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Webpatser\Uuid\Uuid;

class StoreController extends Controller
{
    protected $threshold = 5;
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getStore($slug,$user_id){

//        $products = Product::leftJoin('sub_categories','sub_categories.id','=','products.sub_category_id')
//            ->leftJoin('product_categories','product_categories.id','=','sub_categories.product_category_id')
//            ->leftJoin('users','users.id','=','product_categories.user_id')
//            ->where('users.id',$user_id)
////            ->where('product_categories.user_id',$user_id)
//            ->selectRaw('products.*')
//            ->paginate();

        $products = Product::whereUserId($user_id)->paginate();
        $categories = ProductCategory::all();
        $store = Store::whereUserId($user_id)->first();
        $sub_categories = SubCategory::inRandomOrder()->get();
        return view('store.index',compact('products','categories','slug','user_id','store','sub_categories'));

    }

    public function getStoreCategory($slug,$user_id,$category_id){

        $products = Product::leftJoin('sub_categories','sub_categories.id','=','products.sub_category_id')
         ->leftJoin('product_categories','product_categories.id','=','sub_categories.product_category_id')
         ->where('product_categories.id',$category_id)
         ->where('products.user_id',$user_id)
         ->selectRaw('products.*')
            ->paginate();
        $categories = ProductCategory::all();
        $sub_categories = SubCategory::whereProductCategoryId($category_id)->get();
        return view('store.index',compact('products','categories','slug','user_id','sub_categories'));

    }

    public function getStoreSubCategory($slug,$user_id,$category_id){

        $products = Product::paginate();
        $categories = ProductCategory::whereUserId($user_id)->get();
        return view('store.index',compact('products','categories','slug','user_id'));

    }


    public function getDashboard(){
//        OrderItem::with('product',)
        $user_id = Auth::user()->id;
//
         $products = TopSellingProduct::leftJoin('products','products.id','=','top_selling_products.product_id')
            ->where('top_selling_products.user_id',$user_id)->orderBy('count','desc')
            ->take(10)
            ->get();
        return view('store.dashboard',compact('products'));
    }

    public function getIndex(){

        $user = Auth::user()->id;
         $store = Store::leftJoin('users','users.id','=','stores.user_id')
           ->whereUserId($user)
           ->selectRaw('stores.*')
            ->first();

         $products = Product::leftJoin('sub_categories','sub_categories.id','=','products.sub_category_id')
            ->leftJoin('product_categories','product_categories.id','=','sub_categories.product_category_id')
            ->leftJoin('users','users.id','=','product_categories.user_id')
            ->where('users.id',$user)
            ->selectRaw('products.*,users.name as user_name')
            ->take(10)->get();
        $categories = ProductCategory::all('id','name');
        $sub_categories = SubCategory::all();

            return view('store.index',compact('store','products','categories','sub_categories','user'));
    }

    public function getAddStore(){
        $store = Store::where('stores.user_id',Auth::user()->id)
            ->first();

            return view('store.add_store');
    }

    public function getEditStore(){

        $store = Store::where('stores.user_id',Auth::user()->id)
            ->first();

        return view('store.edit_store',compact('store'));
    }

    public function postUpdateStore(Request $request){
        $userId = Auth::user()->id;

        $store = Store::whereUserId($userId)->first();

        $store->update([

            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'domain' => $request->domain,
            'location' => $request->location,
        ]);

        return ['message' => 'success','status'=>200];

    }

    public function postAddStore(StoreRequest $request){

        $id = Uuid::generate();

        Store::create([
            'id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'domain' => $request->domain,
            'location' => $request->location,
            'user_id' => Auth::user()->id,
        ]);

        $user = User::find(Auth::user()->id);
        $user->has_store = true;
        $user->save();

        $slug = Store::whereId($id)->first()->slug;
        return ['message' => 'success','status'=>200,'slug'=> $slug];
    }

    public function getStoreSettings(){
        $store = Store::whereUserId(Auth::user()->id)->first();

        return view('store.settings',compact('store'));
    }


    public function postStoreSettings(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone_number' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        $id = Uuid::generate();
        $date_time = date('Ymdhis');

            $image = $request->file('image');
            $input['imagename'] = $id.$date_time.'.'.$image->getClientOriginalExtension();


            $destinationPath = public_path('images/stores');
            $img = Image::make($image->getRealPath());
            $img->resize(200, 50, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']);
        if(User::find(Auth::user()->id)->has_store == true){
            $slug = SlugService::createSlug(Store::class, 'slug', $request->name);

            Store::whereUserId(Auth::user()->id)->update([
                'name' => $request->name,
                'image' => $input['imagename'],
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'address' => $request->address,
                'city' => $request->city,
                'business_type' => $request->business_type,
                'domain' => $request->domain,
                'about' => $request->about,
                'slug'  => $slug,
                'user_id' => Auth::user()->id
            ]);

        }else{

            Store::create([
                'id' => Uuid::generate(),
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'address' => $request->address,
                'city' => $request->city,
                'business_type' => $request->business_type,
                'domain' => $request->domain,
                'about' => $request->about,
                'user_id' => Auth::user()->id
            ]);

            User::find(Auth::user()->id)->update([
                'has_store' => true
            ]);

//            $this->saveMainCategories();

            return 'success';
        }

    }

    public function getMarketPlaceSignUp(){

        $packages = Package::all();
        return view('store.marketplace-signup',compact('packages'));
    }

    public function getMarketPlacePackages($package_id){

        return Package::find($package_id);

    }


    public function getAddProduct(Request $request){

        if(!Auth::user()->has_store){

            return redirect('');

        }
        $categories = ProductCategory::all('id','name');
        $store_id = Store::where('user_id',Auth::user()->id)->first();

         $productCounts = Product::whereStoreId($store_id->id)->count();
         $products_limit = $this->threshold-$productCounts;


        return view('store.add_product',compact('categories','products_limit'));
    }

    public function postAddProduct(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=300,min_height=300',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required'
        ]);


        $id = Uuid::generate();
        $date_time = date('Ymdhis');

        $store_id = Store::where('user_id',Auth::user()->id)->first()->id;

        $productCounts = Product::whereStoreId($store_id)->count();
        $products_limit = $this->threshold-$productCounts;

        if($products_limit == 0){
            return ['products_limit_reached' => true];
        }else{

            $image = $request->file('image');
            $input['imagename'] = $id.$date_time.'.'.$image->getClientOriginalExtension();


            $destinationPath = public_path('images/products');
            $img = Image::make($image->getRealPath());
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']);

            Product::create([
                'id' => $id,
                'name' => $request->name,
                'user_id' => Auth::user()->id,
                'description'=> $request->description,
                'price' => $request->price,
                'image' => $input['imagename'],
                'sub_category_id' => $request->sub_category,
                'feature' => $request->feature == 'on'? true: false,
                'publish' => $request->publish == 'on' ? true : false,
                'show_buy_button' => $request->show_buy_button == 'on' ? true : false,
                'ad' => false,
                'store_id' => $store_id
            ]);
        }
    }

    public function getEditProduct($product_id){

        $product = Product::find($product_id);
        $categories = ProductCategory::all('id','name');
        return view('store.edit_product',compact('product','categories'));

    }

    public function postUpdateProduct(Request $request,$product_id){


//           var_dump( $request->file('gallery'));
//            var_dump($request->file('image'));
//        exit;

        if($request->hasFile('image')){
            $this->validate($request,[
                'name' =>'required',
                'image' => 'dimensions:min_width=300,min_height=300',
                'description' => 'required',
            'sub_category' =>'required',
//            'category' => 'required',
                'price' => 'required'
            ]);
        }else {
            $this->validate($request,[
                'name' =>'required',
//                'image' => 'dimensions:min_width=300,min_height=300',
                'description' => 'required',
            'sub_category' =>'required',
//            'category' => 'required',
                'price' => 'required'
            ]);
        }

        if($request->hasFile('gallery')){
            $gallery = $request->file('gallery');

            foreach($gallery as $gal){

                $date_time = date('Ymdhis');

                $image = $gal;
                $input['imagename'] = $product_id.$date_time.'.'.$image->getClientOriginalExtension();

                Product::processImage($image,$input['imagename']);

                ProductGallery::create(
                    [
                        'id' => Uuid::generate(),
                        'product_id' => $product_id,
                        'image' =>   $input['imagename'],
                        'user_id' => Auth::user()->id
                    ]
                );

            }
        }

        if($request->hasFile('image')){

                $date_time = date('Ymdhis');

                $image = $request->file('image');
                $input['imagename'] = $product_id.$date_time.'.'.$image->getClientOriginalExtension();

                Product::processImage($image,$input['imagename']);

            Product::find($product_id)->update([
                'name' => $request->name,
                'user_id' => Auth::user()->id,
                'description'=> $request->description,
                'price' => $request->price,
                'image' => $input['imagename'],
                'sub_category_id' => $request->sub_category,
                'feature' => $request->feature == 'on'? true: false,
                'publish' => $request->publish == 'on' ? true : false,
            ]);

        }else {
            Product::find($product_id)->update([
                'name' => $request->name,
                'user_id' => Auth::user()->id,
                'description'=> $request->description,
                'price' => $request->price,
                'sub_category_id' => $request->sub_category,
                'feature' => $request->feature == 'on'? true: false,
                'publish' => $request->publish == 'on' ? true : false,
            ]);

        }
    }

      public function postDeleteProduct($product_id){
          Product::find($product_id)->delete();
      }

        public function getQuickAddProducts(){

        $sub_categories = SubCategory::all();

        return view('store.quick_add_product',compact('sub_categories'));

    }

    public function postQuickAddProducts(Request $request){
        if($request->hasFile('image')){
            $this->validate($request,[
                'name' =>'required',
//                'image' => 'dimensions:min_width=300,min_height=300',
//                'description' => 'required',
                'price' => 'required'
            ]);
        }

        $date_time = date('Ymdhis');


//        $image = $request->file('image');

        $names = $request->get('name');
         $prices = $request->get('price');
        $sub_categories = $request->get('sub_category');
        $images = $request->file('image');

        foreach($names as $key=>$name){
            $product_id = Uuid::generate();

            $input['imagename'] = $product_id.$date_time.'.'.$images[$key]->getClientOriginalExtension();
            Product::processImage($images[$key],$input['imagename']);

            Product::create([
                'id' => $product_id,
                'name' => $name,
                'user_id' => Auth::user()->id,
                'price' => $prices[$key],
                'description' =>'',
                'image' =>  $input['imagename'],
                'sub_category_id' => $sub_categories[$key],
                'store_id' => Store::whereUserId(Auth::user()->id)->first()->id,
                'user_id' => Auth::user()->id
            ]);
        }

        return ['message'=>'successful saved '.count($names).' product(s)','status'=>200];

    }

    public function getAllProducts(){

        $user = Auth::user();
        $products = Product::leftJoin('stores','stores.id','=','products.store_id')
         ->where('products.user_id',$user->id)
        ->selectRaw('products.*')->paginate(10);

        return view('store.all_products',compact('products'));
    }

    public function getQuickAddProductPartial($count){

        $sub_categories = SubCategory::all();

        return view('store.partials.quick_add_product_partial',compact('count','sub_categories'));
    }

    public function getSubCategoriesPartial($category_id){

        $sub_categories = SubCategory::where('product_category_id',$category_id)->get();

        return view('store.partials.sub_categories_partial',compact('sub_categories'));
    }

    public function getSingleProduct($slug){

        $store = Store::whereSlug($slug)->first();

        return view('store.single_product',compact('store'));
    }

    public function postAddToCart($id,$name,$qty,$price){
        \Gloudemans\Shoppingcart\Facades\Cart::add($id, $name, $qty, $price, ['size' => 'large']);

        return view('store.partials.shopping_cart_partial');
    }

    public function postUpdateCart($rowId,$qty){
        \Gloudemans\Shoppingcart\Facades\Cart::update($rowId,$qty);
        return view('store.partials.shopping_cart_partial');
    }

    public function postRemoveFromCart($rowId){

        \Gloudemans\Shoppingcart\Facades\Cart::remove($rowId);
        return view('store.partials.shopping_cart_partial');
    }

    public function postCheckOutRemoveFromCart($rowId){

        \Gloudemans\Shoppingcart\Facades\Cart::remove($rowId);

        return view('store.partials.checkout-cart');
    }

    public function getCartView(){
        return view('store.partials.shopping_cart_partial');
    }

    public function getCartContents(){
        return \Gloudemans\Shoppingcart\Facades\Cart::content();
//       return \Gloudemans\Shoppingcart\Facades\Cart::total();
    }

    public function getCartDestroy(){
        return \Gloudemans\Shoppingcart\Facades\Cart::destroy();
    }

    public function getCheckOut(){

        $user = Auth::user()->id;

        return view('store.checkout',compact('user'));
    }

    public function postCheckOut(){

        $order_id = Uuid::generate();
        $text = "";
        $user_id = Auth::user()->id;
        $store = Store::whereUserId($user_id)->first();


        Order::create([
            'id' =>$order_id,
            'amount' => \Gloudemans\Shoppingcart\Facades\Cart::subtotal(),
            'user_id' => $user_id
        ]);

        foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $item){

            $text.= "item :  $item->name => GHS $item->price * $item->qty \n";
//            $text.= "$item->qty \n";
            OrderItem::create([
                'id' => Uuid::generate(),
                'product_id' => $item->id,
                'qty' => $item->qty,
                'order_id' => $order_id,
            ]);

            $top_selling_product = TopSellingProduct::whereProductId($item->id)->whereUserId($user_id);

            if($top_selling_product->first()){
                $top_selling_product->update([
                    'count' => $top_selling_product->first()->count+1
                ]);
            }else {
                TopSellingProduct::create([
                    'id' => Uuid::generate(),
                    'user_id' => $user_id,
                    'store_id' => $store->id,
                    'product_id' => $item->id,
                    'count' => 1
                ]);
            }
        }
        $amount="GHS".\Gloudemans\Shoppingcart\Facades\Cart::subtotal();
        $qty = \Gloudemans\Shoppingcart\Facades\Cart::count();


//        \Gloudemans\Shoppingcart\Facades\Cart::destroy();
        $user = Auth::user()->first();
        $shop = Store::whereUserId($user->id)->first();

       Notification::send(User::first(), new NewOrder($user,$shop,$text,$amount,$qty));

    }

    public function getOrders(){
        $orders = Order::leftJoin('users','users.id','=','orders.user_id')
            ->whereUserId(Auth::user()->id)
            ->selectRaw('orders.*,users.name')
            ->paginate();

        return view('store.orders',compact('orders'));
    }

    public function getOrderItems($order_id){

         $order = Order::with(['items','user' =>function($query){}])
            ->whereId($order_id)
            ->first();
//        return OrderItem::with('order','product')->get();

        return view('store.order_items',compact('order'));

    }

    public function saveMainCategories()
    {
        $mainCategories = ['Clothing','Beauty & Accessories','Home & Appliances','Electronics',
            'Arts & Photography','Agric & Food'];
        $user = Auth::user();

        foreach ($mainCategories as $key => $category) {

            ProductCategory::create([
                'id' => Uuid::generate(),
                'user_id' => $user->id,
                'name' => $category,
                'image' => '',
            ]);

        }
    }

    public function checkStoreDetails(){

    }


}
