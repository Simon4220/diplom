<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::whereNull('category_id')
                        ->with('categories')
                        ->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('category_id')
                        ->with('categories')
                        ->pluck('title', 'id')
                        ->all();
        return view('admin.categories.create', compact('categories'));
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
            'thumbnail' => 'nullable|image'
        ]);

        $data = $request->all();
        
        $data['thumbnail'] = Category::uploadImage($request);
        
        Category::create($data);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Категория добавлена');
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
        $category = Category::find($id);
        $categories = Category::whereNull('category_id')
                        ->with('categories')
                        ->pluck('title', 'id')
                        ->all();
        return view('admin.categories.edit', compact('category', 'categories'));
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
            'thumbnail' => 'nullable|image'
        ]);

        $category = Category::find($id);
        $data = $request->all();

        if ($image = Category::uploadImage($request, $category->thumbnail)) {
            $data['thumbnail'] = $image;
        }
        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Изменения сохранены');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (($category->categories->count()) && ($category->products->count())) {
            return redirect()->route('categories.index')->with('error', 'Ошибка! У категории есть подкатегории или продукты');
        }
        Storage::delete($category->thumbnail);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Категория удалена');
    }
}
