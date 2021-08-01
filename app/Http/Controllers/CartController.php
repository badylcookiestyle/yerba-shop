<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Stock;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ToCartRequest;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function index(){
        if (Auth::check()){
            $products=Cart::select(DB::raw('products.*,cart_items.quantity,cart_items.cart_id,stock.quantity as z,brands.name as brand,origin_countries.name as origin'))
                ->join('cart_items','carts.id','=','cart_items.cart_id')
                ->join('products','cart_items.product_id','=','products.id')
                ->join('brands','products.brand_id','=','brands.id')
                ->join('origin_countries','products.origin_id','=','origin_countries.id')
                ->join('stock','products.id','=','stock.product_id')
                ->where('carts.user_id',Auth::id())
                ->where('expired',0)->get();
            return view('shop.cart',['products'=>$products]);
        }
    }
    function add(ToCartRequest $request){
        if (Auth::check()) {
            if(Cart::where('user_id',Auth::id())->where('expired',0)->first()===null){
                $cart=new Cart;
                $cart->user_id=Auth::id();
                $cart->created_at=now();
                $cart->save();
                $cartId=$cart->id;
            }
            else{
                $cartId=Cart::where('user_id',Auth::id())->where('expired',0)->pluck('id')->first();
            }
            CartItem::insert(['cart_id'=>$cartId,'quantity'=>$request->quantity,'product_id'=>$request->id]);
            return $cartId;
        }
    }
    function editItem(ToCartRequest $request){

        $cartId=Cart::where('user_id',Auth::id())->where('expired',0)->pluck('id')->first();
        CartItem::where('cart_id',$cartId)->where('product_id',$request->id)->update(['quantity'=>$request->quantity]);
        return $request;
    }
    function deleteItem($id){
        CartItem::where('product_id',$id)->delete();
    }
}
