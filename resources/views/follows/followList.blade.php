@extends('layouts.login')

@section('content')
<!--アイコンのみ表示、アイコン押すと対象のＰｒｏｆｉｌｅ画面へ移動-->
<tbody>
    @foreach ($users as $user)
        <tr>
            <!--アイコン画像-->
            <td class="">
                <img class="icon" src="/storage/images/{{ $post->images }}">
            </td>
    @endforeach
</tbody>
<!--フォロワーのつぶやきを表示。多分ここは投稿の条件書き換えじゃないかな-->
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
    @endforeach
</tbody>
@endsection