<?php

namespace App\Http\Controllers;

use App\Mail\MailOrder;
use App\Models\Order;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        \Cart::session($_COOKIE['cart_id'])->clear();
        return view('cart.success');
    }

    public function confirmedOrder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city' => 'required',
            'adress' => 'required',
            'method' => 'required',
            'delivety' => 'nullable',
            'comment' => 'nullable',
            'methodPay' => 'required'
        ]);
        if (Auth::check()) {
            $userId = Auth::user()->id;
        } else {
            $userId = 'unknown';
        }
        $cart = \Cart::session($_COOKIE['cart_id']);
        $products = $cart->getContent();
        foreach ($products as $product) {
            $item = Product::where('id', $product->id)->first();
            if ($item->count >= $product->quantity) {
                $item->count -= $product->quantity;
                $item->count_buying += $product->quantity;
                $item->update();
            } else {
                return redirect()->back()->with('error', 'У продукта '.$product->title.' превышен лимит для заказа');
            }
        }
        $products = serialize($products);
        $sum = $cart->getSubTotal();
        $data = serialize($request->all());
        $number = Order::getNumber();
        Order::create([
            'user_id' => $userId,
            'number_of_order' => $number,
            'status' => 1,
            'data_order' => $data,
            'products_in_order' => $products,
            'sum' => $sum
        ]);
        Mail::to($request->email)->send(new MailOrder($data, $products));
        return redirect()->route('order.success');
    }
}
