@extends('layout.app')
@section('title') サーフィンやろう、教えよう | Oceanbee
@endsection
@section('content')
<div class="p-top">
    <div class="p-top__img" id="js-top-img">
        <img src="{{ asset('/image/beach-yoga.jpg') }}" width="1000" height="300" alt="a">
        <img src="{{ asset('/image/enoshima-coast.jpg') }}" width="1000" height="300" alt="b">
        <img src="{{ asset('/image/surf1.jpg') }}" width="1000" height="300" alt="c">
    </div>
    <div class="p-top__map">
        <div id="my-map"></div>

    </div>
    <div class="p-top__introduction">人気・インストラクター</div>
</div>
@endsection