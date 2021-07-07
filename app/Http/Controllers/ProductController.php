<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;
class ProductController extends Controller
{
    public function index($id){
        $product=Product::where('id',$id)->first();
        $inStock=Stock::select('quantity')
            ->where('product_id',$id)
            ->first()
            ->quantity;
        if($product !==null){
        return view('product.index',['product'=>$product,'inStock'=>$inStock]);
        }
        return view('product.index');
    }
}
