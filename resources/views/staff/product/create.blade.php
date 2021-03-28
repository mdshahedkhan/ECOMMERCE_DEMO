@extends('staff.app.app')
@section('title', "Create New Product Form")
@push('CSS')
    <link rel="stylesheet" href="{{ asset('assets/backend/assets/Custom plugins/toastr.min.css') }}">
    <style>
        .dataTables_filter {
            margin-left: 450px;
        }

        .dataTables_paginate {
            margin-left: 345px;
        }

        .button-wrapper {
            position: relative;
            width: 150px;
            text-align: center;
        }

        .button-wrapper span.label {
            position: relative;
            z-index: 0;
            display: inline-block;
            width: 100%;
            background: #707070;
            cursor: pointer;
            color: #fff;
            padding: 10px 0;
            text-transform: uppercase;
            font-size: 12px;
        }

        .upload {
            display: inline-block;
            position: absolute;
            z-index: 1;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }

    </style>
@endpush
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                <div class="breadcrumb-title pr-3">Product</div>
                <div class="pl-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Product {{ (@$products) ? 'Update':'Create' }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="ml-auto">
                    <div class="btn-group">
                        <a href="{{  route('staff.product.index') }}" class="btn btn-info btn-sm"><i class="bx bx-list-ul"></i> Manage Product</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="col-12">
                <form id="FormSubmit" data-url="@if(isset($products)) {{ route('staff.product.update', $products->id) }} @else {{ route('staff.product.store') }} @endif" enctype="multipart/form-data">
                    @isset($products)
                        @method('PUT')
                    @endisset
                    <div class="card border-lg-top-info">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user mr-1 font-24 text-info"></i>
                                </div>
                                <h4 class="mb-0 text-info">{{ (@$products) ? 'Update':'Create' }} Product</h4>
                            </div>
                            <hr>
                            <div class="form-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Product Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="name" id="name" onkeyup="ConvertToSlug(this.value, '#slug')" value="{{ (@$products) ? $products->name: old('name') }}"
                                                   placeholder="Enter Product Name">
                                            <span class="invalid-feedback">This field is require.</span>
                                            <span class="valid-feedback-length text-danger" style="display: none;  width: 100%;  margin-top: 0.25rem; color: #f02769;">The Name Field is Must be 3 character</span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="slug">Product Slug</label>
                                        <div class="input-group">
                                            <input type="text" name="slug" id="slug" onkeyup="ConvertToSlug(this.value, '#slug')" value="{{ (@$products) ? $products->slug:old('slug') }}" class="form-control"
                                                   placeholder="Enter Product Slug">
                                            <span class="invalid-feedback">This field is require.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="category">Category</label>
                                        <div class="input-group">
                                            <select name="category" class="form-control" id="category">
                                                <option value="">Select Category</option>
                                                @if(isset($products))
                                                    @foreach($category as $categories)
                                                        <option {{  $categories->id == $products->category_id ? 'selected':'' }} value="{{ $categories->id }}">{{ $categories->name }}</option>
                                                        @if($categories->sub_category)
                                                            @foreach($categories->sub_category as $sub_category1)
                                                                <option {{  $sub_category1->id == $products->category_id ? 'selected':'' }} value="{{ $sub_category1->id }}">{{  $categories->name.' > '.$sub_category1->name }}</option>
                                                                @if($sub_category1->sub_category)
                                                                    @foreach($sub_category1->sub_category as $sub_category2)
                                                                        <option
                                                                            {{  $sub_category2->id == $products->category_id ? 'selected':'' }} value="{{ $sub_category2->id }}">{{  $categories->name.' > '.$sub_category1->name .' > '.$sub_category2->name }}</option>
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @else
                                                    {!! ShowRootCategory($category, 3) !!}
                                                @endif

                                            </select>
                                            <span class="invalid-feedback">This field is require.</span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="brand">Brand</label>
                                        <div class="input-group">
                                            <select name="brand" class="form-control" id="brand">
                                                <option value="" style="display: none">Select Brand</option>
                                                <option value="">No Brand</option>
                                                @foreach ($brand as $item)
                                                    <option value="{{ $item->id }}" {{ (@$products) ? $products->brand_id == $item->id ? 'selected':'' : '' }}>{{  $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="model">Model</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="{{ (@$products) ? $products->model:old('model') }}" name="model" id="model" placeholder="Enter Model">
                                            <span class="invalid-feedback">This field is require.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="buying_price">Buying Price</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="Enter Buying Price" value="{{ (@$products) ? $products->buying_price : old('buying_price') }}" id="buying_price"
                                                   name="buying_price">
                                            <span class="invalid-feedback">This field is require.</span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="selling_price">Selling Price</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="Enter Selling Price" value="{{ (@$products) ? $products->selling_price:old('selling_price') }}" id="selling_price"
                                                   name="selling_price">
                                            <span class="invalid-feedback">This field is require.</span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4" style="margin-top: 40px;">
                                        <input type="checkbox" name="special_price_yes_or_no" value="1" class="custom-checkbox"
                                               {{ (@$products) ? $products->special_price_yes_or_no == 'yes' ? 'checked':'' : '' }}  id="special_price">
                                        <label for="special_price">Special Price</label>
                                    </div>
                                </div>
                                <div class="form-row" style="display: none" id="special_box">
                                    <div class="form-group col-md-4">
                                        <label for="special_price">Special Price</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" value="{{ (@$products) ? $products->special_price:'' }}" name="special_price" id="special_price" placeholder="Enter Special Price">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="special_price_form">Special Price Form</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" value="{{ (@$products) ? $products->special_price_form:'' }}" name="special_price_form" id="special_price_form"
                                                   placeholder="Special Price Form">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="special_price_to">Special Price To</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="special_price_to" value="{{ (@$products) ? $products->special_price_to:'' }}" id="special_price_to" placeholder="Special Price To">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="quantity">Quantity</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="quantity" value="{{ (@$products) ? $products->quantity:'' }}" name="quantity" placeholder="Enter Quantity">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="sku_code">SKU CODE</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="sku_code" value="{{ (@$products) ? $products->sku_code : '' }}" name="sku_code" placeholder="Enter SKU Code">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="sku_code">Warranty</label>
                                        <div class="input-group">
                                            <!-- YES -->
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="wYES" name="warranty" value="1" class="custom-control-input">
                                                <label class="custom-control-label" for="wYES">YES</label>
                                            </div>
                                            <!-- NO -->
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="wNO" checked name="warranty" value="0" class="custom-control-input">
                                                <label class="custom-control-label" for="wNO">NO</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="WarrantyBox" style="display: none">
                                    <label for="warranty_condition">Warranty Condition</label>
                                    <input type="text" class="form-control" id="warranty_condition"
                                           name="warranty_duration" placeholder="Enter Warranty Condition">
                                    <label for="warranty_description" class="mt-2">Warranty Description</label>
                                    <textarea name="warranty_description" placeholder="Enter Warranty Description" id="warranty_description" class="form-control editor" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="color">Color</label>
                                        <div class="input-group">
                                            @foreach(Color() as $key => $value)
                                                <div class="custom-control custom-checkbox mr-2">
                                                    <input type="checkbox" class="custom-control-input" name="color[]" multiple value="{{ $value }}" id="{{ $value }}">
                                                    <label class="custom-control-label" for="{{ $value }}">{{ $value }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="color">SIZE</label>
                                        <div class="input-group">
                                            @foreach(Size() as $key => $value)
                                                <div class="custom-control custom-checkbox mr-2">
                                                    <input type="checkbox" class="custom-control-input" name="size[]" multiple value="{{ $value }}" id="{{ $value }}">
                                                    <label class="custom-control-label" for="{{ $value }}">{{ $value }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="thumbnail">Product Thumbnail</label>
                                        <div class="input-group">
                                            <div class="button-wrapper" style="margin-top: 35px;"><span class="label">Thumbnail</span>
                                                <input type="file" name="thumbnail" id="thumbnail" class="upload-box upload" placeholder="Upload File">
                                            </div>
                                            <div class="thumbnail ml-2">
                                                @isset($products)
                                                    @if(isset($products))
                                                        <img src="{{ $products->thumbnail }}" style="width: 100px; height: 120px" class="img-fluid img-thumbnail" alt="">
                                                    @else
                                                        <img src="{{ asset('uploads/product/'.$products->thumbnail) }}" style="width: 100px; height: 120px" class="img-fluid img-thumbnail" alt="">
                                                    @endif
                                                @endisset
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Gallery">Product Gallery</label>
                                        <div class="input-group">
                                            <div class="button-wrapper" style="margin-top: 35px;"><span class="label">Product Gallery</span>
                                                <input type="file" name="image[]" id="image" multiple class="upload-box upload">
                                            </div>
                                            <div class="product-gallery ml-2 d-flex ">
                                                @isset($products)
                                                    @if(isset($products->image))
                                                        @foreach(json_decode($products->image) as $images)
                                                            @if(file_exists(asset('uploads/product/'.$images)))
                                                                <img src="{{ asset('uploads/product/'.$image) }}" style="width: 100px; height: 120px" class="img-fluid img-thumbnail" alt="">
                                                            @else
                                                                <img src="{{ $images }}" style="width: 100px; height: 120px" class="img-fluid img-thumbnail" alt="">
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endisset
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control editor" placeholder="Enter Product Description" rows="8"
                                              cols="3">@isset($products){{ $products->description }}@endisset</textarea>
                                </div>
                                <div class="form-group justify-content-center m-auto col-md-3">
                                    <br>
                                    <div class="input-group">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="active" @if(isset($products)) {{ $products->status == 'active' ? 'checked':'' }} @else checked @endif  value="active" name="status"
                                                   {{ old('status') == 'active' ? 'checked' : ''}} class="custom-control-input @error('status') is-invalid @enderror">
                                            <label for="active" class="custom-control-label">Active</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="inactive" @if(isset($products)) {{ $products->status == 'inactive' ? 'checked':'' }} @endif value="inactive"
                                                   {{ (@$products) ? $products->status == 'inactive' ? 'checked':'' :'' }} {{ old('status') == 'inactive' ? 'checked' : ''}} name="status"
                                                   class="custom-control-input @error('status') is-invalid @enderror">
                                            <label for="inactive" class="custom-control-label">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-outline-success">{{ (@$products) ? 'Update Product':'Add Product' }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('JS')
    <script src="{{ asset('assets/backend/assets/Custom plugins/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/backend/assets/Custom plugins/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/backend/assets/Custom plugins/sweetalert2.all.min.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('.editor'))
            .catch(error => {
                console.error(error)
            });
    </script>
@endpush

