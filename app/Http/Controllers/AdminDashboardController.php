<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
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
        return view('adminDashboard.index',['amountOfUsers'=>$amountOfUsers,'amountOfProducts'=>$amountOfProducts]);
        
    }
    //--- I decided that user won't have access to this panel :)
    return redirect("/");
    }
}
