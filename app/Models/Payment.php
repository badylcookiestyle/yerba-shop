<?php

namespace App\Models;


use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Users;
 use Auth;
use Illuminate\Support\Facades\DB;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public static function index(){
        $userId=Auth::id();
        $cartId=Cart::where('user_id',$userId)->where('expired',0)->pluck('id')->first();
        $itemsInCart=CartItem::where('cart_id',$cartId)->count();
        if(Auth::check() && $itemsInCart>0){
        return view('shop.payment');}
        return redirect('/cart');
    }
    public static function payment($request){
        if (Auth::check()){
            $userId=Auth::id();
            $cartId=Cart::where('user_id',$userId)->where('expired',0)->pluck('id')->first();
            $itemsInCart=CartItem::where('cart_id',$cartId)->count();
            if(isset($cartId)){

                Cart::where('id',$cartId)->update(['expired'=>1]);
                Payment::insert(['user_id'=>$userId,
                    'cart_id'=>$cartId,
                    'status'=>'accepted',
                    'delivery_option'=>$request->delivery_option,
                    'city'=>$request->city,
                    'state'=>$request->state,
                    'zip'=>$request->zip,
                    'street'=>$request->street,
                    'house'=>$request->house
                ]);
            }
            return response()->json(['success' =>'-']);
        }

    }
    public static function get($id){
            $products=DB::select("SELECT DISTINCT products.id,products.name,products.brand,cart_items.quantity,orders.status FROM orders INNER JOIN carts ON orders.cart_id=carts.id INNER JOIN  cart_items on carts.id=cart_items.cart_id inner join products on cart_items.product_id = products.id WHERE orders.id=?",[$id]);
            return response()->json(['success' => $products]);
        }
        public static function changeStatus($request){
            Payment::where('id',$request->id)->update(['status'=>$request->status]);
            return response()->json(['success' =>'-']);
        }
        public static function details($id){
            $userId=Auth::id();
            if(Auth::user()->is_admin==0){
            $products=DB::select("SELECT  products.price,products.origin,products.id,products.name,products.brand,cart_items.quantity,orders.status,products.image_path  FROM orders INNER JOIN carts ON orders.cart_id=carts.id INNER JOIN  cart_items on carts.id=cart_items.cart_id inner join products on cart_items.product_id = products.id WHERE orders.id=? AND orders.user_id=?",[$id,$userId]);
            if(isset($products[0])){
                return view('details',['products'=>$products]);
            }
            return  redirect('home');}
            return redirect('admin');
        }
    //}
}
