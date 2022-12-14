<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Error 404 - HRMS admin template</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}assets/backend/img/favicon.png">

    <link rel="stylesheet" href="{{asset('/')}}assets/backend/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('/')}}assets/backend/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('/')}}assets/backend/css/line-awesome.min.css">

    <link rel="stylesheet" href="{{asset('/')}}assets/backend/css/style.css">

    <!--[if lt IE 9]>
    <script src="{{asset('/')}}assets/backend/js/html5shiv.min.js"></script>
    <script src="{{asset('/')}}assets/backend/js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="error-page">

<div class="main-wrapper">
    <div class="error-box">
        <h1>404</h1>
        <h3><i class="fa fa-warning"></i> Oops! Page not found!</h3>
        <p>The page you requested was not found.</p>
        @if(Request::is('admin*'))
            <a href="{{route('admin.dashboard')}}" class="btn btn-custom">Back to Home</a>
        @else
            <a href="{{route('author.dashboard')}}" class="btn btn-custom">Back to Home</a>
        @endif
    </div>
</div>


<script src="{{asset('/')}}assets/backend/js/jquery-3.5.1.min.js"></script>

<script src="{{asset('/')}}assets/backend/js/popper.min.js"></script>
<script src="{{asset('/')}}assets/backend/js/bootstrap.min.js"></script>

<script src="{{asset('/')}}assets/backend/js/app.js"></script>
</body>
</html>
