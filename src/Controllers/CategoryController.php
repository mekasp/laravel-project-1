<?php

namespace Hillel\Src\Controllers;

use Hillel\Src\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Hillel\Src\Models\Post;
use Hillel\Src\Models\Validator;

class CategoryController
{

    private $validationRules = [
        'title' => ['required', 'min:3'],
        'slug' => ['required', 'min:3']
    ];

    public function index()
    {
        $categories = Category::all();

        return view('/pages/categories/index',[
            'title' => 'Categories',
            'categories' => $categories
        ]);
    }

    public function trash()
    {
        $categories = Category::onlyTrashed()->get();

        return view('/pages/categories/trash ',[
            'title' => 'Categories',
            'categories' => $categories
        ]);
    }

    public function restore($id)
    {
        $category = Category::withTrashed()
            ->where('id', $id)
            ->restore();

        $_SESSION['success'] = 'Successful';

        return new RedirectResponse('/category');
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
        $category = new Category();

        return view('/pages/categories/form', [
            'title' => 'Category create',
        ]);
    }

    public function store()
    {
        $request = request()->all();
        Validator::validation($request,$this->validationRules);
        if (isset($_SESSION['errors'])) {
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $category = new Category();
        $category->title = $request['title'];
        $category->slug = $request['slug'];
        $category->save();

        $_SESSION['success'] = 'Successful';

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
        $request = request()->all();
        Validator::validation($request,$this->validationRules);
        if (isset($_SESSION['errors'])) {
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $category = Category::find($request['id']);
        $category->title = $request['title'];
        $category->slug = $request['slug'];
        $category->save();

        $_SESSION['success'] = 'Successful';

        return new RedirectResponse('/category');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        $_SESSION['success'] = 'Successful';

        return new RedirectResponse('/category');
    }

    public function forceDelete($id)
    {
        $category = Category::find($id);
        $posts = Post::where('category_id',$category['id'])->get();
        foreach ($posts as $post) {
            $post->tags()->detach();
            $post->forceDelete();
        }
        $category->forceDelete();

        $_SESSION['success'] = 'Successful';

        return new RedirectResponse('/category');
    }
}

