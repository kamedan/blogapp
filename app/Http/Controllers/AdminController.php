<?php
/**
 * Created by PhpStorm.
 * User: Amine
 * Date: 20/09/2016
 * Time: 14:16
 */

namespace App\Http\Controllers;


class AdminController extends Controller
{
    public function getIndex()
    {
        return view('admin.index');
    }

}