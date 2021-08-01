<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    private $brandId;
    private $categoryId;
    private $originId;
    private $search;
    private $orderVector;
    private $minPrice;
    private $maxPrice;
    private $orderField;

    private function getOrder($orderType)
    {
        switch ($orderType) {
            case 'Date added':
                $orderField = 'created_at';
                break;
            case 'Price':
                $orderField = 'price';
                break;
            case 'Alphabet':
                $orderField = 'name';
                break;
        }
        return $orderField;
    }

    private function getProducts()
    {
        if ($this->minPrice != null && $this->maxPrice != null) {
            $products = Product::where('name', 'like', '%' . $this->search . '%')
                ->whereRaw('brand_id=' . $this->brandId)
                ->whereRaw('category_id=' . $this->categoryId)
                ->whereRaw('origin_id=' . $this->originId)
                ->where('price', '>=', $this->minPrice)
                ->where('price', '<=', $this->maxPrice)
                ->orderBy($this->orderField, $this->orderVector)->get();
            return response()->json(['success' => 'working', 'products' => $products, 'text' => '4']);
        } elseif ($this->minPrice != null && $this->maxPrice == null) {
            $products = Product::where('name', 'like', '%' . $this->search . '%')
                ->whereRaw('brand_id=' . $this->brandId)
                ->whereRaw('category_id=' . $this->categoryId)
                ->whereRaw('origin_id=' . $this->originId)
                ->where('price', '>=', $this->minPrice)
                ->orderBy($this->orderField, $this->orderVector)->get();
            return response()->json(['success' => 'working', 'products' => $products, 'text' => '1']);
        } elseif ($this->minPrice == null && $this->maxPrice != null) {
            $products = Product::where('name', 'like', '%' . $this->search . '%')
                ->whereRaw('brand_id=' . $this->brandId)
                ->whereRaw('category_id=' . $this->categoryId)
                ->whereRaw('origin_id=' . $this->originId)
                ->where('price', '<=', $this->maxPrice)
                ->orderBy($this->orderField, $this->orderVector)->get();
            return response()->json(['success' => 'working', 'products' => $products, 'text' => '2']);
        } else {
            $products = Product::where('name', 'like', '%' . $this->search . '%')
                ->whereRaw('brand_id=' . $this->brandId)
                ->whereRaw('category_id=' . $this->categoryId)
                ->whereRaw('origin_id=' . $this->originId)
                ->orderBy($this->orderField, $this->orderVector)->get();
            return response()->json(['success' => 'working', 'products' => $products, 'text' => '3']);
        }
    }

    private function declareFilterVariables($request)
    {
        $request->brand != 0 ? $this->brandId = $request->brand : $this->brandId = 'brand_id';
        $request->category != 0 ? $this->categoryId = $request->category : $this->categoryId = 'category_id';
        $request->origin != 0 ? $this->originId = $request->origin : $this->originId = 'origin_id';
        $request->search != '' ? $this->search = $request->search : $this->search = '';
        $request->searchingOrder == "a" ? $this->orderVector = 'ASC' : $this->orderVector = 'DESC';
        $this->minPrice = $request->minPrice;
        $this->maxPrice = $request->maxPrice;
        $this->orderField = $this->getOrder($request->orderType);
    }

    private function filteredSearch($request)
    {
        $this->declareFilterVariables($request);
        return $this->getProducts();
    }

    public function search(Request $request)
    {
        if (!isset($request->filtered) && $request->filtered == true) {
            $products = Product::where('name', 'like', '%' . $request->search . '%')->get();
            return response()->json(['success' => 'working', 'products' => $products, 'text' => $request->search]);
        }
        return $this->filteredSearch($request);
    }
}
