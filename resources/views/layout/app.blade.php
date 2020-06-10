<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="content">
        @include('common.header')
        <main class="main-content">
            <div id="app">
                @yield('content')
            </div>
        </main>
        @include('common.footer')
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>