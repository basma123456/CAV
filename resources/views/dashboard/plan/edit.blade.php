@extends('layouts.master')
@section('css')

@section('title')
    @lang("plan.edit_plan")
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">@lang("plan.edit_plan") </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route("dashboard.home")}}" class="default-color">@lang("sidebar.dashboard")</a></li>
                <li class="breadcrumb-item active">@lang("plan.edit_plan")</li>
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


                                <form action="{{route("dashboard.plan.update", $plan->id)}}" method="POST" class="mt-5 col-md-12" enctype="multipart/form-data">
                                    @csrf
                                    {{method_field("put")}}
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
                                            <input type="text" id="name_ar" name="name_ar" class="form-control" value="{{$plan->getTranslation('name',"ar")}}">
                                        </div>


                                        <div class="col-md-6 form-group">
                                            <label for="name_en">@lang("global.name_en")</label>
                                            <input type="text" id="name_en"  name="name_en" class="form-control" value="{{$plan->getTranslation('name',"en")}}">
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="email">@lang("global.description_ar")</label>
                                            <textarea name="description_ar" id="" cols="30" rows="10" class="ckeditor">{{$plan->getTranslation('description', 'ar')}}</textarea>
                                        </div>

                                        <div class="col-md-12 form-group">
                                            <label for="email">@lang("global.description_en")</label>
                                            <textarea name="description_en" id="" cols="30" rows="10" class="ckeditor">{{$plan->getTranslation('description', 'en')}}</textarea>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="subCategory">@lang("plan.subCategory")</label>
                                            <select name="subCategory" id="subCategory" class="form-control p-0" id="subCategory">
                                                @foreach($subCategories  as $subCategory)
                                                    <option value="{{$subCategory->id}}" {{$plan->sub_category_id  == $subCategory->id ? 'selected' : ''}}> {{$subCategory->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="col-md-6 form-group">
                                            <label for="plan_price">@lang("plan.plan_price")</label>
                                            <input type="number" id="plan_price"  name="price" class="form-control" value="{{$plan->plan_price}}">
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="discount">@lang("plan.discount")</label>
                                            <input type="number" id="discount"  name="discount" class="form-control" value="{{$plan->discount}}">
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="discount_type">@lang("plan.discount_type")</label>
                                            <select name="discount_type" id="discount_type" class="form-control p-0">
                                                <option value="" selected disabled>@lang("global.choose")</option>
                                                <option value="percentage" {{ $plan->discount_type == "percentage" ? "selected" : ''}}>@lang("plan.percentage")</option>
                                                <option value="fixed" {{ $plan->discount_type == "fixed" ? "selected" : ''}}>@lang("plan.fixed")</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="plan_image">@lang('plan.plan_image')
                                                <img src="{{ URL::to('public/cav/Plans/'. $plan->plan_image)}}" alt="" style="width: 50px">
                                            </label>
                                            <input type="file" name="image" class="form-control">
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="status">@lang("global.status")</label>
                                            <select name="status" id="status" class="form-control p-0">
                                                <option value="" selected disabled>@lang("global.choose")</option>
                                                <option value="1" {{ $plan->status== 1 ? "selected" : ''}}>@lang("global.active")</option>
                                                <option value="0" {{ $plan->status == 0 ? "selected" : ''}}>@lang("global.deactivated")</option>
                                            </select>
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
