@extends('layouts.logout')

@section('content')

<div id="clear">
    <div class="tou">
        <p> {{session('name')}}さん、</p>
        <p>ようこそ！DAWNSNSへ！</p>
    </div>
<p>ユーザー登録が完了しました。</p>
<p>さっそく、ログインをしてみましょう。</p>

<p class="btn"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection