@extends('layout.app')
@section('title') サーフィンやろう、教えよう | Oceanbee
@endsection
@section('content')
<div class="p-plan-index">
    @include('project.plan.sidebar')
    <div class="p-plan-index__main">
        @foreach($plans as $plan)
        <div class="p-plan-index__item">
            <img src="{{ ImageHelper::createLink($plan->planImages[0]) }}" class="p-plan-index__item-image" width="180"
                height="140">
            <div class="p-plan-index__item-body">
                <h6 class="p-plan-index__item-title">{{ $plan->title }}</h6>
                <span class="p-plan-index__item-name">{{ $plan->user->name }}</span>
                <img src="/images/{{ !empty($plan->user->image) ? $plan->user->image : 'no-image.jpg' }}" width="40"
                    height="40">
                <div class="p-plan-index__item-desc">
                    <span>場所 : {{ $plan->address }}</span>
                    <span>評価 : ⭐️⭐️⭐️⭐️⭐️</span>
                    <span>料金 :
                        @foreach($plan->planPrices as $planPrice)
                       {{ $planPrice->price }}円/{{
                            Config::get('price')['plan'][$planPrice->charge_id]}}&nbsp;
                        @endforeach
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection