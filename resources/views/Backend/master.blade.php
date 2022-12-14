<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title')</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}assets/backend/img/favicon.png">
    <link rel="stylesheet" href="{{asset('/')}}assets/backend/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/backend/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/backend/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/backend/plugins/morris/morris.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/backend/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/backend/css/style.css">

    <link rel="stylesheet" href="{{asset('/')}}assets/backend/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="{{asset('/')}}assets/backend/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">

    <link rel="stylesheet" href="{{asset('/')}}assets/backend/css/select2.min.css">

    <!--[if lt IE 9]>
    <script src="{{asset('/')}}assets/backend/js/html5shiv.min.js"></script>
    <script src="{{asset('/')}}assets/backend/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="main-wrapper">
@include('Backend.includes.header')

@include('Backend.includes.sidebar')

@yield('content')

</div>


<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{asset('/')}}assets/backend/js/jquery-3.5.1.min.js"></script>

<script src="{{asset('/')}}assets/backend/js/popper.min.js"></script>
<script src="{{asset('/')}}assets/backend/js/bootstrap.min.js"></script>

<script src="{{asset('/')}}assets/backend/js/jquery.slimscroll.min.js"></script>

<script src="{{asset('/')}}assets/backend/plugins/morris/morris.min.js"></script>
<script src="{{asset('/')}}assets/backend/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('/')}}assets/backend/js/chart.js"></script>

<script src="{{asset('/')}}assets/backend/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}assets/backend/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/')}}assets/backend/js/app.js"></script>

<script src="{{asset('/')}}assets/backend/js/jquery.slimscroll.min.js"></script>
<script src="{{asset('/')}}assets/backend/js/select2.min.js"></script>



<script src="{{asset('/')}}assets/backend/js/moment.min.js"></script>
<script src="{{asset('/')}}assets/backend/js/bootstrap-datetimepicker.min.js"></script>

<script src="{{asset('/')}}assets/backend/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

<script src="{{asset('/')}}assets/backend/js/app.js"></script>
</body>
</html>
