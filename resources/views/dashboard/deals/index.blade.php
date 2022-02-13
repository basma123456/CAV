@extends('layouts.master')
@section('css')

@section('title')
    @lang("sidebar.deals")
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang("sidebar.deals")</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route("dashboard.home")}}" class="default-color">@lang("sidebar.dashboard")</a></li>
                <li class="breadcrumb-item active">@lang("sidebar.deals")</li>
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

                                </div>
                                <div class="table-responsive">
                                    <table  class="table  table-hover table-sm table-bordered p-0 text-center ">
                                        <thead class="table-header">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">@lang('deal.customer_name')</th>
                                            <th scope="col">@lang('deal.customer_email')</th>
                                            <th scope="col">@lang('deal.customer_phone')</th>
                                            <th scope="col">@lang('deal.employee_name')</th>
                                            <th scope="col">@lang('deal.employee_phone')</th>
                                            <th scope="col">@lang('deal.status')</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($deals as $i => $deal)
                                                <tr>
                                                    <td>{{$i + 1}}</td>
                                                    <td>{{$deal->customer->full_name}}</td>
                                                    <td>{{$deal->customer->email}}</td>
                                                    <td>{{$deal->customer->phone}}</td>
                                                    <td>{{$deal->employee == NULL ? trans('deal.no_employee'): $deal->employee->full_name}}</td>
                                                    <td>{{$deal->employee == NULL ? trans('deal.no_employee_phone') : $deal->employee->phone}}</td>
                                                    <td>
                                                        @if($deal->status == 'accepted')
                                                            <b class="text-success">@lang("deal." . $deal->status)</b>
                                                        @elseif($deal->status == 'pending')
                                                             <b class="text-warning">@lang("deal." . $deal->status)</b>
                                                        @elseif($deal->status == 'refused')
                                                            <del class="text-danger">@lang("deal." . $deal->status)</del>
                                                        @elseif($deal->status == 'complete')
                                                            <b class="text-info">@lang("deal." . $deal->status)</b>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{route("dashboard.deal.show", $deal->id)}}" class=" btn btn-outline-info  btn-sm">
                                                            <i class="fa fa-eye fa-fw"></i>
                                                        </a>
                                                        <a href="" class=" btn btn-outline-danger btn-sm">
                                                            <i class="fa fa-trash fa-fw"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        @if($deal->status === 'pending')
                                                            <a href="{{route("dashboard.deal.accept", $deal->id)}}" class=" btn btn-outline-success  btn-sm">
                                                                <i class="fa fa-thumbs-up fa-fw"></i>
                                                                قبول
                                                            </a>
                                                            <a href="{{route("dashboard.deal.refused", $deal->id)}}" class=" btn btn-outline-danger  btn-sm">
                                                                <i class="fa fa-thumbs-down fa-fw"></i>
                                                                @lang("deal.refused")
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $deals->links() }}
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
