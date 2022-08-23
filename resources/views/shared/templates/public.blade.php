<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/sass/app.scss', 'resources/ts/app.ts'])
    <title>@yield('title')</title>

</head>
<body>
    @include('shared.components.public.header')
    <div class="page">
        @yield('content')
    </div>
    @include('shared.components.public.footer')
    @include('shared.components.public.consent')
</body>
</html>
