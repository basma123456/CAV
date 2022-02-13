
@extends('layouts.front_layouts.master')







@section('content')
    @if(Session::has('msg'))
        <div class="alert alert-danger"> {{Session::get('msg')}} </div>
    @endif


    <section class="main my-5">
        <div class="container txt-family-text">
            <div class="row my-5" uk-scrollspy="cls: uk-animation-fade; target: div; delay: 200; repeat: false">
                <div class="col-lg-6 mr-5 img-par text-center">
                    <img src="{{URL::asset('assets/assets_front/images/vision.svg')}}" class="w-100 h-100">
                </div>
                <div class="col-lg-6 my-auto text-center uk-animation-fade">
                    <div class="mb-5 txt-font-lg txt-family-head text-capitalize">
                        <span class="txt-color-3">Pop</span> your business in <br> the technology world
                    </div>
                    <div class="text-left txt-family-text uk-text-meta h4 uk-text-large">
                        Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
                    </div>

                    @if( Auth('customer')->id()  || Auth('employee')->id() )

                    @else
                        <div class="uk-animation-toggle" tabindex="0">
                            <button class="text-uppercase px-4 bg-main txt-color-2 mt-5 more-rounded uk-text-large py-1 font-weight-bold uk-animation-shake"><span data-url="{{url('login')}}" onclick="login(this)" class="txt-family-head">@lang('index_front.Sign_in')</span></button>
                        </div>

                    @endif

                </div>
            </div>
        </div>
    </section>

    <!--- End Main--->


    <!--- Start Vision--->

    <section class="vision my-5 bg-grad">
        <div class="container my-5 h-100 txt-color-2">
            <p class="text-center mx-auto">
                Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
            </p>
        </div>
    </section>

    <!--- End Vision--->

    <!--- Start category--->

    <section id="category" class="category my-5">
        <div class="container">
            <!-- Start Row-->
            <div class="row cat-par " uk-scrollspy="cls: uk-animation-slide-left; repeat: true">
                <div class="col-md-6 my-auto text-center">
                    <h2 class="mb-5 txt-font-lg txt-family-head text-capitalize">
                        developments
                    </h2>
                    <p class="text-left txt-family-text uk-text-meta h4 uk-text-large">
                        Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? <a class="txt-color-3 uk-button uk-button-text">read more...</a>
                    </p>
                </div>
                <div class="col-md-6 pl-5">
                    <img src="{{URL::asset('assets/assets_front/images/development.svg')}}" class="w-100 h-100">
                </div>
            </div>
            <!-- End Row-->
            <!-- Start Row-->
            <div class="row cat-par" uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
                <div class="col-md-6 pl-5 order-2 order-sm-2 order-md-1 order-lg-1">
                    <img src="{{URL::asset('assets/assets_front/images/marketing.svg')}}" class="w-100 h-100">
                </div>
                <div class="col-md-6 order-1 order-sm-1 order-md-2 order-lg-2 my-auto text-center">
                    <h2 class="mb-5 txt-font-lg txt-family-head text-capitalize">
                        marketing
                    </h2>
                    <p class="text-left txt-family-text uk-text-meta h4 uk-text-large">
                        Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? <a class="txt-color-3 uk-button uk-button-text">read more...</a>
                    </p>
                </div>
            </div>
            <!-- End Row-->
            <!-- Start Row-->
            <div class="row cat-par" uk-scrollspy="cls: uk-animation-slide-left; repeat: true">
                <div class="col-md-6 my-auto text-center">
                    <h2 class="mb-5 txt-font-lg txt-family-head text-capitalize">
                        create & design
                    </h2>
                    <p class="text-left txt-family-text uk-text-meta h4 uk-text-large">
                        Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? <a class="txt-color-3 uk-button uk-button-text">read more...</a>
                    </p>
                </div>
                <div class="col-md-6 pl-5">
                    <img src="{{URL::asset('assets/assets_front/images/creative & design.svg')}}" class="w-100 h-100">
                </div>
            </div>
            <!-- End Row-->
        </div>
    </section>

    <!--- End category--->

    <!--- Start Vision--->

    <section class="vision my-5 bg-grad">
        <div class="container my-5 h-100 txt-color-2">
            <p class="text-center mx-auto">
                Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
            </p>
        </div>
    </section>

    <!--- End Vision--->

    <!--- Start product Section--->

    <section class="related-sec card-shadow mt-5 pt-5">
        <div class="container txt-color-1">
            <!--- Start Row--->
            <div class="row">
                <div class="uk-position-relative uk-visible-toggle h-75" tabindex="-1" uk-slider="center: true">
                    <!--- Start slider--->
                    <ul class="uk-slider-items uk-grid uk-child-width-2-3 uk-child-width-1-2@s uk-child-width-1-3@m ml-1 mr-5">
                    @foreach($plans as $plan)

                        <!-- Start Item List Card-->
                        <li class=" py-5">
                            <!-- Start Panel-->
                            <div class="uk-panel">
                                <!--- Start Row--->

                                <div class="row ">

                                    <!--- Start Col--->


                                    <!--- Start Col--->
                                    <div class="col-md-4 col-sm-6 col-12 mt-5 py-0">
                                        <div class="card w-100 flex-wrap border-0">
                                            <div class="position-relative">
                                                <img src='{{asset("storage/app/public/Plans/$plan->plan_image")}}' class="position-absolute float-img" alt="">


                                            </div>
                                            <div class="card-body card-round px-0">
                                                <p class="card-title text-center mb-0 mt-5 pt-5 prod-name">{{$plan->name}}</p>
                                                <div class="position-relative">
                                                    <!-- Start rating -->
                                                    <div class="rating p-0 m-0">
                                                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                                    </div>
                                                    <!-- End rating -->

                                                    <div class="card-title mx-auto d-block container text-center txt-family-head txt-color-3 pb-3">
                                                        <p class="d-inline font-size-30 p-0">{{$plan->plan_price}}<span class="text-uppercase pl-0 pl-sm-0 pl-md-2  font-size-20">egp</span></p>
                                                    </div>

                                                    <!-- Start Adons -->


                                                    <!-- Start Button modal -->
                                                    <button class="btn pri-btn position-absolute text-capitalize spic-btn uk-width-small" onclick="addThisProduct(this)" data-plan-id="{{$plan->id}}" data-plan-price="{{$plan->plan_price}}" type="button" uk-toggle="target: #adons">
                                                        @lang('index_front.add_to_cart')
                                                    </button>
                                                    <!-- End Button modal -->

                                                    <!-- Start Modal -->

                                                    <div class="modal fade" id="adons" uk-modal>
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header border-0 justify-content-center">
                                                                    <p class="modal-title txt-family-head text-capitalize txt-color-3 font-size-30" id="adonsLabel">adons</p>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="formAddToCart">
                                                                        <input type="hidden" class="my_product" value="{{$plan->id}}" data-product-id="{{$plan->id}}" data-price="{{$plan->plan_price}}" name="id_product">
                                                                        <table class="table table-hover">
                                                                            <tbody>
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    <div class="text-center txt-family-head txt-color-3">
                                                                                        <input type="checkbox" class="check" onclick="is_check(this)" data-value="{{(float)1}}" value="" id="check1">
                                                                                    </div>
                                                                                </th>
                                                                                <td colspan="2">
                                                                                    <div class="text-center txt-family-head txt-color-1 font-size-20">
                                                                                        <label class="d-inline" for="check1">Motion Graphics Can Bring Statistical Data To Life,</label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="text-center txt-family-head txt-color-3">
                                                                                        <label class="d-inline font-size-20" for="check1">1500<span class="text-uppercase pl-md-2">egp</span></label>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    <div class="text-center txt-family-head txt-color-3">
                                                                                        <input type="checkbox" class="check" onclick="is_check(this)"  data-value="{{(float)2}}"    value=""   aria-label="Checkbox for following text input" id="check2">
                                                                                    </div>
                                                                                </th>
                                                                                <td colspan="2">
                                                                                    <div class="text-center txt-family-head txt-color-1 font-size-20">
                                                                                        <label class="d-inline" for="check2">Animation Is Used For Stories.</label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="text-center txt-family-head txt-color-3">
                                                                                        <label class="d-inline font-size-20" for="check2">1500<span class="text-uppercase pl-md-2">egp</span></label>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    <div class="text-center txt-family-head txt-color-3">
                                                                                        <input type="checkbox" class="check" onclick="is_check(this)" data-value="{{(float)3}}"   value=""    aria-label="Checkbox for following text input" id="check3">
                                                                                    </div>
                                                                                </th>
                                                                                <td colspan="2">
                                                                                    <div class="text-center txt-family-head txt-color-1 font-size-20">
                                                                                        <label class="d-inline" for="check3">Tracking The Package</label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="text-center txt-family-head txt-color-3">
                                                                                        <label class="d-inline font-size-20" for="check3">1500<span class="text-uppercase pl-md-2">egp</span></label>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    <div class="text-center txt-family-head txt-color-3">
                                                                                        <input type="checkbox" class="check" onclick="is_check(this)" data-value="{{(float)4}}"   value=""    aria-label="Checkbox for following text input" id="check4">
                                                                                    </div>
                                                                                </th>
                                                                                <td colspan="2">
                                                                                    <div class="text-center txt-family-head txt-color-1 font-size-20">
                                                                                        <label class="d-inline"  value="1500"  for="check4">Motion Graphics Can Bring Statistical Data To Life,</label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="text-center txt-family-head txt-color-3">
                                                                                        <label class="d-inline font-size-20" for="check4">1500<span class="text-uppercase pl-md-2">egp</span></label>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    <div class="text-center txt-family-head txt-color-3">
                                                                                        <input type="checkbox" class="check" onclick="is_check(this)" data-value="{{(float)5}}"   value=""   aria-label="Checkbox for following text input" id="check5">
                                                                                    </div>
                                                                                </th>
                                                                                <td colspan="2">
                                                                                    <div class="text-center txt-family-head txt-color-1 font-size-20">
                                                                                        <label class="d-inline" for="check5">Animation Is Used For Stories.</label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="text-center txt-family-head txt-color-3">
                                                                                        <label class="d-inline font-size-20" for="check5">1500<span class="text-uppercase pl-md-2">egp</span></label>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </form>
                                                                    <div class="text-center txt-family-head txt-color-3">
                                                                        <p class="d-inline font-size-38"><span id="cart_price">+ 0 </span><span class="text-uppercase pl-md-2 font-size-30">egp</span></p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-around border-0 txt-family-head text-capitalize">
                                                                    <button type="button" class="btn can-btn py-2 px-4 uk-modal-close">
                                                                        Cancel
                                                                    </button>
                                                                    <button type="button" id="cart_submit" onclick="addToCartSubmit(this)" data-plan-id="{{$plan->id}}" data-url="{{route('site.cart.add')}}"  class="btn pri-btn py-2 px-5">
                                                                        Done
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- End Modal -->
                                                    <!-- End Adons -->

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--- End Col--->

                                </div>
                                <!--- End Row--->

                            </div>
                            <!-- End Panel-->
                        </li>
                        <!-- End Item List Card-->
                    @endforeach


                    </ul>
                    <!--- End slider--->
                </div>
            </div>
            <!--- End Row--->
        </div>
    </section>

    <!--- End product Section--->


    <!--- Start team Section--->

    <section class="team-sec py-5">
        <div class="container txt-color-1">
            <!--- Start Row--->
            <div class="row">
                <div class="uk-position-relative uk-visible-toggle h-75" tabindex="-1" uk-slider>
                    <!--- Start slider--->
                    <ul class="uk-slider-items uk-grid uk-child-width-1-2@m uk-child-width-1-1 ml-1 mr-5">
                        <!-- Start List Item-->
                        <li class="py-5">
                            <!-- Start Panel-->
                            <div class="uk-panel">
                                <!-- Start Card-->
                                <div class="uk-card uk-card-default rounded bg-grad txt-color-2">
                                    <div class="uk-card-header">
                                        <div class="uk-grid-large uk-flex-middle" uk-grid>
                                            <div class="uk-width-auto">
                                                <img class="uk-border-circle border-dark" width="80" height="80" src="{{URL::asset('assets/assets_front/images/me.jpeg')}}">
                                            </div>
                                            <div class="pl-3 uk-width-expand">
                                                <h3 class="uk-card-title uk-margin-remove-bottom">Seif Nageh</h3>
                                                <p class="m-0">Front-End Developer</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                    </div>
                                </div>

                            </div>
                            <!-- End Card-->
                        </li>
                        <!-- End List Item-->
                        <!-- Start List Item-->
                        <li class="py-5">
                            <!-- Start Panel-->
                            <div class="uk-panel">
                                <!-- Start Card-->
                                <div class="uk-card uk-card-default rounded bg-grad txt-color-2">
                                    <div class="uk-card-header">
                                        <div class="uk-grid-large uk-flex-middle" uk-grid>
                                            <div class="uk-width-auto">
                                                <img class="uk-border-circle border-dark" width="80" height="80" src="{{URL::asset('assets/assets_front/images/se7s.jpeg')}}">
                                            </div>
                                            <div class="pl-3 uk-width-expand">
                                                <h3 class="uk-card-title uk-margin-remove-bottom">hussin attaia</h3>
                                                <p class="m-0">Full-Stack Developer</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                    </div>
                                </div>

                            </div>
                            <!-- End Card-->
                        </li>
                        <!-- End List Item-->
                        <!-- Start List Item-->
                        <li class="py-5">
                            <!-- Start Panel-->
                            <div class="uk-panel">
                                <!-- Start Card-->
                                <div class="uk-card uk-card-default rounded bg-grad txt-color-2">
                                    <div class="uk-card-header">
                                        <div class="uk-grid-large uk-flex-middle" uk-grid>
                                            <div class="uk-width-auto">
                                                <img class="uk-border-circle border-dark" width="80" height="80" src="{{URL::asset('assets/assets_front/images/me.jpeg')}}">
                                            </div>
                                            <div class="pl-3 uk-width-expand">
                                                <h3 class="uk-card-title uk-margin-remove-bottom">Seif Nageh</h3>
                                                <p class="m-0">Front-End Developer</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                    </div>
                                </div>

                            </div>
                            <!-- End Card-->
                        </li>
                        <!-- End List Item-->
                        <!-- Start List Item-->
                        <li class="py-5">
                            <!-- Start Panel-->
                            <div class="uk-panel">
                                <!-- Start Card-->
                                <div class="uk-card uk-card-default rounded bg-grad txt-color-2">
                                    <div class="uk-card-header">
                                        <div class="uk-grid-large uk-flex-middle" uk-grid>
                                            <div class="uk-width-auto">
                                                <img class="uk-border-circle border-dark" width="80" height="80" src="{{URL::asset('assets/assets_front/images/se7s.jpeg')}}">
                                            </div>
                                            <div class="pl-3 uk-width-expand">
                                                <h3 class="uk-card-title uk-margin-remove-bottom">hussin attaia</h3>
                                                <p class="m-0">Full-Stack Developer</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                    </div>
                                </div>

                            </div>
                            <!-- End Card-->
                        </li>
                        <!-- End List Item-->
                    </ul>
                    <!--- End slider--->
                </div>
            </div>
            <!--- End Row--->
        </div>
    </section>

    <!--- End team Section--->

@endsection

@section('scripts')

    <script>

        function login(object) {

            var url = object.getAttribute('data-url');
            window.location.href = url;
        }

        /*********************************/

        function addToCartSubmit(element) {

            var url = element.getAttribute('data-url');


            var total_price = fruits.reduce((a, b) => a + b, 0);

            var productId = element.getAttribute('data-plan-id');
            var checked_value_cart = document.getElementById('checked_value_cart');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: url,
                data: {
                    'plan_id' : productId,
                    'total_price' : total_price,
                    '_token':'{{ csrf_token() }}',

                },

                success: function(response){

                    if(response.order) {
                        var m = response.order.total_price;
                        checked_value_cart.innerText += parseFloat(m);


                        alert(response.status) ? "" : location.reload();
                    }else{

                        alert(response.status) ? "" : location.reload();
                    }
                }

            });
        }

    </script>



    <script src="{{URL::asset('assets\assets_front\js\add_to_cart.js')}}"></script>
@endsection









