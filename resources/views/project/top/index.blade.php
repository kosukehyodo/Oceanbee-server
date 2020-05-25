@extends('layout.app')
@section('title') サーフィンやろう、教えよう | Oceanbee
@endsection
@section('content')
<div class="p-top">
    <div class="p-top__img" id="js-top-img">
        <img src="{{ asset('/image/beach-yoga.jpg') }}" width="100" height="100" alt="">
        <img src="{{ asset('/image/enoshima-coast.jpg') }}" width="100" height="100" alt="">
        <img src="{{ asset('/image/surf1.jpg') }}" width="100" height="100" alt="">
    </div>
    <div class="p-top__map">地図</div>
    <div class="p-top__introduction">人気・インストラクター</div>
</div>
@endsection