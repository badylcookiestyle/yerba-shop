<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;
use App\Models\Cart;
use App\Models\CartItem;

use App\Http\Requests\ToCartRequest;
use Auth;
class Cart extends Model
{

    use HasFactory;

    protected $table = 'carts';
    protected $primaryKey = 'id';
    public $timestamps = false;
    const SQL_CART_SELECT = "products.*,cart_items.quantity,cart_items.cart_id,stock.quantity as z,brands.name as brand,origin_countries.name as origin";

    public static function getItemsFromCart(){
        return Cart::select(DB::raw(self::SQL_CART_SELECT))
            ->join('cart_items', 'carts.id', '=', 'cart_items.cart_id')
            ->join('products', 'cart_items.product_id', '=', 'products.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('origin_countries', 'products.origin_id', '=', 'origin_countries.id')
            ->join('stock', 'products.id', '=', 'stock.product_id')
            ->where('carts.user_id', Auth::id())
            ->where('expired', 0)->get();
    }
    public static function createNewCart(){
        $cart = new Cart;
        $cart->user_id = Auth::id();
        $cart->created_at = now();
        $cart->save();
        return $cart->id;
    }
    public static function index()
    {
        $products = self::getItemsFromCart();
        return view('shop.cart', ['products' => $products]);
    }

    public static function addItem($request)
    {
        if (Cart::where('user_id', Auth::id())->where('expired', 0)->first() === null) {
            $cartId = self::createNewCart();
        } else {
            $cartId = Cart::where('user_id', Auth::id())->where('expired', 0)->pluck('id')->first();
        }
        CartItem::insert(['cart_id' => $cartId, 'quantity' => $request->quantity, 'product_id' => $request->id]);
        return $cartId;
    }

    public static function editItem($request)
    {
        $cartId = Cart::where('user_id', Auth::id())->where('expired', 0)->pluck('id')->first();
        CartItem::where('cart_id', $cartId)->where('product_id', $request->id)->update(['quantity' => $request->quantity]);
        return $request;
    }
}
