<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <!-- todo::JqueryをCDNで読み込んでいる -->
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

</head>

<body>
    <div class="content">
        @include('common.header')
        <main class="l-main-content">
            <div id="app">
                @yield('content')
            </div>
        </main>
        @include('common.footer')
    </div>
    <script src="{{ asset('/js/app.js') }}"></script>
    @yield('bodyScript')
</body>

</html>