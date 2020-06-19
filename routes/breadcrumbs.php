<?php

// Home
Breadcrumbs::for('top', function ($trail) {
    $trail->push('Oceanbee', route('index'));
});

// Home > About
Breadcrumbs::for('mypage', function ($trail) {
    $trail->parent('top');
    $trail->push('マイページ', route('mypage.index'));
});
