<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        if (!is_null($request)) {
            if ($request->orderCost == 'default') {
                $products = $products->sortBy('created_at');
            }
            if ($request->orderCost == 'min-max') {
                $products = $products->sortBy('cost');
            }
            if ($request->orderCost == 'max-min') {
                $products = $products->sortByDesc('cost');
            }
        }
        if($request->ajax()) {
            return view('ajax.ajax-products', compact('products'));
        }
        return view('products.index', compact('products'));
    }

    public function showProduct($categorySlug, $productSlug)
    {
        $product = Product::where('slug', $productSlug)->with('category')->first();
        return view('products.show', compact('product'));
    }

    public function showCategory(Request $request, $categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->first();
        if(count($category->categories)) {
            $categories = Category::where('category_id', $category->id)->pluck('id')->all();
            $products = Product::where('category_id', $categories)->get();
        } else {
            $products = Product::where('category_id', $category->id)->get();
        }

        if($request->orderCost) {
            if ($request->orderCost == 'default') {
                $products = $products->sortBy('created_at');
            }
            if ($request->orderCost == 'min-max') {
                $products = $products->sortBy('cost');
            }
            if ($request->orderCost == 'max-min') {
                $products = $products->sortByDesc('cost');
            }
        }
        if($request->ajax()) {
            return view('ajax.ajax-products', compact('products'));
        }
        return view('category.show', compact('products', 'category'));  
    }
}
