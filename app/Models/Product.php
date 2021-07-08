<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
