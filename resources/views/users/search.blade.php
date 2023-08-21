@extends('layouts.login')

@section('content')

<div>
    <form action="/search" method="GET">

    @csrf

        <input type="text" name="keyword">
        <input type="submit" value="検索">
    </form>
</div>

<!--ユーザー検索-->
<table>
    @foreach ($users as $user)
        <tr>
            <!--アイコン画像-->
            <td class="">
                <img class="icon" src="/storage/images/{{ $user->images }}">
            </td>
            <!-- 投稿者名の表示 -->
            <td class="">
                <div class="Namae">{{ $user->username}}</div>
            </td>
            @if($followNumbers->contains($user->id))
            <td>
                <!--フォロー解除ボタン-->
                <form action="/unfollow" method="POST">
                @csrf
                @method('delete')
                    <input type="hidden" name="follow_id" value="{{ $user->id}}">
                    <button>フォローをはずす</button>
                </form>
            </td>
            @else
            <td>
                <!--フォローボタン-->
                <form action="/follow" method="POST">
                @csrf
                    <input type="hidden" name="follow_id" value="{{ $user->id}}">
                    <button>フォローする</button>
                </form>
            </td>
            @endif
        </tr>
    @endforeach
</table>

@endsection