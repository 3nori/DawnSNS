<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use Auth;

class PostsController extends Controller
{
    //投稿
    public function index(){

        //Lesson6 indexメソッド参照　https://dawn-techschool.com/curriculum/server/6/41
        //今は現在の記述だと自分の投稿のみ取得しているような形になるので、
        //フォローしている人のデータまで見られるように記述を追加する必要がある
        $posts = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->where('posts.user_id',Auth::id())
        ->select('users.images','users.username','posts.posts','posts.created_at as created_at','posts.id')
        ->orderBy('posts.created_at','DESC')
        ->get();
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

    //削除
    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('top');
    }
}
