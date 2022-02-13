@extends('layouts.master')
@section('css')

@section('title')
    @lang("customer.add_customer")
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">@lang("customer.add_customer") </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route("dashboard.home")}}" class="default-color">@lang("sidebar.dashboard")</a></li>
                <li class="breadcrumb-item active">@lang("customer.add_customer")</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">

                <div class="row">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block">
                                    </div>
                                    <div class="d-block d-md-flex clearfix sm-mt-20">
                                        <div class="clearfix">
                                        </div>
                                    </div>
                             </div>


                                <form action="{{route("dashboard.customer.store")}}" method="POST" class="mt-5 col-md-12" enctype="multipart/form-data">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                  @csrf
                                    {{method_field("post")}}
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="full_name">@lang("customer.full_name")</label>
                                            <input type="text" id="full_name" name="full_name" class="form-control" value="{{old("full_name")}}">
                                        </div>


                                        <div class="col-md-6 form-group">
                                            <label for="email">@lang("customer.email")</label>
                                            <input type="text" id="email"  name="email" class="form-control" value="{{old("email")}}">
                                        </div>


                                        <div class="col-md-6 form-group">
                                            <label for="phone">@lang("customer.phone")</label>
                                            <input type="number" id="phone"  name="phone" class="form-control" value="{{old("phone")}}">
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="email">@lang("customer.password")</label>
                                            <input type="password" id="password"  name="password" class="form-control" value="{{old("password")}}">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="nid">@lang("global.nid")</label>
                                            <input type="file"  id="nid"  name="nid" class="form-control">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="address">@lang("customer.address")</label>
                                            <input type="text" min="0" id="address"  name="address" class="form-control" value="{{old("address")}}">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="customer_type">@lang("customer.customer_type")</label>
                                            <select name="customer_type" id="customer_type" class="form-control p-0">
                                                <option value="" selected disabled>@lang("global.choose")</option>
                                                <option value="personal" {{ old("customer_type") == "personal"? "selected" : ''}}>@lang("customer.personal")</option>
                                                <option value="company" {{ old("customer_type") == "company"? "selected" : ''}}>@lang("customer.company")</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <lable for="cr_no">@lang("customer.cr_no")</lable>
                                            <input type="file" name="cr_no" id="cr_no" class="form-control">
                                        </div>


                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-success btn-small"> <i class="fa fa-plus"> @lang("global.add")</i>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                    </div> <!-- End Card-->
        </div>
    </div><!--  End Col-xs-12 -->
</div> <!-- End Row-->

@endsection
@section('js')

@endsection
