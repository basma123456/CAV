
@extends('layouts.front_layouts.master')



@section('content')

    @if(Session::has('msg'))
        <div class="alert alert-danger"> {{Session::get('msg')}} </div>
    @endif

    <section class="sign-up-main my-5">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)


                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="container">
            <div class="bg-grad more-rounded">
                <div class="row">
                    <div class="col-12">
                        <div class="container my-4">
                            <ul class="uk-subnav justify-content-around" uk-switcher>
                                <li>
                                    <a class="font-size-30" href="#">CUSTOMER</a>
                                </li>
                                <li>
                                    <a class="font-size-30" id="seller" href='#' >SELLER</a>
                                </li>
                            </ul>
                            <ul class="uk-switcher uk-margin">
                                <li>
                                    <div class="container">
                                        <div class="row px-lg-5 px-0">
                                            <div class="col-12 px-lg-5 px-0">
                                                <div class="icons d-flex align-items-center justify-content-center">
                                                    <a class="txt-color-2" href="#"><i class="fab fa-facebook-f "></i></a>
                                                    <a class="txt-color-2" href="#"><i class="fab fa-google"></i></a>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="border-bottom w-25 ml-5"></div>
                                                    <div class="mx-3 font-size-30 txt-color-2">Or</div>
                                                    <div class="border-bottom w-25 mr-5"></div>
                                                </div>
                                                <form method="post" action="{{route('customer.register')}}" class="uk-grid-small" uk-grid enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="uk-width-1-2@s p-2 position-relative">
                                                        <label for="first-name"  class="px-2 m-0 d-none">First Name</label>
                                                        <input id="first-name" name="fName" value="{{ old('fName') }}" class="uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="text" placeholder="First Name">
                                                        @error('fName')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror


                                                    </div>
                                                    <div class="uk-width-1-2@s p-2 position-relative">
                                                        <label for="last-name" class="px-2 m-0 d-none">Last Name</label>
                                                        <input id="last-name" name="lname"  value="{{ old('lname') }}" class="uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="text" placeholder="Last Name">
                                                        @error('lname')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>


                                                    <div class="uk-width-1-1 p-2 position-relative">
                                                        <label for="e-mail" class="px-2 m-0 d-none">E-Mail</label>
                                                        <input id="e-mail" name="email" value="{{ old('email') }}" class="uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="text" placeholder="E-Mail">
                                                        @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>


                                                    <div class="uk-width-1-1 p-2 position-relative">
                                                        <label for="phone" class="px-2 m-0 d-none">Phone</label>
                                                        <input id="phone" name="phone" value="{{ old('phone') }}" class="uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="text" placeholder="Phone">
                                                        @error('phone')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>


                                                    <div class="uk-width-1-1 p-2 position-relative">
                                                        <label for="address" class="px-2 m-0 d-none">Address</label>
                                                        <input id="address" name="address" value="{{ old('address') }}" class="@error('address') is-invalid @enderror uk-input uk-form-blank bg-transparent border-bottom txt-color-2"  type="text" placeholder="Enter Your Address" />
                                                        @error('address')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror


                                                    </div>


                                                    <div class="uk-width-1-2@s p-2 position-relative">
                                                        <label for="password" class="px-2 m-0 d-none">Password</label>
                                                        <input id="password" name="password" class="uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="Password" placeholder="Password">
                                                        @error('fName')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>


                                                    <div class="uk-width-1-2@s p-2 position-relative">
                                                        <label for="password2" class="px-2 m-0 d-none">Confirm Password</label>
                                                        <input id="password2"  class="uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="Password" name="password_confirmation" placeholder="Confirm Password">
                                                        @error('fName')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>


                                                    <div class="uk-width-1-1 p-2">
                                                        <input  type="checkbox" id="check1" onchange="is_check()">
                                                        <input  type="hidden" id="check_val" name="customer_type" value="personal">

                                                        <label class="position-static"   for="check1">Company</label>
                                                    </div>


                                                    <div class="uk-width-1-1 p-2 position-relative">
                                                        <label for="national-number" class="px-2 m-0 d-none">National ID Number</label>
                                                        <input id="phone" name="nid" value="{{ old('nid') }}" class="@error('nid') is-invalid @enderror uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="text" placeholder="National ID Number">
                                                        @error('nid')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror


                                                    </div>



                                                    <div class="uk-width-1-1 p-2 position-relative" uk-form-custom="target: true">
                                                        <input  id="pic-tax-card" name="cr_no" value="{{ old('cr_no') }}" class="uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="file" placeholder="Picture Commercial Record">
                                                        <input name="cr_no" value="{{ old('cr_no') }}" class="w-100 border-0 uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="text" placeholder="Picture Commercial Record">
                                                        @error('fName')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <span class="uk-form-icon uk-form-icon-flip font-size-30"><i class="far fa-arrow-alt-circle-up"></i></span>
                                                    </div>


                                                    <div class="uk-width-1-1 p-2 position-relative" uk-form-custom="target: true">
                                                        <input id="pic-tax-card" name="pic_nid" value="{{ old('pic_nid') }}" class="uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="file" placeholder="Picture Tax Card">
                                                        @error('pic_nid')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <input name="pic_nid" value="{{ old('pic_nid') }}" class="w-100 border-0 uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="text" placeholder="Picture Tax Card">
                                                        @error('pic_nid')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <span class="uk-form-icon uk-form-icon-flip font-size-30"><i class="far fa-arrow-alt-circle-up"></i></span>
                                                    </div>


                                                    <div class="uk-width-1-1 p-2">
                                                        <input name=""  type="checkbox" id="check2">
                                                        <label class="position-static a-border" for="check2">I agree to Compu A Vision <a href="#">Terms</a> and <a href="#">Privacy Policy</a></label>
                                                    </div>
                                                    <div class="uk-width-1-1 p-2 my-4 d-flex align-content-center justify-content-center">
                                                        <button class="btn pri-btn px-5 py-2 font-size-30 uk-text-bold txt-family-head bg-white txt-color-1" type="submit">Sign Up
                                                        </button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="container">
                                        <div class="row px-lg-5 px-0">
                                            <div class="col-12 px-lg-5 px-0">
                                                <div class="icons d-flex align-items-center justify-content-center">
                                                    <a class="txt-color-2" href="#"><i class="fab fa-facebook-f "></i></a>
                                                    <a class="txt-color-2" href="#"><i class="fab fa-google"></i></a>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="border-bottom w-25 ml-5"></div>
                                                    <div class="mx-3 font-size-30 txt-color-2">Or</div>
                                                    <div class="border-bottom w-25 mr-5"></div>
                                                </div>





                                                <form action="{{route('employee.register')}}" method="post" enctype="multipart/form-data" class="uk-grid-small" uk-grid>
                                                    @csrf
                                                    <div class="col-12 mt-3 mx-auto d-flex justify-content-center align-items-center">
                                                        <div class="profile-pic rounded-circle" uk-form-custom="target: true">
                                                            <span class="uk-form-icon uk-form-icon-flip w-100 h-100 font-size-38 txt-color-2"><i class="fas fa-user"></i></span>
                                                            <input id="pic-tax-card" name="avatar" value="{{ old('avatar') }}" class="@error('avatar') is-invalid @enderror uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="file">
                                                            <br>
                                                            @error('avatar')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="uk-width-1-2@s p-2 position-relative">
                                                        <label for="first-name"  class="px-2 m-0 d-none">First Name</label>
                                                        <input id="first-name" name="fName" value="{{ old('fName') }}" class="@error('fname') is-invalid @enderror uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="text" placeholder="First Name">
                                                        @error('fName')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                    <div class="uk-width-1-2@s p-2 position-relative">
                                                        <label for="last-name" class="px-2 m-0 d-none">Last Name</label>
                                                        <input id="last-name" name="lname" value="{{ old('lname') }}" class="@error('lname') is-invalid @enderror uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="text" placeholder="Last Name">


                                                    </div>
                                                    <div class="uk-width-1-1 p-2 position-relative">
                                                        <label for="e-mail" class="px-2 m-0 d-none">E-Mail</label>
                                                        <input id="e-mail" name="email"  value="{{ old('email') }}" class="@error('email') is-invalid @enderror uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="text" placeholder="E-Mail">
                                                        @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror



                                                    </div>
                                                    <div class="uk-width-1-1 p-2 position-relative">
                                                        <label for="phone" class="px-2 m-0 d-none">Phone</label>
                                                        <input id="phone" name="phone" value="{{ old('phone') }}" class="@error('phone') is-invalid @enderror uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="text" placeholder="Phone">
                                                        @error('phone')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror






                                                    </div>
                                                    <div class="uk-width-1-2@s p-2 position-relative">
                                                        <label for="password" class="px-2 m-0 d-none">Password</label>
                                                        <input id="password" name="password" class="@error('password') is-invalid @enderror uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="Password" placeholder="Password">
                                                        @error('pass')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror


                                                    </div>
                                                    <div class="uk-width-1-2@s p-2 position-relative">
                                                        <label for="password2" class="px-2 m-0 d-none">Confirm Password</label>
                                                        <input id="password2" name="password_confirmation" class="uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="Password" placeholder="Confirm Password">

                                                    </div>
                                                    <div class="uk-width-1-1 p-2 position-relative">
                                                        <label for="national-number" class="px-2 m-0 d-none">National ID Number</label>
                                                        <input id="phone" name="nid" value="{{ old('nid') }}" class="@error('nid') is-invalid @enderror uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="text" placeholder="National ID Number">
                                                        @error('nid')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror


                                                    </div>
                                                    <div class="uk-width-1-1 p-2 position-relative" uk-form-custom="target: true">
                                                        <input id="pic-tax-card" name="pic_nid" value="{{ old('pic_nid') }}" class="uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="file">
                                                        <input name="pic_nid" value="{{ old('pic_nid') }}" class="@error('pic_nid') is-invalid @enderror w-100 border-0 uk-input uk-form-blank bg-transparent border-bottom txt-color-2" type="text" placeholder="Picture National ID">
                                                        @error('pic_nid')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror


                                                        <span class="uk-form-icon uk-form-icon-flip"><i class="far fa-arrow-alt-circle-up"></i></span>
                                                    </div>
                                                    <div class="mt-4 txt-color-2">
                                                        <input type="checkbox" id="check2">
                                                        <label class="position-static a-border" for="check2">I agree to Compu A Vision <a href="#">Terms</a> and <a href="#">Privacy Policy</a></label>
                                                    </div>
                                                    <div class="uk-width-1-1 p-2 my-4 d-flex align-content-center justify-content-center">
                                                        <button class="btn pri-btn px-5 py-2 font-size-30 uk-text-bold txt-family-head bg-white txt-color-1" type="submit">Sign Up
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script type="text/javascript">

    function is_check() {
        var checked_item = document.getElementById('check_val');

        if(checked_item.value === "personal") {
             checked_item.value = "company";
        }else{
             checked_item.value = "personal";
        }


    }



// $(document).ready(function(){
//
//     $('#check1').change(function(){
//         if($('#check1').is(':checked')){
//             alert('yes');
//         }else{
//             alert('no');
//             // $('#button').css('display','none');
//         }
//     })
//
// });

</script>
@endsection









