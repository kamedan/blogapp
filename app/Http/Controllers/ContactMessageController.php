<?php
/**
 * Created by PhpStorm.
 * User: Amine
 * Date: 20/09/2016
 * Time: 10:54
 */

namespace App\Http\Controllers;


class ContactMessageController extends Controller
{
    public function getContactIndex()
    {
        return view('frontend.other.contact');
    }

}