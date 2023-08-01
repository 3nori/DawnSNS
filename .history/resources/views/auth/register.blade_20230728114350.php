@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>
<div class="label">
{{ Form::label('ユーザー名') }}
</div>
{{ Form::text('username',null,['class' => 'input']) }}
<div class="label">
{{ Form::label('メールアドレス') }}
</div>
{{ Form::text('mail',null,['class' => 'input']) }}
<div class="label">
{{ Form::label('パスワード') }}
</div>
{{ Form::text('password',null,['class' => 'input']) }}
<div class="label">
{{ Form::label('パスワード確認') }}
</div>
{{ Form::text('password-confirm',null,['class' => 'input']) }}

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
