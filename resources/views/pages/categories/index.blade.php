@extends('layout')

@section('title', 'Categories')

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
    <a href="/category/create" class="btn btn-primary">Create</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr>
                <td>{{ $category['id'] }}</th>
                <td>{{ $category['title'] }}</td>
                <td>{{ $category['slug'] }}</td>
                <td>{{ $category['created_at'] }}</td>
                <td>{{ $category['updated_at'] }}</td>
                <td><a class="btn btn-warning" href="/category/{{$category['id']}}/edit">Update</a></td>
                <td><a class="btn btn-danger" href="/category/{{$category['id']}}/delete">Delete</a></td>
                <td><a class="btn btn-primary" href="/category/{{$category['id']}}/show">Show</a></td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
@endsection