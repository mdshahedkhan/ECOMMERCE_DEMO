@extends('staff.app.app')
@section('title', "Manage All Product")
@push('CSS')
    <link href="{{ asset('assets/backend/assets/bootstrap-toggle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/assets/dist/css/lightbox.css') }}" rel="stylesheet">
    <!--plugins-->
    <link rel="stylesheet" href="{{ asset('assets/backend/assets/plugins/notifications/css/lobibox.min.css') }}" />
    {{--<link href="{{ asset('assets/backend/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">--}}
    <style>
        .toggle-off.btn-sm {
            padding-left: 13px;
        }

        svg {
            width: 16px;
            overflow: hidden;
            vertical-align: middle;
        }

        .text-sm {
            margin-top: 10px;
        }
        .allCheck{
            -webkit-user-select: none;
            padding: 10px;
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
                            <li class="breadcrumb-item active" aria-current="page">Product Table</li>
                        </ol>
                    </nav>
                </div>
                <div class="ml-auto">
                    <div class="btn-group">
                        <a href="{{  route('staff.product.create') }}" class="btn btn-info btn-sm"><i class="bx bx-plus-circle"></i> Add New Product</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card radius-10 col-sm-12 col-md-12 col-lg-12">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0">Product Table</h4>
                    </div>
                    <hr>
                    <div class="dataTableData">
                        @include('staff.product.pagination', ['products' => $products])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('JS')
    <script src="{{ asset('assets/backend/assets/Custom plugins/bootstrap-toggle.min.js') }}"></script>
    <script src="{{ asset('assets/backend/assets/dist/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/backend/assets/plugins/notifications/js/notifications.min.js') }}"></script>
    {{--<script src="{{ asset('assets/backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>--}}

@endpush
