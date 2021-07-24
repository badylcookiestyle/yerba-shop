<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Cart;
use Auth;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public function payment($request){
        if (Auth::check()){
            $cartId=Cart::where('user_id',Auth::id())->where('expired',0)->pluck('id')->first();
            if(isset($cartId)){
                $userId=Auth()::id();
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
    }
}
