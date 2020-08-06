@extends('layout.app')
@section('title') サーフィンやろう、教えよう | Oceanbee
@endsection
@section('content')
<div class="p-top">
    <div class="p-top__img" id="js-top-img">
        <img src="{{ asset('/images/1477_594cc4f1adef7.jpg') }}" width="100%" height="500" alt="a">
    </div>
    <!-- <span>現地の人からレンタルしてもらって、海を楽しもう！</span> -->
    <!-- <div class="p-top__map">
        <span>地図から探す</span>
        <div class="p-top__map-img">
            <img src="{{ asset('/images/nihonchizu-color.png') }}" usemap="#ImageMap" alt="" />
            <map name="ImageMap">
                <area shape="poly"
                    coords="437,410,444,415,449,410,456,412,452,420,449,428,450,432,448,437,449,445,454,453,459,462,453,462,443,469,444,475,443,484,435,486,426,498,422,496,425,493,424,486,423,479,429,475,434,469,430,464,425,466,420,464,420,466,418,469,420,471,418,473,416,473,415,476,415,479,417,482,418,486,415,481,412,481,406,480,402,481,398,484,399,488,396,488,394,483,394,477,398,466,392,457,385,455,385,453,379,445,381,439,381,435,374,433,374,428,378,421,384,418,392,414,394,409,396,407,406,411,415,406,424,401,432,402,436,406,436,410,443,414,444,415,443,415"
                    href="#" alt="" />
            </map>
        </div>
    </div> -->
    <div class="p-top__category">
        <h4>カテゴリーから探す</h4>
        <ul class="p-top__category-container">
            <li class="p-top__category-item">
                <p>サーフボード置場を借りる</p><a href=""><img src="{{ asset('/images/bd-02-1.jpg') }}" width="300"
                        height="180"></a>
            </li>
            <li class="p-top__category-item">
                <p>サーフボードを借りる</p><a href=""><img src="{{ asset('/images/a6e98c88fcd4ff1f9e0bdfcc77b7366a1.jpg') }}"
                        width="300" height="180"></a>
            </li>
            <li class="p-top__category-item">
                <p>ウェットスーツを借りる</p><a href=""><img src="{{ asset('/images/6ac30efe.jpg') }}" width="300"
                        height="180"></a>
            </li>
        </ul>
    </div>
    <div class="p-top__plan">
        <h4>最近投稿されたプラン</h4>
        <ul class="p-top__plan-container">
            @foreach($plans as $plan)
            <li class="p-top__plan-item">
                <img src="{{ ImageHelper::createLink($plan->planImages[0]) }}" class="p-top__plan-image" width="250"
                    height="150">
                <div class="p-top__plan-price">
                    @foreach($plan->planPrices as $planPrice)
                    <span class="p-top__plan-price-item">{{ $planPrice->price }}円/{{
                        Config::get('price')['plan'][$planPrice->charge_id]}}</span>
                    @endforeach
                </div>
                <hr>
                <span>{{ $plan->title }}</span>
                <div class="p-top__plan-user">
                    <span>{{ $plan->user->name }}</span>
                    <img src="/images/{{ !empty($plan->user->image) ? $plan->user->image : 'no-image.jpg' }}" class="p-top__plan-user-image">
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection