@extends('layout')

@section('title', 'Category update')

@section('breadcrumbs')
    @include('partial.breadcrumbs', [
        'links' => [
            [
                'link' => '/',
                'name' => 'Home'
            ],
            [
                'link' => '/category',
                'name' => 'Categories'
            ],
            [
                'link' => '/tag',
                'name' => 'Tags'
            ],
        ]
    ])
@endsection

@section('content')
    <h1>{{ $title }}</h1>
    <form action="/category/update" method="POST">
        <input type="hidden" value="{{ $category['id'] }}" name="id">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $category['title'] }}">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $category['slug'] }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection