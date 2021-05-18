<?php

namespace App\Http\Middleware;

use Closure;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class OrderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(\Cart::session($_COOKIE['cart_id'])->getContent()->count()) {
            return $next($request);
        } else {
            return abort(404);
        }
    }
}
