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
                    <label for="name">名前</label>
                    <input type="text" name="last_name" class="c-input" placeholder="田中" width="120px">
                </li>
                <li class="">
                    <label for="name"></label>
                    <input type="text" name="first_name" class="c-input" placeholder="太郎" width="120px">
                </li>
                <li class="email">
                    <label for="password">パスワード</label>
                    <input type="password" name="password" class="c-input" placeholder="6文字以上の半角英数字">
                </li>
                <li>
                    <input type="hidden" name="email_verify_token" value="{{ Request::input('token') }}">
                    <input type="submit" class="c-button" value="登録する/ログインする">
                </li>
            </ul>
        </form>
    </div>
</div>
@endsection