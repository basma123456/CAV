@extends('layouts.master')
@section('css')

@section('title')
    @lang("sidebar.departments")
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang("sidebar.departments")</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route("dashboard.home")}}" class="default-color">@lang("sidebar.dashboard")</a></li>
                <li class="breadcrumb-item active">@lang("sidebar.departments")</li>
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
                                        <a href="{{route("dashboard.department.create")}}" class="btn btn-sm btn-success">
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
                                            <th>@lang("department.name")</th>
                                            <th>@lang("global.description")</th>
                                            <th>@lang("global.created_by")</th>
                                            <th>@lang("global.created_at")</th>
                                            <th>@lang("global.updated_at")</th>
                                            <th>@lang("global.status")</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                       <tbody>
                                            @foreach($departments as $i => $department)
                                               <tr>
                                                   <td>{{$i + 1}}</td>
                                                   <td>{{$department->name}}</td>
                                                   <td>{!! $department->descriptions !!}</td>
                                                   <td>{{$department->admin->first_name . ' '. $department->admin->last_name}}</td>
                                                   <td>{{$department->created_at}}</td>
                                                   <td>{{$department->updated_at}}</td>
                                                   <td>
                                                       <span class="badge badge-{{ $department->status == 1 ? 'success' : 'danger'}}"> </span>
                                                   </td>
                                                   <td>
                                                       <a href="{{route("dashboard.department.edit", $department->id)}}" class="text-primary mx-2"><i class="fa fa-edit fa-fw" title=@lang("global.edit")></i></a>
                                                       <a href="{{route("dashboard.department.destroy", $department->id)}}" class="text-danger"><i class="fa fa-trash fa-fw" title=@lang("global.delete")></i></a>
                                                   </td>
                                               </tr>
                                            @endforeach
                                       </tbody>
                                    </table>
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
