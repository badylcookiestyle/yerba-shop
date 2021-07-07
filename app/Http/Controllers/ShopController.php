<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ShopController extends Controller
{
    public function index(){
        $products=Product::select("id","name","price","image_path")->get();
        return view('shop.index')->with("products",$products);
    }
}
