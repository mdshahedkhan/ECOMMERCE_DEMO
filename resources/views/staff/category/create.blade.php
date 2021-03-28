@extends('staff.app.app')
@section('title', "Create Category")

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                <div class="breadcrumb-title pr-3">Category</div>
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
                        <a href="{{  route('staff.category.index') }}" class="btn btn-info"><i class="bx bx-list-ul"></i> Manage All Category</a>
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
                                <h4 class="mb-0 text-info">{{  (@$data) ? 'Update Category':'Create New Category' }}</h4>
                            </div>
                            <hr>
                            <form action="{{ (@$data) ? route('staff.category.update', base64_encode($data->id)):route('staff.category.store') }}" method="post">
                                @csrf
                                @isset($data)
                                @method('PUT')
                                @endisset
                                <div class="form-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6 offset-3">
                                            {!! ShowMessage() !!}
                                            {!! ErrorMessage($errors) !!}
                                            <label for="category_id">Select Category</label>
                                            <div class="input-group">
                                                <select name="root" class="form-control @error('root') is-invalid @enderror " id="category_id">
                                                    <option style="display: none" >Select Category</option>
                                                    <option value="0" >--Root--</option>
                                                        @if (isset($data))
                                                            @foreach ($category as $categories)
                                                                <option value="{{  $categories->id }}" {{ $categories->id == $data->id ? 'selected':'' }} >{{  $categories->name }}</option>
                                                                @if (count($categories->sub_category))
                                                                @foreach ($categories->sub_category as $item)
                                                                    <option value="{{  $item->id }}" {{ $item->id == $data->id ? 'selected':'' }} >{{ $categories->name .' > '.  $item->name }}</option>
                                                                        @if (count($item->sub_category))
                                                                            @foreach ($item->sub_category as $item1)
                                                                                <option value="{{  $item1->id }}" {{ $item1->id == $data->id ? 'selected':'' }} >{{ $categories->name .' > '.  $item->name .' > '. $item1->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        @else
                                                        {!! ShowRootCategory($category, 4) !!}
                                                        @endif
                                                </select>
                                            </div>
                                            <div class="mt-2 input-group">
                                                <label for="name">Category Name</label>
                                                <div class="input-group">
                                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror " placeholder="Enter Category Name" value="{{ (@$data) ? $data->name: old('name') }}">
                                                </div>
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
                                                <button type="submit" class="btn btn-info px-3">{{ (@$data) ? 'Update Category':'Create Category' }}</button>
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
