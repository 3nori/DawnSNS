<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;

class PostsController extends Controller
{
    //
    public function index(){

        //Lesson6 indexメソッド参照　https://dawn-techschool.com/curriculum/server/6/41
        $posts = DB::table('posts')->get();
        return view('posts.index',['posts'=>$posts]);
        //ここの「posts」はブレードと同じであればいい
    }

    //Post::create([ はPostのモデルを見に行っている
    public function create(Request $request){
        Post::create([
        'user_id' => auth()->id(),
        'posts'   => $request->newPost
        ]);
        return redirect('top');
    }
}
