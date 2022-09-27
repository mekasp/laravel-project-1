@extends('layout')

@section('title', 'Tag show')

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
    <h1>{{ $tag['title'] }}</h1>
    <ul>
        <li>Slug: {{ $tag['slug'] }}</li>
        <li>Created: {{ $tag['created_at'] }}</li>
        <li>Updated: {{ $tag['updated_at'] }}</li>
    </ul>
@endsection
