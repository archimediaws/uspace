<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
	    'title' => $faker->text(50),
	    'alias' => $faker->slug(10),
	    'contenu'  => $faker->text(200)
    ];
});
