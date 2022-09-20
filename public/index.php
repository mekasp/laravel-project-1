<?php

//use Hillel\Src\Models\User;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

use Hillel\Src\Models\Category;
use Hillel\Src\Models\Post;
use Hillel\Src\Models\Tag;

//$model = new \Hillel\Src\Models\Currency('UAH');
//$model1 = new \Hillel\Src\Models\Currency('UAH');
//$model2 = $model->equals($model1);
//var_dump($model2);

//$currency = new \Hillel\Src\Models\Currency('UAH');
//$currency1 = new \Hillel\Src\Models\Currency('UAH');
//$money = new \Hillel\Src\Models\Money(125,$currency);
//$money1 = new \Hillel\Src\Models\Money(76,$currency1);
//$money2 = $money->add($money1);
//var_dump($money2);
/**
 * ДЗ 5 start
 */
//$userFind = \Hillel\Src\Models\User::find(2);
//var_dump($userFind);
//$user = new \Hillel\Src\Models\User();
//
//$user->id = 5;
//$user->name = 'asdad';
//$user->email = '@safg';
//var_dump($user);


//$userCreate = $user->create();
//var_dump($userCreate);

//$userUpdate = $user->update();
//var_dump($userUpdate);

//$userDelete = $user->delete();
//var_dump($userDelete);

//$userSave = $user->save();
//var_dump($userSave);
/**
 * ДЗ 5 end
 */

/**
 * ДЗ 6 start
 * 1. Створити 5 категорій (insert)
 */

//$model = new Category();
//$model->title = 'Phones';
//$model->slug = 'Phones';
//$model->save();

//for ($index = 1;$index <= 5; $index++) {
//    $model = new Category();
//    $model->title = 'Phones:' . $index;
//    $model->slug = 'Phones' . $index;
//    $model->save();
//}

/**
 * 2. Змінити 1 категорію (update)
 */

//$model = Category::find(1);
//$model->title = 'test';
//$model->slug = 'test';
//$model->save();
//
//echo '<pre>';
//print_r($model);
//echo '</pre>';

/**
 * 3. Видалити 1 категорію (delete).
 */

//$model = Category::where('slug','TV')->first();
//$model->delete();
//echo '<pre>';
//print_r($model);
//echo '</pre>';

/**
 * 4. Створити 10 постів, прикріпивши довільну категорію.
 */

//$category = Category::find(rand(1,4));
//$post = new Post();
//$post->title = 'test 10';
//$post->slug = 'test 10';
//$post->body = 'test 10';
//$category->posts()->save($post);
//echo '<pre>';
//print_r($category->posts);
//echo '</pre>';

//for ($index = 1; $index <= 10; $index++) {
//    $category = Category::find(rand(1,4));
//    $post = new Post();
//    $post->title = 'test:' . $index;
//    $post->slug = 'test:' . $index;
//    $post->body = 'test:' . $index;
//    $category->posts()->save($post);
//}

/**
 * 5. Оновити 1 пост, замінивши поля + категорію.
 */

//$category = Category::find(2);
//$post = Post::find(1);
//$post->title = 'WWW';
//$post->slug = 'WWW';
//$post->body = 'WWW';
//$post->category_id = $category->id;
//$post->save();

/**
 * 6. Видалити пост.
 */

//$post = Post::where('slug','www')->first();
//$post->delete();
//echo '<pre>';
//print_r($post);
//echo '</pre>';

/**
 * 7. Створити 10 тегів
 */

//$tag = new Tag();
//$tag->title = 'test1';
//$tag->slug = 'test1';
//$tag->save();

//for ($index = 1; $index <= 10; $index ++) {
//    $tag = new Tag();
//    $tag->title = 'test:' . $index;
//    $tag->slug = 'test:' . $index;
//    $tag->save();
//}

/**
 * 8. Кожному вже збереженому посту прикріпити по 3 випадкові теги.
 */

//$post = Post::find(2);
//$post->tags()->sync([1,2,3]);

//$posts = Post::all();
//
//foreach ($posts as $post) {
//    $post->tags()->sync([rand(1,3),rand(4,7),rand(8,10)]);
//}

