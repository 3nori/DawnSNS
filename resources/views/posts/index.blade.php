@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>

<!--ヘッダーでロゴにリンクとプルダウンメニュー-->

<header>
    <div id="logo">
        <a href="/top"></a>
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
            <!--アイコン画像-->
            <td class="">
                <img class="icon" src="/storage/images/{{ $post->images }}">
            </td>
            <!-- 投稿者名の表示 -->
            <td class="">
                <div class="Namae">{{ $post->username}}</div>
            </td>
            <!-- 投稿詳細 -->
            <td class="">
                <div class="Naiyou">{{ $post->posts }}</div>
            </td>


            <!--編集画面のモーダル-->
            <div class="modal-update js-modal" id="{{ $post->id }}">
                <form action="post/update" method="post">
                    @csrf
                    <div class="modal-inner">
                        <div class="inner-content">
                            <!--編集フォームのウインドウ-->
                            <div class="Update">
                                <input type="hidden" name="id" value="{{ $post->id }}">
                                <input type="text" name="upPost" value="{{ $post->posts }}" required class="form-control">
                                <!--編集ボタン-->
                                <button class="send-button">
                                    <img src="/images/edit.png" att="編集" class="image-modal">
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @if(Auth::id() === $post->user_id)
            <td><a class="btn btn-primary modalopen" href=""  data-target="{{ $post->id }}">更新</a></td>
            <td><a class="btn btn-danger" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
            @endif
        </tr>
    @endforeach
</tbody>





@endsection

