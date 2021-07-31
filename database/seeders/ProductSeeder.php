<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert(['name'=>'pajarito']);
        DB::table('brands')->insert(['name'=>'verde mate']);
        DB::table('origin_countries')->insert(['name'=>'brazil']);
        DB::table('origin_countries')->insert(['name'=>'africa']);
        DB::table('categories')->insert([
            'name' => 'tea',
        ]);
        DB::table('categories')->insert([
            'name' => 'kits',
        ]);
        DB::table('categories')->insert([
            'name' => 'tools',
        ]);
        DB::table('products')->insert([
            'name' => 'yerba1',
            'price'=>'69',
            'category_id'=>'1',
            'brand_id'=>'1',
            'origin_id'=>'1',
            'description'=>'description',
            'image_path'=>'yerba1.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'yerba2',
            'price'=>'62',
            'brand_id'=>'1',
            'origin_id'=>'1',
            'category_id'=>'2',
            'description'=>'description2',
            'image_path'=>'yerba2.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'yerba3',
            'price'=>'22',
            'brand_id'=>'1',
            'origin_id'=>'1',
            'category_id'=>'2',
            'description'=>'description2',
            'image_path'=>'yerba3.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'yerba4',
            'price'=>'24',
            'brand_id'=>'2',
            'origin_id'=>'2',
            'category_id'=>'2',
            'description'=>'description2',
            'image_path'=>'yerba4.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'yerba5',
            'price'=>'14',
            'brand_id'=>'2',
            'origin_id'=>'2',
            'category_id'=>'2',
            'description'=>'description2',
            'image_path'=>'yerba5.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'yerba6',
            'price'=>'16',
            'brand_id'=>'2',
            'origin_id'=>'1',
            'category_id'=>'2',
            'description'=>'description2',
            'image_path'=>'yerba6.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'yerba7',
            'price'=>'16',
            'brand_id'=>'2',
            'origin_id'=>'1',
            'category_id'=>'2',
            'description'=>'description2',
            'image_path'=>'yerba7.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'yerba8',
            'price'=>'16',
            'brand_id'=>'2',
            'origin_id'=>'2',
            'category_id'=>'2',
            'description'=>'description2',
            'image_path'=>'yerba8.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'yerba9',
            'price'=>'16',
            'brand_id'=>'2',
            'origin_id'=>'1',
            'category_id'=>'2',
            'description'=>'description2',
            'image_path'=>'yerba9.jpg',
        ]);
        DB::table('stock')->insert([
            'product_id' =>'1',
            'quantity'=>'12',
        ]);
        DB::table('stock')->insert([
            'product_id' =>'2',
            'quantity'=>'21',
        ]);
        DB::table('stock')->insert([
            'product_id' =>'3',
            'quantity'=>'11',
        ]);
        DB::table('stock')->insert([
            'product_id' =>'4',
            'quantity'=>'31',
        ]);
        DB::table('stock')->insert([
            'product_id' =>'5',
            'quantity'=>'81',
        ]);
        DB::table('stock')->insert([
            'product_id' =>'6',
            'quantity'=>'41',
        ]);
        DB::table('stock')->insert([
            'product_id' =>'7',
            'quantity'=>'11',
        ]);
        DB::table('stock')->insert([
            'product_id' =>'8',
            'quantity'=>'11',
        ]);
        DB::table('stock')->insert([
            'product_id' =>'9',
            'quantity'=>'9',
        ]);
    }
}
