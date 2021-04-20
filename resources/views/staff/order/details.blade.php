@extends('staff.app.app')
@section('title', "Order Info")
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
                <div class="breadcrumb-title pr-3">Details</div>
                <div class="pl-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Order Info</li>
                        </ol>
                    </nav>
                </div>
                <div class="ml-auto">
                    <div class="btn-group">
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-lg-top-info">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="mb-0">Order Status</h5>
                            </div>
                            <table class="table table-bordered">
                                <div class="col-md-5 row form-row">
                                    <div class="input-group mb-3 col-md-12">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-secondary" style="width:  140px" type="button">Order Status</button>
                                        </div>
                                        <select class="custom-select" id="order_status" onchange="StatusChange('{{ route('staff.order.status') }}', '{{ $order->id }}', $('#order_status'))">
                                            @foreach(Status() as $key=>$value)
                                                <option value="{{ $value }}" {{ $value == $order->status ? 'selected':'' }}>{{ ucwords($value) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group mb-3 col-md-12">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-secondary" type="button">Payment Status</button>
                                        </div>
                                        <select class="custom-select" id="payment_status" onchange="StatusChange('{{ route('staff.order.py_status') }}', '{{ $order->payment->id }}', $('#payment_status'))">
                                            <option value="pending" {{ 'pending' == $order->payment->status ? 'selected':'' }}>{{ 'Pending' }}</option>
                                            <option value="success" {{ 'success' == $order->payment->status ? 'selected':'' }}>{{ 'Success' }}</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3 col-md-12">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-secondary" type="button">Shipping Charge</button>
                                        </div>
                                        <input type="number" id="shipping_charge" onchange="StatusChange('{{ route('staff.order.shipping_charge') }}', '{{ $order->id }}', $('#shipping_charge'))" class="form-control"
                                               placeholder="Enter Shipping Charge 00&#2547">
                                    </div>
                                </div>
                            </table>
                        </div>


                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-lg-top-info">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="mb-0">Customer Info</h5>
                            </div>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Name</td>
                                    <th>{{ $order->customer->FullName }}</th>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <th>{{ $order->customer->phone }}</th>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <th>{{ $order->customer->email }}</th>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <th>{{ $order->customer->address }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-lg-top-info">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="mb-0">Order Info</h5>
                            </div>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Invoice</td>
                                    <th>{{ date('Ymd', strtotime($order->created_at)) }}</th>
                                </tr>
                                <tr>
                                    <td>Order</td>
                                    <th>{{ $order->id}}</th>
                                </tr>
                                <tr>
                                    <td>Order Date <i class="bx bx-calendar-alt"></i></td>
                                    <th>{{ date('Y/m/d', strtotime($order->created_at)) }}</th>
                                </tr>
                                <tr>
                                    <td>Amount &#2547</td>
                                    <th>{{ $order->total }} &#2547</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-lg-top-info">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="mb-0">Shipping Info</h5>
                            </div>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Name</td>
                                    <th>{{ $order->shipping->first_name . ' ' .$order->shipping->last_name }}</th>
                                </tr>
                                <tr>
                                    <td>phone</td>
                                    <th>{{ $order->shipping->phone}}</th>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <th>{{ $order->shipping->address }}</th>
                                </tr>
                                <tr>
                                    <td>Amount &#2547</td>
                                    <th>{{ $order->total }} &#2547</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-lg-top-info">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="mb-0">Billing Info</h5>
                            </div>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Name</td>
                                    <th>{{ $order->shipping->first_name . ' ' .$order->shipping->last_name }}</th>
                                </tr>
                                <tr>
                                    <td>phone</td>
                                    <th>{{ $order->shipping->phone}}</th>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <th>{{ $order->shipping->address }}</th>
                                </tr>
                                <tr>
                                    <td>Amount &#2547</td>
                                    <th>{{ $order->total }} &#2547</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card border-lg-top-info">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="mb-0">Product Info</h5>
                            </div>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Sl</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price &#2547</th>
                                </tr>
                                @php
                                    $sum = "";
                                @endphp
                                @foreach($order->order_info as $item)
                                    <tr>
                                        <td>{{ ++$item->index }}</td>
                                        <td><img width="40px" src="{{ asset('uploads/product/'.$item->product->thumbnail) }}" alt="{{ $item->product_name }}"></td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->product_qty }}</td>
                                        <td>{{ number_format($item->product_price, 2) }}</td>
                                    </tr>
                                    @php
                                        $sum .=  $item->product_qty * $item->product_price;
                                    @endphp
                                @endforeach
                                <tr>
                                    <td colspan="4">Total</td>
                                    <td>{{ number_format($sum, 2) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
