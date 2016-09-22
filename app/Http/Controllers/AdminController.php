<?php
/**
 * Created by PhpStorm.
 * User: Amine
 * Date: 20/09/2016
 * Time: 14:16
 */

namespace App\Http\Controllers;
use App\Post;


class AdminController extends Controller
{
    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        foreach($posts as $post)
        {
            $post->body = $this->shortenText($post->body, 20);
        }
        return view('admin.index', ['posts' => $posts]);
    }
    public function shortenText($text, $words_count)
    {
        if(str_word_count($text, 0)> $words_count)
        {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0 , $pos[$words_count]).'...';
        }
        return $text;
    }


}