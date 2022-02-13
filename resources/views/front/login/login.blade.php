
@extends('layouts.front_layouts.master')


@section('header')

    @if(Session::has('msg'))
        <div class="alert alert-danger"> {{Session::get('msg')}} </div>
    @endif
    <!--- Start Header--->
    <header class="main-header bg-main">
        <!--- Start NavBar--->
        <div class="container p-0">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <div class="container-fluid p-0">
                    <a class="navbar-brand mr-5" href="{{url('index')}}">
                        <img src='{{URL::asset("assets/assets_front/images/Logo-04.svg")}}' width="100" height="100" class="d-inline-block align-top mr-3" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!--- Start pages--->
                    <div class="collapse navbar-collapse mr-5" id="navbarContent">
                        <div class="navbar-nav-par">
                            <ul class="navbar-nav font-weight-bold font-size-20 ml-3">
                                <li class="nav-item mr-2 active">

                                    {{--                                    @foreach($big_cats as $key => $val)--}}
                                    {{--                                        @if($key <= count($big_cats))--}}
                                    {{--                                            <a class="nav-link mr-4" href="{{URL::asset('u')}}/{{$key}}/0"> {{$big_cats[$key]->name}} <span class="sr-only">(current)</span></a>--}}
                                    {{--                                        @endif--}}
                                    {{--                                    @endforeach--}}

                                </li>
                                <li class="nav-item mr-2">
                                    <a class="nav-link mr-4" href="#">Our Clints</a>
                                </li>
                                <li class="nav-item pr-5">
                                    <a class="nav-link mr-5" href="#contact-us">Contact Us</a>
                                </li>
                                <!-- Start icons-->
                                <!-- Start Cart Icons-->

                                <li class="nav-item d-none d-lg-inline-block txt-color-2 mr-3 mt-2">
                                    <!-- Start Cart Model-->
                                    <a type="button"><i class="fas fa-shopping-cart fa-fw mr-3 icon"></i></a>
                                    <div class="uk-width-large p-3 more-rounded" uk-dropdown="mode: click; pos: bottom-right">
                                        <p class="uk-text-large w-100 m-0 txt-color-1 txt-family-head">E-Commerce Website</p>
                                        <p class="uk-text-small my-2 uk-text-meta">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                        <p class="txt-family-head text-right m-0 uk-text-large p-0">1,500<span class="text-uppercase pl-0 pl-sm-0 pl-md-2 uk-text-small txt-color-3">egp</span></p>
                                        <button class="text-uppercase px-4 bg-main txt-color-2 my-1 more-rounded uk-align-center py-1 font-weight-bold uk-animation-shake"><span class="txt-family-head uk-text-small">check out</span></button>
                                    </div>
                                    <!-- End Cart Model-->
                                </li>
                                <li class="nav-item d-lg-none txt-color-2 mr-3 mt-2">
                                    <!-- Start Cart Model-->
                                    <a type="button"><i class="fas fa-shopping-cart fa-fw mr-3 icon"></i></a>
                                    <div class="uk-width-large w-auto p-3 more-rounded" uk-dropdown="mode: click; pos: right-top">
                                        <p class="uk-text-large w-100 m-0 txt-color-1 txt-family-head">E-Commerce Website</p>
                                        <p class="uk-text-small my-2 uk-text-meta">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                        <p class="txt-family-head text-right m-0 uk-text-large p-0">1,500<span class="text-uppercase pl-0 pl-sm-0 pl-md-2 uk-text-small txt-color-3">egp</span></p>
                                        <button class="text-uppercase px-4 bg-main txt-color-2 my-1 more-rounded uk-align-center py-1 font-weight-bold uk-animation-shake"><span class="txt-family-head uk-text-small">check out</span></button>
                                    </div>
                                    <!-- End Cart Model-->
                                </li>
                                <!-- End Cart Icons-->
                                <li class="nav-item txt-color-2 mt-2">
                                    <i class="fas fa-user-alt fa-fw icon"></i>
                                </li>
                                <!-- End icons-->
                            </ul>

                        </div>
                    </div>
                    <!--- End Pages--->

                </div>
            </nav>
        </div>
        <!--- End NavBar--->
    </header>
    <!--- End Header--->

@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="sign-up-main my-5">
        <div class="container">
            <div class="bg-grad more-rounded">
                <div class="row">
                    <div class="col-12">
                        <div class="container mt-5">
                            <div class="row px-lg-5 px-0">
                                <div class="col-12 px-lg-5 px-0">
                                    <button onclick="whoLogin(this)" data-user="{{route('user.login.customer')}}" class="btn btn-primary">@lang('login_page.Login_As_Customer')</button>
                                    <button onclick="whoLogin(this)" data-user="{{route('user.login.employee')}}" class="btn btn-success">@lang('login_page.Login_As_seller')</button>

                                    <form action="{{route('user.login.customer')}}" method="post" id="my_login_form" enctype="multipart/form-data" class="uk-grid-small" uk-grid>
                                        @csrf
                                        <div class="uk-width-1-1 p-2 position-relative">
                                            <label for="e-mail-phone"  class="px-2 m-0 d-none">@lang('login_page.E-Mail/Phone')</label>
                                            <input id="e-mail-phone" name="email" class="uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="text" placeholder="@lang('login_page.E-Mail/Phone')">
                                        </div>
                                        <div class="uk-width-1-1 p-2 position-relative">
                                            <label for="password" class="px-2 m-0 d-none">@lang('login_page.Password')</label>
                                            <input id="password" name="password" class="uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="Password" placeholder="@lang('login_page.Password')">
                                        </div>
                                        <div class="uk-width-1-1 p-2 my-4 a-border">
                                            <a href="#">@lang('login_page.Forget_Password?')</a>
                                        </div>
                                        <div class="uk-width-1-1 p-2 my-4 d-flex align-content-center justify-content-center">
                                            <button class="btn pri-btn px-5 py-2 font-size-30 uk-text-bold txt-family-head bg-white txt-color-1" type="submit">@lang('login_page.Sign_in')
                                            </button>
                                        </div>
                                    </form>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="mx-3 font-size-30 txt-color-2">Or</div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="text-light btn btn-lg" style="background-color: rgba(0, 0, 0 , 0.1);" href="{{url('register_customer')}}">@lang('login_page.Sign_up')</a>
                                    </div>
                                    <br>

                                    <div class="icons d-flex align-items-center justify-content-center">
                                        <a class="txt-color-2 mr-3" href="#"><i class="fab fa-facebook-f "></i></a>
                                        <a class="txt-color-2 ml-3" href="#"><i class="fab fa-google"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>

        function whoLogin(element){
            var url = element.getAttribute('data-user');
            var form = document.getElementById('my_login_form');

            form.setAttribute("action", "");
            form.setAttribute("action",url);

        }
    </script>

@endsection









