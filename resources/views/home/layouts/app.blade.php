<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        @section('head')
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <!-- <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui" /> -->
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <meta name="apple-mobile-web-app-capable" content="yes" />
            <meta name="apple-mobile-web-app-status-bar-style" content="black" />
            <meta name="format-detection" content="telephone=no, email=no" />
            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <title>@if(isset($head_title)){{$head_title}}@else{{ConfigGet('site_name')}}@endif</title>
            <meta name="keywords" content="@if(isset($head_keywords)){{$head_keywords}}@else{{ConfigGet('site_keywords')}}@endif">
            <meta name="description" content="@if(isset($head_description)){{$head_description}}@else{{ConfigGet('site_description')}}@endif">
            <meta name='author' content="名鹊科技:http://www.gzmqnet.com"/>
        @show
        @section('style')
            <link type="text/css" rel="stylesheet" href="{{ asset('resources/home/css/cropper.css') }}?version={{env('VERSION')}}" />
            <link type="text/css" rel="stylesheet" href="{{ asset('resources/home/css/iconfont.css') }}?version={{env('VERSION')}}" />
            <link type="text/css" rel="stylesheet" href="{{ asset('resources/home/css/swiper.min.css') }}?version={{env('VERSION')}}" />
            <link type="text/css" rel="stylesheet" href="{{ asset('resources/home/css/style.css') }}?version={{env('VERSION')}}" />
            <link type="text/css" rel="stylesheet" href="{{ asset('resources/home/css/style2.css') }}?version={{env('VERSION')}}" />
            <script type="text/javascript" src="{{ asset('resources/home/js/jquery-1.7.2.min.js') }}?version={{env('VERSION')}}"></script>
        @show
    </head>
    <body >
        @include('home.layouts.header')
        @yield('content')
        @include('home.layouts.footer')
    </body>
    @include('home.layouts.script')
</html>