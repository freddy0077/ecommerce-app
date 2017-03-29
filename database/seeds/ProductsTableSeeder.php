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

    private function saveProducts($id,$name,$price,$store_id,$sub_category_id){
        \App\Product::create([
            'id' => $id,
            'name' => $name,
            'user_id' => 1,
            'price' => $price,
            'description'=>"",
            'ad' => true,
            "image" => 'soap.jpg',
            'store_id' => $store_id,
            'sub_category_id' => $sub_category_id
        ]);
        echo "name: $name => id: $id \n";

    }

//    private function saveMainCategories(){
//
//
//        $id = Webpatser\Uuid\Uuid::generate();
//        $categoryObject = new \App\ProductCategory();
//        $categoryObject->id = $id;
//        $categoryObject->user_id = 1;
//        $categoryObject->name = $category;
//        $categoryObject->image = 'carousel-07.jpg';
//        $categoryObject->save();
//        echo  " $category product category saved \n";
//    }


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


//        \App\Package::create([
//            'id' => \Webpatser\Uuid\Uuid::generate(),
//            'name' => 'Free Package',
//            'charge' => 50,
//            'description' => 'Free Package ',
//            'number_of_products' => 50,
//            'duration' => 90,
//            'payment_link' => 'https://app.mpowerpayments.com/click2pay-redirect/5f59dbe3ee305b1cf425f921',
//            'type' => 'upgrade_package'
//        ]);

        $this->saveUsers();


        $store_id = \Webpatser\Uuid\Uuid::generate();
        $store_id2 = \Webpatser\Uuid\Uuid::generate();
        \App\Store::create([
            'id' => $store_id,
            'name' => 'Evergreen Store',
            'email' => 'evergreen@gmail.com',
            'phone_number' => '0240120250',
            'user_id'      => 1,
            'domain' => 'evergreen-store@shopaholicks.com'
        ]);

        \App\Store::create([
            'id' => \Webpatser\Uuid\Uuid::generate(),
            'name' => 'Evanacus',
            'email' => 'evanacus@gmail.com',
            'phone_number' => '0240120250',
            'user_id'      => 2,
            'domain' => 'evanacus@shopaholicks.com'
        ]);

//        \App\Package::create([
//            'id' => \Webpatser\Uuid\Uuid::generate(),
//            'name' => 'Basic Subscription',
//            'charge' => 25,
//            'description' => 'Basic subscription (50 products ) for 30 days',
//            'number_of_products' => 50,
//            'duration' => 30,
//            'payment_link' => 'https://app.mpowerpayments.com/click2pay-redirect/73b1fec15e149ed17391af7b'
//        ]);
//


//
        foreach($this->mainCategories as $key=>$category) {

            $id = Webpatser\Uuid\Uuid::generate();
            $categoryObject = new \App\ProductCategory();
            $categoryObject->id = $id;
            $categoryObject->user_id = 1;
            $categoryObject->name = $category;
            $categoryObject->image = 'carousel-07.jpg';
            $categoryObject->save();
            echo " $category product category saved \n";



//
                switch($category){
                    case "Clothing":
                        $men_id = \Webpatser\Uuid\Uuid::generate();
                        $this->saveSubCategory($men_id,'Men',$id);
                        for($i = 0; $i < 10; $i++){
                            $this->saveProducts(\Webpatser\Uuid\Uuid::generate(),"men$i",5*$i,$store_id,$men_id);
                        }

//                        for($i = 0; $i < 10; $i++){
//                            $this->saveProducts(\Webpatser\Uuid\Uuid::generate(),"new men$i",10*$i,$store_id2,$men_id);
//                        }
////
                        $women_id = \Webpatser\Uuid\Uuid::generate();
//
                        $this->saveSubCategory($women_id,'Women',$id);
//
                        for($i = 0; $i < 10; $i++){
                            $this->saveProducts(\Webpatser\Uuid\Uuid::generate(),"Women$i",5*$i,$store_id,$women_id);
                        }
//
                        $kidsbabies_id = \Webpatser\Uuid\Uuid::generate();
                        $this->saveSubCategory($kidsbabies_id,'Kids & Babies',$id);

                        for($i = 0; $i < 10; $i++){
                            $this->saveProducts(\Webpatser\Uuid\Uuid::generate(),"Kids&Babies$i",7*$i,$store_id,$kidsbabies_id);
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
