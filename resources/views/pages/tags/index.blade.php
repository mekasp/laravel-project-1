@extends('layout')

@section('title', 'Tags')

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
                'link' => '/post',
                'name' => 'Posts'
            ],
        ]
    ])
@endsection

@section('content')
    @isset($_SESSION['success'])
        <div class="alert alert-success" role="alert">
            {{ $_SESSION['success']}}
        </div>
    @endisset
    @php
        unset($_SESSION['success']);
    @endphp
    <h1>{{ $title }}</h1>
    <a href="/tag/create" class="btn btn-primary">Create</a>
    <a href="/tag/trash" class="btn btn-info">Trash</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Posts</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($tags as $tag)
            <tr>
                <td>{{ $tag['id'] }}</td>
                <td>{{ $tag['title'] }}</td>
                <td>{{ $tag['slug'] }}</td>
                <td>{{ $tag->posts->pluck('title')->join(', ') }}</td>
                <td>{{ $tag['created_at'] }}</td>
                <td>{{ $tag['updated_at'] }}</td>
                <td><a class="btn btn-warning" href="/tag/{{$tag['id']}}/edit">Update</a></td>
                <td><a class="btn btn-danger" href="/tag/{{$tag['id']}}/delete">Delete</a></td>
                <td><a class="btn btn-primary" href="/tag/{{$tag['id']}}/show">Show</a></td>
                <td><a class="btn btn-danger" href="/tag/{{$tag['id']}}/force-delete">Force Delete</a></td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
@endsection
