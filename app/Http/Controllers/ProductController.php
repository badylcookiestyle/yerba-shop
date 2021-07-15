<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Category;
use App\Models\User;
use Auth;
use App\Models\Product;
use Illuminate\Http\Request;
use File;

use App\Models\Stock;

class ProductController extends Controller
{

    public function index($id)
    {
        return Product::index($id);
    }

    public function add(StoreProductRequest $request)
    {
        return Product::add($request);
    }

    public function edit(EditProductRequest $request)
    {
        return Product::edit($request);
    }

    public function delete($id)
    {
       return Product::deleteProduct($id);
    }
}
