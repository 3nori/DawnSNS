@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<p>DAWNSNSへようこそ</p>

<div class="label">
{{ Form::label('e-mail') }}
</div>
<div>
{{ Form::text('mail',null,['class' => 'input']) }}
</div>
<div class="moji">
{{ Form::label('password') }}
</div>
<div>
{{ Form::password('password',['class' => 'input']) }}
</div>
{{ Form::submit('ログイン') }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
