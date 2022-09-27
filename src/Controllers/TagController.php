<?php

namespace Hillel\Src\Controllers;

use Hillel\Src\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;

class TagController
{
    public function index()
    {
        $tags = Tag::all();

        return view('/pages/tags/index',[
            'title' => 'Tags',
            'tags' => $tags
        ]);
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
        $request = request();

        $tag = new Tag();
        $tag->title = $request->input('title');
        $tag->slug = $request->input('slug');
        $tag->save();

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
        $request = request();

        $tag = Tag::find($request->input('id'));
        $tag->title = $request->input('title');
        $tag->slug = $request->input('slug');
        $tag->save();

        return new RedirectResponse('/tag');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();

        return new RedirectResponse('/tag');
    }
}

