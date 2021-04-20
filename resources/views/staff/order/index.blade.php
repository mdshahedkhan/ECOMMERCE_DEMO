@extends('staff.app.app')
@section('title', "Manage All Category")
@push('CSS')
    <link href="{{ asset('assets/backend/assets/bootstrap-toggle.min.css') }}" rel="stylesheet">
    <!--Data Tables -->
    <link href="{{  asset('assets/backend/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        .toggle-off.btn-sm {
            padding-left: 8px;
        }
    </style>
@endpush
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                <div class="breadcrumb-title pr-3">Orders</div>
                <div class="pl-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Order Table</li>
                        </ol>
                    </nav>
                </div>
                <div class="ml-auto">
                    <div class="btn-group">
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card radius-15">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0">Manage Order</h4>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Si No</th>
                                    <th>Order Id</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Total &#2547</th>
                                    <th>Order Status</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Orders as $row)
                                    <tr>
                                        <td>{{ $loop->index }}</td>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->customer->FullName }}</td>
                                        <td>{{ $row->customer->phone }}</td>
                                        <td>{{ $row->total }}</td>
                                        <td class="text-capitalize"><span class="badge badge-{{ $row->status == 'pending' ? 'warning':'danger' }}">{{ $row->status }}</span></td>
                                        <td class="text-capitalize"><span class="badge badge-">{{ $row->payment->status }}</span></td>
                                        <td>
                                            <a href="{{ route('staff.order.details', base64_encode($row->id)) }}" class="btn btn-outline-info btn-sm"><i class="bx bx-info-circle"></i></a>
                                            <a href="" class="btn btn-outline-warning btn-sm"><i class="bx bx-download"></i></a>
                                            <a href="" class="btn btn-outline-success btn-sm"><i class="bx bx-edit-alt"></i></a>
                                            <a href="" class="btn btn-outline-danger btn-sm"><i class="bx bx-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('JS')
    <script src="{{ asset('assets/backend/assets/bootstrap-toggle.min.js') }}"></script>
    <!--Data Tables js-->
    <script src="{{  asset('assets/backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $('.table').DataTable();
    </script>
@endpush
