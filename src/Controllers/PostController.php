<?php


namespace Hillel\Src\Controllers;

use Hillel\Src\Models\Post;
use Hillel\Src\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Hillel\Src\Models\Validator;

class PostController
{
    private $validationRules = [
        'title' => ['required', 'min:3'],
        'slug' => ['required', 'min:3'],
        'body' => ['required', 'min:10'],
        'category_id' => ['exists:categories,id']
    ];

    public function index()
    {
        $posts = Post::all();

        return view('/pages/posts/index',[
            'title' => 'Posts',
            'posts' => $posts,
        ]);
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->get();

        return view('/pages/posts/trash ',[
            'title' => 'Posts',
            'posts' => $posts
        ]);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()
            ->where('id', $id)
            ->restore();

        $_SESSION['success'] = 'Successful';

        return new RedirectResponse('/post');
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('/pages/posts/show',[
            'title' => 'Post',
            'post' => $post
        ]);
    }

    public function create()
    {
        $post = new Post();
        $categories = Category::all();

        return view('/pages/posts/form', [
            'title' => 'Post create',
            'categories' => $categories
        ]);
    }

    public function store()
    {
        $request = Validator::validation($this->validationRules);

        if (!is_array($request)) {
            return $request;
        }

        $post = new Post();
        $post->title = $request['title'];
        $post->slug = $request['slug'];
        $post->body = $request['body'];
        $post->category_id = $request['category_id'];
        $post->save();

        $_SESSION['success'] = 'Successful';

        return new RedirectResponse('/post');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('/pages/posts/form-edit', [
            'title' => 'Post update',
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update()
    {
        $request = Validator::validation($this->validationRules);

        if (!is_array($request)) {
            return $request;
        }

        $post = Post::find($request['id']);
        $post->title = $request['title'];
        $post->slug = $request['slug'];
        $post->body = $request['body'];
        $post->category_id = $request['category_id'];
        $post->save();

        $_SESSION['success'] = 'Successful';

        return new RedirectResponse('/post');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        $_SESSION['success'] = 'Successful';

        return new RedirectResponse('/post');
    }

    public function forceDelete($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();

        $post->forceDelete();

        $_SESSION['success'] = 'Successful';

        return new RedirectResponse('/post');
    }
}

