<?php

use Dotenv\Repository\Adapter\PutenvAdapter;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;
use SebastianBergmann\CodeUnit\FunctionUnit;
use Whoops\Run;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'user'], function () {
    Route::get('/', 'MainController@index')->name('home');
    Route::get('/resheniya-i-uslugi', 'MainController@services')->name('services');
    Route::get('/produkty-i-servisy', 'MainController@secondServices')->name('secondServices');
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::get('/contacts', 'ContactController@index')->name('contact');
    Route::post('/send-mail', 'MailController@sendEmail')->name('send-mail');
    Route::get('/catalog', 'ProductController@index')->name('catalog');
    Route::get('/catalog/search', 'SearchController@index')->name('search');
    Route::get('/catalog/{category}', 'ProductController@showCategory')->name('category.show');
    Route::get('/catalog/{category}/{slug}', 'ProductController@showProduct')->name('product.show');
    Route::post('/addToCart', 'CartController@addToCart')->name('addToCart');
    Route::post('/deleteItemFromCart', 'CartController@deleteElem')->name('delete-elem');
    Route::post('/updateItemFromCart', 'CartController@updateElem')->name('update-elem');
    Route::get('/articles', 'PostController@index')->name('articles');
    Route::get('/articles/{article}', 'PostController@show')->name('article.show');
    Route::group(['middleware' => 'order'], function () {
        Route::get('/cart/order', 'CartController@createOrder')->name('order');
        Route::get('/cart/order/success', 'OrderController@index')->name('order.success');
        Route::post('/cart/order/confirmed', 'OrderController@confirmedOrder')->name('confirmedOrder');
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/cabinet', 'UserController@index')->name('cabinet');
        Route::get('/logout', 'UserController@logout')->name('logout');
        Route::post('/cabinet/change/password', 'UserController@changePassword')->name('changePass');
        Route::post('/cabinet/change/data', 'UserController@changeData')->name('changeData');
    });
    Route::group(['middleware' => 'guest'], function () {
        Route::post('/login', 'UserController@login')->name('login');
        Route::post('/register', 'UserController@store')->name('register');
    });
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/products', 'ProductController');
    Route::resource('/posts', 'PostController');
    Route::resource('/orders', 'OrderController');
});
