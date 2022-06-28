<?php

namespace App\Models;



class Post
{
    private static $blog_posts = [
        [
            "title" => "Tulisan Dindan",
            "slug" => "judul-post-pertama",
            "autor" => "dindan romadhoni",
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos fugit itaque voluptas a necessitatibus amet voluptatem deleniti natus. Ducimus officia magni laboriosam ea velit voluptatum quos nesciunt, dolores numquam id nihil eligendi dolorem minima cumque labore illum ab inventore sunt vero? Dolorem libero iste dolorum ducimus dicta cupiditate sunt labore totam deleniti! Sequi facere odit similique nisi exercitationem rerum cumque ipsam asperiores ducimus natus, fuga nostrum, perferendis aliquid architecto! Rem, possimus. Expedita possimus voluptatibus earum sint laboriosam tempore minus corporis neque incidunt harum blanditiis, autem ex consectetur cumque similique ipsam architecto quis ducimus ipsa libero velit non! Impedit, nisi deserunt!"
        ],
        [
            "title" => "Judul post kedua",
            "slug" => "judul-post-kedua",
            "autor" => "jajan",
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos fugit itaque voluptas a necessitatibus amet voluptatem deleniti natus. Ducimus officia magni laboriosam ea velit voluptatum quos nesciunt, dolores numquam id nihil eligendi dolorem minima cumque labore illum ab inventore sunt vero? Dolorem libero iste dolorum ducimus dicta cupiditate sunt labore totam deleniti! Sequi facere odit similique nisi exercitationem rerum cumque ipsam asperiores ducimus natus, fuga nostrum, perferendis aliquid architecto! Rem, possimus. Expedita possimus voluptatibus earum sint laboriosam tempore minus corporis neque incidunt harum blanditiis, autem ex consectetur cumque similique ipsam architecto quis ducimus ipsa libero velit non! Impedit, nisi deserunt!"
        ],
    ];
    public static function all()
    {
        return collect(self::$blog_posts);
    }
    public static function find($slug)
    {
        $posts = static::all();
    return $posts->firstWhere('slug', $slug);
    }
}
