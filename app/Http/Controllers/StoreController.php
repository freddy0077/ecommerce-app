<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Product;
use App\ProductCategory;
use App\Store;
use App\SubCategory;
use App\User;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use Webpatser\Uuid\Uuid;

class StoreController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getDashboard(){
        return view('store.dashboard');
    }

    public function getIndex(){

        $user = Auth::user();
         $store = Store::leftJoin('users','users.id','=','stores.user_id')
           ->whereUserId($user->id)
           ->selectRaw('stores.*')
            ->first();

         $products = Product::leftJoin('sub_categories','sub_categories.id','=','products.sub_category_id')
            ->leftJoin('product_categories','product_categories.id','=','sub_categories.product_category_id')
            ->leftJoin('users','users.id','=','product_categories.user_id')
            ->where('users.id',Auth::user()->id)
            ->selectRaw('products.*,users.name as user_name')
            ->take(10)->get();
        $categories = ProductCategory::all('id','name');
        $sub_categories = SubCategory::all();

            return view('store.index',compact('store','products','categories','sub_categories'));
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
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone_number' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        if(User::find(Auth::user()->id)->has_store == true){
            Store::whereUserId(Auth::user()->id)->update([
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
            return 'success';
        }

    }


    public function getAddProduct(Request $request){


        $categories = ProductCategory::all('id','name');

        return view('store.add_product',compact('categories'));
    }

    public function postAddProduct(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required'
        ]);

        $id = Uuid::generate();
        $store_id = Store::where('user_id',Auth::user()->id)->first()->id;

//        return $store_id;
        $image = $request->file('image');
        $input['imagename'] = $id.'.'.$image->getClientOriginalExtension();


        $destinationPath = public_path('/thumbnail');
        $img = Image::make($image->getRealPath());
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);

        Product::create([
            'id' => $id,
            'name' => $request->name,
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

    public function getEditProduct($product_id){

        $product = Product::find($product_id);
        $categories = ProductCategory::all('id','name');
        return view('store.edit_product',compact('product','categories'));

    }

    public function postUpdateProduct(Request $request,$product_id){

        if($request->hasFile('image')){
            $image = $request->file('image');
            $input['imagename'] = $product_id.'.'.$image->getClientOriginalExtension();


            $destinationPath = public_path('/thumbnail');
            $img = Image::make($image->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']);
        }


        if($request->hasFile('image')){
            Product::find($product_id)->update([
                'name' => $request->name,
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
                'description'=> $request->description,
                'price' => $request->price,
                'sub_category_id' => $request->sub_category_id,
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
        $names = $request->get('name');
         $prices = $request->get('price');
        $sub_categories = $request->get('sub_category');

        foreach($names as $key=>$name){
            Product::create([
                'id' => Uuid::generate(),
                'name' => $name,
                'price' => $prices[$key],
                'description' =>'',
                'sub_category_id' => $sub_categories[$key],
                'store_id' => Store::whereUserId(Auth::user()->id)->first()->id
            ]);
        }

        return ['message'=>'successful saved '.count($names).' product(s)','status'=>200];

    }

    public function getAllProducts(){

        $user = Auth::user();
        $products = Product::leftJoin('stores','stores.id','=','products.store_id')
         ->whereUserId($user->id)
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

        return view('store.checkout');
    }


}
