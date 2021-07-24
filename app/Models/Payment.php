<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public static function payment($request){
        if (Auth::check()){
            $userId=Auth::id();
            $cartId=Cart::where('user_id',$userId)->where('expired',0)->pluck('id')->first();
            if(isset($cartId)){

                Cart::where('id',$cartId)->update(['expired'=>0]);
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
        }
        return response()->json(['success' =>'-']);
    }
    public static function get($id){
            $products=DB::select("SELECT DISTINCT products.id,products.name,products.brand,cart_items.quantity,orders.status FROM orders INNER JOIN carts ON orders.cart_id=carts.id INNER JOIN  cart_items on carts.id=cart_items.cart_id inner join products on cart_items.product_id = products.id WHERE orders.id=?",[$id]);
            return response()->json(['success' => $products]);
        }
        public static function changeStatus($request){
            Payment::where('id',$request->id)->update(['status'=>$request->status]);
            return response()->json(['success' =>'-']);
        }
    //}
}
