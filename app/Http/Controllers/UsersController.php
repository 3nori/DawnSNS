<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    //プロフィール編集機能
    public function profileUpdate(Request $request){
        $validator = Validator::make($request->all(),[
            'username'  => 'required|min:2|max:12',
            'mail' => ['required', 'min:5', 'max:40', 'email', Rule::unique('users')->ignore(Auth::id())],
            'bio' => 'max:150',
        ],[
            'username.required' => '名前を入力してください',
            'username.min' => '2文字以上で入力してください',
            'username.max' => '12文字以内で入力してください',
            'mail.required' => 'メールアドレスを入力してください',
            'mail.min' => '5文字以上で入力してください',
            'mail.max' => '40文字以内で入力してください',
            'mail.email' => '有効なメールアドレス入力してください',
            'mail.unique' => 'もうすでに登録されているメールアドレスです',
            'bio.max' => '150文字以内で入力してください',
        ]);
        $validator->validate();

        $user = Auth::user();

        //画像登録
        if(isset($request->iconimage)){
            $request->validate(['iconimage' => 'image'],['iconimage.image' => '画像ファイルを入れてください']);
            $imagename=$request->file('iconimage')->getClientOriginalName();
            $request->file('iconimage')->storeAs('images',$imagename,'public');
            $user->images = $imagename;
        }

        if(isset($request->newpassword)){
            $request->validate(['newpassword' => 'min:8|max:20|alpha_num'],['newpassword.min' => '8文字以上で入力してください','newpassword.max' => '20文字以内で入力してください']);
            $user->password = bcrypt($request->input('newpassword'));
        }

        $user->username = $request->input('username');
        $user->mail = $request->input('mail');
        $user->bio = $request->input('bio');
        $user->save();

        return redirect('/profile');
    }

    //検索機能
        public function search(Request $request){
            $keyword = $request->input('keyword');
            $followNumbers = DB::table('follows')
                ->where('follower', Auth::id())
                ->pluck('follow');

            if(isset($keyword)){
                $users = DB::table('users')
                    ->where('id','<>',Auth::id())
                    ->where('username','like',"%$keyword%")
                    ->select('images','username','id')
                    ->get();
            }else{
                $users = DB::table('users')
                    ->where('id','<>',Auth::id())
                    ->select('images','username','id')
                    ->get();
            }
        return view('users.search',['users'=>$users, 'followNumbers'=>$followNumbers]);
        }

        //相手のProfile
        public function profileLink($id){
            $followNumbers = DB::table('follows')
            ->where('follower', Auth::id())
            ->pluck('follow');
            $user = DB::table('users')
            ->where('id', $id)
            ->select('images','id','username','bio')
            ->first();
            $posts = DB::table('posts')
            ->join('users','posts.user_id','=','users.id')
            ->where('users.id', $id)
            ->select('users.images','users.username','posts.posts','posts.created_at as created_at','posts.id','posts.user_id')
            ->orderBy('posts.created_at','DESC')
            ->get();
            return view('users.userprofile',['posts'=>$posts ,'user'=>$user ,'followNumbers'=>$followNumbers]);
        }

    }



