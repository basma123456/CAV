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
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block">
                                    </div>
                                    <div class="d-block d-md-flex clearfix sm-mt-20">
                                        <div class="clearfix">
                                        </div>
                                    </div>
                             </div>


                                <form action="{{route("dashboard.plan.store")}}" method="POST" class="mt-5 col-md-12" enctype="multipart/form-data">
                                    @csrf
                                    {{method_field("post")}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach
                                        </div>
                                    @endif


                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="name_ar">@lang("global.name_ar")</label>
                                            <input type="text" id="name_ar" name="name_ar" class="form-control" value="{{old("name_ar")}}">
                                        </div>


                                        <div class="col-md-6 form-group">
                                            <label for="name_en">@lang("global.name_en")</label>
                                            <input type="text" id="name_en"  name="name_en" class="form-control" value="{{old("name_en")}}">
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="">@lang("global.description_ar")</label>
                                            <textarea name="description_ar" id="" cols="30" rows="10" class="ckeditor"></textarea>
                                        </div>

                                        <div class="col-md-12 form-group">
                                            <label for="">@lang("global.description_en")</label>
                                            <textarea name="description_en" id="" cols="30" rows="10" class="ckeditor"></textarea>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="subCategory">@lang("plan.subCategory")</label>
                                            <select name="subCategory" id="subCategory" class="form-control p-0" id="subCategory">
                                                @foreach($subCategories  as $subCategory)
                                                    <option value="{{$subCategory->id}}" {{(old('$subCategory') == $subCategory->id ? 'selected' : '')}}> {{$subCategory->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="plan_price">@lang("plan.plan_price")</label>
                                            <input type="number" id="plan_price"  name="price" class="form-control" value="{{old("price")}}">
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="discount">@lang("plan.discount")</label>
                                            <input type="number" id="discount"  name="discount" class="form-control" value="{{old("discount")}}">
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="discount_type">@lang("plan.discount_type")</label>
                                            <select name="discount_type" id="discount_type" class="form-control p-0">
                                                <option value="" selected disabled>@lang("global.choose")</option>
                                                <option value="percentage" {{ old("discount_type") == "percentage" ? "selected" : ''}}>@lang("plan.percentage")</option>
                                                <option value="fixed" {{ old("discount_type") == "fixed" ? "selected" : ''}}>@lang("plan.fixed")</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="plan_image">@lang('plan.plan_image')</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="status">@lang("global.status")</label>
                                            <select name="status" id="status" class="form-control p-0">
                                                <option value="" selected disabled>@lang("global.choose")</option>
                                                <option value="1" {{ old("status") == 1 ? "selected" : ''}}>@lang("global.active")</option>
                                                <option value="0" {{ old("status") == 0 ? "selected" : ''}}>@lang("global.deactivated")</option>
                                            </select>
                                        </div>
                                    </div>
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
