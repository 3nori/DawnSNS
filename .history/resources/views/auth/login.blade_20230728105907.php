@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<p class="wel>DAWNSNSへようこそ</p>

<div class="label">
{{ Form::label('e-mail') }}
</div>
<div>
{{ Form::text('mail',null,['class' => 'input']) }}
</div>
<div class="label">
{{ Form::label('password') }}
</div>
<div>
{{ Form::password('password',['class' => 'input']) }}
</div>
{{ Form::submit('ログイン') }}

<p class=><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
