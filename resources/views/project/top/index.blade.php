@extends('layout.app')
@section('title') サーフィンやろう、教えよう | Oceanbee
@endsection
@section('content')
<div class="p-top">
    <div class="p-top__img" id="js-top-img">
        <img src="{{ asset('/images/beach-yoga.jpg') }}" width="1000" height="300" alt="a">
        <img src="{{ asset('/images/enoshima-coast.jpg') }}" width="1000" height="300" alt="b">
        <img src="{{ asset('/images/surf1.jpg') }}" width="1000" height="300" alt="c">
    </div>
    <div class="p-top__map">
        <span>地図から探す</span>
        <div class="p-top__map-img">
            <img src="{{ asset('/images/nihonchizu-color.png') }}" usemap="#ImageMap" alt="" />
            <map name="ImageMap">
                <area shape="poly"
                    coords="437,410,444,415,449,410,456,412,452,420,449,428,450,432,448,437,449,445,454,453,459,462,453,462,443,469,444,475,443,484,435,486,426,498,422,496,425,493,424,486,423,479,429,475,434,469,430,464,425,466,420,464,420,466,418,469,420,471,418,473,416,473,415,476,415,479,417,482,418,486,415,481,412,481,406,480,402,481,398,484,399,488,396,488,394,483,394,477,398,466,392,457,385,455,385,453,379,445,381,439,381,435,374,433,374,428,378,421,384,418,392,414,394,409,396,407,406,411,415,406,424,401,432,402,436,406,436,410,443,414,444,415,443,415"
                    href="#" alt="" />
            </map>
        </div>
    </div>
    <div class="p-top__introduction">人気・インストラクター</div>
</div>
@endsection