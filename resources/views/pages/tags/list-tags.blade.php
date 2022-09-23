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
                'link' => '/categories/list-categories.php',
                'name' => 'Categories'
            ],
        ]
    ])
@endsection

@section('content')
    <div class="container mt-3">
        <h1>{{ $title }}</h1>
        <a href="/tags/create-tag.php" class="btn btn-primary">Create</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($tags as $tag)
                <tr>
                    <td>{{ $tag['id'] }}</td>
                    <td>{{ $tag['title'] }}</td>
                    <td>{{ $tag['slug'] }}</td>
                    <td>{{ $tag['created_at'] }}</td>
                    <td>{{ $tag['updated_at'] }}</td>
                    <td><a class="btn btn-warning" href="update-tag.php?id={{$tag['id']}}">Update</a></td>
                    <td><a class="btn btn-danger" href="delete-tag.php?id={{$tag['id']}}">Delete</a></td>
                </tr>
            @empty
                <p>Empty</p>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
