@extends('layout.app')
@section('title') サーフィンやろう、教えよう | Oceanbee
@endsection
@section('content')
{{ Breadcrumbs::render('mypage') }}
<div class="p-plan-create">
    @include('common.sidebar')
    <div class="p-plan-create__main">
        <h3 class="c-headline p-plan-create__headline">プランを作成する</h3>
        <div class="p-plan-create__frame">
            <div class="p-plan-create__title">
                <h4>タイトル</h4>
                <p>提供できる内容をわかりやすく記載しましょう。20文字以上80文字以内。</p>
                <input type="text" name="title" class="c-input" placeholder="サーフィン初心者教えます！">
            </div>
            <div class="p-plan-create__photo">
                <h4>写真を掲載</h4>
                <p>スマホやカメラを使って写真を撮りましょう。1枚以上の写真が必要です。</p>
                <input type="file" name="photo[]" id="js-photo" accept="image/*" multiple>
                <div id="js-img__output"></div>
            </div>
            <h4 class="p-plan-create__tag-title">ハッシュタグ</h4>
            <ul id="myTags" value="tags" name="tags"></ul>
            <div class="p-plan-create__body">
                <h4>プラン内容</h4>
                <p>提供できる内容を記載しましょう。2000文字以内。</p>
                <textarea name="notes" rows="20" class="c-input"
                    placeholder="etc はじまして！&#13;&#10;サーフィン教えます。"></textarea>
            </div>
            <div class="p-plan-create__price">
                <h4>価格</h4>
                <select required>
                    <option value="1">単発</option>
                    <option value="2">月額</option>
                    <option value="3">年額</option>
                </select>
                <input type="text" name="price" class="c-input" placeholder="10,000">円
            </div>
            <div class="p-plan-create__address">
                <h4>場所</h4>
                <select required>
                    @foreach(config('prefecture') as $key => $area)
                    <option value="{{ $key }}">{{ $area }}</option>
                    @endforeach
                </select>
                <input type="text" name="address" class="c-input" placeholder="江ノ島水族館付近">
            </div>
        </div>
    </div>
</div>
@endsection

@section('bodyScript')
<!-- todo::モジュール化して外部ファイルで呼び出したい（できなくて諦めた） -->
<script type="text/javascript">
    $(function() {
        $("#myTags").tagit({
            singleField: true,
            //自動補完するワードを設定
            availableTags: ['php', 'ruby', 'react', 'reactNative', 'laravel']
        });
    });
</script>
@endsection