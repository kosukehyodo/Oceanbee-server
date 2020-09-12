@extends('layout.app')
@section('title') サーフィンやろう、教えよう | Oceanbee
@endsection
@section('content')
{{ Breadcrumbs::render('profile') }}
<div class="l-mypage">
    @include('common.sidebar')
    <div class="p-card__main">
        <ul class="tab-group">
            <li class="tab">
                <a href="/payment/history" class="c-link">支払い履歴</a>
            </li>
            <li class="tab is-active">
                <a href="/credit_card/create" class="c-link">カード情報</a>
            </li>
        </ul>

        <!--タブを切り替えて表示するコンテンツ-->
        <div class="p-card__content">
            <form action="{{route('credit_card.store')}}" class="card-form" id="payment-form" method="POST">
                @csrf
                <h4 class="c-headline">クレジットカード情報入力</h4>
                <table class="p-card__table">
                    @if($card)
                    <tr>
                        <th>保存済みカード</th>
                        <td>
                            <span class="p-card__number">{{ $card['number'] }}</span>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <th>カード番号</th>
                        <td>
                            <div id="cardNumber"></div>
                        </td>
                    </tr>
                    <tr>
                        <th>有効期限</th>
                        <td>
                            <div id="expiration"></div>
                        </td>
                    </tr>
                    <tr>
                        <th>セキュリティコード</th>
                        <td>
                            <div id="securityCode"></div>
                        </td>
                    </tr>
                </table>
                <div class="p-card__submit-box">
                    <input type="submit" class="c-button" id="create_token" value="{{ $card ? '削除する' : '登録する' }}">
                </div>
            </form>
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