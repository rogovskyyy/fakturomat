
<!doctype html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & local styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="{{ asset('css/admin_dashboard/admin-theme.css') }}" rel='stylesheet'>

    <!-- Favicon sizes -->
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('content/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('content/android-chrome-512x512.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('content/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('content/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('content/favicon-32x32.png') }}">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Awesome fonts -->
    <script src="https://kit.fontawesome.com/20404e40a7.js" crossorigin="anonymous"></script>

    <!-- Vue.js -->
    <script src="https://unpkg.com/vue@next"></script>

    <!-- Main Quill library -->
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- highlight.js library -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.1/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.1/highlight.min.js"></script>

    <!-- Title -->
    <title>ProtonCMS Dashboard</title>

    <!-- Smoothe scrolling event -->
    <script>
        $(document).on("click", "a", function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $($(this).attr('href')).offset().top - 25
            }, 200);
        });
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500');

        body {
            overflow-x: hidden;
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
        }

        /* Toggle Styles */

        #viewport {
            padding-left: 250px;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #content {
            width: 100%;
            position: relative;
            margin-right: 0;
        }

        /* Sidebar Styles */

        #sidebar {
            z-index: 1000;
            position: fixed;
            left: 250px;
            width: 250px;
            height: 100%;
            margin-left: -250px;
            overflow-y: auto;
            background: #37474F;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #sidebar header {
            background-color: #263238;
            font-size: 20px;
            line-height: 52px;
            text-align: center;
        }

        #sidebar header a {
            color: #fff;
            display: block;
            text-decoration: none;
        }

        #sidebar header a:hover {
            color: #fff;
        }

        #sidebar .nav{

        }

        #sidebar .nav li{
            background: none;
            border-bottom: 1px solid #455A64;
            color: #CFD8DC;
            font-size: 14px;
            padding: 16px 24px;
            width: 100%;
        }

        #sidebar .nav a{
            text-decoration: none;
            color: white;
        }

        #sidebar .nav a:hover{
            background: none;
            color: #ECEFF1;
        }

        #sidebar .nav a i{
            margin-right: 16px;
        }
    </style>

</head>

<body>

<div id="viewport">
    <!-- Sidebar -->
    <div id="sidebar">
        <header>
            <a href="#">Fakturomat</a>
        </header>
        <ul class="nav">
            <li>
                <a href="/">
                    <i class="fa-solid fa-user-gear"></i> Przeglądaj kontrahentów
                </a>
            </li>
            <li>
                <a href="/contractor/add">
                    <i class="fa-solid fa-user-plus"></i> Dodaj kontrahenta
                </a>
            </li>
            <li>
                <a href="/invoice">
                    <i class="fa-solid fa-file-invoice"></i> Faktury
                </a>
            </li>
            <li>
                <a href="/invoice/add">
                    <i class="fa-solid fa-file-circle-plus"></i> Dodaj fakture
                </a>
            </li>

        </ul>
    </div>
