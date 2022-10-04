<?php

namespace Hillel\Src\Controllers;

use Hillel\Src\Models\Post;
use Hillel\Src\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Hillel\Src\Models\Validator;

class TagController
{
    private $validationRules = [
        'title' => ['required', 'min:3'],
        'slug' => ['required', 'min:3']
    ];

    public function index()
    {
        $tags = Tag::all();

        return view('/pages/tags/index',[
            'title' => 'Tags',
            'tags' => $tags
        ]);
    }

    public function trash()
    {
        $tags = Tag::onlyTrashed()->get();

        return view('/pages/tags/trash ',[
            'title' => 'Tags',
            'tags' => $tags
        ]);
    }

    public function restore($id)
    {
        $tag = Tag::withTrashed()
            ->where('id', $id)
            ->restore();

        $_SESSION['success'] = 'Successful';

        return new RedirectResponse('/tag');
    }

    public function show($id)
    {
        $tag = Tag::find($id);

        return view('/pages/tags/show',[
            'title' => 'Tag',
            'tag' => $tag
        ]);
    }

    public function create()
    {
        $model = new Tag();

        return view('/pages/tags/form', [
            'title' => 'Tag create',
        ]);
    }

    public function store()
    {
        $request = Validator::validation($this->validationRules);

        if (!is_array($request)) {
            return $request;
        }

        $tag = new Tag();
        $tag->title = $request['title'];
        $tag->slug = $request['slug'];
        $tag->save();

        $_SESSION['success'] = 'Successful';

        return new RedirectResponse('/tag');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('/pages/tags/form-edit', [
            'title' => 'Tag update',
            'tag' => $tag
        ]);
    }

    public function update()
    {
        $request = Validator::validation($this->validationRules);

        if (!is_array($request)) {
            return $request;
        }

        $tag = Tag::find($request['id']);
        $tag->title = $request['title'];
        $tag->slug = $request['slug'];
        $tag->save();

        $_SESSION['success'] = 'Successful';

        return new RedirectResponse('/tag');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();

        $_SESSION['success'] = 'Successful';

        return new RedirectResponse('/tag');
    }

    public function forceDelete($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->forceDelete();

        $_SESSION['success'] = 'Successful';

        return new RedirectResponse('/tag');
    }
}

