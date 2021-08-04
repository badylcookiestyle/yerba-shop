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
           return Cart::index();
        }
    }
    function addItem(ToCartRequest $request){
        if (Auth::check()) {
           return Cart::addItem($request);
        }
    }
    function editItem(ToCartRequest $request){

       if(Auth::check()){
           return Cart::editItem($request);
       }
    }
    function deleteItem($id){
        if(Auth::check()) {
            CartItem::where('product_id', $id)->delete();
        }
    }
}
