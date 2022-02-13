@extends('layouts.master')
@section('css')
@section('title')
    @lang("plan.edit_features")
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">@lang("plan.edit_features") </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route("dashboard.home")}}" class="default-color">@lang("sidebar.dashboard")</a></li>
                <li class="breadcrumb-item active">@lang("plan.edit_features")</li>
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
                                    <div class="row">
                                        <div class="col-md-12 my-3">
                                            <h1 class="text-center text-danger">@lang("plan.edit_features")</h1>
                                        </div>
                                    <div class="col-md-12">
                                        @foreach($features as $feature)
                                            <form action="{{route("dashboard.plan.updateFeatures", $feature->id)}}" method="POST" class="mt-5 row">
                                                @csrf
                                                {{method_field("put")}}
                                                <div class="col-md-3">
                                                    <label for="featureNameAr">@lang('plan.feature_name_ar')</label>
                                                    <input type="text" class="form-control" name="feature_name_ar" value="{{$feature->getTranslation('name', 'ar')}}">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="featureNameEn">@lang('plan.feature_name_en')</label>
                                                    <input type="text" class="form-control" name="feature_name_en" value="{{$feature->getTranslation('name', 'en')}}">
                                                </div>

                                                <div class="col-md-3 form-group">
                                                    <label for="feature_status">@lang("global.status")</label>
                                                    <select name="feature_status" id="feature_status" class="form-control p-0">
                                                        <option value="" selected disabled>@lang("global.choose")</option>
                                                        <option value="1" {{$feature->status == 1 ? 'selected' : ''}}>@lang("global.active")</option>
                                                        <option value="0" {{$feature->status == 0 ? 'selected' : ''}}>@lang("global.deactivated")</option>
                                                    </select>
                                                </div>
                                                <input type="hidden" name="feature_id" value="{{$feature->id}}">
                                                <div class="col-md-1">
                                                    <p class="mb-3"></p>
                                                    <a class="btn btn-outline-danger btn-sm mt-3" href="{{route('dashboard.plan.destroyFeatures', $feature->id)}}"><i class="fa fa-trash"></i></a>
                                                </div>
                                               <div class="col-md-2">
                                                   <p class="mb-3"></p>
                                                   <button class="btn btn-primary btn-small"> <i class="fa fa-edit"> @lang("global.edit")</i></button>
                                               </div>
                                                </button>
                                            </form>
                                        @endforeach
                                    </div>
                                    </div>

                    </div> <!-- End Card-->
        </div>
    </div><!--  End Col-xs-12 -->
</div> <!-- End Row-->

@endsection
@section('js')

@endsection
