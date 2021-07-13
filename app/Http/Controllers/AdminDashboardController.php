<?php

namespace App\Http\Controllers;
use Auth;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        $amountOfUsers=0;
        $amountOfProducts=0;

        if(Auth::check() && Auth::user()->is_admin!=0){
            $amountOfUsers=User::count();
            $amountOfProducts=Product::count();
            $latestsProducts=Product::select('id','name','brand','origin','price')->orderBy('id','desc')->take(5)->get();
            return view('adminDashboard.index',['amountOfUsers'=>$amountOfUsers,'amountOfProducts'=>$amountOfProducts,'products'=>$latestsProducts]);
        }
    //--- I decided that user won't have access to this panel :)
    return redirect("/home");
    }
    public function productList(){
        if(Auth::user()->is_admin!=0){
            $quanity=Stock::orderBy('product_id','DESC')->paginate(7)->pluck('quantity')->toArray();
            $products=Product::orderBy('id','DESC')->paginate(7);
            return view('adminDashboard.productList',["products"=>$products,"quantity"=>$quanity]);
        }
    }
    public function orders(){
        if(Auth::user()->is_admin!=0){
            
        } 
    }
    public function users(){
        if(Auth::user()->is_admin!=0){
            
        }
    }
}
