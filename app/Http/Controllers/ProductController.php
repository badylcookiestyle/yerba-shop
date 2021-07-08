<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;
class ProductController extends Controller
{
    public function index($id){
      return Product::index($id);
    }
}
