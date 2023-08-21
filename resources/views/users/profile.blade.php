@extends('layouts.login')

@section('content')

<img src="{{ asset('storage/images/' .auth()->user()->images) }}">

<form action="{{ url('profileup') }}" enctype="multipart/form-data" method="post">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    <dl class="UserProfile">
        <dt>Username</dt>
            <dd><input type="text" name="username" value="{{ Auth::user()->username }}"></dd>
        <dt>Mail Address</dt>
            <dd><input type="text" name="mail" value="{{ Auth::user()->mail }}"></dd>
        <dt>Password</dt>
            <dd><input readonly type="password" name="password" value="●●●"></dd>
        <dt>new Password</dt>
            <dd><input type="password" name="newpassword"></dd>
        <dt>Bio</dt>
            <dd><input type="text" name="bio" value="{{ Auth::user()->bio }}"></dd>
        <dt>Icon Image</dt>
            <dd><input type="file" name="iconimage"></dd>
        </dl>
            <input type="submit" name="profileupdate" value="更新">
</form>

@endsection

<!--ここ参考にしました　https://qiita.com/mokomokotime_/items/dc881f946c1ce9efad4e-->