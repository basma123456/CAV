
@extends('layouts.front_layouts.master')






@section('content')

    @if(Session::has('msg'))
           <div class="alert alert-danger"> {{Session::get('msg')}} </div>
        @endif

    {{--    {{dd(['big cats' => $big_cats , 'sub cats' => $subCats , 'small' => $small_plans])}}--}}

    <!--- Start Main--->


    <section class="main-cat">
        <div class="container mt-md-5 pt-md-5 my-sm-2 py-sm-2">



            <ul class="uk-subnav pl-5 mt-3" uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                @foreach($subCats[$catID] as $subkey => $subval)
                    @if($subCats[$catID][$subkey] != null)

                        <li><a   href="{{url('categories/')}}/{{$catID}}/{{$subkey}}" class="uk-text-bold txt-family-head font-size-30 mr-5">{{$subCats[$catID][$subkey]->name}}</a></li>

                    @endif
                @endforeach <!-- foreach($sub_cats -->

            </ul>




            <div class="border-bottom my-3 mx-2 w-75"></div>


            <ul class="uk-switcher uk-margin card-shadow">



                @foreach($subCats[$catID] as $key => $val)
                    <li>
                        <div class="container">
                            <!--- Start Row--->
                            <div class="row my-5">

                        @foreach(App\Models\Plan::where('sub_category_id',$subCats[$catID][$key]->id)->where('status',1)->latest()->get() as $plan)










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





                        @endforeach
                                                    </div>
                                                    <!--- End Row--->
                                                </div>

                    </li>


                @endforeach

            </ul>


</div>
</section>

<!--- End Main--->


<!--- Start Your Idea--->

<section class="idea mb-5 p-5">
<div class="container">
<div class="row">
<div class="col-12">
<p class="font-size-30 uk-text-bold txt-family-head pl-5">
    Other
</p>
<div class="border-bottom my-3 mx-2 w-75"></div>
</div>
</div>
<div class="bg-grad more-rounded text-capitalize mt-5 p-5 txt-color-2">
<div class="container">
<div class="row">
    <div class="col-12">
        <p class="font-size-38 text-center text-uppercase uk-text-bold">your idea</p>
        <form id="idea-form">
            <label class="d-block" for="name">Idea Name</label>
            <div class="uk-inline border-bottom w-100">
                <span class="uk-form-icon text-black-50 font-size-30 ml-3"><i class="fas fa-lightbulb"></i><span class="ml-2 h-50 border-right"></span></span>
                <input type="text" class="uk-input ml-5 border-0" id="name">
            </div>
            <label class="d-block mt-3" for="logo">Your Logo</label>
            <div class="uk-inline border-bottom w-100">
                <span class="uk-form-icon text-black-50 font-size-30 ml-3"><i class="fas fa-lightbulb"></i><span class="ml-2 h-50 border-right"></span></span>
                <div class="w-100 ml-5 txt-color-transparent" uk-form-custom="target: true">
                    <input class="w-100" type="file" id="logo">
                    <input class="w-100 border-0 uk-input uk-form-width-medium" type="text" placeholder="Select file">
                </div>
                <span class="uk-form-icon uk-form-icon-flip text-white-50 font-size-30 ml-3"><span class="mr-2 h-50 border-right"></span><i class="far fa-arrow-alt-circle-up"></i></span>
            </div>
            <label class="d-block mt-3" for="details">Details</label>
            <div class="mx-auto mt-1 mb-5 more-rounded overlay-white">
                <textarea class="uk-textarea bg-transparent border-0" rows="10"></textarea>
            </div>
            <input class="btn bg-white py-2 px-5 font-size-30 uk-text-bold txt-color-1 float-right" type="submit" value="Done" id="">
        </form>
    </div>
</div>
</div>
</div>
</div>
</section>
<!--- End Your Idea--->

















@endsection

@section('scripts')
{{--    <script>--}}

{{--        // $(document).ready(function () {--}}
{{--        //    $('.sub_cats').click(function () {--}}
{{--        //        alert('yes');--}}
{{--        //    });--}}
{{--        // });--}}

{{--        function m(object) {--}}
{{--            $(document).ready(function () {--}}


{{--                var url = object.getAttribute('href');--}}
{{--                window.location.href = url;--}}


{{--                //     alert(url);--}}
{{--                //         $.ajax({--}}
{{--                //             type: "GET",--}}
{{--                //             url: url,--}}
{{--                //--}}
{{--                //--}}
{{--                //             success: function (response) {--}}
{{--                //                 var response = $.parseJSON(response);--}}
{{--                //                 if(response.status == 200) {--}}
{{--                //                     console.log(response);--}}
{{--                //                 }--}}
{{--                //             }--}}
{{--                //--}}
{{--                //--}}
{{--                //         })--}}


{{--            });--}}
{{--        }--}}
{{--    </script>--}}











{{--///////////////////////////////////start script ////////////////////////////////--}}
    <script type="text/javascript">

        var fruits = [];
            console.log(fruits);


            function addThisProduct(object){
                var price = object.getAttribute('data-plan-price');
                var plan_id = object.getAttribute('data-plan-id');  //attr  of each button of add to cart not of cart submit modal

                fruits = [];
                fruits.push(parseFloat(price));
                var m = fruits.reduce((a, b) => a + b, 0)


                document.getElementById('cart_price').innerText = price;
                document.getElementById('cart_submit').setAttribute('data-plan-id' , plan_id);  //attr of the modal


            }
/*******************************************************************/
         /*
            # is check func is for adding new adons values to the plan price in the modal
         */

        function is_check(object) {

            if(object.value == '') {
                object.value = '';

                object.value = object.closest('.check').getAttribute('data-value');

                object.value = parseFloat(object.value);
                fruits.push(parseFloat(object.value));
               var m = fruits.reduce((a, b) => a + b, 0)
            }

        }//end of func

        ////////////////////////////////////////



        // function refresh_func() {
        //
        //      document.getElementById('cart_price').innerText = "+ 0 ";
        //
        //     // location.reload();
        //     // return false;
        //
        // }



        ///////////////////////////////////////

        ///////////////////////////////////////
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

                        }else if(response.login) {

                            var r = confirm(response.status);
                            if (r == true){
                                window.location.href ='{{url("login")}}';
                            }

                        }else{

                            alert(response.status) ? "" : location.reload();
                        }
            }

        });
    }

    /******************************************************/
        /*
        # sure func is used for confirmation of deletion of cart
         */

    function sure() {

        var r = confirm("Are You Sure You Want To Delete Your Cart?");
        if (r == true){
            let form = document.getElementById("form__submit");
            form.submit();

            {{--window.location.href = '{{url('delete_cart')}}';--}}
        }
    }

    </script>

@endsection






























