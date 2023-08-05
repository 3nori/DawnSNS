<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(){

        $posts = DB::ta
        return view('posts.index');
    }
}
