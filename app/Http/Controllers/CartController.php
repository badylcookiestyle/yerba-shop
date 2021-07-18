<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function index(){
        if (Auth::check()){
            $products=Cart::select(DB::raw('products.*,cart_items.quantity,cart_items.cart_id'))
                ->join('cart_items','carts.id','=','cart_items.cart_id')
                ->join('products','cart_items.product_id','=','products.id')
                ->where('carts.user_id',Auth::id())
                ->where('expired',0)->get();
            return view('shop.cart',['products'=>$products]);
        }
        return view('shop.cart');
    }
    function add(Request $request){
        if (Auth::check()) {
            if(Cart::where('user_id',Auth::id())->where('expired',0)->first()===null){
                $cart=new Cart;
                $cart->user_id=Auth::id();
                $cart->created_at=now();
                $cart->save();
                $cartId=$cart->id;

            }
            else{
                $cartId=Cart::where("user_id",Auth::id())->where('expired',0)->pluck('id')->first();
            }
            CartItem::insert(['cart_id'=>$cartId,'quantity'=>$request->quantity,'product_id'=>$request->id]);
            return $cartId;
        }
        return "not yet";
    }
    function deleteItem($id){
        CartItem::where('product_id',$id)->delete();
    }
}
