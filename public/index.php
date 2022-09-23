<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/blade.php';

$pages = [
    'name' => 'test name'
];

/** @var $blade */
echo $blade->make('/pages/index', [
    'tags' => $pages,
    'title' => 'Welcome'
])->render();

