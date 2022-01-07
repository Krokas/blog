<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="/css/admin.css" rel="stylesheet">
</head>
<body>
    @if(Auth::check())
    @include('shared.components.header')
    <div class="container-fluid container-fill">
        <div class="row">
            @include('shared.components.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>
    @else
        @yield('content')
    @endif
    <script src="/js/admin.js"></script>
</body>
</html>
