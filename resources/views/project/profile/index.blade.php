@extends('layout.app')
@section('title') サーフィンやろう、教えよう | Oceanbee
@endsection
@section('content')
{{ Breadcrumbs::render('profile') }}
<div class="p-profile">
    @include('common.sidebar')
    <form method="POST" action="{{ url('profile/'.$user->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="p-profile__main">
            <h3 class="c-headline">プロフィール設定</h3>
            <div class="p-profile__frame">
                <div class="p-profile__image" id="js-img__output">
                </div>
                <div class="p-profile__image-file">
                    <h5>プロフィール画像</h5>
                    <p>あなたのすてきな写真を追加しましょう</p>
                    <label>ファイルを選択<input type="file" name="image" class="c-image" id="js-profile-image"></label>
                </div>
                <table class="p-profile__table">
                    <tr>
                        <th>ユーザー名</th>
                        <td><input name="name" type="text" class="c-input" value="{{ $user->name }}"></td>
                    </tr>
                    <tr>
                        <th>自己紹介</th>
                        <td><textarea name="profile" class="c-input" cols="50" rows="10"
                                placeholder="500字以内">{{ $user->profile ?? ''}}</textarea>
                        </td>
                    </tr>
                </table>
                <div class="p-profile__submit-box">
                    <input type="submit" class="c-button" value="登録する">
                </div>
            </div>
        </div>
</div>
@endsection

@section('bodyScript')
<script type="text/javascript">
    $(function() {
        const image = @json($user->image);
        if (image) {
            $("#js-img__output").css('backgroundImage',`url("/images/${image}")`); 
        }
    });
</script>
@endsection