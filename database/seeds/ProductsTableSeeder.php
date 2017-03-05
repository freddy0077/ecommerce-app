<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private function saveSubCategory($id,$name,$category_id){
        \App\SubCategory::create([
            'id' => $id,
            'name' => $name,
            'product_category_id' => $category_id
        ]);
    }

    public function run()
    {

        $sub_category_id = Webpatser\Uuid\Uuid::generate();
        $store_id = \Webpatser\Uuid\Uuid::generate();
        $user_id = 1;
        $categories = ['Clothing','Beauty & Accessories','Home Appliances','Electronics','Arts & Photography','Agric & Food'];
//
        \Illuminate\Support\Facades\DB::table('users')->insert([
                'name'    => 'Frederick Ankamah',
                'email'   => 'frederickankamah988@gmail.com',
                'password' => bcrypt('topman88'),
                'gender'  => 'male'
            ]
        );
//
//
//        \App\Store::create([
//            'id' => $store_id,
//            'user_id' => $user_id,
//            'name'  => 'Shop 1',
//            'domain'  => 'store1.shopaholick.dev',
//            'city' => 'Accra'
//        ]);


        foreach($categories as $key=>$category){
            $category_id = \Webpatser\Uuid\Uuid::generate();


//            $categories_id = \Webpatser\Uuid\Uuid::generate();
            $subcategory_id = \Webpatser\Uuid\Uuid::generate();


                \App\ProductCategory::create([
                    'id' => $category_id ,
                    'user_id' => $user_id,
                    'name' => $category,
                    'image'  => 'carousel-07.jpg'

                ]);

                switch($category){
                    case "Clothing":
                        $this->saveSubCategory($subcategory_id,'Men',$category_id);
//                    $this->saveSubCategory($subcategory_id,'Women',$categories_id);
                        break;
                    case "Beauty & Accessories":
                        $this->saveSubCategory($subcategory_id,"Men's",$category_id);
                        break;

                    case "Home Appliances":
                        $this->saveSubCategory($subcategory_id,"Decor",$category_id);
                        break;

                    case "Electronics":
                        $this->saveSubCategory($subcategory_id,"Computers",$category_id);
//                    $this->saveSubCategory($subcategory_id,"Phones",$categories_id);
                        break;
                }

            for($index =0; $index < 100; $index++){

                \App\Product::create([
                    'id' => \Webpatser\Uuid\Uuid::generate(),
                    'store_id' => $store_id,
                    'name' => 'product '.$index,
                    'description' => 'Description'.$index,
                    'price'=> 5*$index,
                    'image' => 'carousel-07.jpg',
                    'sub_category_id' => $subcategory_id,
                    'feature' => true,
                    'published' => true,
                    'show_buy_button' => true,
                    'ad' => true,
                    'like_counts' => $index
                ]);
            }

        }

        }
}
