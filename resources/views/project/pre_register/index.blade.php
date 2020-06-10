@extends('layout.app')
@section('title') サーフィンやろう、教えよう | Oceanbee
@endsection
@section('content')
<div class="p-pre-register">
    <div class="p-pre-register__frame">
        <form action="{{ route('pre_register')}}" method="POST">
            @csrf
            <h2 class="c-headline">アカウント登録</h2>
            <div class="p-pre-register__sns-account">
                <span>SNSアカウントで登録</span>
                <i class="fab fa-line fa-4x line-green"></i>
                <i class="fab fa-facebook-square fa-4x fb-blue"></i>
                <i class="fab fa-twitter-square fa-4x tw-blue"></i>
            </div>
            <div class="p-pre-register__email">
                <span>メールアドレスで登録</span>
                <input type="email" name="email" class="c-input" placeholder="メールアドレスを入力">
                <button type="submit" class="c-button">登録する</button>
            </div>
        </form>
    </div>
</div>
@endsection