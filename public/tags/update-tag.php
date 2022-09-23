<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

if (isset($_GET['id'])) {
    $tag = Hillel\Src\Models\Tag::find($_GET['id']);
}

/** @var $blade */
echo $blade->make('/pages/tags/update-tag', [
    'title' => 'Tag update',
    'tag' => $tag
])->render();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tag->title = $_POST['title'];
    $tag->slug = $_POST['slug'];
    $tag->save();
    header('Location: /tags/list-tags.php');
}

