<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $mainCategories = ['Clothing','Beauty & Accessories','Appliances','Electronics',
                               'Arts & Photography','Agric & Food'];


    private $user_names = ['frederickankamah988','Evans','Sandra','Abigail','Deborah'];

    private function saveSubCategory($id,$name,$category_id){
        \App\SubCategory::create([
            'id' => $id,
            'name' => $name,
            'product_category_id' => $category_id
        ]);
    }

    private function saveUsers(){
      foreach($this->user_names as $key => $value){
          \App\User::create([
              'name' => $value,
              'email' => "$value@gmail.com",
              'password' => bcrypt('topman88'),
              'phone_number' => "024012025$key",
              'has_store'    => true,
              'admin'       => true
          ]);
      }
    }

    private function saveProducts($user_id,$id,$name,$price,$store_id,$sub_category_id){
        \App\Product::create([
            'id' => $id,
            'name' => $name,
            'user_id' => $user_id,
            'price' => $price,
            'description'=>"",
            'ad' => true,
            "image" => 'samsung-system.jpg',
            'store_id' => $store_id,
            'sub_category_id' => $sub_category_id,
            'sale'  => true,
            'sale_price'   => $price > 0 ? $price-1:$price
        ]);
        echo "name: $name => id: $id \n";

    }

    private function saveShops($id,$name,$user_id){

        \App\Store::create([
            'id' => $id,
            'name' => $name,
            'email' => "$name@gmail.com",
            'phone_number' => '0240120250',
            'user_id'      => $user_id,
            'domain' => "$name@shopaholicks.com",
            'image'  => 'shop4.jpg',
            'store_banner' => 'Perfume-AD-Slim-Banner.jpg'
        ]);

        echo "$name saved" ;
    }

    private function savePackages($id,$name,$charge,$desc,$type){

        \App\Package::create([
            'id' => $id,
            'name' => $name,
            'charge' => $charge,
            'description' => $desc,
            'number_of_products' => 50,
            'duration' => 30,
            'payment_link' => '',
            'type' => $type
        ]);

        echo "$name saved";

    }

    public function run()
    {

//        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//        \Illuminate\Support\Facades\DB::statement('truncate table users');
//        \Illuminate\Support\Facades\DB::statement('truncate table product_categories');
//        \Illuminate\Support\Facades\DB::statement('truncate table sub_categories');
//        \Illuminate\Support\Facades\DB::statement('truncate table products');
//        \DB::statement('truncate table cities');
//        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
//        \Illuminate\Support\Facades\DB::statement("TRUNCATE TABLE posts");
//        \Illuminate\Support\Facades\DB::statement("TRUNCATE TABLE users CASCADE");

//        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//        \Illuminate\Support\Facades\DB::statement('ALTER TABLE b DISABLE TRIGGER ALL');
//        \App\Product::truncate();
//        \App\ProductCategory::truncate();
//        \App\SubCategory::truncate();
//        \App\User::truncate();


        $this->saveUsers();


        $store_id = \Webpatser\Uuid\Uuid::generate();
        $store_id2 = \Webpatser\Uuid\Uuid::generate();
        \App\Store::create([
            'id' => $store_id,
            'name' => 'Evergreen Store',
            'email' => 'evergreen@gmail.com',
            'phone_number' => '0240120250',
            'user_id'      => 1,
            'domain' => 'evergreen-store@shopaholicks.com',
            'image'  => 'shop3.jpg',
            'store_banner' => 'Perfume-AD-Slim-Banner.jpg'

        ]);

        \App\Store::create([
            'id' => $store_id2,
            'name' => 'Evanacus',
            'email' => 'evanacus@gmail.com',
            'phone_number' => '0240120250',
            'user_id'      => 2,
            'domain' => 'evanacus@shopaholicks.com',
            'store_banner' => 'Perfume-AD-Slim-Banner.jpg'

        ]);



        \App\User::create([
            'name' => 'Kojo',
            'email' => "kojo@shopaholicks.com",
            'password' => bcrypt('password'),
            'phone_number' => "0000000000",
            'has_store'    => true,
            'admin'       => true
        ]);
        echo "Kojo's account created  \n";

        for($i = 0; $i < 10; $i++){
            $shop_id = \Webpatser\Uuid\Uuid::generate();
            $package_id = \Webpatser\Uuid\Uuid::generate();
            $this->saveShops($shop_id,"Shop$i",6);
            if($i > 5){
                $this->savePackages($package_id,"Package$i",50,"Package$i description","upgrade_package");
            }else{
                $this->savePackages($package_id,"Package$i",50,"Package$i description","marketplace_upgrade");
            }

            \App\MarketplaceSignup::create([
                'id' => \Webpatser\Uuid\Uuid::generate(),
                'user_id' => 6 ,
                'store_id' => $shop_id,
                'package_id' => $package_id
            ]);
            echo "Market place signup for  $shop_id created \n" ;
        }

        foreach($this->mainCategories as $key=>$category) {

            $id = Webpatser\Uuid\Uuid::generate();
            $categoryObject = new \App\ProductCategory();
            $categoryObject->id = $id;
            $categoryObject->user_id = 1;
            $categoryObject->name = $category;
            switch($category){
                case"Appliances":
                    $categoryObject->image = 'appliances.jpg';
                    break;
                case"Electronics":
                    $categoryObject->image = 'electronics.jpeg';
                    break;
                case "Agric & Food":
                    $categoryObject->image = 'agric&food.jpeg';
                    break;
                default:
                    $categoryObject->image = '';
            }
            $categoryObject->save();
            echo " $category product category saved \n";

                switch($category){
                    case "Clothing":
                        $men_id = \Webpatser\Uuid\Uuid::generate();
                        $this->saveSubCategory($men_id,'Men',$id);
                        for($i = 0; $i < 20; $i++){
                            $this->saveProducts(1,\Webpatser\Uuid\Uuid::generate(),"system$i",5*$i,$store_id,$men_id);
                            $this->saveProducts(2,\Webpatser\Uuid\Uuid::generate(),"men$i",5*$i,$store_id2,$men_id);
                        }

//                        for($i = 0; $i < 10; $i++){
//                            $this->saveProducts(\Webpatser\Uuid\Uuid::generate(),"new men$i",10*$i,$store_id2,$men_id);
//                        }
////
                        $women_id = \Webpatser\Uuid\Uuid::generate();
//
                        $this->saveSubCategory($women_id,'Women',$id);
//
                        for($i = 0; $i < 20; $i++){
                            $this->saveProducts(1,\Webpatser\Uuid\Uuid::generate(),"system$i",5*$i,$store_id,$women_id);
                            $this->saveProducts(2,\Webpatser\Uuid\Uuid::generate(),"system$i",5*$i,$store_id2,$women_id);
                        }
//
                        $kidsbabies_id = \Webpatser\Uuid\Uuid::generate();
                        $this->saveSubCategory($kidsbabies_id,'Kids & Babies',$id);

                        for($i = 0; $i < 20; $i++){
                            $this->saveProducts(1,\Webpatser\Uuid\Uuid::generate(),"system$i",7*$i,$store_id,$kidsbabies_id);
                            $this->saveProducts(2,\Webpatser\Uuid\Uuid::generate(),"Kids&Babies$i",7*$i,$store_id2,$kidsbabies_id);
                        }

                        break;
//
//                    case "Beauty & Accessories":
//                        $this->saveSubCategory(\Webpatser\Uuid\Uuid::generate(),'Men',$id);
//                        $this->saveSubCategory(\Webpatser\Uuid\Uuid::generate(),'Women',$id);
//
//                        $kids_id = \Webpatser\Uuid\Uuid::generate();
//                        $this->saveSubCategory($kids_id,'Kids',$id);
//
////                        for($i = 0; $i < 10; $i++){
////                            $this->saveProducts(\Webpatser\Uuid\Uuid::generate(),"Kids$i",7*$i,$store_id,$kids_id);
////                        }
//                        break;
//
//                    case "Home & Appliances":
//                        $appliance_id = \Webpatser\Uuid\Uuid::generate();
//                        $this->saveSubCategory($appliance_id,'Appliances',$id);
//
////                        for($i = 0; $i < 10; $i++){
////                            $this->saveProducts(\Webpatser\Uuid\Uuid::generate(),"appliance$i",7*$i,$store_id,$appliance_id);
////                        }
//
//                        $this->saveSubCategory(\Webpatser\Uuid\Uuid::generate(),'Decor',$id);
//                        break;
//
//                    case "Electronics":
//                        $this->saveSubCategory(\Webpatser\Uuid\Uuid::generate(),'Computers',$id);
//                        $this->saveSubCategory(\Webpatser\Uuid\Uuid::generate(),'Phones',$id);
//                        break;
//
//                    case "Arts & Photography":
////                    $this->saveSubCategory(\Webpatser\Uuid\Uuid::generate(),'Appliances',$id);
////                    $this->saveSubCategory(\Webpatser\Uuid\Uuid::generate(),'Decor',$id);
//                        break;
                }
            }

        }
}
