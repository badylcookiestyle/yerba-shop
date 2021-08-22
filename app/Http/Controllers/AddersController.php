<?php

namespace App\Http\Controllers;


use App\Models\User;
use Auth;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Origin;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\AddBrandRequest;
use App\Http\Requests\AddCountryRequest;
class AddersController extends Controller
{
    public function brand(AddBrandRequest $request){
        if(Auth::user()->is_admin!=0){
            Brand::insert(['name'=>$request->brand]);
            return response()->json(['success' =>$request->brand]);
        }

    }
    public function category(AddCategoryRequest $request){
        if(Auth::user()->is_admin!=0){
            Category::insert(['name'=>$request->category]);
            return response()->json(['success' =>$request->category]);
        }

    }
    public function country(AddCountryRequest $request){
        if(Auth::user()->is_admin!=0){
            Origin::insert(['name'=>$request->country]);
            return response()->json(['success' =>$request->country]);
        }

    }
}
