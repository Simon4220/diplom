<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $products = Product::where("title", "LIKE", "%{$search}%")->get();
        if($request->ajax()) {
            if ($request->orderCost == 'default') {
                $products = $products->sortBy('created_at');
            }
            if ($request->orderCost == 'min-max') {
                $products = $products->sortBy('cost');
            }
            if ($request->orderCost == 'max-min') {
                $products = $products->sortByDesc('cost');
            }
            return view('ajax.ajax-products', compact('products'));
        } else {
            return view('products.index', compact('products'));
        }
        
    }
}
