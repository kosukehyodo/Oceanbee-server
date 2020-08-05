@extends('layout.app')
@section('title') サーフィンやろう、教えよう | Oceanbee
@endsection
@section('content')
{{ Breadcrumbs::render('mypage') }}
<div class="p-mypage">
    @include('common.sidebar')

    <div class="p-mypage__main">
        <h3 class="c-headline">プロフィール設定</h3>
        <div class="p-mypage__frame">
            <div class="p-mypage__profile-image" id="js-img__output">
            </div>
            <div class="p-mypage__profile">
                <h5>プロフィール画像</h5>
                <p>あなたのすてきな写真を追加しましょう</p>
                <label>ファイルを選択<input type="file" name="photo" class="c-image" id="js-profile-image"></label>
            </div>
            <table class="p-mypage__table">
                <tr>
                    <th>ユーザー名</th>
                    <td><input name="name" type="text" class="c-input"></td>
                </tr>
                <tr>
                    <th>自己紹介</th>
                    <td><textarea name="profile" class="c-input" cols="50" rows="10" placeholder="500字以内"></textarea>
                    </td>
                </tr>
            </table>
            <div class="p-mypage__submit-box">
                <input type="submit" class="c-button" value="登録する">
            </div>

        </div>
    </div>
</div>

@endsection