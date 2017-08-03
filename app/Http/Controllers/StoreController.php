<?php

namespace App\Http\Controllers;

use App\Feed;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\StoreRequest;
use App\MpowerPayment;
use App\Notifications\NewOrder;
use App\Order;
use App\OrderItem;
use App\Package;
use App\PackageSignup;
use App\Payment;
use App\Product;
use App\ProductCategory;
use App\ProductGallery;
use App\Store;
use App\StreamFeed;
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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Webpatser\Uuid\Uuid;
use Illuminate\Contracts\Filesystem\Filesystem;

class StoreController extends Controller
{
    //
    protected $cart;
    protected $image;
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
//        $this->image = $image;

//        $this->middleware('auth');
    }

    public function getStoreDomain(){

    }

    public function getStore($slug,$user_id){

        $products = Product::inRandomOrder()->whereUserId($user_id)->where('published',true)->paginate(12);
        $latest_products = Product::whereUserId($user_id)->where('published',true)->orderBy('created_at','desc')->take(5)->get();
        $categories = ProductCategory::all();
        $store = Store::whereUserId($user_id)->first();
        $sub_categories = SubCategory::inRandomOrder()->get();
        $status = "NO PRODUCTS YET IN YOUR SHOP !";
        return view('store.index',compact('products','latest_products','categories','slug','user_id','store','sub_categories','status'));

    }

    public function getStoreCategory($slug,$user_id,$category_id){

        $products = Product::leftJoin('sub_categories','sub_categories.id','=','products.sub_category_id')
         ->leftJoin('product_categories','product_categories.id','=','sub_categories.product_category_id')
         ->where('product_categories.id',$category_id)
         ->where('products.user_id',$user_id)
         ->where('published',true)
         ->selectRaw('products.*')
            ->paginate(12);
        $latest_products = Product::whereUserId($user_id)->orderBy('created_at','desc')->take(5)->get();

        $categories = ProductCategory::all();
        $store = Store::whereUserId($user_id)->first();

        $sub_categories = SubCategory::whereProductCategoryId($category_id)->get();
        return view('store.index',compact('products','categories','slug','user_id','sub_categories','store','latest_products'));

    }

    public function getStoreSubCategory($slug,$user_id,$category_id){

        $products = Product::paginate(12);
        $categories = ProductCategory::whereUserId($user_id)->get();
        $store = Store::whereUserId($user_id)->first();
        $latest_products = Product::whereUserId($user_id)->orderBy('created_at','desc')->take(5)->get();

        return view('store.index',compact('products','categories','slug','user_id','store','latest_products'));

    }


    public function getDashboard(){
//        OrderItem::with('product',)
        $user_id = Auth::user()->id;
//
         $products = TopSellingProduct::leftJoin('products','products.id','=','top_selling_products.product_id')
            ->where('top_selling_products.user_id',$user_id)->orderBy('count','desc')
            ->take(10)
            ->get();
        $order_builder = Order::whereUserId($user_id);
        $count = $order_builder->count();
        $average = $order_builder->avg('amount');

        return view('store.dashboard',compact('products','average','count'));
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

    public function postAddStoreBanner(Request $request){
        return $request->file('image');
        if($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $id = Uuid::generate();
            $date_time = date('Ymdhis');

            $image = $request->file('image');

            $input['imagename'] = Auth::user()->id;


            $destinationPath = public_path('images/store_banners');
            $img = Image::make($image->getRealPath());
            $img->resize(870, 260, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['imagename']);
        }

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

          $store = Store::leftJoin('package_signups','package_signups.store_id','=','stores.id')
              ->leftJoin('packages','packages.id','=','package_signups.package_id')
              ->selectRaw('stores.*,packages.name as package_name')
            ->where('stores.user_id',Auth::user()->id)->first();

        return view('store.settings',compact('store'));
    }


    public function postStoreSettings(Request $request)
    {

        $slug = SlugService::createSlug(Store::class, 'slug', $request->name);
        if($request->hasFile('image') && $request->hasFile('banner-image')){

            Store::processAllImages($request,$slug);

        }elseif ($request->hasFile('image')) {
            $this->validate($request, [
                'name' => 'required', //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'phone_number' => 'required','email' => 'required', 'address' => 'required'
            ]);

            Store::processLogo($request,$slug);

        } elseif ($request->hasFile('banner-image')) {

            Store::processBannerImage($request,$slug);

        }else{
            Store::whereUserId(Auth::user()->id)->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'address' => $request->address,
                'city' => $request->city,
                'business_type' => $request->business_type,
                'domain' => $request->domain,
                'about' => $request->about,
                'slug' => $slug,
                'user_id' => Auth::user()->id,
                'colour' => $request->colour,
                'enabled' => $request->enabled =="on" ? true :false
            ]);
        }
            return 'success';
        }



    public function getMarketPlaceSignUp(){

        $packages = Package::whereType('marketplace_upgrade')->get();
        return view('store.marketplace-signup',compact('packages'));
    }

    public function getMarketPlacePackages($package_id){

        return Package::whereType('marketplace_upgrade')->find($package_id);

    }


    public function getAddProduct(Request $request){

        if(!Auth::user()->has_store){

            return redirect('');

        }
        $categories = ProductCategory::all('id','name');
        $store_id = Store::where('user_id',Auth::user()->id)->first();

         $productCounts = Product::whereStoreId($store_id->id)->count();
         $products_limit = PackageSignup::getUserPackageThreshold()-$productCounts;

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

        $store_id = Store::where('user_id',Auth::user()->id)->first();;

        $productCounts = Product::whereStoreId($store_id->id)->count();
        $products_limit = PackageSignup::getUserPackageThreshold()-$productCounts;

        if($products_limit <= 0){
            return ['products_limit_reached' => true,'status'=>403];
        }else{

            $image = $request->file('image');
            $input['imagename'] = $id.$date_time.'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('images/products');
            $img = Image::make($image->getRealPath());
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $image_name = $input['imagename'];

            Storage::disk('s3')->put("/products/$image_name", $img->getEncoded());

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
                'published' => $request->published == 'on' ? true : false,
                'show_buy_button' => $request->show_buy_button == 'on' ? true : false,
                'ad' => false,
                'store_id' => $store_id->id
            ]);

