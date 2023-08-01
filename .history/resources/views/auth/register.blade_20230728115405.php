@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>
<div class="label">
{{ Form::label('UserName') }}
</div>
{{ Form::text('username',null,['class' => 'input']) }}
<div class="label">
{{ Form::label('MailAdress') }}
</div>
{{ Form::text('mail',null,['class' => 'input']) }}
<div class="label">
{{ Form::label('Password') }}
</div>
{{ Form::text('password',null,['class' => 'input']) }}
<div class="label">
{{ Form::label('Password confirm') }}
</div>
{{ Form::text('password-confirm',null,['class' => 'input']) }}

<
{{ Form::submit('Register') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
