<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Follow;

class FollowsController extends Controller
{
    //フォローリスト表示
    public function followList(Request $request){

        $users =Follow::create([
            'user_id' => auth()->id(),
            'posts'   => $request->newPost
            ]);

        return view('follows.followList');
    }

    //フォロワーリスト表示
    public function followerList(Request $request){


        return view('follows.followerList',);
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

