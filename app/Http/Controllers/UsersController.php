<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\Rule;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }


    public function profileUpdate(Request $request){
        $validator = Validator::make($request->all(),[
            'username'  => 'required|min:2|max:12',
            'mail' => ['required', 'min:5', 'max:40', 'email', Rule::unique('users')->ignore(Auth::id())],
            'newpassword' => 'min:8|max:20|confirmed|alpha_num',
            'newpassword_confirmation' => 'min:8|max:20|alpha_num',
            'bio' => 'max:150',
            'iconimage' => 'image',
        ]);

        $user = Auth::user();
        //画像登録
        $image = $request->file('iconimage')->store('public/images');
        $validator->validate();
        $user->update([
            'username' => $request->input('username'),
            'mail' => $request->input('mail'),
            'password' => bcrypt($request->input('newpassword')),
            'bio' => $request->input('bio'),
            'images' => basename($image),
        ]);

        return redirect('/profile');
    }

        public function search(){
        return view('users.search');
        }


    }

