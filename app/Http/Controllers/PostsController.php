<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    //
    public function index(){

        //Lesson6 indexメソッド参照　https://dawn-techschool.com/curriculum/server/6/41
        $posts = DB::table('posts')->get();
        return view('posts.index',['posts'=>$posts]);
    }
}
