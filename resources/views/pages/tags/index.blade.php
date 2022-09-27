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
        ]
    ])
@endsection

@section('content')
    <h1>{{ $title }}</h1>
    <a href="/tag/create" class="btn btn-primary">Create</a>
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
        @forelse($tags as $tag)
            <tr>
                <td>{{ $tag['id'] }}</td>
                <td>{{ $tag['title'] }}</td>
                <td>{{ $tag['slug'] }}</td>
                <td>{{ $tag['created_at'] }}</td>
                <td>{{ $tag['updated_at'] }}</td>
                <td><a class="btn btn-warning" href="/tag/{{$tag['id']}}/edit">Update</a></td>
                <td><a class="btn btn-danger" href="/tag/{{$tag['id']}}/delete">Delete</a></td>
                <td><a class="btn btn-primary" href="/tag/{{$tag['id']}}/show">Show</a></td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
@endsection
