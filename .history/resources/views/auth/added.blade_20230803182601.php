@extends('layouts.logout')

@section('content')

<div id="clear">
    <div class="regi">
        <p> {{session('name')}}さん、</p>
        <p>ようこそ！DAWNSNSへ！</p>
    </div>

    <div class="kanryo">
        <p>ユーザー登録が完了しました。</p>
        <p>さっそく、ログインをしてみましょう。</p>
        </div>

<p class="btn"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection