@extends('staff.app.app')
@section('title', "Dashboard")

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                <div class="breadcrumb-title pr-3">Brand</div>
                <div class="pl-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{  route('staff.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ (@$data) ? 'Update':'Create' }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="ml-auto">
                    <div class="btn-group">
                        <a href="{{  route('staff.brand.index') }}" class="btn btn-info"><i class="bx bx-list-ul"></i> Manage All Brand</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-12">
                    <div class="card border-lg-top-info">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-plus-io mr-1 font-24 text-info"></i>
                                </div>
                                <h4 class="mb-0 text-info">{{  (@$data) ? 'Update Brand':'Create New Brand' }}</h4>
                            </div>
                            <hr>
                            <form action="{{ (@$data) ? route('staff.brand.update', base64_encode($data->id)):route('staff.brand.store') }}" method="post">
                                @csrf
                                @isset($data)
                                @method('PUT')
                                @endisset

                                <div class="form-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6 offset-3">
                                            {!! ShowMessage() !!}
                                            {!! ErrorMessage($errors) !!}
                                            <label for="name">Brand Name</label>
                                            <div class="input-group">
                                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror " placeholder="Enter Brand Nmae" value="{{ (@$data) ? $data->name: old('name') }}">
                                            </div>
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
                                    <div class="form-row">
                                        <div class="form-group col-md-6 offset-3">
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-info px-3">{{ (@$data) ? 'Update Brand':'Create Brand' }}</button>
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
