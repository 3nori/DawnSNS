@extends('layouts.login')

@section('content')
<!--アイコンのみ表示、アイコン押すと対象のＰｒｏｆｉｌｅ画面へ移動-->
<table>
    @foreach ($users as $user)
            <tr>
                <!--アイコン画像-->
                <td class="">
                    <a href="/profile/{{ $user->id}}">
                        <img class="icon" src="/storage/images/{{ $user->images }}">
                    </a>
                </td>
    @endforeach
</table>
<!--フォロワーのつぶやきを表示。多分ここは投稿の条件書き換えじゃないかな-->
<table>
    @foreach ($posts as $post)
            <tr>
                <!--アイコン画像-->
                <td class="">
                    <a href="/profile/{{ $post->user_id}}">
                        <img class="icon" src="/storage/images/{{ $post->images }}">
                    </a>
                </td>
                <!-- 投稿者名の表示 -->
                <td class="">
                    <div class="Namae">{{ $post->username}}</div>
                </td>
                <!-- 投稿詳細 -->
                <td class="">
                    <div class="Naiyou">{{ $post->posts }}</div>
            </td>
    @endforeach
</table>
@endsection