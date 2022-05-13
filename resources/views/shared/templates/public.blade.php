<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/app.css" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
    <div class="page">
        @yield('content')
    </div>
    @include('shared.components.public.footer')
    @include('shared.components.public.consent')
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
