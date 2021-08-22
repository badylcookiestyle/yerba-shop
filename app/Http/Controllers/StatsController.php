<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
class StatsController extends Controller
{
    const GET_STATS_SQL='SELECT count(cart_items.id) as amount,carts.created_at FROM carts INNER JOIN cart_items ON carts.id=cart_items.cart_id WHERE carts.expired=1 GROUP BY carts.created_at';

    public function visits(){
        if(Auth::user()->is_admin!=0) {
            $visits = Visitor::selectRaw("distinct count(date) as amount,date")->groupBy("date")->get();
            return response()->json(['success' => 'working','visits'=>$visits]);
        }
    }
   public function orders(){
       if(Auth::user()->is_admin!=0) {
           $orders = db::table("orders")->selectRaw("distinct count(id) as amount,created_at")->groupBy("created_at")->get();
           return response()->json(['success' => 'working','orders'=>$orders]);
       }
   }
   public function products(){
       if(Auth::user()->is_admin!=0) {
           $products = DB::select(self::GET_STATS_SQL);
           return response()->json(['success' => 'working','products'=>$products]);
       }
   }

}
