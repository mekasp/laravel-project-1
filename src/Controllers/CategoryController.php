<?php

namespace Hillel\Src\Controllers;

use Hillel\Src\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;

class CategoryController
{
    public function index()
    {
        $categories = Category::all();

        return view('/pages/categories/index',[
            'title' => 'Categories',
            'categories' => $categories
        ]);
    }

    public function show($id)
    {
        $category = Category::find($id);

        return view('/pages/categories/show',[
            'title' => 'Category',
            'category' => $category
        ]);
    }

    public function create()
    {
        $model = new Category();

        return view('/pages/categories/form', [
            'title' => 'Category create',
        ]);
    }

    public function store()
    {
        $request = request();

        $category = new Category();
        $category->title = $request->input('title');
        $category->slug = $request->input('slug');
        $category->save();

        return new RedirectResponse('/category');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('/pages/categories/form-edit', [
            'title' => 'Category update',
            'category' => $category
        ]);
    }

    public function update()
    {
        $request = request();

        $category = Category::find($request->input('id'));
        $category->title = $request->input('title');
        $category->slug = $request->input('slug');
        $category->save();

        return new RedirectResponse('/category');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return new RedirectResponse('/category');
    }
}

