@extends('layouts.master')
@section('css')

@section('title')
    @lang("deal.deal_details")
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang("deal.deal_details")</h4>
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
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="card-title">
                    <div class="row">
                        <h5 class="col-md-6">الصفقة</h5>
                        @if($deal->status == 'pending')
                            <a href="{{route("dashboard.deal.accept", $deal->id)}}" class=" btn btn-outline-success  btn-sm mx-2">
                                <i class="fa fa-thumbs-up fa-fw"></i>
                                @lang("deal.accept")
                            </a>
                            <a href="{{route("dashboard.deal.refused", $deal->id)}}" class=" btn btn-outline-danger  btn-sm mx-2">
                                <i class="fa fa-thumbs-down fa-fw"></i>
                                @lang("deal.refuse")
                            </a>
                        @elseif($deal->status == 'accepted')
                            <a href="{{route("dashboard.deal.complete",$deal->id)}}" class="btn btn-outline-primary">
                                <i class="fa fa-check-circle-o"></i>
                               @lang("deal.complete_deal")
                            </a>
                        @else
                            <b class="text-success"> تم الانتهاء من عمل المشروع مكتمل</b>
                        @endif
                    </div>
                </div>
                <div class="accordion gray plus-icon round">
                    <div class="acd-group">
                        <a href="#" class="acd-heading">@lang("deal.customer_info")</a>
                        <div class="acd-des" style="display: none;">
                            <div class="row">
                                <div class="col-md-4">
                                    <b class="text-danger"> اسم العميل : </b>
                                    <b>{{$deal->customer->full_name}}</b>
                                </div>
                                <div class="col-md-4">
                                    <b class="text-danger">  البريد الالكترونى : </b>
                                    <b>{{$deal->customer->email}}</b>
                                </div>
                                <div class="col-md-4">
                                    <b class="text-danger"> الهاتف : </b>
                                    <b>{{$deal->customer->phone}}</b>
                                </div>
                            </div>
                        </div>
                        <!--End Adc -->
                        <!--Start Adc -->
                        @if($deal->employee_id !== NULL)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">الوسيطة او البائع</a>
                                <div class="acd-des" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b class="text-danger"> اسم العميل : </b>
                                            <b>{{$deal->employee->full_name}}</b>
                                        </div>

                                        <div class="col-md-4">
                                            <b class="text-danger"> البريد الالكترونى :  </b>
                                            <b>{{$deal->employee->phone}}</b>
                                        </div>

                                        <div class="col-md-4">
                                            <b class="text-danger">الهاتف : </b>
                                            <b>{{$deal->employee->email}}</b>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                        <!--End Adc -->
                        <!--Start Adc -->
                        <div class="acd-group">
                            <a href="#" class="acd-heading">المشاريع</a>
                            <div class="acd-des" style="display: none;">
                                @foreach($deal->projects as $project)
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4 my-2">
                                                <b class="text-danger">اسم الخطة : </b>
                                                <b>{{$project->plan->name}}</b>
                                            </div>

                                            <div class="col-md-4 my-2">
                                                <b class="text-danger"> شرح الخطة  : </b>
                                                <b>{{$project->plan->description}}</b>
                                            </div>
                                            <div class="col-md-4 my-2">
                                                <b class="text-danger"> سعر الخطة  : </b>
                                                <b>{{$project->plan_price}}</b>
                                            </div>

                                            <div class="col-md-4 my-2">
                                                <b class="text-danger">الخصم  : </b>
                                                <b>{{$project->discount}}</b>
                                            </div>

                                            <div class="col-md-4 my-2">
                                                <b class="text-danger">نوع الخصم  : </b>
                                                <b>{{$project->discount_type}}</b>
                                            </div>

                                            <div class="col-md-4 my-2">
                                                <b class="text-danger">بعض الخصم  : </b>
                                                <b>{{$project->after_discount}}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                        <!--End Adc -->

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
