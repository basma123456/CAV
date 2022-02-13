
@extends('layouts.front_layouts.master')


@section('header')
    @if(Session::has('msg'))
        <div class="alert alert-danger"> {{Session::get('msg')}} </div>
    @endif

    <header class="main-header bg-main">
        <!--- Start NavBar--->
        <div class="container p-0">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <div class="container-fluid p-0">
                    <a class="navbar-brand mr-5" href="#">
                        <img src="../assets/images/Logo-04.svg" width="100" height="100" class="d-inline-block align-top mr-3" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!--- Start pages--->
                    <div class="collapse navbar-collapse mr-5" id="navbarContent">
                        <div class="navbar-nav-par">
                            <ul class="navbar-nav font-weight-bold font-size-20 ml-3">
                                <li class="nav-item mr-2 active">
                                    <a class="nav-link mr-4" href="#category">Category<span class="sr-only">(current)</span></a>
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

@endsection





@section('content')


    <!--- Start Product --->
    <section id="product" class="my-5">
        <div class="container">
            <div class="p-4">
                <div class="row">
                    <div class="col-md-6 col-12 d-flex justify-content-center">
                        <div class="shadow-sm w-75 h-75 more-rounded d-flex justify-content-center align-items-center">
                            <img class="w-75 h-75" src="../assets/images/e-commerce web.svg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <h2 class=" txt-family-head text-capitalize">E-Commerce Web</h2>
                        <p>Many Desktop Publishing Packages And Web Page Editors Now Use Lorem Ipsum As Their Default Model Text, And A Search For 'Lorem Ipsum' Will Uncover Many Web Sites Still In Their Infancy.</p>
                        <h2 class="txt-family-head text-capitalize">Features</h2>
                        <ul class="list-unstyled">
                            <li class=""><i class="far fa-check-circle pr-2"></i>Tracking Backedes</li>
                            <li class=""><i class="far fa-check-circle pr-2"></i>Many Desktop Publishing Packages</li>
                            <li class=""><i class="far fa-check-circle pr-2"></i>Tracking Backedes</li>
                            <li class=""><i class="far fa-check-circle pr-2"></i>Many Desktop Publishing Packages</li>
                            <li class=""><i class="far fa-check-circle pr-2"></i>Tracking Backedes</li>
                        </ul>
                        <div class="border-bottom mx-4"></div>
                        <div class="d-flex justify-content-around align-items-center my-4">
                            <p class="d-inline text-center txt-family-head txt-color-1 font-size-38 m-0">9000<span class="text-uppercase pl-md-2 font-size-20 ml-2 txt-color-3">egp</span></p>
                            <!-- Start Adons -->
                            <!-- Start Button modal -->
                            <button class="btn pri-btn text-capitalize font-size-18 uk-text-bold uk-width-small" type="button" uk-toggle="target: #adons">
                                add to cart
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
                                            <form>
                                                <table class="table table-hover">
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <div class="text-center txt-family-head txt-color-3">
                                                                <input type="checkbox" id="check1">
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
                                                                <input type="checkbox" aria-label="Checkbox for following text input" id="check2">
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
                                                                <input type="checkbox" aria-label="Checkbox for following text input" id="check3">
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
                                                                <input type="checkbox" aria-label="Checkbox for following text input" id="check4">
                                                            </div>
                                                        </th>
                                                        <td colspan="2">
                                                            <div class="text-center txt-family-head txt-color-1 font-size-20">
                                                                <label class="d-inline" for="check4">Motion Graphics Can Bring Statistical Data To Life,</label>
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
                                                                <input type="checkbox" aria-label="Checkbox for following text input" id="check5">
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
                                                <p class="d-inline font-size-38">9000<span class="text-uppercase pl-md-2 font-size-30">egp</span></p>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-around border-0 txt-family-head text-capitalize">
                                            <button type="button" class="btn can-btn py-2 px-4 uk-modal-close">
                                                Cancel
                                            </button>
                                            <button type="button" class="btn pri-btn py-2 px-5">
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
        </div>
    </section>
    <!--- End Product --->


    <!--- Start product Section--->

    <section class="related-sec mt-5 pt-5">
        <div class="container txt-color-1">
            <!--- Start Row--->
            <div class="row">
                <h3 class="text-capitalize">Services Related</h3>
                <div class="uk-position-relative uk-visible-toggle h-75" tabindex="-1" uk-slider="center: true">
                    <!--- Start slider--->
                    <ul class="uk-slider-items uk-grid uk-child-width-2-3 uk-child-width-1-2@s uk-child-width-1-3@m ml-1 mr-5">

                        <!-- Start Item List Card-->
                        <li class=" py-5">
                            <!-- Start Panel-->
                            <div class="uk-panel">
                                <!--- Start Row--->

                                <div class="row">
                                    <!--- Start Col--->
                                    <div class="col-12">
                                        <div class="card w-100 flex-wrap border-0">
                                            <div class="position-relative">
                                                <img src="../assets/images/e-commerce web.svg" class="position-absolute float-img" alt="">
                                            </div>
                                            <div class="card-body card-round">
                                                <p class="card-title text-center mb-0 mt-5 pt-5 prod-name">E-Commerce Website</p>
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
                                                        <p class="d-inline font-size-30 p-0">1500<span class="text-uppercase pl-0 pl-sm-0 pl-md-2  font-size-20">egp</span></p>
                                                    </div>
                                                    <!-- Start Adons -->
                                                    <!-- Start Button modal -->
                                                    <button class="btn pri-btn position-absolute text-capitalize spic-btn uk-width-small" type="button" uk-toggle="target: #adons">
                                                        add to cart
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
                                                                    <form>
                                                                        <table class="table table-hover">
                                                                            <tbody>
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    <div class="text-center txt-family-head txt-color-3">
                                                                                        <input type="checkbox" id="check1">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check2">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check3">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check4">
                                                                                    </div>
                                                                                </th>
                                                                                <td colspan="2">
                                                                                    <div class="text-center txt-family-head txt-color-1 font-size-20">
                                                                                        <label class="d-inline" for="check4">Motion Graphics Can Bring Statistical Data To Life,</label>
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check5">
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
                                                                        <p class="d-inline font-size-38">9000<span class="text-uppercase pl-md-2 font-size-30">egp</span></p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-around border-0 txt-family-head text-capitalize">
                                                                    <button type="button" class="btn can-btn py-2 px-4 uk-modal-close">
                                                                        Cancel
                                                                    </button>
                                                                    <button type="button" class="btn pri-btn py-2 px-5">
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
                        <!-- Start Item List Card-->
                        <li class=" py-5">
                            <!-- Start Panel-->
                            <div class="uk-panel">
                                <!--- Start Row--->

                                <div class="row">
                                    <!--- Start Col--->
                                    <div class="col-12">
                                        <div class="card w-100 flex-wrap border-0">
                                            <div class="position-relative">
                                                <img src="../assets/images/e-commerce web.svg" class="position-absolute float-img" alt="">
                                            </div>
                                            <div class="card-body card-round">
                                                <p class="card-title text-center mb-0 mt-5 pt-5 prod-name">E-Commerce Website</p>
                                                <!-- Start Adons -->
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
                                                        <p class="d-inline font-size-30 p-0">1500<span class="text-uppercase pl-0 pl-sm-0 pl-md-2  font-size-20">egp</span></p>
                                                    </div>
                                                    <!-- Start Button modal -->
                                                    <button class="btn pri-btn position-absolute text-capitalize spic-btn uk-width-small" type="button" uk-toggle="target: #adons">
                                                        add to cart
                                                    </button>
                                                    <!-- End Button modal -->

                                                    <!-- Start Modal -->

                                                    <div class="modal fade" id="adons" aria-hidden="true" uk-modal>
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header border-0 justify-content-center">
                                                                    <p class="modal-title txt-family-head text-capitalize txt-color-3 font-size-30" id="adonsLabel">adons</p>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>
                                                                        <table class="table table-hover">
                                                                            <tbody>
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    <div class="text-center txt-family-head txt-color-3">
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check1">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check1">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check2">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check3">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check4">
                                                                                    </div>
                                                                                </th>
                                                                                <td colspan="2">
                                                                                    <div class="text-center txt-family-head txt-color-1 font-size-20">
                                                                                        <label class="d-inline" for="check4">Motion Graphics Can Bring Statistical Data To Life,</label>
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check5">
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
                                                                        <p class="d-inline font-size-38">9000<span class="text-uppercase pl-md-2 font-size-30">egp</span></p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-around border-0 txt-family-head text-capitalize">
                                                                    <button type="button" class="btn can-btn py-2 px-4 uk-modal-close" data-dismiss="modal">Cancel</button>
                                                                    <button type="button" class="btn pri-btn py-2 px-5">Done</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- End Modal -->

                                                </div>

                                                <!-- End Adons -->
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
                        <!-- Start Item List Card-->
                        <li class=" py-5">
                            <!-- Start Panel-->
                            <div class="uk-panel">
                                <!--- Start Row--->

                                <div class="row">
                                    <!--- Start Col--->
                                    <div class="col-12">
                                        <div class="card w-100 flex-wrap border-0">
                                            <div class="position-relative">
                                                <img src="../assets/images/e-commerce web.svg" class="position-absolute float-img" alt="">
                                            </div>
                                            <div class="card-body card-round">
                                                <p class="card-title text-center mb-0 mt-5 pt-5 prod-name">E-Commerce Website</p>
                                                <!-- Start Adons -->
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
                                                        <p class="d-inline font-size-30 p-0">1500<span class="text-uppercase pl-0 pl-sm-0 pl-md-2  font-size-20">egp</span></p>
                                                    </div>
                                                    <!-- Start Button modal -->
                                                    <button class="btn pri-btn position-absolute text-capitalize spic-btn uk-width-small" type="button" uk-toggle="target: #adons">
                                                        add to cart
                                                    </button>
                                                    <!-- End Button modal -->

                                                    <!-- Start Modal -->

                                                    <div class="modal fade" id="adons" aria-hidden="true" uk-modal>
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header border-0 justify-content-center">
                                                                    <p class="modal-title txt-family-head text-capitalize txt-color-3 font-size-30" id="adonsLabel">adons</p>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>
                                                                        <table class="table table-hover">
                                                                            <tbody>
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    <div class="text-center txt-family-head txt-color-3">
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check1">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check1">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check2">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check3">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check4">
                                                                                    </div>
                                                                                </th>
                                                                                <td colspan="2">
                                                                                    <div class="text-center txt-family-head txt-color-1 font-size-20">
                                                                                        <label class="d-inline" for="check4">Motion Graphics Can Bring Statistical Data To Life,</label>
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check5">
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
                                                                        <p class="d-inline font-size-38">9000<span class="text-uppercase pl-md-2 font-size-30">egp</span></p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-around border-0 txt-family-head text-capitalize">
                                                                    <button type="button" class="btn can-btn py-2 px-4 uk-modal-close" data-dismiss="modal">Cancel</button>
                                                                    <button type="button" class="btn pri-btn py-2 px-5">Done</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- End Modal -->

                                                </div>

                                                <!-- End Adons -->
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
                        <!-- Start Item List Card-->
                        <li class=" py-5">
                            <!-- Start Panel-->
                            <div class="uk-panel">
                                <!--- Start Row--->

                                <div class="row">
                                    <!--- Start Col--->
                                    <div class="col-12">
                                        <div class="card w-100 flex-wrap border-0">
                                            <div class="position-relative">
                                                <img src="../assets/images/e-commerce web.svg" class="position-absolute float-img" alt="">
                                            </div>
                                            <div class="card-body card-round">
                                                <p class="card-title text-center mb-0 mt-5 pt-5 prod-name">E-Commerce Website</p>
                                                <!-- Start Adons -->
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
                                                        <p class="d-inline font-size-30 p-0">1500<span class="text-uppercase pl-0 pl-sm-0 pl-md-2  font-size-20">egp</span></p>
                                                    </div>
                                                    <!-- Start Button modal -->
                                                    <button class="btn pri-btn position-absolute text-capitalize spic-btn uk-width-small" type="button" uk-toggle="target: #adons">
                                                        add to cart
                                                    </button>
                                                    <!-- End Button modal -->

                                                    <!-- Start Modal -->

                                                    <div class="modal fade" id="adons" aria-hidden="true" uk-modal>
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header border-0 justify-content-center">
                                                                    <p class="modal-title txt-family-head text-capitalize txt-color-3 font-size-30" id="adonsLabel">adons</p>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>
                                                                        <table class="table table-hover">
                                                                            <tbody>
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    <div class="text-center txt-family-head txt-color-3">
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check1">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check1">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check2">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check3">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check4">
                                                                                    </div>
                                                                                </th>
                                                                                <td colspan="2">
                                                                                    <div class="text-center txt-family-head txt-color-1 font-size-20">
                                                                                        <label class="d-inline" for="check4">Motion Graphics Can Bring Statistical Data To Life,</label>
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check5">
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
                                                                        <p class="d-inline font-size-38">9000<span class="text-uppercase pl-md-2 font-size-30">egp</span></p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-around border-0 txt-family-head text-capitalize">
                                                                    <button type="button" class="btn can-btn py-2 px-4 uk-modal-close" data-dismiss="modal">Cancel</button>
                                                                    <button type="button" class="btn pri-btn py-2 px-5">Done</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- End Modal -->

                                                </div>

                                                <!-- End Adons -->
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
                        <!-- Start Item List Card-->
                        <li class=" py-5">
                            <!-- Start Panel-->
                            <div class="uk-panel">
                                <!--- Start Row--->

                                <div class="row">
                                    <!--- Start Col--->
                                    <div class="col-12">
                                        <div class="card w-100 flex-wrap border-0">
                                            <div class="position-relative">
                                                <img src="../assets/images/e-commerce web.svg" class="position-absolute float-img" alt="">
                                            </div>
                                            <div class="card-body card-round">
                                                <p class="card-title text-center mb-0 mt-5 pt-5 prod-name">E-Commerce Website</p>
                                                <!-- Start Adons -->
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
                                                        <p class="d-inline font-size-30 p-0">1500<span class="text-uppercase pl-0 pl-sm-0 pl-md-2  font-size-20">egp</span></p>
                                                    </div>
                                                    <!-- Start Button modal -->
                                                    <button class="btn pri-btn position-absolute text-capitalize spic-btn uk-width-small" type="button" uk-toggle="target: #adons">
                                                        add to cart
                                                    </button>
                                                    <!-- End Button modal -->

                                                    <!-- Start Modal -->

                                                    <div class="modal fade" id="adons" aria-hidden="true" uk-modal>
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header border-0 justify-content-center">
                                                                    <p class="modal-title txt-family-head text-capitalize txt-color-3 font-size-30" id="adonsLabel">adons</p>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>
                                                                        <table class="table table-hover">
                                                                            <tbody>
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    <div class="text-center txt-family-head txt-color-3">
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check1">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check1">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check2">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check3">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check4">
                                                                                    </div>
                                                                                </th>
                                                                                <td colspan="2">
                                                                                    <div class="text-center txt-family-head txt-color-1 font-size-20">
                                                                                        <label class="d-inline" for="check4">Motion Graphics Can Bring Statistical Data To Life,</label>
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check5">
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
                                                                        <p class="d-inline font-size-38">9000<span class="text-uppercase pl-md-2 font-size-30">egp</span></p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-around border-0 txt-family-head text-capitalize">
                                                                    <button type="button" class="btn can-btn py-2 px-4 uk-modal-close" data-dismiss="modal">Cancel</button>
                                                                    <button type="button" class="btn pri-btn py-2 px-5">Done</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- End Modal -->

                                                </div>

                                                <!-- End Adons -->
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
                        <!-- Start Item List Card-->
                        <li class=" py-5">
                            <!-- Start Panel-->
                            <div class="uk-panel">
                                <!--- Start Row--->

                                <div class="row">
                                    <!--- Start Col--->
                                    <div class="col-12">
                                        <div class="card w-100 flex-wrap border-0">
                                            <div class="position-relative">
                                                <img src="../assets/images/e-commerce web.svg" class="position-absolute float-img" alt="">
                                            </div>
                                            <div class="card-body card-round">
                                                <p class="card-title text-center mb-0 mt-5 pt-5 prod-name">E-Commerce Website</p>
                                                <!-- Start Adons -->
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
                                                        <p class="d-inline font-size-30 p-0">1500<span class="text-uppercase pl-0 pl-sm-0 pl-md-2  font-size-20">egp</span></p>
                                                    </div>
                                                    <!-- Start Button modal -->
                                                    <button class="btn pri-btn position-absolute text-capitalize spic-btn uk-width-small" type="button" uk-toggle="target: #adons">
                                                        add to cart
                                                    </button>
                                                    <!-- End Button modal -->

                                                    <!-- Start Modal -->

                                                    <div class="modal fade" id="adons" aria-hidden="true" uk-modal>
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header border-0 justify-content-center">
                                                                    <p class="modal-title txt-family-head text-capitalize txt-color-3 font-size-30" id="adonsLabel">adons</p>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>
                                                                        <table class="table table-hover">
                                                                            <tbody>
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    <div class="text-center txt-family-head txt-color-3">
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check1">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check1">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check2">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check3">
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check4">
                                                                                    </div>
                                                                                </th>
                                                                                <td colspan="2">
                                                                                    <div class="text-center txt-family-head txt-color-1 font-size-20">
                                                                                        <label class="d-inline" for="check4">Motion Graphics Can Bring Statistical Data To Life,</label>
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
                                                                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check5">
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
                                                                        <p class="d-inline font-size-38">9000<span class="text-uppercase pl-md-2 font-size-30">egp</span></p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-around border-0 txt-family-head text-capitalize">
                                                                    <button type="button" class="btn can-btn py-2 px-4 uk-modal-close" data-dismiss="modal">Cancel</button>
                                                                    <button type="button" class="btn pri-btn py-2 px-5">Done</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- End Modal -->

                                                </div>

                                                <!-- End Adons -->
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

                    </ul>
                    <!--- End slider--->
                </div>
            </div>
            <!--- End Row--->
        </div>
    </section>


@endsection

@section('scripts')


@endsection









