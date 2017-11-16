<?php

namespace App\Http\Controllers;

use App\Feed;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\StoreRequest;
use App\Hubtel\HubtelPaymentAdapter;
use App\MpowerPayment;
use App\MpowerPaymentException;
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
use GuzzleHttp\Client;
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

    /**
     * @var \Illuminate\Contracts\Auth\Authenticatable|null
     *
     */
    protected $user;
    protected $store;
    public function __construct(Cart $cart)
    {
        //        $this->middleware('auth');
        $this->cart = $cart;
        $this->middleware(function($request, $next){
            $this->user = Auth::user();
            $this->store = Store::whereUserId($this->user->id)->first();
            return $next($request);
        });
    }

    public function getStore($slug,$user_id){

        try{
            $categories = ProductCategory::all();
            $store = $this->store;
            $sub_categories = SubCategory::inRandomOrder()->get();
            $products_builder = Product::whereUserId($user_id)->wherePublished(true);

            $products = $products_builder->inRandomOrder()->paginate(12);
            $latest_products = $products_builder->orderBy('created_at','desc')->take(5)->get();

            $status = "NO PRODUCTS YET IN YOUR SHOP !";
            return view('store.index',compact('products','latest_products','categories','slug','user_id','store','sub_categories','status'));
        }catch(\Exception $e){

            return redirect()->back();
        }
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
        $store = $this->store;

        $sub_categories = SubCategory::whereProductCategoryId($category_id)->get();
        return view('store.index',compact('products','categories','slug','user_id','sub_categories','store','latest_products'));

    }

    public function getStoreSubCategory($slug,$user_id,$category_id){

        $products = Product::paginate(12);
        $categories = ProductCategory::whereUserId($user_id)->get();
        $store = $this->store;
        $latest_products = Product::whereUserId($user_id)->orderBy('created_at','desc')->take(5)->get();

        return view('store.index',compact('products','categories','slug','user_id','store','latest_products'));

    }


    public function getDashboard(){
         $products = TopSellingProduct::leftJoin('products','products.id','=','top_selling_products.product_id')
            ->where('top_selling_products.user_id',$this->user->id)->orderBy('count','desc')
            ->take(10)
            ->get();
        $order_builder = Order::whereUserId($this->user->id);
        $count = $order_builder->count();
        $average = $order_builder->avg('amount');

        return view('store.dashboard',compact('products','average','count'));
    }

    public function getIndex(){
         $store = Store::leftJoin('users','users.id','=','stores.user_id')
           ->whereUserId($this->user->id)
           ->selectRaw('stores.*')
            ->first();

         $products = Product::leftJoin('sub_categories','sub_categories.id','=','products.sub_category_id')
            ->leftJoin('product_categories','product_categories.id','=','sub_categories.product_category_id')
            ->leftJoin('users','users.id','=','product_categories.user_id')
            ->where('users.id',$this->user->id)
            ->selectRaw('products.*,users.name as user_name')
            ->take(10)->get();
        $categories = ProductCategory::all('id','name');
        $sub_categories = SubCategory::all();

            return view('store.index',compact('store','products','categories','sub_categories','user'));
    }

    public function getAddStore(){
            return view('store.add_store');
    }

    public function getEditStore(){

//        $store = Store::where('stores.user_id',$this->user->id)->first();
        $store = $this->store;

        return view('store.edit_store',compact('store'));
    }

    public function postUpdateStore(Request $request){
        $this->store->update([
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

            $input['imagename'] = $this->user->id;


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
            'user_id' => $this->user->id,
        ]);

        $user = User::find($this->user->id);
        $user->has_store = true;
        $user->save();

        $slug = Store::whereId($id)->first()->slug;
        return \response()->json(['message' => 'success','status'=>200,'slug'=> $slug])->setStatusCode(200);
    }

    public function getStoreSettings(){

          $store = Store::leftJoin('package_signups','package_signups.store_id','=','stores.id')
              ->leftJoin('packages','packages.id','=','package_signups.package_id')
              ->selectRaw('stores.*,packages.name as package_name')
            ->where('stores.user_id',$this->user->id)->first();

        return view('store.settings',compact('store'));
    }


    public function postStoreSettings(Request $request)
    {
        try {

            $slug = SlugService::createSlug(Store::class, 'slug', $request->name);
            if ($request->hasFile('image') && $request->hasFile('banner-image')) {

                Store::processAllImages($request, $slug);

            } elseif ($request->hasFile('image')) {
                $this->validate($request, [
                    'name' => 'required', //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'phone_number' => 'required', 'email' => 'required', 'address' => 'required'
                ]);

                Store::processLogo($request, $slug);

            } elseif ($request->hasFile('banner-image')) {

                Store::processBannerImage($request, $slug);

            } else {
                $this->store->update([
                    'name' => $request->name,
                    'phone_number' => $request->phone_number,
                    'email' => $request->email,
                    'address' => $request->address,
                    'city' => $request->city,
                    'business_type' => $request->business_type,
                    'domain' => $request->domain,
                    'about' => $request->about,
                    'slug' => $slug,
                    'user_id' => $this->user->id,
                    'colour' => $request->colour,
                    'enabled' => $request->enabled == "on" ? true : false
                ]);
            }
            return \response()->json(['message' => 'success'])->setStatusCode(200);
        }catch (\Exception $e){
            return \response()->json(['message' => 'Action cannot be completed at this time!'])->setStatusCode(500);
        }
    }




    public function getMarketPlaceSignUp(){

        $packages = Package::whereType('marketplace_upgrade')->get();
        return view('store.marketplace-signup',compact('packages'));
    }

    public function getMarketPlacePackages($package_id){

        return Package::whereType('marketplace_upgrade')->find($package_id);
    }


    public function getAddProduct(Request $request){

        if(!$this->user->has_store){

            return redirect('');
        }
        $categories = ProductCategory::all('id','name');

         $productCounts = Product::whereStoreId($this->store->id)->count();
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

        $productCounts = Product::whereStoreId($this->store->id)->count();
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

//            Storage::disk('s3')->put("/products/$image_name", $img->getEncoded());
            Storage::disk('public')->put("/products/$image_name", $img->getEncoded());

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']);

            Product::create([
                'id' => $id,
                'name' => $request->name,
                'user_id' =>$this->user->id,
                'description'=> $request->description,
                'price' => $request->price,
                'image' => $input['imagename'],
                'sub_category_id' => $request->sub_category,
                'feature' => $request->feature == 'on'? true: false,
                'published' => $request->published == 'on' ? true : false,
                'show_buy_button' => $request->show_buy_button == 'on' ? true : false,
                'ad' => false,
                'store_id' => $this->store->id
            ]);
        }
    }

    public function getEditProduct($product_id){

        $product = Product::find($product_id);
        $categories = ProductCategory::all('id','name');
        return view('store.edit_product',compact('product','categories'));

    }

    /**
     * @param $request Request
     */
    private function validateProductRequest($request){
        if($request->hasFile('image')){
            $this->validate($request,[
                'name' =>'required',
                'image' => 'dimensions:min_width=300,min_height=300',
                'description' => 'required',
                'sub_category' =>'required',
                'price' => 'required'
            ]);
        }else {
            $this->validate($request,[
                'name' =>'required',
                'description' => 'required',
                'sub_category' =>'required',
                'price' => 'required'
            ]);
        }
    }

    public function postUpdateProduct(Request $request,$product_id){

        $this->validateProductRequest($request);

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
                        'user_id' =>$this->user->id
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
                'user_id' =>$this->user->id,
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
                'user_id' => $this->user->id,
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

        $product = Product::find($request->pk);
        switch($request->name){
            case"published":
                $product->update([
                    'published' => $request->value
                ]);
                break;
            case"price":
                $product->update([
                    'price' => $request->value
                ]);
                break;
            case"name":
                $product->update([
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

         $threshold = PackageSignup::getUserPackageThreshold();
         $productCounts = Product::whereUserId($this->user->id)->count();
         $products_limit = $threshold - $productCounts;

        return view('store.quick_add_product',
            compact('sub_categories','products_limit')
        );

     }


    /**
     * @param Request $request
     *
     */
    public function postQuickAddProducts(Request $request){

    try {
        if ($request->hasFile('image')) {
            $this->validate($request, [
                'name' => 'required',
                'price' => 'required'
            ]);
        }

        $date_time = date('Ymdhis');
        $user_id = $this->user->id;
        $names = $request->get('name');
        $prices = $request->get('price');
        $sub_categories = $request->get('sub_category');
        $images = $request->file('image');

        $threshold = PackageSignup::getUserPackageThreshold();
        $productCounts = Product::whereUserId($user_id)->count();
        $products_limit = $threshold - $productCounts;

        $test = true;
        if (count($names) + $productCounts > $threshold) {
//        if($test){
            return \response()->json(['limit' => $products_limit])
                ->setStatusCode(\Symfony\Component\HttpFoundation\Response::HTTP_PRECONDITION_FAILED);

        } else {
            foreach ($names as $key => $name) {
                $product_id = Uuid::generate();

                $rules = array('image' => 'dimensions:min_width=300,min_height=300'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                $validator = Validator::make(array('image' => $images[$key]), $rules);
                if ($validator->passes()) {
                    $input['imagename'] = $product_id . $date_time . '.' . $images[$key]->getClientOriginalExtension();
                    Product::processImage($images[$key], $input['imagename']);

                    Product::create([
                        'id' => $product_id,
                        'name' => $name,
                        'user_id' => $user_id,
                        'price' => $prices[$key],
                        'description' => '',
                        'image' => $input['imagename'],
                        'sub_category_id' => $sub_categories[$key],
                        'store_id' => $this->store->id,
                    ]);
                }

            }
            return \response()->json(['message' => 'successful saved ' . count($names) . ' product(s)', 'products_limit' => $products_limit])->setStatusCode(200);
        }
    }catch (\Exception $e){
//        if($e instanceof Exc)
        return \response()->json(['message' => 'There was an error processing your request '])
            ->setStatusCode(\Symfony\Component\HttpFoundation\Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getAllProducts(Request $request){
        $builder = Product::leftJoin('stores','stores.id','=','products.store_id')
            ->where('products.user_id',$this->user->id)
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
        $categories = ProductCategory::all();

        return view('store.checkout',compact('user','store','user_id','slug','categories'));
    }

    public function postCheckOut($user_id){

        if(Auth::guest()){

            return Response::json(['data'=>'Unauthorized','status' => 401]);

        }else {
            $order_id = Uuid::generate();
            $text = "";
            $store = Store::whereUserId($user_id)->first();

            Order::create([
                'id' =>$order_id,
                'amount' => \Gloudemans\Shoppingcart\Facades\Cart::subtotal(),
                'user_id' => $this->user->id
            ]);

            foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $item){

                $text.= "item :  $item->name => GHS $item->price * $item->qty \n";
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
            $shop = Store::whereUserId($this->user->id)->first();

//            Notification::send(Order::first(), new NewOrder($this->user,$shop,$text,$amount,$qty));

            $order = Order::with(['items','user' =>function($query){}])->whereId($order_id)->first();
            return view('store.partials.order_details',compact('order_id','order','user_id'));
        }
    }

    public function getOrders(){
        $orders = Order::leftJoin('users','users.id','=','orders.user_id')
            ->whereUserId($this->user->id)
            ->selectRaw('orders.*,users.name')
            ->paginate();

        return view('store.orders',compact('orders'));
    }

    public function getOrderItems($order_id){

         $order = Order::with(['items','user' =>function($query){}])->whereId($order_id)->first();

        return view('store.order_items',compact('order'));
    }

    public function saveMainCategories()
    {
        $mainCategories = ['Clothing','Beauty & Accessories','Home & Appliances','Electronics',
            'Arts & Photography','Agric & Food'];
        foreach ($mainCategories as $key => $category) {

            ProductCategory::create([
                'id' => Uuid::generate(),
                'user_id' =>$this->user->id,
                'name' => $category,
                'image' => '',
            ]);

        }
    }

    public function getPackages(){
        $packages = \App\Package::whereType('upgrade_package')->orderBy('charge')->take(4)->get();
        $user =$this->user;

        return view('store.packages',compact('packages','user'));
    }

    public function postMpowerDirectPay(Request $request,$amount)
    {
        try{
            $mpowerpayment = new MpowerPayment();
            $mpowerpayment->MTN=$request->mobile_money;
//          $results = $mpowerpayment->MobilePayment('Frederick','0241715148','frederickankamah988@gmail.com',1);
            $name = $request->name;
            $phone_number = $request->phone_number;
            $email =  $this->user->email;
            $results = $mpowerpayment->MobilePayment($name,$phone_number,$email,$amount);

        }catch(MpowerPaymentException $e){

        }

        Payment::create([
            'id' =>Uuid::generate(),
            'response_code' => $results['response_code'],
            'response_text' => $results['response_text'],
            'description' =>   $results['description'],
            'transaction_id' => $results['transaction_id'],
            'token'         => $results['token'],
            'mobile_invoice_no' => $results['mobile_invoice_no'],
            'user_id'           => $this->user->id,
            'amount'            => $amount,
            'package_id'        => $request->package_id
        ]);

        return $results;

    }

    public function sendSms($recipient, $message, $sender_alias){

        $client = new Client();
        $body = compact('recipient', 'message', 'sender_alias');

         $response = $client->post( \env('SMS_API_URL_ENDPOINT'),
            [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'ApiKey' => \env('sms_api_key'),
                    'ApiSecret' => \env('sms_api_secret')
                ],
                'form_params'=>[$body]
            ]
        );

//        return json_decode($response, true);
    }

    public function payment(){
        return \response()->json(['message'=>new HubtelPaymentAdapter()]);
    }

    public function payCallBack(){
        return \response()->json(['message'=> 'success']);
    }

    //TODO: use this template for individual stores. http://preview.themeforest.net/item/smarttech-ecommerce-html-template/full_screen_preview/20756752?_ga=2.66687846.939882631.1510791577-1918128547.1509975764
}
