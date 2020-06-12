@extends('layout.app')
@section('title') サーフィンやろう、教えよう | Oceanbee
@endsection
@section('content')
    <div class="p-login">
        <div class="p-login__frame">
            <form action="{{ route('login')}}" method="POST">
            @csrf
            <h2 class="c-headline">ログイン</h2>
            <ul class="p-login__list">
                <li>
                    <label for="email">メールアドレス</label>
                    <input type="text" name="email" class="c-input" placeholder="">
                </li>
                <li>
                    <label for="password">パスワード</label>
                    <input type="password" name="password" class="c-input" placeholder="">
                </li>
                <li>
                    <input type="submit" class="c-button" value="ログインする">
                </li>
            </ul>
        </form>
        </div>
    </div>
@endsection