<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AtalsInfo</title>
    @include('panles.styles')
</head>
<body>
        <main>
            @yield('content')
        </main>
@include('panles.footer')
@include('panles.scripts')
</body>
</html>
