@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>

<!--ヘッダーでロゴにリンクとプルダウンメニュー-->

<header>
    <div id="logo">
        <a href=""></a>
    </div>
</header>

<!--投稿するやつ-->
<div class="tweets">
    <!-- {!! Form::open(['url' => 'post/create']) !!} -->
    <form action='post/create' method='post'>
        @csrf
        <div class="form-group">
            <!-- {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか…？']) !!} -->
            <input type='text' name='newPost' class='form-control' placeholder='何をつぶやこうか…？' require>
        </div>
        <button type="submit" class="btn btn-success pull-right">投稿</button>
        <!-- {!! Form::close() !!} -->
    </form>
</div>

<!--他の投稿が見れるようにする-->
<tbody>
    @foreach ($posts as $i => $post)
        <tr>
            <!-- 投稿者名の表示 -->
            <td class="">
                <div class="Namae">{{ Auth::user()->username}}</div>
            </td>
            <!-- 投稿詳細 -->
            <td class="">
                <div class="Naiyou">{{ $post->posts }}</div>
            </td>

            <td><a class="btn btn-primary" href="/post/{{ $post->id }}/update" >更新</a></td>
            <td><a class="btn btn-danger" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
        </tr>
    @endforeach
</tbody>

<!--編集画面のモーダル-->
<div class="modal-update js-modal" id="modal01">
    <div class="modal-inner">
        <div class="inner-content">
            <!--編集フォームのウインドウ-->
            <div class="Update">
                {!! Form::hidden('id', '$post->id') !!}
                {!! Form::input('text', 'upPost', $post->posts, ['required', 'class' => 'form-control']) !!}

                <!--編集ボタン-->
            <a class="send-button modalClose">
                <img src="../../../public/images/edit.png" att="編集" class="image-modal">
            </a>
        </div>

        </div>
            {!! Form::close() !!}
    </div>
</div>

@endsection

