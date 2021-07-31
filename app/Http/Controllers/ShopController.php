<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Origin;
use App\Models\Category;
class ShopController extends Controller
{
    public function index(){
        $products=Product::select("id","name","price","image_path")->get();
        $brands=Brand::get();
        $origin=Origin::get();
        $categories=Category::get();
        return view('shop.index',['products'=>$products,'brands'=>$brands,'origins'=>$origin,'categories'=>$categories]);
    }
}
