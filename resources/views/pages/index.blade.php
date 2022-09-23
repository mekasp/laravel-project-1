@extends('layout')

@section('title', 'Home page')

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
            [
                'link' => '/tags/list-tags.php',
                'name' => 'Tags'
            ],
        ]
    ])
@endsection

@section('content')
    <div class="container col-6">
        <h1>{{ $title }}</h1>
    </div>
@endsection
