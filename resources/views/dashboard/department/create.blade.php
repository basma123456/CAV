@extends('layouts.master')
@section('css')

@section('title')
    @lang("department.create_department")
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">@lang("department.create_department") </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route("dashboard.home")}}" class="default-color">@lang("sidebar.dashboard")</a></li>
                <li class="breadcrumb-item active">@lang("department.create_department")</li>
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


                                <form action="{{route("dashboard.department.store")}}" method="POST" class="mt-5 col-md-12">
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
                                            <label for="name_ar">@lang("global.name_ar")</label>
                                            <input type="text" id="name_ar" name="name_ar" class="form-control" value="{{old("name_ar")}}">
                                        </div>
                                        @error('name_ar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <div class="col-md-6 form-group">
                                            <label for="name_en">@lang("global.name_en")</label>
                                            <input type="text" id="name_en"  name="name_en" class="form-control" value="{{old("name_en")}}">
                                        </div>
                                        @error('name_en')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <div class="col-md-12 form-group">
                                            <label for="description">@lang("global.description")</label>
                                            <textarea id="description" class="form-control ckeditor" name="description" cols="30" rows="10" >{{old("description")}}</textarea>
                                        </div>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <div class="col-md-6 form-group">
                                            <label for="status">@lang("global.status")</label>
                                            <select name="status" id="status" class="form-control p-0">
                                                <option value="" selected disabled>@lang("global.choose")</option>
                                                <option value="1" {{ old("status") == 1 ? "selected" : ''}}>@lang("global.active")</option>
                                                <option value="0" {{ old("status") == 0 ? "selected" : ''}}>@lang("global.deactivated")</option>
                                            </select>
                                        </div>
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

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
