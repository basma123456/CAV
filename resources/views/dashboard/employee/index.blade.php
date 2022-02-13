@extends('layouts.master')
@section('css')

@section('title')
    @lang("sidebar.employees")
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang("sidebar.employees")</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route("dashboard.home")}}" class="default-color">@lang("sidebar.dashboard")</a></li>
                <li class="breadcrumb-item active">@lang("sidebar.employees")</li>
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
                                        <a href="{{route("dashboard.employee.create")}}" class="btn btn-sm btn-success">
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
                                    <table class="table  table-hover table-sm table-bordered p-0 text-center ">
                                        <thead class="table-header">
                                        <tr class="text-dark">
                                            <th scope="col">#</th>
                                            <th scope="col">@lang("employee.name")</th>
                                            <th scope="col">@lang("global.email")</th>
                                            <th scope="col">@lang("global.department")</th>
                                            <th scope="col">@lang("global.balance")</th>
                                            <th scope="col">@lang("global.secretKey")</th>
                                            <th scope="col">@lang("global.created_by")</th>
                                            <th scope="col">@lang("global.created_at")</th>
                                            <th scope="col">@lang("global.updated_at")</th>
                                            <th scope="col">@lang("global.status")</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($employees as $i => $employee)
                                            <tr>
                                                <td>{{$i + 1}}</td>
                                                <td>{{$employee->full_name}}</td>
                                                <td>{{$employee->email}}</td>
                                                <td>{{$employee->departmentId->name}}</td>
                                                <td>{{$employee->balance}}</td>
                                                <td>{{$employee->personal_id}}</td>
                                                @if($employee->admin_id == NULL)
                                                    <td>...</td>
                                                @else
                                                    <td>
                                                        {{$employee->adminId->first_name . ' ' . $employee->adminId->last_name}}
                                                    </td>
                                                @endif
                                                <td>{{$employee->created_at}}</td>
                                                <td>{{$employee->updated_at}}</td>
                                                <td>
                                                    <span class="badge badge-{{ $employee->status == 1 ? 'success' : 'danger'}}"> </span>
                                                </td>
                                                <td>
                                                    <a href="{{route("dashboard.employee.show", $employee->id)}}" class="btn btn-outline-secondary btn-sm mx-2"><i class="fa fa-eye fa-fw" title=@lang("global.show")></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{route("dashboard.employee.edit", $employee->id)}}" class="btn btn-outline-primary btn-sm mx-2"><i class="fa fa-edit fa-fw" title=@lang("global.edit")></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{route("dashboard.employee.destroy", $employee->id)}}" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash fa-fw" title=@lang("global.delete")></i></a>
                                                </td>
                                             </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                    {{$employees->links()}}
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
