@extends('layouts.master')
@section('css')

@section('title')
    @lang("sidebar.customers")
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang("sidebar.customers")</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route("dashboard.home")}}" class="default-color">@lang("sidebar.dashboard")</a></li>
                <li class="breadcrumb-item active">@lang("sidebar.customers")</li>
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
                                <div class="table-responsive">
                                    <table  class="table  table-hover table-sm table-bordered p-0 text-center ">
                                        <thead>
                                        <tr class="text-dark">
                                            <th>#</th>
                                            <th>@lang("customer.customer")</th>
                                            <th>@lang("customer.email")</th>
                                            <th>@lang("customer.phone")</th>
                                            <th>@lang("customer.address")</th>
                                            <th>@lang("customer.customer_type")</th>
                                            <th>@lang("customer.active_by")</th>
                                            <th>@lang("global.status")</th>
                                            <th>@lang("global.show")</th>
                                            <th>@lang("global.edit")</th>
                                            <th>@lang("global.edit_status")</th>
                                            <th>@lang("global.delete")</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($customers as $i => $customer)
                                            <tr>
                                                <td>{{$i + 1}}</td>
                                                <td>{{$customer->full_name}}</td>
                                                <td>{{$customer->email}}</td>
                                                <td>{{$customer->phone}}</td>
                                                <td>{{$customer->address}}</td>
                                                <td>@lang("customer.". $customer->customer_type)</td>
                                                @if($customer->active_by != NULL)
                                                    <td>{{$customer->activeBy->first_name . ' ' . $customer->activeBy->last_name }}</td>
                                                @else
                                                    <td>@lang("customer.still_not_active")</td>
                                                @endif

                                                <td>
                                                    <span class="text-{{ $customer->status == 1 ? 'success' : 'warning'}}">
                                                        <i class="fa {{$customer->status == 1 ? 'fa-check-circle-o' : 'fa-times-circle-o'}}"></i>
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{route("dashboard.customer.show",$customer->id)}}" class="btn btn-outline-secondary btn-sm" title="@lang("global.show")">
                                                        <i class="fa fa-eye fa-fw"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{route("dashboard.customer.edit", $customer->id)}}" class="btn btn-outline-primary btn-sm mx-2" title="@lang("global.edit")"><i class="fa fa-edit fa-fw" title=@lang("global.edit")></i></a>
                                                </td>
                                                <td>
                                                   @if($customer->status == 1)
                                                        <a href="{{route("dashboard.customer.active", $customer->id)}}" class="btn btn-outline-warning btn-sm " title="@lang("global.make_deactivated")">
                                                            <i class="fa fa-times-circle-o fa-fw"></i>
                                                        </a>
                                                   @else

                                                        <a href="{{route("dashboard.customer.active", $customer->id)}}" class="btn btn-outline-success btn-sm " title="@lang("global.make_active")">
                                                            <i class="fa fa-check-circle-o fa-fw"></i>
                                                        </a>
                                                   @endif
                                                </td>
                                                <td>
                                                    <a href="{{route("dashboard.customer.destroy", $customer->id)}}" class="btn btn-outline-danger btn-sm " title="@lang("global.delete")"><i class="fa fa-trash fa-fw" title=@lang("global.delete")></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        {{ $customers->links() }}
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
