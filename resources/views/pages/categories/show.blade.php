@extends('layout')

@section('title', 'Category show')

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
    <h1>{{ $category['title'] }}</h1>
    <ul>
        <li>Slug: {{ $category['slug'] }}</li>
        <li>Created: {{ $category['created_at'] }}</li>
        <li>Updated: {{ $category['updated_at'] }}</li>
    </ul>
@endsection
