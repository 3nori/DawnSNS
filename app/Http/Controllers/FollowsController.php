<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Follow;

class FollowsController extends Controller
{
    //フォローリスト表示
    public function followList(){
        $users = DB::table('users')
        ->join('follows','follows.follow','=','users.id')
        ->where('follower', auth()->id())
        ->select('images','users.id')
        ->get();
        $posts = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->join('follows','follows.follow','=','users.id')
        ->where('follower', auth()->id())
        ->select('users.images','users.username','posts.posts','posts.created_at as created_at','posts.id','posts.user_id')
        ->orderBy('posts.created_at','DESC')
        ->get();
        return view('follows.followList',['posts'=>$posts ,'users'=>$users]);
    }

    //フォロワーリスト表示
    public function followerList(){
        $users = DB::table('users')
        ->join('follows','follows.follower','=','users.id')
        ->where('follow', auth()->id())
        ->select('images','users.id')
        ->get();
        $posts = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->join('follows','follows.follower','=','users.id')
        ->where('follow', auth()->id())
        ->select('users.images','users.username','posts.posts','posts.created_at as created_at','posts.id','posts.user_id')
        ->orderBy('posts.created_at','DESC')
        ->get();
        return view('follows.followerList',['posts'=>$posts ,'users'=>$users]);
    }

    //フォロー
    //投稿を参考
    public function follow(Request $request){
        Follow::create([
        'follower' => auth()->id(),
        'follow'   => $request->follow_id
        ]);
        return back();
    }

        // フォロー機能のクエリビルダ版
        // DB::table('follows')
        //    ->insert([
        //        'follower' => auth()->id(),
        //        'follow' => $request->follow_id,
        //        'created_at' => now(),
        //    ]);

    //フォロー解除
        public function unfollow(Request $request)
        {
            DB::table('follows')
                ->where('follow', $request->follow_id)
                ->where( 'follower', auth()->id())
                ->delete();
                return back();
        }

}

