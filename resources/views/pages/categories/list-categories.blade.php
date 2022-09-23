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
                'link' => '/tags/list-tags.php',
                'name' => 'Tags'
            ],
        ]
    ])
@endsection

@section('content')
    <div class="container mt-3">
        <h1>{{ $title }}</h1>
        <a href="/categories/create-category.php" class="btn btn-primary">Create</a>
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
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category['id'] }}</th>
                    <td>{{ $category['title'] }}</td>
                    <td>{{ $category['slug'] }}</td>
                    <td>{{ $category['created_at'] }}</td>
                    <td>{{ $category['updated_at'] }}</td>
                    <td><a class="btn btn-warning" href="update-category.php?id={{$category['id']}}">Update</a></td>
                    <td><a class="btn btn-danger" href="delete-category.php?id={{$category['id']}}">Delete</a></td>
                </tr>
            @empty
                <p>Empty</p>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection