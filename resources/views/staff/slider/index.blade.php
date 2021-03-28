@extends('staff.app.app')
@section('title', 'Slider Manage')
@push('CSS')
    <link rel="stylesheet" href="{{ asset('assets/backend/assets/Custom plugins/bootstrap-toggle.min.css') }}">
@endpush
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
                            <li class="breadcrumb-item active" aria-current="page">Slider Manage</li>
                        </ol>
                    </nav>
                </div>
                <div class="ml-auto">
                    <div class="btn-group">
                        <a href="{{  route('staff.slider.create') }}" class="btn btn-info btn-sm"><i class="bx bx-plus-circle"></i> Add New Slider</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card radius-10 col-sm-12 col-md-12 col-lg-12">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0">Slider Manage</h4>
                    </div>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="checkedAll" class="checkedAll"></th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Date</th>
                                <th>Create By</th>
                                <th>URL</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($sliders as $slider)
                                    <td><input type="checkbox" id="checkedAll-Items" class="checkedAll-Items"></td>
                                    <td><img src="{{ asset('uploads/slider/'.$slider->image) }}" width="100px" class="rounded ml-3 shadow" alt="{{ $slider->title }}"></td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ substr($slider->sub_title, 0, 20) }}</td>
                                    <td>{{ $slider->start_date .' > '.$slider->end_date }}</td>
                                    <td>{{ $slider->users->name }}</td>
                                    <td>
                                        <a href="{{ $slider->url }}" class="btn btn-sm btn-info" target="_blank">Click Here</a>
                                    </td>
                                    <td>
                                        <input type="checkbox" id="SliderStatus" {{ $slider->status == 'active' ? 'checked':'' }} data-id="{{ $slider->id }}" data-toggle="toggle" data-offstyle="danger" data-onstyle="info"  data-size="small" data-on="Active" data-off="Inactive">
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm"><i class="bx bx-edit"></i>Edit</a>
                                        <a href="" class="btn btn-danger btn-sm"><i class="bx bx-trash"></i>Delete</a>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('JS')
    <script src="{{ asset('assets/backend/assets/Custom plugins/bootstrap-toggle.min.js') }}"></script>
@endpush
