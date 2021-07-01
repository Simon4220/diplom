<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::has('categories', '==', 0)->pluck('title', 'id')->all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'string|required',
            'article' => 'string|required',
            'count' => 'integer|required',
            'cost' => 'integer|required',
            'thumbnail' => 'nullable|image',
            'category_id' => 'integer|required',
            'specifications' => 'nullable',
            'description' => 'nullable',
            'applications' => 'nullable',
        ]);

        $data = $request->all();

        $data['thumbnail'] = Product::uploadImage($request);
        Product::create($data);

        return redirect()
            ->route('products.index')
            ->with('success', 'Товар добавлен успешно');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::whereNotNull('category_id')
                        ->pluck('title', 'id')
                        ->all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'string|required',
            'article' => 'string|required',
            'count' => 'integer|required',
            'cost' => 'integer|required',
            'thumbnail' => 'nullable|image',
            'category_id' => 'integer|required',
            'specifications' => 'nullable',
            'description' => 'nullable',
            'applications' => 'nullable',
        ]);

        $product = Product::find($id);
        $data = $request->all();

        if ($image = Product::uploadImage($request, $product->thumbnail)) {
            $data['thumbnail'] = $image;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        Storage::delete($product->thumbnail);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Товар удален');
    }
}
