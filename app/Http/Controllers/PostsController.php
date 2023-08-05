<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;

class PostsController extends Controller
{
    //投稿
    public function index(){

        //Lesson6 indexメソッド参照　https://dawn-techschool.com/curriculum/server/6/41
        $posts = DB::table('posts')->get();
        return view('posts.index',['posts'=>$posts]);
        //ここの「posts」はブレードと同じであればいい
    }

    //表示
    //Post::create([ はPostのモデルを見に行っている
    public function create(Request $request){
        Post::create([
        'user_id' => auth()->id(),
        'posts'   => $request->newPost
        ]);
        return redirect('top');
    }

    //編集
    public function update(Request $request){
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );
        return redirect('top');

    }
}
