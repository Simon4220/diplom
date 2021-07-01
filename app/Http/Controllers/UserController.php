<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders;
        foreach ($orders as $order) {
            $order->data_order = unserialize($order->data_order);
            $order->products_in_order = unserialize($order->products_in_order);
        }
        return view('cabinet.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        session()->flash('success', 'Регистрация пройдена');
        Auth::login($user);
        return redirect()->home();
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            session()->flash('success', 'You are logged');
            if (Auth::user()->is_admin) {
                return redirect()->back();//route('admin.index');
            } else {
                return redirect()->back();
            }
        }

        return redirect()->back()->with('error', 'Неправильный логин или пароль')->withInput();
    }

    public function logout()
    {
        \Cart::session($_COOKIE['cart_id'])->clear();
        Auth::logout();
        return redirect()->route('home');
    }

    public function changePassword(Request $request)
    {
        if ($request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ])) {
            $userId = Auth::user()->id;
            $user = User::find($userId);

            if (Hash::check($request->old_password, $user->password)) {
                $user->update([
                    'password' => bcrypt($request->password)
                ]);
                return redirect()->back()->with('success', 'Пароль был успешно изменен');
            } else return redirect()->back()->with('error', 'Неправильный текущий пароль');
        } else return redirect()->back()->with('error', 'Ошибка при смене пароля');
    }

    public function changeData(Request $request)
    {
        $request->validate([
            'name' => 'nullable',
            'phone' => 'nullable',
            'email' => 'email|unique:users,email,' . Auth::user()->id,
            'city' => 'nullable',
            'adress' => 'nullable'
        ]);
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $user->update($request->all());
        return redirect()->back()->with('success', 'Данные успешно изменены');
    }
}
