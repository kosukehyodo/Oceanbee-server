@extends('layout.app')
@section('title') サーフィンやろう、教えよう | Oceanbee
@endsection
@section('content')
{{ Breadcrumbs::render('mypage') }}
<div class="p-plan-create">
    @include('common.sidebar')
    <form method="POST" action="{{ route('plan.store')}}">
        @csrf
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
                <div class="p-plan-create__calendar">
                    <h4>日付を登録</h4>
                    <span>プランを提供できる時間帯を設定してください（単発プランの場合は必須）時間帯を伴なわないプラン（月額レンタルなど）は設定不要で、開始日をユーザーとチャットでやりとりして決めてください</span>
                    <table class="c-calendar-table">
                        <thead>
                            <tr class="c-calendar-table__day-cell-header">
                                <th rowspan="2" class=""><a title="前の一週間" class="arrowPagingWeekR jscCalNavi"><</a></th>
                                <th colspan="14" class="">2020年7月</th>
                                <th rowspan="2" class=""><a title="次の一週間" class="arrowPagingWeekR jscCalNavi">></a></th>
                            </tr>
                            <tr class="c-calendar-table__day-cell-container">
                                @for($i = now(); $i < now()->addDay(13); $i->addDay())
                                    <th class="c-calendar-table__day-cell">{{$i->day}} <br />{{$i->isoFormat('ddd')}}
                                    </th>
                                    @endfor
                            </tr>
                        </thead>
                        <tr>
                            <th>
                                <table class="c-calendar-table__time-line">
                                    <tr>
                                        <th class="timeCell timeSharpLine">08：00</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell timeSharpLine">08：30</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell timeSharpLine">09：00</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell timeSharpLine">09：30</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell timeSharpLine">10：00</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell ">10：30</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell timeSharpLine">11：00</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell ">11：30</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell timeSharpLine">12：00</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell ">12：30</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell timeSharpLine">13：00</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell ">13：30</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell timeSharpLine">14：00</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell ">14：30</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell timeSharpLine">15：00</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell ">15：30</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell timeSharpLine">16：00</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell ">16：30</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell timeSharpLine">17：00</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell ">17：30</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell timeSharpLine">18：00</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell ">18：30</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell timeSharpLine">19：00</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell timeSharpLine">19：30</th>
                                    </tr>
                                    <tr>
                                        <th class="timeCell timeSharpLine">20：00</th>
                                    </tr>
                                </table>
                            </th>
                            @for($i = now(); $i < now()->addDay(13); $i->addDay())
                                <th class="innerCol">
                                    <table class="c-calendar-table__more-inner-table">
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 08:00')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 08:30')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 09:00')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 09:30')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 10:00')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 10:30')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 11:00')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 11:30')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 12:00')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 12:30')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 13:00')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 13:30')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 14:00')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 14:30')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 15:00')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 15:30')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 16:00')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 16:30')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 17:00')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 17:30')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 18:00')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 18:30')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 19:00')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 19:30')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="closeCell"><input name="agree[]" type="checkbox"
                                                    value="{{$i->format('Y-m-d 20:00')}}"></td>
                                        </tr>
                                    </table>
                                </th>
                                @endfor
                        </tr>
                    </table>
                </div>
                <div class="p-plan-create__submit-box">
                    <input type="submit" class="c-button" value="登録する">
                </div>
            </div>
        </div>
    </form>
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
    // flatpickr("#flatpickr", {});
</script>
@endsection