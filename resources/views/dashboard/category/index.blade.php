@extends('layouts.master')
@section('css')

@section('title')
    @lang("sidebar.categories")
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang("sidebar.categories")</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route("dashboard.home")}}" class="default-color">@lang("sidebar.dashboard")</a></li>
                <li class="breadcrumb-item active">@lang("sidebar.categories")</li>
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
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
                <div class="row">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block">
                                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fa fa-plus fa-fw"></i>
                                            @lang("global.add")
                                        </button>

                                        <!-- Modal -->
                                            <form action="{{route("dashboard.x.store")}}" method="POST"  class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                @csrf
                                                {{method_field('post')}}
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">@lang("category.add_category")</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label for="name_ar"> @lang("category.category_name_ar")</label>
                                                                <input type="text" name="name_ar" class="form-control" id="name_ar">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="name_en"> @lang("category.category_name_en")</label>
                                                                <input type="text" name="name_en" class="form-control" id="name_en">
                                                            </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="status"> @lang("global.status")</label>
                                                            <select name="status" id="status" class="form-control">
                                                                <option value="1">@lang("global.active")</option>
                                                                <option value="0">@lang("global.deactivated")</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang("global.close")</button>
                                                        <button type="submit" class="btn btn-primary">@lang("global.add") </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <div class="table-responsive mt-15">
                                    <table class="table  table-hover table-sm table-bordered p-0 text-center ">
                                        <thead class="table-header">
                                        <tr class="text-dark">
                                            <th scope="col">#</th>
                                            <th scope="col">@lang("category.category_name")</th>
                                            <th scope="col">@lang("global.created_by")</th>
                                            <th scope="col">@lang("global.status")</th>
                                            <th scope="col">@lang("global.edit")</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $i => $category)
                                                <tr>
                                                    <td>{{$i + 1}}</td>
                                                    <td>{{$category->name}}</td>
                                                    <td>{{$category->admin->first_name . " " . $category->admin->last_name}}</td>
                                                    <td><span class="badge badge-{{$category->status == 1 ? 'success' : 'danger'}}"> </span></td>
                                                    <td>
                                                        <button href="{{route("dashboard.x.edit",$category->id)}}" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#edit-{{$category->id}}">
                                                            <i class="fa fa-edit fa-fw"></i>
                                                        </button>
                                                        <form action="{{route("dashboard.x.update",$category->id)}}" method="POST"  class="modal fade" id="edit-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                @csrf
                                                                {{method_field('put')}}
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">@lang("category.edit_category")</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="name_ar"> @lang("category.category_name_ar")</label>
                                                                                <input type="text" name="name_ar" class="form-control" id="name_ar" value="{{$category->getTranslation('name',"ar")}}">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="name_en"> @lang("category.category_name_en")</label>
                                                                                <input type="text" name="name_en" class="form-control" id="name_en" value="{{$category->getTranslation('name',"en")}}">
                                                                            </div>

                                                                            <div class="form-group col-md-6">
                                                                                <label for="status"> @lang("global.status")</label>
                                                                                <select name="status" id="status" class="form-control">
                                                                                    <option value="1" {{$category->status == 1 ? 'selected' : ''}}>@lang("global.active")</option>
                                                                                    <option value="0" {{$category->status == 0 ? 'selected' : ''}}>@lang("global.deactivated")</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang("global.close")</button>
                                                                        <button type="submit" class="btn btn-primary">@lang("global.edit") </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                    {{$categories->links()}}
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
