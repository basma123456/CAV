@extends('layouts.master')
@section('css')

@section('title')
    @lang("employee.show_employee")
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">@lang("employee.show_employee") </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route("dashboard.home")}}" class="default-color">@lang("sidebar.dashboard")</a></li>
                    <li class="breadcrumb-item active">@lang("employee.show_employee")</li>
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
                                    <div class="col-md-4 my-3">
                                        <span class="text-danger">@lang("employee.name") : -  </span>
                                        <b>{{$employee->full_name}}</b>
                                    </div>
                                <!--End Col -->
                                <!--Start Col -->
                                <div class="col-md-4 my-3">
                                    <span class="text-danger">@lang("employee.email") : -  </span>
                                    <b>{{$employee->email}}</b>
                                </div>
                                <!--End Col -->
                                <!--Start Col -->
                                <div class="col-md-4 my-3">
                                    <span class="text-danger">@lang("employee.phone") : -  </span>
                                    <b>{{$employee->phone}}</b>
                                </div>
                                <!--End Col -->
                                <!--Start Col -->
                                <div class="col-md-4 my-3">
                                    <span class="text-danger">@lang("employee.nid") : -  </span>
                                    <b>{{$employee->nid}}</b>
                                </div>
                                <!--End Col -->
                                <!--Start Col -->
                                <div class="col-md-4 my-3">
                                    <span class="text-danger">@lang("employee.personal_id") : -  </span>
                                    <b>{{$employee->personal_id}}</b>
                                </div>
                                <!--End Col -->
                                <!--Start Col -->
                                <div class="col-md-4 my-3">
                                    <span class="text-danger">@lang("employee.department_name") : -  </span>
                                    <b> {{$employee->departmentId->name}}</b>
                                </div>
                                <!--End Col -->

                                <!--Start Col -->
                                <div class="col-md-4 my-3">
                                    <span class="text-danger">@lang("employee.active_by") : -  </span>
                                  @if($employee->activeBy != NULL)
                                        <b>{{$employee->activeBy->first_name . ' ' . $employee->activeBy->last_name}}</b>
                                   @else
                                      <b class="text-danger">لم يتم التفعيل بعد</b>
                                  @endif
                                </div>
                                <!--End Col -->

                                <!--Start Col -->
                                <div class="col-md-4 my-3">
                                    <span class="text-danger">@lang("global.created_at") : -  </span>
                                    <b>{{$employee->created_at}}</b>
                                </div>
                                <!--End Col -->

                                <!--Start Col -->
                                <div class="col-md-4 my-3">
                                    <span class="text-danger">@lang("global.updated_at") : -  </span>
                                    <b>{{$employee->updated_at}}</b>
                                </div>
                                <!--End Col -->
                                <div class="col-md-6 my-3">
                                    <div class="text-danger">@lang('global.avatar')</div>
                                        <img src="{{URL::to('public/cav/Employee/'. $employee->avatar)}}" alt="avatar" class="w-100">
                                </div>

                                <div class="col-md-6 my-3">
                                    <div class="text-danger">@lang('global.pic_nid')</div>
                                    <img src="{{URL::to('public/cav/Employee/'. $employee->pic_nid)}}" alt="Picture National Id" class="w-100">
                                </div>
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
                                @foreach($deals as $deal)
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
                                                    @if($deal->customer != NULL)
                                                        <a href="{{route("dashboard.customer.show", $deal->customer->id)}}">{{$deal->customer->full_name}}</a>
                                                    @else
                                                        <b>@lang("deal.no_employee")</b>
                                                    @endif
                                                </div>
                                                <!--End Col -->
                                                @foreach($deal->projects as $project)
                                                    <div class="col-md-12 my-3">
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
                                                        <hr>
                                                    </div>

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
