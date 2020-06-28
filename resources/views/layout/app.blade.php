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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" type="text/javascript"
        charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js" type="text/javascript"
        charset="utf-8"></script>
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
</body>
</html>