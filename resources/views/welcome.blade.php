<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SuperStore</title>
        <link rel="stylesheet" href="{{ asset("css/uikit-rtl.min.css") }}">
        <link rel="stylesheet" href="{{ asset("css/uikit.min.css") }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bg.css') }}">

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!-- Fonts -->
    </head>
    <body>
            <div class="uk-position-relative landing__bg">
                <div class="uk-container uk-text-center trailer__hero">
                    <img src="" alt="">
                    <h2> Welcome to Compudavid Superstore</h2>
                    <p>We help you automate your store, without delay.</p>
                </div>
                <div class="uk-position-top"1>
                    @include('layouts.navbar')
                </div>
            </div>
            <script src="{{ asset('js/uikit-icons.min.js') }}"></script>
            <script src="{{ asset('js/uikit.min.js') }}"></script>
    </body>
</html>
