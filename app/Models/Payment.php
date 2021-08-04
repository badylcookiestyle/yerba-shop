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

    const GET_PRODUCT_DETAILS="SELECT  products.price,origin_countries.name as origin,products.id,products.name,brands.name as brand,cart_items.quantity,orders.status,products.image_path
                FROM orders
                INNER JOIN carts ON orders.cart_id=carts.id
                INNER JOIN  cart_items on carts.id=cart_items.cart_id
                INNER JOIN products on cart_items.product_id = products.id
                INNER JOIN brands on products.brand_id=brands.id
                INNER JOIN origin_countries on products.origin_id=origin_countries.id
                WHERE orders.id=? AND orders.user_id=?";
    const ALL_ORDERS="SELECT DISTINCT products.id,products.name,products.brand,cart_items.quantity,orders.status FROM orders INNER JOIN carts ON orders.cart_id=carts.id INNER JOIN  cart_items on carts.id=cart_items.cart_id inner join products on cart_items.product_id = products.id WHERE orders.id=?";
    public static function postPayment($request,$cartId){
        Cart::where('id', $cartId)->update(['expired' => 1]);
        Payment::insert(['user_id' => Auth::id(),
            'cart_id' => $cartId,
            'status' => 'accepted',
            'delivery_option' => $request->delivery_option,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'street' => $request->street,
            'house' => $request->house
        ]);
    }
    public static function checkIfCartExist($request){
        $cartId = Cart::where('user_id', Auth::id())->where('expired', 0)->pluck('id')->first();
        $itemsInCart = CartItem::where('cart_id', $cartId)->count();
        if (isset($cartId)) {
           self::postPayment($request,$cartId);
        }
        return response()->json(['success' => '-']);}
    public static function getOrders($id)
    {
        $products = DB::select(self::ALL_ORDERS, [$id]);
        return response()->json(['success' => $products]);
    }
    public static function getProducts($id)
    {
        return DB::select(self::GET_PRODUCT_DETAILS, [$id, Auth::id()]);
    }
    public static function changeStatus($request)
    {
        Payment::where('id', $request->id)->update(['status' => $request->status]);
        return response()->json(['success' => '-']);
    }

    public static function index()
    {
        $cartId = Cart::where('user_id', Auth::id())->where('expired', 0)->pluck('id')->first();
        $itemsInCart = CartItem::where('cart_id', $cartId)->count();
        if (Auth::check() && $itemsInCart > 0) {
            return view('shop.payment');
        }
        return redirect('/cart');
    }



    public static function payment($request)
    {
        if (Auth::check()) {
           return  self::checkIfCartExist($request);
        }
    }

    public static function details($id)
    {
        if (Auth::user()->is_admin == 0) {
            $products = self::getProducts($id);
            if (isset($products[0])) {
                return view('details', ['products' => $products]);
            }
            return redirect('home');
        }
        return redirect('admin');
    }
    //}
}
