@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<p>DAWNSNSへようこそ</p>

<div>
{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
</div>
<div>
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}
</div>
{{ Form::submit('ログイン') }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
