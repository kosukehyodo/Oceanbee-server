@extends('layout.app')
@section('title') サーフィンやろう、教えよう | Oceanbee
@endsection
@section('content')
{{ Breadcrumbs::render('mypage') }}
<div class="p-mypage">
    @include('common.sidebar')
    <div class="p-mypage__main">メインコンテンツ</div>
</div>

@endsection