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

        $request = Validator::validation($this->validationRules);

        if (!is_array($request)) {
            return $request;
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
        $request = Validator::validation($this->validationRules);

        if (!is_array($request)) {
            return $request;
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
        $posts = Post::where('category_id',$category['id'])->get();
        foreach ($posts as $post) {
            $post->tags()->detach();
            $post->delete();
        }
        $category->delete();

        $_SESSION['success'] = 'Successful';

        return new RedirectResponse('/category');
    }
}

