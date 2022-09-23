<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

if (isset($_GET['id'])) {
    $category = Hillel\Src\Models\Category::find($_GET['id']);
}


/** @var $blade */
echo $blade->make('/pages/categories/update-category', [
    'title' => 'Category update',
    'category' => $category
])->render();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category->title = $_POST['title'];
    $category->slug = $_POST['slug'];
    $category->save();
    header('Location: /categories/list-categories.php');
}

