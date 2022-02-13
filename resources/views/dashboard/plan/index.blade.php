@extends('layouts.master')
@section('css')

@section('title')
    @lang("sidebar.plans")
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang("sidebar.plans")</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route("dashboard.home")}}" class="default-color">@lang("sidebar.dashboard")</a></li>
                <li class="breadcrumb-item active">@lang("sidebar.plans")</li>
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
                                        <a href="{{route("dashboard.plan.create")}}" class="btn btn-sm btn-success">
                                            <i class="fa fa-plus fa-fw"></i>
                                            @lang("global.add")
                                        </a>
                                    </div>
                                    <div class="d-block d-md-flex clearfix sm-mt-20">
                                        <div class="clearfix">

                                        </div>
                                        <div class="widget-search ml-0 clearfix">
                                            <i class="fa fa-search"></i>
                                            <input type="search" class="form-control" placeholder=@lang("global.search")....>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive mt-15">
                                    <table class="table center-aligned-table mb-0">
                                        <thead>
                                        <tr class="text-dark">
                                            <th>#</th>
                                            <th>@lang("plan.name")</th>
                                            <th>@lang("plan.plan_price")</th>
                                            <th>@lang("plan.discount")</th>
                                            <th>@lang("plan.discount_type")</th>
                                            <th>@lang("plan.after_discount")</th>
                                            <th>@lang("global.created_by")</th>
                                            <th>@lang("plan.category")</th>
                                            <th>@lang("plan.sub_category")</th>
                                            <th>@lang("global.status")</th>
                                            <th>@lang('global.edit')</th>
                                            <th>@lang('global.add_feature')</th>
                                            <th>@lang('global.edit_feature')</th>
                                        </tr>
                                        </thead>
                                       <tbody>
                                            @foreach($plans as $i => $plan)
                                               <tr>
                                                   <td>{{$i + 1}}</td>
                                                   <td>{{$plan->name}}</td>
                                                   <td>{{$plan->plan_price}}</td>
                                                   <td>{{$plan->discount}}</td>
                                                   <td> @lang("plan." . $plan->discount_type)</td>
                                                   <td>{{$plan->afterDiscount}}</td>
                                                   <td>{{$plan->adminId->first_name . ' ' . $plan->adminId->last_name }}</td>


                                                   <td>{{$plan->subCategory->category->name}}</td>
                                                   <td>{{$plan->subCategory->name}}</td>
                                                   <td>
                                                       <span class="badge badge-{{ $plan->status == 1 ? 'success' : 'danger'}}"> </span>
                                                   </td>
                                                   <td>
                                                       <a href="{{route("dashboard.plan.edit", $plan->id)}}" class="btn btn-outline-primary  btn-sm mx-2"><i class="fa fa-edit fa-fw" title=@lang("global.edit")></i></a>
                                                   </td>
                                                   <td>
                                                       <a href="{{route("dashboard.plan.addFeatures", $plan->id)}}" class="btn btn-outline-info btn-sm"><i class="fa fa-plus-circle   fa-fw" title=@lang("global.add")></i></a>
                                                   </td>

                                                   <td>
                                                       <a href="{{route("dashboard.plan.editFeatures", $plan->id)}}" class="btn btn-outline-warning btn-sm"><i class="fa fa-edit   fa-fw"></i></a>
                                                   </td>
                                               </tr>
                                            @endforeach
                                       </tbody>
                                    </table>
                                    {{$plans->appends(request()->query()) ->links()}}
                                </div>
                            </div>
                        </div>
                    </div>

        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
