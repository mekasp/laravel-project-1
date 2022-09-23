<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

if (isset($_GET['id'])) {
    $tag = \Hillel\Src\Models\Tag::find($_GET['id']);
    $tag->posts()->detach();
    $tag->delete();

    header('Location: /tags/list-tags.php');
}

