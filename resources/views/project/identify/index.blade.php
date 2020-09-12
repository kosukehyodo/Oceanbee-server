@extends('layout.app')
@section('title') サーフィンやろう、教えよう | Oceanbee
@endsection
@section('content')
{{ Breadcrumbs::render('profile') }}
<div class="l-mypage">
    @include('common.sidebar')
    <form method="POST" action="{{ route('identify.store')}}">
        @csrf
        <div class="l-mypage__main">
            <div class="p-identify__desc">
                <h3 class="c-headline">本人確認</h3>
                <span>本人確認は売り上げを出金する際に必要になるものですので、ゲストとしてご利用いただく場合は登録する必要はございません。<br></span>
            </div>
            <div class="p-identify__frame">
                <!-- <table class="p-identify__table">
                <tr>
                    <th>事業者の種類</th>
                    <td>
                        <label><input type="radio" name="type" onclick="formSwitch()" checked>個人</label>
                        <label><input type="radio" name="type" onclick="formSwitch()">法人</label>
                    </td>
                </tr>
            </table> -->
                <table id="p-identify-individual__table">
                    <tr>
                        <th>性別</th>
                        <td>
                            <label><input type="radio" value="male" name="gender" {{ ($stripe_account->individual['gender'] ?? '') == 'male' ? 'checked' : ''}}>男性</label>
                            <label><input type="radio" value="female" name="gender" {{ ($stripe_account->individual['gender'] ?? '') == 'female' ? 'checked' : ''}}>女性</label>
                        </td>
                    </tr>
                    <tr>
                        <th>氏名</th>
                        <td>
                            <input name="last_name_kanji" type="text" class="c-input" value="{{ $stripe_account->individual['last_name_kanji'] ?? '' }}" placeholder="山田">
                            <input name="first_name_kanji" type="text" class="c-input" value="{{ $stripe_account->individual['first_name_kanji'] ?? '' }}" placeholder="太郎">
                        </td>
                    </tr>
                    <tr>
                        <th>氏名(カナ)</th>
                        <td>
                            <input name="last_name_kana" type="text" class="c-input" value="{{ $stripe_account->individual['last_name_kana'] ?? '' }}" placeholder="ヤマダ">
                            <input name="first_name_kana" type="text" class="c-input" value="{{ $stripe_account->individual['first_name_kana'] ?? '' }}" placeholder="タロウ">
                        </td>
                    </tr>
                    <tr>
                        <th>生年月日</th>
                        <td>
                            <div>
                                <select class="c-select" name="year">
                                    <option value="">--</option>
                                    @foreach(range(1945, 2003) as $year)
                                    <option value="{{ $year }}" {{ ($stripe_account->individual['dob']['year'] ?? '') == $year ? 'selected' : ''}}>{{ $year }}</option>
                                    @endforeach
                                </select>
                                <select class="c-select" name="month">
                                    <option value="">--</option>
                                    @foreach(range(1, 12) as $month)
                                    <option value="{{ $month }}" {{ ($stripe_account->individual['dob']['month'] ?? '') == $month ? 'selected' : ''}}>{{ $month }}</option>
                                    @endforeach
                                </select>
                                <select class="c-select" name="day">
                                    <option value="">--</option>
                                    @foreach(range(1, 31) as $day)
                                    <option value="{{ $day }}" {{ ($stripe_account->individual['dob']['day'] ?? '') == $day ? 'selected' : ''}}>{{ $day }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td>
                            <input name="phone" type="text" class="c-input" value="{{ $stripe_account->individual['phone'] ?? '' }}" placeholder="000111222">
                        </td>
                    </tr>
                    <tr>
                        <th>郵便番号</th>
                        <td>
                            <input name="postal_code" type="text" class="c-input" value="{{ $stripe_account->individual['address_kana']['postal_code'] ?? '' }}" placeholder="1500007">
                        </td>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <td>
                            <div class="p-identify__frame-address">
                                <select class="c-select" name="state">
                                    <option value="">--</option>
                                    @foreach(config('prefecture') as $key => $area)
                                    <option value="{{ $area }}" {{ ($stripe_account->individual['address_kanji']['state'] ?? '') == $area ? 'selected' : ''}}>{{ $area }}</option>
                                    @endforeach
                                </select>
                                <div>
                                    <input name="city" type="text" class="c-input" value="{{ $stripe_account->individual['address_kanji']['city'] ?? '' }}" placeholder="神奈川県">
                                    <input name="town" type="text" class="c-input" value="{{ $stripe_account->individual['address_kanji']['town'] ?? '' }}" placeholder="藤沢市">
                                    <input name="line1" type="text" class="c-input" value="{{ $stripe_account->individual['address_kanji']['line1'] ?? '' }}" placeholder="1-1">
                                    <input name="line2" type="text" class="c-input" value="{{ $stripe_account->individual['address_kanji']['line2'] ?? '' }}" placeholder="パーク101号">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>住所(カナ)</th>
                        <td>
                            <div class="p-identify__frame-address-kana">
                                <input name="city_kana" type="text" class="c-input" value="{{ $stripe_account->individual['address_kana']['city'] ?? '' }}" placeholder="カナガワケン">
                                <input name="town_kana" type="text" class="c-input" value="{{ $stripe_account->individual['address_kana']['town'] ?? '' }}" placeholder="フジサワシ">
                                <input name="line1_kana" type="text" class="c-input" value="{{ $stripe_account->individual['address_kana']['line1'] ?? '' }}" placeholder="1-1">
                                <input name="line2_kana" type="text" class="c-input" value="{{ $stripe_account->individual['address_kana']['line2'] ?? '' }}" placeholder="パーク101ゴウ">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>銀行コード</th>
                        <td>
                            <input name="bank_code" type="text" class="c-input" value="{{ substr($stripe_account->external_accounts['data'][0]['routing_number'] ?? '', 0, 4) }}" placeholder="0001">
                        </td>
                    </tr>
                    <tr>
                        <th>支店コード</th>
                        <td>
                            <input name="branch_code" type="text" class="c-input" value="{{ substr($stripe_account->external_accounts['data'][0]['routing_number'] ?? '', 4, 3) ?? '' }}" placeholder="001">
                        </td>
                    </tr>
                    <tr>
                        <th>口座番号</th>
                        <td>
                            <input name="account_number" type="text" class="c-input" value="{{ isset($stripe_account->external_accounts['data'][0]['last4']) ? '●●●'.$stripe_account->external_accounts['data'][0]['last4'] : '' }}" placeholder="7桁の数字">
                        </td>
                    </tr>
                    <tr>
                        <th>口座名義</th>
                        <td>
                            <input name="account_holder_name" type="text" class="c-input" value="{{ $stripe_account->external_accounts['data'][0]['account_holder_name'] ?? '' }}" placeholder="ヤマダ タロウ">
                        </td>
                    </tr>
                </table>
                <div class="p-identify__submit-box">
                    <input type="submit" class="c-button" value="登録する">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('bodyScript')
<script type="text/javascript">
    function formSwitch() {
        type = document.getElementsByName('type')
        if (type[0].checked) {
            document.getElementById('p-identify-individual__table').style.display = "";
            document.getElementById('p-identify-company__table').style.display = "none";
        } else if (type[1].checked) {
            document.getElementById('p-identify-individual__table').style.display = "none";
            document.getElementById('p-identify-company__table').style.display = "";
        }
    }
</script>
@endsection