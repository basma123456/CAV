<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{URL::asset('assets/assets_front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/assets_front/css/all.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/assets_front/css/main.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/assets_front/css/uikit.min.css')}}">
    <link rel="shortcut icon" href="{{URL::asset('assets/assets_front/images/Logo-04.svg')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title>CAV</title>
</head>

<body>
@include('layouts.front_layouts.header')
<span> </span>
@yield('content')





<footer id="contact-us" class="pt-5">
    <div class="container pb-4 txt-center">
        <!--- Start Row--->
        <div class="row">
            <!--- Start column--->
            <div class="col-6 col-md-4 col-sm-6 order-2 order-sm-2 order-md-1 order-lg-1 text-capitalize">
                <p class="txt-family-head font-size-38 txt-color-3">products</p>
                <ul class="list-unstyled ">
                    <li>websites</li>
                    <li>mobile application</li>
                    <li>E-Commerce Website</li>
                    <li>E-Commerce Application</li>
                    <li>Landing Page</li>
                    <li>Dashboard</li>
                </ul>
            </div>
            <!--- End column--->
            <!--- Start column--->
            <div class="col-12 col-md-4 col-sm-12 order-1 order-sm-1 order-md-2 order-lg-2 text-center">
                <p class="txt-family-head font-size-38 txt-color-3">Compu A Vision</p>
                <p class="">Animation Is The Broader Umbrella Term That Motion Graphics Falls Under. Animation Has A History Dating Back More Than 100 Years. (Wanna Dig Into That History? Check Out This Great Guide To Animation).</p>
            </div>
            <!--- End column--->
            <!--- Start column--->
            <div class="col-6 col-md-2 col-sm-6 offset-sm-0 offset-md-2 text-capitalize order-3 order-sm-3 order-md-3 order-lg-3">
                <div class="">
                    <p class="txt-family-head font-size-38 txt-color-3">Company</p>
                    <ul class="list-unstyled ">
                        <li>About Us</li>
                        <li>FAQs</li>
                        <li>Affiliate Program</li>
                        <li>Trade Mark</li>
                        <li>Privacy Policy</li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
            <!--- End column--->
        </div>
        <!--- End Row--->
        <!--- Start Row--->
        <div class="row text-center align-content-center">
            <div class="col">
                <i class="fab fa-whatsapp"></i>
                <i class="fab fa-linkedin-in"></i>
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-youtube"></i>
                <i class="far fa-envelope"></i>
                <i class="fas fa-map-marked-alt"></i>
            </div>
        </div>
        <!--- End Row--->
    </div>
    <div class="bg-light txt-color-1">
        <div class="container">
            <!--- Start Row--->
            <div class="row text-center text-uppercase d-flex justify-content-center align-content-center pl-4 mt-5">
                <div class="col">
                    <p class="d-inline-block align-bottom font-size-20 uk-text-bolder">created by</p>
                    <a class="navbar-brand" href="#">
                        <img src='{{URL::asset("assets/assets_front/images/Logo-04.svg")}}' width="50" height="50" class="d-inline-block align-top mr-3 pb-3" alt="">
                    </a>
                </div>
            </div>
            <!--- End Row--->
        </div>
    </div>
</footer>

<!--- End Footer--->



@yield('scripts')



<script src='{{URL::asset("assets/assets_front/js/jquery-3.6.0.min.js")}}'></script>
<script src='{{URL::asset("assets/assets_front/js/popper.min.js")}}'></script>
<script src='{{URL::asset("assets/assets_front/js/bootstrap.min.js")}}'></script>
<script src='{{URL::asset("assets/assets_front/js/main.js")}}'></script>
<script src='{{URL::asset("assets/assets_front/js/uikit.min.js")}}'></script>
<script src='{{URL::asset("assets/assets_front/js/uikit-icons.min.js")}}'></script>

</body>

</html>
