@extends('layout')

@section('title', 'Tag update')

@section('breadcrumbs')
    @include('partial.breadcrumbs', [
        'links' => [
            [
                'link' => '/',
                'name' => 'Home'
            ],
            [
                'link' => '/categories/list-categories.php',
                'name' => 'Categories'
            ],
            [
                'link' => '/tags/list-tags.php',
                'name' => 'Tags'
            ],
        ]
    ])
@endsection

@section('content')
    <div class="container mt-3  col-6">
        <h1>{{ $title }}</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $tag['title'] }}">
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{$tag['slug'] }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
