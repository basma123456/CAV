@extends('layouts.master')
@section('css')

@section('title')
    @lang("employee.create_employee")
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">@lang("employee.create_employee") </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route("dashboard.home")}}" class="default-color">@lang("sidebar.dashboard")</a></li>
                <li class="breadcrumb-item active">@lang("employee.create_employee")</li>
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


                                <form action="{{route("dashboard.employee.store")}}" method="POST" class="mt-5 col-md-12" enctype="multipart/form-data">
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
                                            <label for="name">@lang("global.name")</label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{old("name")}}">
                                        </div>


                                        <div class="col-md-6 form-group">
                                            <label for="email">@lang("global.email")</label>
                                            <input type="text" id="email"  name="email" class="form-control" value="{{old("email")}}">
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="email">@lang("global.password")</label>
                                            <input type="password" id="password"  name="password" class="form-control" value="{{old("password")}}">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="email">@lang("global.balance")</label>
                                            <input type="number" min="0" id="balance"  name="balance" class="form-control" value="{{old("balance")}}">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="email">@lang("global.phone")</label>
                                            <input type="number" min="0" id="phone"  name="phone" class="form-control" value="{{old("phone")}}">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="email">@lang("global.nid")</label>
                                            <input type="number" min="0" id="nid"  name="nid" class="form-control" value="{{old("nid")}}">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="department">@lang("global.department")</label>
                                            <select name="department" id="department" class="form-control p-0">
                                                <option value="" selected disabled>@lang("global.choose")</option>
                                                      @foreach($departments  as $department)
                                                    <option value="{{$department->id}}" {{ old("department") == $department->id ? "selected" : ''}}>{{$department->name}}</option>
                                                    @endforeach

                                            </select>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="avatar">@lang("global.avatar")</label>
                                            <input type="file"  id="avatar"  name="avatar" class="form-control">
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="pic_nid">@lang("global.pic_nid")</label>
                                            <input type="file"  id="pic_nid"  name="pic_nid" class="form-control">
                                        </div>


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
