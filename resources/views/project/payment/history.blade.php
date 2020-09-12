@extends('layout.app')
@section('title') サーフィンやろう、教えよう | Oceanbee
@endsection
@section('content')
{{ Breadcrumbs::render('profile') }}
<div class="l-mypage">
    @include('common.sidebar')
    <div class="p-payment-history__main">
        <ul class="tab-group">
            <li class="tab is-active">
                <a href="/payment/history" class="c-link">支払い履歴</a>
            </li>
            <li class="tab">
                <a href="/credit_card/create" class="c-link">カード情報</a>
            </li>
        </ul>

        <!--タブを切り替えて表示するコンテンツ-->
        <div class="group">
            <div class="panel is-show">Content-A</div>
        </div>
    </div>
</div>
@endsection

@section('bodyScript')
<script type="text/javascript">
    window.onload = function() {
        $('.tab').click(function() {
            $('.is-active').removeClass('is-active');
            $(this).addClass('is-active');
            $('.is-show').removeClass('is-show');
            // クリックしたタブからインデックス番号を取得
            const index = $(this).index();
            // クリックしたタブと同じインデックス番号をもつコンテンツを表示
            $('.panel').eq(index).addClass('is-show');
        });
    };
</script>
@endsection