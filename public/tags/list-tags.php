<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

$tags = Hillel\Src\Models\Tag::all();

/** @var $blade */
echo $blade->make('/pages/tags/list-tags', [
    'title' => 'Tags',
    'tags' => $tags
])->render();

