@extends('layout.app')
@section('title') サーフィンやろう、教えよう | Oceanbee
@endsection
@section('content')
<div class="p-register">
    <div class="p-register__frame">
        <form action="{{ route('register')}}" method="POST">
            @csrf
            <h2 class="c-headline">本登録</h2>
            <ul class="p-register__list">
                <li class="">
                    <label for="name">ニックネーム</label>
                    <input type="text" name="name" class="c-input" placeholder="オーシャビー太郎">
                </li>
                <li class="email">
                    <label for="password">パスワード</label>
                    <input type="password" name="password" class="c-input" placeholder="6文字以上の半角英数字">
                </li>
                <li>
                    <input type="submit" name="button" class="c-button" value="登録する">
                </li>
            </ul>
        </form>
    </div>
</div>
<p>登録フォーム </p>
@endsection