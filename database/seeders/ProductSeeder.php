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
        DB::table('products')->insert([
            'name' => 'yerba1',
            'price'=>'69',
            'category'=>'tea',
            'description'=>'description',
            'image_path'=>'anyImage_path',
        ]);
        DB::table('products')->insert([
            'name' => 'yerba2',
            'price'=>'62',
            'category'=>'tea2',
            'description'=>'description2',
            'image_path'=>'anyImage_path2',
        ]);
        DB::table('stock')->insert([
            'product_id' =>'1',
            'quantity'=>'12',
        ]);
        DB::table('stock')->insert([
            'product_id' =>'2',
            'quantity'=>'21',
        ]);
    }
}
