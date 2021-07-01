<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;

class CartController extends Controller
{
    public function index()
    {
        $products = \Cart::session($_COOKIE['cart_id'])->getContent();
        return view('cart.index', compact('products'));
    }

    public function createOrder()
    {
        return view('cart.order');
    }

    public function addToCart(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        if($item = \Cart::session($_COOKIE['cart_id'])->get($product->id)) {
            $itemCount = $item->quantity;
        } else {
            $itemCount = 0;
        }
        if (($request->all >= $product->count) && ($request->all > $itemCount)) {
            if (isset($_COOKIE['cart_id'])) {
                \Cart::session($_COOKIE['cart_id'])
                    ->add([
                        'id' => $product->id,
                        'name' => $product->title,
                        'price' => $product->cost,
                        'quantity' => $request->count,
                        'attributes' => [
                            'thumbnail' => isset($product->thumbnail) ? $product->thumbnail : null,
                            'article' => $request->article,
                            'count' => $request->all
                        ],
                    ]);

                return response()->json(\Cart::getContent());
            }
        }
    }

    public function deleteElem(Request $request)
    {
        $id = $request->id;
        \Cart::session($_COOKIE['cart_id'])->remove($id);
        $products = \Cart::session($_COOKIE['cart_id'])->getContent();
        if ($request->ajax()) {
            return view('ajax.ajax-cart', compact('products'));
        }
    }

    public function updateElem(Request $request)
    {
        $id = $request->id;
        $count = $request->count;
        \Cart::session($_COOKIE['cart_id'])->update($id, [
            'quantity' => $count,
        ]);
        $products = \Cart::session($_COOKIE['cart_id'])->getContent();
        if ($request->ajax()) {
            return view('ajax.ajax-cart', compact('products'));
        }
    }
}
