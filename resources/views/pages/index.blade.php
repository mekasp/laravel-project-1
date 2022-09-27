@extends('layout')

@section('title', 'Home page')

@section('breadcrumbs')
    @include('partial.breadcrumbs', [
        'links' => [
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
        <h1>{{ $title }}</h1>
@endsection
