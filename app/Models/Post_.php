<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            'title' => 'Judul 1',
            'slug' => 'judul-1',
            'author' => 'Daniel',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos, ipsa provident! Nemo laboriosam odit molestiae. Maxime eveniet cumque itaque impedit dicta distinctio facere! Quia natus modi delectus perspiciatis. Doloremque, minima.'
        ],
        [
            'title' => 'Judul 2',
            'slug' => 'judul-2',
            'author' => 'Daniel',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos, ipsa provident! Nemo laboriosam odit molestiae. Maxime eveniet cumque itaque impedit dicta distinctio facere! Quia natus modi delectus perspiciatis. Doloremque, minima.'
        ]
    ];

    public static function all() {
        return collect(self::$blog_posts);
    }

    public static function find($slug) {
        $posts = static::all();

        // $post = [];
        // foreach($posts as $p) {
        //     if($p['slugs'] === $slug) {
        //         $post = $p;
        //     }
        // }

        return $posts->firstWhere('slug', $slug);
    }
}