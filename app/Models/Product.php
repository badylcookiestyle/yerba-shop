<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Category;
use App\Models\User;
use Auth;
use App\Models\Product;
use Illuminate\Http\Request;
use File;
class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    public static function index($id){
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
    public static function add($request){

        if (Auth::user()->is_admin != 0) {


            $imagePath = $request->file('file');
            $imageName = $imagePath->getClientOriginalName() . time();
            $path = $request->file('file')->storeAs('', $imageName, 'public');
            $imagePath->move(public_path('\images\products'), $imageName);
            $categoryId = Category::where("name", $request->productCategory)->pluck('id')->first();
            $product = new Product;
            $product->name = $request->productName;
            $product->image_path = $path;
            $product->price = $request->productPrice;
            $product->category_id = $categoryId;
            $product->description = $request->productDescription;
            $product->origin_id = $request->productOrigin;
            $product->brand_id = $request->productBrand;
            $product->save();
            Stock::insert(['product_id' => $product->id, 'quantity' => $request->productQuantity]);
            return response()->json(['success' => 'working', 'id' => $product->id]);
        }
    }
    public static function edit($request){
        if ($request->file('file')) {
            //--- deleting old img
            $oldImage = Product::where('id', $id)->pluck('image_path')->first();
            $oldPath = public_path('images/products/' . $oldImage);
            File::delete($oldPath);
            //--- adding new img
            $imagePath = $request->file('file');
            $imageName = $imagePath->getClientOriginalName() . time();
            $path = $request->file('file')->storeAs('', $imageName, 'public');
            $imagePath->move(public_path('\images\products'), $imageName);
            Product::where("id", $request->productIdEdit)
                ->update(['name' => $request->productNameEdit,
                    'price' => $request->productPriceEdit,
                    'category_id' => $request->productCategoryEdit,
                    'description' => $request->productDescriptionEdit,
                    'origin' => $request->productOriginEdit,
                    'brand' => $request->productBrandEdit,
                    'image_path' => $path
                ]);
            return;
        }
        Product::where("id", $request->productIdEdit)
            ->update(['name' => $request->productNameEdit,
                'price' => $request->productPriceEdit,
                'category_id' => $request->productCategoryEdit,
                'description' => $request->productDescriptionEdit,
                'origin' => $request->productOriginEdit,
                'brand' => $request->productBrandEdit]);
        return;
    }
    public static function deleteProduct($id){
        $image = Product::where('id', $id)->pluck('image_path')->first();
        $path = public_path('images/products/' . $image);
        File::delete($path);
        Stock::where('product_id', $id)->delete();

        $currentProduct = Product::find($id);
        $currentProduct->delete($id);
        return response()->json(['success' => 'working', 'id' => $id]);
    }
}
