@extends('layout')

@section('title', 'Post show')

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
            [
                'link' => '/post',
                'name' => 'Posts'
            ],
        ]
    ])
@endsection

@section('content')
    <h1>{{ $post['title'] }}</h1>
    <ul>
        <li>Slug: {{ $post['slug'] }}</li>
        <li>Body: {{ $post['body'] }}</li>
        <li>Category: {{ $post->category->title }}</li>
        <li>Created: {{ $post['created_at'] }}</li>
        <li>Updated: {{ $post['updated_at'] }}</li>
    </ul>
@endsection
