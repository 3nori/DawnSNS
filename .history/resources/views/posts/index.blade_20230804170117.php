@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>

<div class="tweets">
{!! Form::open(['url' => 'post/create']) !!}
    <div class="form-group">
        {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
     </div>
     <button type="submit" class="btn btn-success pull-right">追加</button>
 {!! Form::close() !!}

</div>
@endsection