<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{config('app.name','HNJPay')}}</title>
    </head>
    <body>
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        @include('inc.navbar')
        @yield('content')
        @include('inc.footer')
        </div>  
    </body>
</html>
