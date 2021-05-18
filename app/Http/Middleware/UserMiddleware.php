<?php

namespace App\Http\Middleware;

use Closure;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
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
        if (isset($_COOKIE['cart_id'])) {
            return $next($request);
        } else {
            setcookie('cart_id', uniqid());
            return $next($request);
        }
    }
}
