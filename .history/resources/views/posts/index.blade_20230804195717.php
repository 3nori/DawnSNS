@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>


{{--}}
<div class="tweets">
{!! Form::open(['url' => 'post/create']) !!}
    <div class="form-group">
        {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか…？']) !!}
    </div>
    <button type="submit" class="btn btn-success pull-right">投稿</button>
 {!! Form::close() !!}

</div>
@endsection

return redirect('/index');