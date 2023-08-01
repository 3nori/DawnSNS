@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>
<div class="label">
{{ Form::label('UserName') }}
</div>
<div>
{{ Form::text('username',null,['class' => 'input']) }}
</div>
<div class="label">
{{ Form::label('MailAdress') }}
</div>
<div>
{{ Form::text('mail',null,['class' => 'input']) }}
</div>
<div class="label">
{{ Form::label('Password') }}
</div>
<div>
{{ Form::text('password',null,['class' => 'input']) }}
</div>
<div class="label">
{{ Form::label('Password confirm') }}
</div>
<div>
{{ Form::text('password-confirm',null,['class' => 'input']) }}
</div>
<div class="Register">
{{ Form::submit('Register') }}
</div>

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
