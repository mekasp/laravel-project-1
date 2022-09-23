<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

/** @var $blade */
echo $blade->make('/pages/categories/create-category', [
    'title' => 'Category create',
])->render();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $model = new Hillel\Src\Models\Category();
    $model->title = $_POST['title'];
    $model->slug = $_POST['slug'];
    $model->save();
    header('Location: /categories/list-categories.php');
}

