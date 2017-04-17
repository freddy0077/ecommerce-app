<?php

namespace App;

use App\Jobs\ProcessS3Images;
use GetStream\StreamLaravel\Eloquent\ActivityTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Webpatser\Uuid\Uuid;


class Store extends Model
{
    use Sluggable;
    use Notifiable;

    protected $fillable = ['id','user_id', 'name', 'email', 'phone_number' ,'address', 'domain',
        'city','business_type','about','colour','banner-image','enabled'];
    //

    protected $casts = ['id' =>'string'];

    protected $slack_hook_url = "https://hooks.slack.com/services/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";

    public function productCategory(){
        $this->belongsTo('App\ProductCategory');
    }

    public function user(){
        $this->belongsTo('App\User');
    }

    public function packageSignups(){
        return $this->hasMany(Store::class);
    }



    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function routeNotificationForSlack(){
        return $this->slack_hook_url;
    }

    public static function getProductsByCategory($category_id,$user_id){
       return Product::leftJoin('sub_categories','sub_categories.id','=','products.sub_category_id')
            ->leftJoin('product_categories','product_categories.id','=','sub_categories.id')
            ->leftJoin('stores','stores.id','products.store_id')
            ->where('sub_categories.id',$category_id)
            ->where('product_categories.user_id',$user_id)
            ->selectRaw('products.*')
            ->get();
    }

    public static function processAllImages(Request $request,$slug){

        $id = Uuid::generate();
        $date_time = date('Ymdhis');

        $image = $request->file('image');
//            $image_2 = $request->file('banner-image');

        $input['imagename'] = $id . $date_time . '.' . $image->getClientOriginalExtension();

        $destinationPath = public_path('images/stores');

        $img = Image::make($image->getRealPath());
        $img->resize(200, 50, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $input['imagename']);

        $image_name = $input['imagename'];

        Storage::disk('s3')->put("/images/$image_name", $img->getEncoded());

        $second_image = Image::make($image->getRealPath());
        $destinationPath = public_path('/images');
        $second_image->resize(300, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $input['imagename']);
//            $image->move($destinationPath, $input['imagename']);

        $id = Uuid::generate();
        $date_time = date('Ymdhis');

        $image_2 = $request->file('banner-image');

        $input['image2'] = 'banner' . $id . $date_time . '.' . $image_2->getClientOriginalExtension();
        $destinationPath = public_path('images/stores');
        $img2 = Image::make($image_2->getRealPath());
        $img2->resize(870, 260, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $input['image2']);

        $image_name = $input['image2'];

        Storage::disk('s3')->put("/images/$image_name", $img2->getEncoded());

        $destinationPath = public_path('/images');
        $image_2->move($destinationPath, $input['image2']);

        Store::whereUserId(Auth::user()->id)->update([
            'name' => $request->name,
            'image' => $input['imagename'],
            'store_banner' => $input['image2'],
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

    public static function processLogo(Request $request,$slug){
        $id = Uuid::generate();
        $date_time = date('Ymdhis');

        $image = $request->file('image');
//            $image_2 = $request->file('banner-image');

        $input['imagename'] = $id . $date_time . '.' . $image->getClientOriginalExtension();

        $destinationPath = public_path('images/stores');
        $img = Image::make($image->getRealPath());
        $img->resize(200, 50, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $input['imagename']);

        $image_name = $input['imagename'];

        Storage::disk('s3')->put("/images/$image_name", $img->getEncoded());

        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);

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
            'slug' => $slug,
            'user_id' => Auth::user()->id,
            'colour' => $request->colour,
            'enabled' => $request->enabled =="on" ? true :false
        ]);
    }

    public static function processBannerImage(Request $request,$slug){
        $id = Uuid::generate();
        $date_time = date('Ymdhis');

        $image_2 = $request->file('banner-image');

        $input['image2'] = 'banner' . $id . $date_time . '.' . $image_2->getClientOriginalExtension();

        $destinationPath = public_path('images/stores');
        $img2 = Image::make($image_2->getRealPath());
        $img2->resize(870, 260, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $input['image2']);
        $image_name = $input['image2'];

        Storage::disk('s3')->put("/images/$image_name", $img2->getEncoded());
//        dispatch( new ProcessS3Images($input['image2'],"$destinationPath/$image_name",'banner'));

        $destinationPath = public_path('/images');
        $image_2->move($destinationPath, $input['image2']);

        Store::whereUserId(Auth::user()->id)->update([
            'name' => $request->name,
            'store_banner' => $input['image2'],
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
}


