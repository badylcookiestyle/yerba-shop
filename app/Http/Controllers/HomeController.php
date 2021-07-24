<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
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
    { if(Auth::check() && Auth::user()->is_admin==1){
        return redirect("/admin");
    }
    //--- I decided that admin won't have access to this panel :)
        return view('home');
    }
}
