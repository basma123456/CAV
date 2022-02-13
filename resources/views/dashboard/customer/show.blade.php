@extends('layouts.master')
@section('css')

@section('title')
    @lang("customer.show_customer")
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">@lang("customer.show_customer") </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route("dashboard.home")}}" class="default-color">@lang("sidebar.dashboard")</a></li>
                    <li class="breadcrumb-item active">@lang("customer.show_customer")</li>
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
                            <!--Start Row -->
                            <div class="row">
                                <!--Start Col -->
                                    <div class="col-md-3 my-3">
                                        <span class="text-danger">@lang("customer.full_name") : -  </span>
                                        <b>{{$customer->full_name}}</b>
                                    </div>
                                <!--End Col -->
                                <!--Start Col -->
                                <div class="col-md-3 my-3">
                                    <span class="text-danger">@lang("customer.email") : -  </span>
                                    <b>{{$customer->email}}</b>
                                </div>
                                <!--End Col -->
                                <!--Start Col -->
                                <div class="col-md-3 my-3">
                                    <span class="text-danger">@lang("customer.phone") : -  </span>
                                    <b>{{$customer->phone}}</b>
                                </div>
                                <!--End Col -->
                                <!--Start Col -->
                                <div class="col-md-3 my-3">
                                    <span class="text-danger">@lang("customer.nid") : -  </span>
                                    <b>{{$customer->nid}}</b>
                                </div>
                                <!--End Col -->
                                <!--Start Col -->
                                <div class="col-md-3 my-3">
                                    <span class="text-danger">@lang("customer.address") : -  </span>
                                    <b>{{$customer->address}}</b>
                                </div>
                                <!--End Col -->
                                <!--Start Col -->
                                <div class="col-md-3 my-3">
                                    <span class="text-danger">@lang("customer.customer_type") : -  </span>
                                    <b>@lang('customer.'. $customer->customer_type)</b>
                                </div>
                                <!--End Col -->

                                <!--Start Col -->
                                <div class="col-md-3 my-3">
                                    <span class="text-danger">@lang("customer.active_by") : -  </span>
                                  @if($customer->activeBy != NULL)
                                        <b>{{$customer->activeBy->first_name . ' ' . $customer->activeBy->last_name}}</b>
                                   @else
                                      <b class="text-danger">لم يتم التفعيل بعد</b>
                                  @endif
                                </div>
                                <!--End Col -->

                                <!--Start Col -->
                                <div class="col-md-3 my-3">
                                    <span class="text-danger">@lang("global.created_at") : -  </span>
                                    <b>{{$customer->created_at}}</b>
                                </div>
                                <!--End Col -->

                                <!--Start Col -->
                                <div class="col-md-4 my-3">
                                    <span class="text-danger">@lang("global.updated_at") : -  </span>
                                    <b>{{$customer->updated_at}}</b>
                                </div>
                                <!--End Col -->

                            </div>
                            </div>
                            <!--End Row -->
                        </div><!--End Card Body -->

                        </div> <!-- End Card-->
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <h5 class="card-title">@lang("deal.deals")</h5>
                            <div class="accordion gray plus-icon round">
                                @foreach($customer->allDeals as $deal)
                                    <div class="acd-group acd">
                                        <a href="#" class="acd-heading">{{$deal->created_at}}</a>
                                        <div class="acd-des" style="">
                                            <div class="row">
                                                <!--Start Col -->
                                                <div class="col-md-3 my-3">
                                                    <span class="text-danger">@lang('global.status') : - </span>
                                                    <b>@lang("deal." . $deal->status)</b>
                                                </div>
                                                <!--End Col -->

                                                <!--Start Col -->
                                                <div class="col-md-3 my-3">
                                                    <span class="text-danger">@lang('deal.employee_name') : - </span>
                                                    @if($deal->employee != NULL)
                                                        <a href="{{route("dashboard.employee.show", $deal->employee->id)}}">{{$deal->employee->full_name}}</a>
                                                    @else
                                                        <b>@lang("deal.no_employee")</b>
                                                    @endif
                                                </div>
                                                <!--End Col -->
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
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                    </div>



@endsection
@section('js')

@endsection
