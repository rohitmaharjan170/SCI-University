<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('frontend/images/favicon.png')}}">
    <title>@if(!empty($title))
            {{env('APP_NAME') .' | '.$title}}
        @else
            {{env('APP_NAME') ?? null}}
        @endif</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('frontend/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/fonts/fontawesome-icons.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.min.css')}}">
    <link href="//db.onlinewebfonts.com/c/7c631010b431b2d84c8a7229a9e64705?family=Univers+LT+Std" rel="stylesheet"
          type="text/css"/>
    @toastr_css
    @stack('styles')
</head>
<body>

<!-- header -->
@include('frontend.includes.header')

<!-- main content -->
@yield('content')

<!-- footer -->
@include('frontend.includes.footer')


<!--custom js-->
<script src="{{asset('frontend/bootstrap/js/jquery.js')}}"></script>
<script src="{{ asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.slicknav.min.js')}}"></script>
@stack('scripts')

<script src="{{ asset('frontend/js/navbar.js')}}"></script>
<script src="{{ asset('frontend/js/wow.min.js')}}"></script>
<script> new WOW().init(); </script>
<srcipt>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0"
            nonce="8gVMbBEs"></script>

</srcipt>
@toastr_js
@toastr_render
</body>
</html>