@extends('layout')

@section('title', 'Posts')

@section('breadcrumbs')
    @include('partial.breadcrumbs', [
        'links' => [
            [
                'link' => '/',
                'name' => 'Home'
            ],
            [
                'link' => '/tag',
                'name' => 'Tags'
            ],
            [
                'link' => '/category',
                'name' => 'Categories'
            ]
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
    <a href="/post/create" class="btn btn-primary">Create</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Body</th>
            <th scope="col">Category</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <td>{{ $post['id'] }}</th>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['slug'] }}</td>
                <td>{{ $post['body'] }}</td>
                <td>{{ $post->category->title }}</td>
                <td>{{ $post['created_at'] }}</td>
                <td>{{ $post['updated_at'] }}</td>
                <td><a class="btn btn-warning" href="/post/{{$post['id']}}/edit">Update</a></td>
                <td><a class="btn btn-danger" href="/post/{{$post['id']}}/delete">Delete</a></td>
                <td><a class="btn btn-primary" href="/post/{{$post['id']}}/show">Show</a></td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
@endsection