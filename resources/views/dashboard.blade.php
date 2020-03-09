<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>#VMC</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{asset('picture/logo.png')}}"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/CustomDesign.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive')}}"/>
</head>
<body>
<div id="root"></div>
<script src="../js/app.js"></script>
</body>
</html>