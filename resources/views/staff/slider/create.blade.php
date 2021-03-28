@extends('staff.app.app')
@section('title', 'Slider Create')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                <div class="breadcrumb-title pr-3">Slider</div>
                <div class="pl-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Slider Create</li>
                        </ol>
                    </nav>
                </div>
                <div class="ml-auto">
                    <div class="btn-group">
                        <a href="{{  route('staff.product.create') }}" class="btn btn-info btn-sm"><i class="bx bx-list-ol"></i> Slider Manage</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0"><i class="bx bx-plus-circle"></i> Add New Slider</h4>
                            </div>
                            <hr>
                            <form id="SlidersForm" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="col-md-8 offset-2">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="title">Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Slider Title">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="sub_title">Sub Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="Enter Slider Sub Title">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="url">Url</label>
                                            <div class="col-sm-10">
                                                <input type="url" class="form-control" id="url" name="url" placeholder="Enter Slider Url">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Slider Range</label>
                                            <div class="form-group col-md-5">
                                                <label class="col-form-label" for="start_date">Start Date</label>
                                                <input type="text" class="form-control" name="start_date" id="start_date" placeholder="Start Date: yy-mm-dd">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="col-form-label" for="end_date">End Date</label>
                                                <input type="text" class="form-control" name="end_date" id="end_date" placeholder="End Date: yy-mm-dd">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Image</label>
                                            <div class="form-group col-md-5">
                                                <input type="file" name="start_date" id="start_date">
                                            </div>
                                            <div class="form-group col-md-5 slide-image">
                                                <img src="{{ asset('Default Image.jpg')  }}" class="card-img" style="width: 140px" alt="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6 offset-3 text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" {{  (@$data) ? $data->status == 'active' ? 'checked':'':'checked' }} name="status" id="active" value="active">
                                                        <label class="form-check-label" for="active">Active</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" {{ (@$data) ? $data->status == 'inactive'? 'checked': '':'' }} type="radio" name="status" id="Inactive" value="inactive">
                                                        <label class="form-check-label" for="Inactive">Inactive</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row text-right">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-info"><i class="bx bxs-plus-circle"></i> Add New Slider</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
