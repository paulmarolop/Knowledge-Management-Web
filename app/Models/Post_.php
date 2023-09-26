<?php

namespace App\Models;


class Post 
{
    private static $blog_posts = [
        [
            "title" => "Luffy become the fifth Yonkou",
            "slug" => "luffy-become-the-fifth-yonkou",
            "author" => "luffy fanboy",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem tempore facere reiciendis placeat voluptas architecto cum quisquam quod tenetur atque. Natus porro sint quod quaerat voluptas eligendi et dolores dolorem praesentium, iste unde odit ipsa nihil rem laboriosam fuga labore culpa dolorum aliquam ad id dolore aut molestias. Consequuntur delectus expedita eligendi quasi dolores dolorum ipsam corrupti adipisci numquam aut culpa nam aperiam obcaecati quam est enim vel cumque rerum, doloribus fuga libero temporibus nisi. Illum quae neque rem! Excepturi beatae deserunt aspernatur sunt inventore nesciunt eligendi veritatis vitae asperiores."
        ],
        [
            "title" => "kid become the fifth Yonkou",
            "slug" => "kid-become-the-fifth-yonkou",
            "author" => "kid fanboy",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem tempore facere reiciendis placeat voluptas architecto cum quisquam quod tenetur atque. Natus porro sint quod quaerat voluptas eligendi et dolores dolorem praesentium, iste unde odit ipsa nihil rem laboriosam fuga labore culpa dolorum aliquam ad id dolore aut molestias. Consequuntur delectus expedita eligendi quasi dolores dolorum ipsam corrupti adipisci numquam aut culpa nam aperiam obcaecati quam est enim vel cumque rerum, doloribus fuga libero temporibus nisi. Illum quae neque rem! Excepturi beatae deserunt aspernatur sunt inventore nesciunt eligendi veritatis vitae asperiores, baka senchou"
        ]
    ];

    public static function all() {
        return collect(self::$blog_posts);
    }

    public static function find($slug) {
        $posts = static::all();
        // $post= [];
        // foreach ($posts as $p){
        //     if($p["slug"] === $slug){
        //         $post = $p;
        //     }
        // }
        return $posts->firstWhere('slug',$slug);
    }
}
