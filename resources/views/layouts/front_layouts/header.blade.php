<!--- Start Header--->
{{--{{dd($subID)}}--}}
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


                            <li class="nav-item dropdown mr-4 active">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @lang('header_front.Categories')
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach(\App\Models\Category::get() as $key => $val)

                                        @if($key <= count(\App\Models\Category::get()))
                                            <a class="dropdown-item" href="{{URL::asset('categories')}}/{{$key}}/0"> {{\App\Models\Category::get()[$key]->name}} <span class="sr-only">(current)</span></a>

                                        @endif
                                    @endforeach
                                </div>
                            </li>


                            <li class="nav-item mr-2">
                                <a class="nav-link mr-4" href="#">@lang('header_front.Our_Clients')</a>
                            </li>
                            <li class="nav-item pr-5">
                                <a class="nav-link mr-5" href="#contact-us">@lang('header_front.Contact_Us')</a>
                            </li>
                            <!-- Start icons-->
                            <!-- Start Cart Icons-->

                            @if(Auth('customer')->id() > 0)
                            <li class="nav-item d-none d-lg-inline-block txt-color-2 mr-3 mt-2">
                                <!-- Start Cart Model-->
                                <a type="button"><i class="fas fa-shopping-cart fa-fw mr-3 icon"></i></a>
                                <div class="uk-width-large p-3 more-rounded" uk-dropdown="mode: click; pos: bottom-right">
                                    <p class="uk-text-large w-100 m-0 txt-color-1 txt-family-head">E-Commerce Website</p>
                                    <p class="uk-text-small my-2 uk-text-meta">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                    <p class="txt-family-head text-right m-0 uk-text-large p-0">
                                    <form id="form__submit" onclick="sure()" method="post" action="{{route('delete.cart')}}" class="d-inline float-left btn btn-secondary btn-sm"> @csrf <input type="hidden" value="{{Auth('customer')->id()}}" > @lang('header_front.Delete_Cart') </form>

                                    <span class="float-right" id="checked_value_cart">{{array_sum(\App\Models\Cart::where('customer_id' , auth('customer')->id())->where('paying_status' , 0)->pluck('plan_price')->toArray())}} <span class="text-uppercase pl-0 pl-sm-0 pl-md-2 uk-text-small txt-color-3">egp</span></span>


                                    </p>
                                    <br>
{{--                                /////////////////////////////start payment form///////////////////////////--}}
                                        <form id="payment_form" class="d-none" method="post" action="{{url('http://localhost/cav/api/v1/pay')}}">

                                            <input type="hidden" value="{{Auth('customer')->id()}}" name="customer_id">

                                            <input type="hidden" value="@if(Auth('customer')->id() > 0){{\App\Models\Customer::find(Auth('customer')->id())->value('full_name')}}@endif" name="customer_name">
                                            <input type="hidden" value="{{array_sum(\App\Models\Cart::where('customer_id' , auth('customer')->id())->where('paying_status' , 0)->pluck('plan_price')->toArray())}}" name="total_price">



                                            <input type="submit" value="submit">
                                        </form>

                                        <button onclick="payNow()" class="text-uppercase px-4 bg-main txt-color-2 my-1 more-rounded uk-align-center py-1 font-weight-bold uk-animation-shake"><span class="txt-family-head uk-text-small">@lang('header_front.check_out')</span></button>
{{--                                //////////////////////////////end payment form//////////////////////////////////////////--}}
                                </div>
                                <!-- End Cart Model-->
                            </li>
                            @endif

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

                                <!--start dropdown btn of logout -->
                                <div class="dropdown">
                                            <span type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-user-alt fa-fw icon"></i>
                                            </span>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @if(Auth('customer')->id() > 0 || Auth('employee')->id() > 0)
                                        <a class="dropdown-item" href="{{url('logout')}}">@lang('header_front.Logout')</a>
                                        @else
                                        <a class="dropdown-item" href="{{url('login')}}">@lang('header_front.Login')</a>
                                        @endif
                                    </div>
                                </div>
                                <!--end dropdown btn-->


                            </li>
                            <!-- End icons-->

                        @if(Auth('customer')->id() > 0)

                            <!-- End Cart Icons-->
                            <li class="nav-item txt-color-2 mt-2">

                                            <span>
                                              &nbsp;  &nbsp;   {{\App\Models\Customer::where('id' , Auth('customer')->id())->value('full_name')}}

                                            </span>


                            </li>
                            <!-- End icons-->
                        @elseif(Auth('employee')->id() > 0)
                            <!-- End Cart Icons-->
                                <li class="nav-item txt-color-2 mt-2">

                                            <span>
                                              &nbsp;  &nbsp;   {{\App\Models\Employee::where('id' , Auth('employee')->id())->value('full_name')}}

                                            </span>


                                </li>
                                <!-- End icons-->
                            @endif

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

<script>

    function payNow() {

        @if(Auth('customer')->id() > 0  && array_sum(\App\Models\Cart::where('customer_id' , auth('customer')->id())->where('paying_status' , 0)->pluck('plan_price')->toArray()) > 0)
            var payment_form = document.getElementById('payment_form');

                var r = confirm('Are You Sure You Want To Pay Now');
                if (r == true) {
                    payment_form.submit();
                } else {
                    alert('login first')
                }
        @endif

    }
</script>
