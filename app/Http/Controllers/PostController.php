<?php
/**
 * Created by PhpStorm.
 * User: Amine
 * Date: 20/09/2016
 * Time: 09:49
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function getBlogIndex()
    {
        $posts = Post::Paginate(5);
        foreach($posts as $post)
        {
            $post->body = $this->shortenText($post->body, 20);
        }
        return view('frontend.blog.index' , ['posts' => $posts]);
    }

    public function getSinglePost($post_id, $end = 'frontend')
    {
        $post = Post::find($post_id);
        if(!$post){
            return redirect()->route('blog.index')->with(['fail' => 'Post not found']);
        }
        return view($end.'.blog.single', ['post' => $post]);
    }

    public function getCreatePost()
    {
        return view('admin.blog.create_post');
    }

    public function postCreatePost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:120|unique:posts',
            'author' => 'required|max:80',
            'body' => 'required',
        ]);

        $post = new Post();
        $post->title = $request['title'];
        $post->author = $request['author'];
        $post->body = $request['body'];
        $post->save();

        //attach categories

        return redirect()->route('admin.index')->with(['success' => 'Post Successfully created']);
    }

    public function getPostIndex()
    {
        $posts = Post::Paginate(5);
        foreach($posts as $post)
        {
            $post->body = $this->shortenText($post->body, 20);
        }
        return view('admin.blog.index' , ['posts' => $posts]);
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

    public function getUpdatePost($post_id)
    {
        $post = Post::find($post_id);
        if(!$post){
            return redirect()->route('blog.index')->with(['fail' => 'Post not found']);
        }
        //find categories
        return view('admin.blog.edit_post', ['post' => $post]);

    }

    public function postUpdatePost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:120',
            'author' => 'required|max:80',
            'body' => 'required',
        ]);

        $post = Post::find($request['post_id']);
        $post->title = $request['title'];
        $post->author = $request['author'];
        $post->body = $request['body'];
        $post->update();

        //attach categories

        return redirect()->route('admin.index')->with(['success' => 'Post Successfully edited']);
    }

    public function getDeletePost($post_id)
    {
        $post = Post::find($post_id);
        if(!$post){
            return redirect()->route('blog.index')->with(['fail' => 'Post not found']);
        }
        $post->delete();
        return redirect()->route('admin.index')->with(['success' => 'Post deleted']);


    }

}