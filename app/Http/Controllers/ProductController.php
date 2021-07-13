<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;
class ProductController extends Controller
{
  
    public function index($id){
      return Product::index($id);
    }
    public function add(Request $request){
    // return $request->file;
      if(Auth::user()->is_admin!=0){
        $image = new Product;

        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = $imagePath->getClientOriginalName();
            $path = $request->file('file')->storeAs('/images/products/', $imageName, 'public');
        } 
          $image->name = $request->productName;
          $image->image_path =$path;
          $image->price=$request->productPrice;
          $image->category_id=$request->productCategory;
          $image->description=$request->productDescription;
          $image->origin=$request->productOrigin;
          $image->brand=$request->productBrand;
          $image->save();
      }
    }
}
