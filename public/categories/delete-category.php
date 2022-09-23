<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

if (isset($_GET['id'])) {
    $category = \Hillel\Src\Models\Category::find($_GET['id']);
    $posts = \Hillel\Src\Models\Post::where('category_id',$category['id'])->get();
    foreach ($posts as $post) {
        $post->tags()->detach();
        $post->delete();
    }
    $category->delete();

    header('Location: /categories/list-categories.php');
}

