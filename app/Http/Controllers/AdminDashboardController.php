<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

use App\Models\Stock;
class AdminDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->is_admin!=0){
            $amountOfUsers=User::count();
            $amountOfProducts=Product::count();
            $latestsProducts=Product::select('products.id','products.name as name','brands.name as brand','origin_countries.name as origin','price')
                ->join('brands','products.brand_id','=','brands.id')
                ->join('origin_countries','products.origin_id','=','origin_countries.id')
                ->orderBy('id','desc')->take(5)->get();
            return view('adminDashboard.index',['amountOfUsers'=>$amountOfUsers,'amountOfProducts'=>$amountOfProducts,'products'=>$latestsProducts]);
        }
    //--- I decided that user won't have access to this panel :)
    return redirect("/home");
    }
    public function productList(){
        if(Auth::user()->is_admin!=0){
            $quanity=Stock::orderBy('product_id','DESC')->paginate(7)->pluck('quantity')->toArray();
            $products=Product::select('products.id','products.name as name','brands.name as brand','origin_countries.name as origin','price')
                ->join('brands','products.brand_id','=','brands.id')
                ->join('origin_countries','products.origin_id','=','origin_countries.id')
                ->orderBy('id','desc')->paginate(7);
            return view('adminDashboard.productList',["products"=>$products,"quantity"=>$quanity]);
        }
        return view('home');
    }
    public function orders(){
        if(Auth::user()->is_admin!=0){
            $orders=Payment::paginate(7);
            return view('adminDashboard.orders',['orders'=>$orders]);
        }
        return view('home');
    }
    public function userList(){
        if(Auth::user()->is_admin!=0){
            $users=User::select('name','email','created_at')->where('is_admin',0)->paginate(7);
            return view("adminDashboard.userList",["users"=>$users]);
        }
        return view('home');
    }
    public function deleteUser($email){
        if(Auth::user()->is_admin!=0){
                User::where("email",$email)->where("is_admin",0)->delete();
                return response()->json(['success' =>$email]);
            }
        }

    }

