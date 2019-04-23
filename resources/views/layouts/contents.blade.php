<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <title>{{config('app.name','HNJPay')}}</title>
    </head>
    <body>
        <div id="app">        
            @include('inc.navbar')
            <main class="py-4">
            @yield('content')
            </main>
        </div>
        {{-- @include('inc.cnavbar')

        <main role="main" class="container">

        @include('inc.message')
        @yield('content')
        </main> --}}
        <script src="{{asset('js/holder.min.js')}}"></script>
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>
    </body>
</html>
