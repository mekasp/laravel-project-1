<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

$categories = Hillel\Src\Models\Category::all();

/** @var $blade */
echo $blade->make('/pages/categories/list-categories', [
    'title' => 'Categories',
    'categories' => $categories
])->render();