//            $stream = new StreamFeed($store_id->id);
//            $stream->addActivity($store_id->name,'added','new products');
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
                'published' => $request->published == 'on' ? true : false,
                'sale'    => $request->sale == 'on' ? true : false,
                'sale_price' => $request->sale_price
            ]);

        }else {
            Product::find($product_id)->update([
                'name' => $request->name,
                'user_id' => Auth::user()->id,
                'description'=> $request->description,
                'price' => $request->price,
                'sub_category_id' => $request->sub_category,
                'feature' => $request->feature == 'on'? true: false,
                'published' => $request->published == 'on' ? true : false,
                'sale'    => $request->sale == 'on' ? true : false,
                'sale_price' => $request->sale_price
            ]);

        }
    }

    public function postProductUpdatePublished(Request $request){

        switch($request->name){
            case"published":
                Product::find($request->pk)->update([
                    'published' => $request->value
                ]);
                break;
            case"price":
                Product::find($request->pk)->update([
                    'price' => $request->value
                ]);
                break;
            case"name":
                Product::find($request->pk)->update([
                    'name' => $request->value
                ]);
                break;
        }
    }

      public function postDeleteProduct($product_id){
          Product::find($product_id)->delete();
      }

        public function getQuickAddProducts(){

         $sub_categories = ProductCategory::with('subcategories')->get();

        return view('store.quick_add_product',compact('sub_categories'));

    }

    public function postQuickAddProducts(Request $request){
        if($request->hasFile('image')){
            $this->validate($request,[
                'name' =>'required',
//                'image' => 'required',
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

        $user_id = Auth::user()->id;
        $threshold = PackageSignup::getUserPackageThreshold();

        $productCounts = Product::whereUserId($user_id)->count();
        $products_limit = $threshold-$productCounts;

//        var_dump( $count = count($names)+$productCounts > $threshold ? true: false);exit;

        if($products_limit <= 0) {

            return ['limit' => $products_limit, 'status' => 401];
        }elseif(count($names)+$productCounts > $threshold){
            return ['limit' => $products_limit, 'status' => 402];

        }else{

            foreach($names as $key=>$name){
                $product_id = Uuid::generate();

                $rules = array('image' => 'dimensions:min_width=300,min_height=300'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                $validator = Validator::make(array('image'=> $images[$key]), $rules);
                if($validator->passes()){
                    $input['imagename'] = $product_id.$date_time.'.'.$images[$key]->getClientOriginalExtension();
                    Product::processImage($images[$key],$input['imagename']);

                    Product::create([
                        'id' => $product_id,
                        'name' => $name,
                        'user_id' =>$user_id ,
                        'price' => $prices[$key],
                        'description' =>'',
                        'image' =>  $input['imagename'],
                        'sub_category_id' => $sub_categories[$key],
                        'store_id' => Store::whereUserId(Auth::user()->id)->first()->id,
                    ]);
                }

            }

            return ['message'=>'successful saved '.count($names).' product(s)','status'=>200,'products_limit'=>$products_limit];
        }


    }

    public function getAllProducts(Request $request){

          $user = Auth::user();
        $builder = Product::leftJoin('stores','stores.id','=','products.store_id')
            ->where('products.user_id',$user->id)
            ->selectRaw('products.*');

        switch($request->query('order')){

            case"published":
                if($request->query('order') == 'published') {
                    $products = $builder->orderBy('products.published', 'desc')->paginate()->appends('order',$request->query('order'));;
                }else{
                    $products = $builder->paginate();
                }
                break;
            case"price":
                if($request->query('order') == 'price') {
                    $products = $builder->orderBy('products.price', 'desc')->paginate()->appends('order',$request->query('order'));
                }else{
                    $products = $builder->paginate();
                }
                break;
            case"name":
                if($request->query('order') == 'name'){
                    $products = $builder->orderBy('products.name','desc')->paginate()->appends('order',$request->query('order'));
                }else{
                    $products = $builder->paginate();
                }
                break;
            default:
                if($request->query('order') == 'date'){
                    $products=$builder->orderBy('products.created_at','desc')->paginate()->appends('order',$request->query('order'));
                }else {
                    $products=$builder->paginate();
                }
        }


//            $products->paginate(10);

        return view('store.all_products',compact('products'));
    }

    public function getQuickAddProductPartial($count){

        $sub_categories = ProductCategory::with('subcategories')->get();

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

    public function postAddToCart($id,$name,$qty,$price,$user_id){

        \Gloudemans\Shoppingcart\Facades\Cart::add($id, $name, $qty, $price, ['user' => "$user_id"]);

        return view('store.partials.shopping_cart_partial',compact('user_id'));
    }

    public function postUpdateCart($rowId,$qty,$user_id){
        \Gloudemans\Shoppingcart\Facades\Cart::update($rowId,$qty);
        return view('store.partials.shopping_cart_partial',compact('user_id'));
    }

    public function postRemoveFromCart($rowId,$user_id){

        \Gloudemans\Shoppingcart\Facades\Cart::remove($rowId);
        return view('store.partials.shopping_cart_partial',compact('user_id'));
    }

    public function postCheckOutRemoveFromCart($rowId){

        \Gloudemans\Shoppingcart\Facades\Cart::remove($rowId);

        return view('store.partials.checkout-cart');
    }

    public function getCartView($user_id){
        return view('store.partials.shopping_cart_partial',compact('user_id'));
    }

    public function getCartContents(){
        return \Gloudemans\Shoppingcart\Facades\Cart::content();
//       return \Gloudemans\Shoppingcart\Facades\Cart::total();
    }

    public function getCartDestroy(){
        return \Gloudemans\Shoppingcart\Facades\Cart::destroy();
    }

    public function getCheckOut($user_id){


        $store = Store::whereUserId($user_id)->first();
        $slug = $store->slug;
        $categories = ProductCategory::all()
        ;

        return view('store.checkout',compact('user','store','user_id','slug','categories'));
    }

    public function postCheckOut($user_id){

        if(Auth::guest()){

            return Response::json(['data'=>'Unauthorized','status' => 401]);

        }else {
            $order_id = Uuid::generate();
            $text = "";
//        $user_id = Auth::user()->id;
            $store = Store::whereUserId($user_id)->first();

            Order::create([
                'id' =>$order_id,
                'amount' => \Gloudemans\Shoppingcart\Facades\Cart::subtotal(),
                'user_id' => Auth::user()->id
            ]);
//            return \Gloudemans\Shoppingcart\Facades\Cart::content();

            foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $item){

                $text.= "item :  $item->name => GHS $item->price * $item->qty \n";
//                return $item->rowId;
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


            \Gloudemans\Shoppingcart\Facades\Cart::destroy();
            $user = Auth::user();
            $shop = Store::whereUserId($user_id)->first();

            Notification::send(Order::first(), new NewOrder($user,$shop,$text,$amount,$qty));

            $order = Order::with(['items','user' =>function($query){}])
                ->whereId($order_id)
                ->first();

            return view('store.partials.order_details',compact('order_id','order','user_id'));
        }
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

    public function getPackages(){
        $packages = \App\Package::whereType('upgrade_package')->orderBy('charge')->take(4)->get();
        $user = Auth::user();

        return view('store.packages',compact('packages','user'));
    }

    public function postMpowerDirectPay(Request $request,$amount)
    {
        $mpowerpayment = new MpowerPayment();
//        $mpowerpayment->MTN="AIRTEL";
        $mpowerpayment->MTN=$request->mobile_money;
//        $results = $mpowerpayment->MobilePayment('Frederick','0241715148','frederickankamah988@gmail.com',1);
        $name = $request->name;
        $phone_number = $request->phone_number;
        $email =        Auth::user()->email;
        $results = $mpowerpayment->MobilePayment($name,$phone_number,$email,$amount);
        Payment::create([
            'id' =>Uuid::generate(),
            'response_code' => $results['response_code'],
            'response_text' => $results['response_text'],
            'description' =>   $results['description'],
            'transaction_id' => $results['transaction_id'],
            'token'         => $results['token'],
            'mobile_invoice_no' => $results['mobile_invoice_no'],
            'user_id'           => Auth::user()->id,
            'amount'            => $amount,
            'package_id'        => $request->package_id
        ]);

        return $results;

    }

    public function sendSms($recipient, $message, $sender_alias){
        // API CREDENTIALS FOR IMPERIAL PEKING
        $apiKey = "b9744510-22e4-11e7-9c25-99beb05ce346";
        $apiSecret = "KhXWRU";

        $post = compact('recipient', 'message', 'sender_alias');
        $options = array(
            CURLOPT_HTTPHEADER => array(
                "ApiKey: $apiKey",
                "ApiSecret: $apiSecret"
            )
        );
        $response = self::do_web_request('http://api.kodesms.com/sms/send', $post, $options);
        return json_decode($response, true);
    }

    function do_web_request($url, $post_arg = false, $options = array()) {
        /* initializing curl */
        $curl_handle = curl_init($url);
        /* set this option the curl_exec function return the response */
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        /* follow the redirection */
        curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, 1);
        //ssl fix
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, 0);
        if($options){
            if($post_arg && isset($options[CURLOPT_HTTPHEADER])){
                $headers = $options[CURLOPT_HTTPHEADER];
                unset($options[CURLOPT_HTTPHEADER]);
            }
            curl_setopt_array($curl_handle, $options);
        }

        if ($post_arg) {
            curl_setopt($curl_handle, CURLOPT_POST, 1);

            if(is_array($post_arg) || is_object($post_arg)){
                $post_arg = http_build_query($post_arg);
            }
            curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $post_arg);
            if(isset($headers)){
                $headers = array_merge(array('Content-Type: application/x-www-form-urlencoded'), $headers);
            }else{
                $headers = array('Content-Type: application/x-www-form-urlencoded');
            }
            curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
        }

        /* invoke the request */
        $response = curl_exec($curl_handle);
        //var_dump($response);

        /* cleanup curl stuff */
        curl_close($curl_handle);

        return $response;
    }
}
