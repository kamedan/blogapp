<?php
/**
 * Created by PhpStorm.
 * User: Amine
 * Date: 20/09/2016
 * Time: 09:49
 */

namespace App\Http\Controllers;


class PostController extends Controller
{
    public function getBlogIndex()
    {
        return view('frontend.blog.index');
    }

    public function getSingleIndex($post_id, $end = 'frontend')
    {
        return view($end.'.blog.single');
    }

}