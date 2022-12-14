<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>@yield('title')-{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">


    <!-- Font -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

    <!-- Stylesheets -->

    <link href="{{asset('/')}}assets/frontend/css/bootstrap.css" rel="stylesheet">

    <link href="{{asset('/')}}assets/frontend/css/swiper.css" rel="stylesheet">

    <link href="{{asset('/')}}assets/frontend/css/ionicons.css" rel="stylesheet">

    @stack('css')
</head>
<body >
@include('Frontend.includes.header')

@yield('content')

@include('Frontend.includes.footer')


<!-- SCIPTS -->

<script src="{{asset('/')}}assets/frontend/js/jquery-3.1.1.min.js"></script>

<script src="{{asset('/')}}assets/frontend/js/tether.min.js"></script>

<script src="{{asset('/')}}assets/frontend/js/bootstrap.js"></script>

<script src="{{asset('/')}}assets/frontend/js/swiper.js"></script>

<script src="{{asset('/')}}assets/frontend/js/scripts.js"></script>
@stack('js')
</body>
</html>
