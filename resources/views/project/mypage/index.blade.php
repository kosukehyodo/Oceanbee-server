@extends('layout.app')
@section('title') サーフィンやろう、教えよう | Oceanbee
@endsection
@section('content')
{{ Breadcrumbs::render('mypage') }}
<div class="p-mypage">
    @include('common.sidebar')

    <div class="p-mypage__main">
        <div class="p-mypage__profile-image" id="js-img__output">
            
        </div>
        <label>ファイルを選択<input type="file" name="photo" class="c-image" id="js-profile-image"></label>
    </div>
</div>

@endsection