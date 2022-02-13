@extends('layouts.master')
@section('css')
@section('title')
    @lang("plan.create_plan")
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">@lang("plan.create_plan") </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route("dashboard.home")}}" class="default-color">@lang("sidebar.dashboard")</a></li>
                <li class="breadcrumb-item active">@lang("plan.create_plan")</li>
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
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif



                                <form action="{{route("dashboard.plan.storeFeatures", $id)}}" method="POST" class="mt-5 col-md-12" enctype="multipart/form-data">
                                    @csrf
                                    {{method_field("post")}}

                                    <div class="row">
                                        <div class="col-md-12 my-3">
                                            <h1 class="text-center text-danger">@lang("plan.add_features")</h1>
                                        </div>
                                    </div>

                                        <div class="repeater">
                                            <div data-repeater-list="features">
                                                <div data-repeater-item class="row">
                                                        <div class="col-md-4">
                                                            <label for="featureNameAr">@lang('plan.feature_name_ar')</label>
                                                            <input type="text" class="form-control" name="feature_name_ar">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="featureNameEn">@lang('plan.feature_name_en')</label>
                                                            <input type="text" class="form-control" name="feature_name_en">
                                                        </div>

                                                        <div class="col-md-3 form-group">
                                                            <label for="feature_status">@lang("global.status")</label>
                                                            <select name="feature_status" id="feature_status" class="form-control p-0">
                                                                <option value="" selected disabled>@lang("global.choose")</option>
                                                                <option value="1" >@lang("global.active")</option>
                                                                <option value="0">@lang("global.deactivated")</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <p class="mb-3"></p>
                                                            <div class="btn btn-outline-danger btn-sm mt-3" data-repeater-delete><i class="fa fa-trash"></i></div>
                                                        </div>

                                                </div>
                                            </div>
                                            <input class="button" data-repeater-create type="button" value="@lang("plan.add_new_features")"/>

                                    </div>
                                    <div class="col-md-12 text-center">

                                        <button class="btn btn-success btn-small"> <i class="fa fa-plus"> @lang("global.add")</i>
                                        </button>
                                    </div>

                                </form>

                    </div> <!-- End Card-->
        </div>
    </div><!--  End Col-xs-12 -->
</div> <!-- End Row-->

@endsection
@section('js')

@endsection
