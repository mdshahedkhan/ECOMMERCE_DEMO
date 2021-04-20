@extends('Site.App.App')
@push('title', 'Review Payments')
@push('CSS')
    <style>
        input[type='radio']:after {
            width: 15px;
            height: 15px;
            border-radius: 15px;
            top: -2px;
            left: -1px;
            position: relative;
            background-color: #d1d3d1;
            content: '';
            display: inline-block;
            visibility: visible;
            border: 2px solid white;
        }

        input[type='radio']:checked:after {
            width: 15px;
            height: 15px;
            border-radius: 15px;
            top: -2px;
            left: -1px;
            position: relative;
            background-color: #ffa500;
            content: '';
            display: inline-block;
            visibility: visible;
            border: 2px solid white;
        }
    </style>
@endpush
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div><!-- End .container -->
        </nav>

        <div class="container">
            <ul class="checkout-progress-bar">
                <li>
                    <span>Shipping</span>
                </li>
                <li class="active">
                    <span>Review &amp; Payments</span>
                </li>
            </ul>
            <div class="row">
                <div class="col-lg-4">
                    <div class="order-summary">
                        <h3>Summary</h3>
                        <h4>
                            <a data-toggle="collapse" href="#order-cart-section" role="button" aria-expanded="false" aria-controls="order-cart-section">{{ Cart::getContent()->count() }} products in Cart</a>
                        </h4>
                        <div class="collapse show" id="order-cart-section">
                            <table class="table table-mini-cart">
                                <tbody>
                                    @foreach(Cart::getContent() as $items)
                                        <tr>
                                            <td class="product-col">
                                                <figure class="product-image-container">
                                                    <a href="{{ route('products.SingleProduct', $items->attributes->slug) }}" class="product-image">
                                                        <img src="{{ asset('uploads/product/'. $items->attributes->thumbnail) }}" alt="{{ $items->name }}">
                                                    </a>
                                                </figure>
                                                <div>
                                                    <h2 class="product-title">
                                                        <a href="{{ route('products.SingleProduct', $items->attributes->slug) }}">{{ $items->name }}</a>
                                                    </h2>

                                                    <span class="product-qty">Qty: {{ $items->quentity }}</span>
                                                </div>
                                            </td>
                                            <td class="price-col">$152.00</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- End #order-cart-section -->
                    </div><!-- End .order-summary -->

                    <div class="checkout-info-box">
                        <h3 class="step-title">Ship To:</h3>
                        <address>
                            {{ $info->first_name .' ' . $info->last_name }} <br>
                            {{ $info->address }}
                            <br>
                            {{ $info->phone }}
                        </address>
                    </div><!-- End .checkout-info-box -->
                </div><!-- End .col-lg-4 -->

                <div class="col-lg-8 order-lg-first">
                    <div class="checkout-payment">
                        <h2 class="step-title">Payment Method:</h2>

                        <h4>Check / Money order</h4>

                        @if($info)
                            <div class="form-group-custom-control">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="change-bill-address" value="1">
                                    <label class="custom-control-label" for="change-bill-address">My billing and shipping address are the same</label>
                                </div><!-- End .custom-checkbox -->
                            </div><!-- End .form-group -->

                            <div id="checkout-shipping-address">
                                <address>
                                    {{ $info->first_name . $info->last_name }} <br>
                                    {{ $info->address }}<br>
                                    {{ $info->phone }}
                                </address>
                            </div><!-- End #checkout-shipping-address -->
                        @endif
                        <form action="{{ route('checkout.order') }}" method="post">
                            @csrf
                            <label for="cash">
                                <input type="radio" name="type" class="" style="border-color: red;" value="cash" id="cash">
                                Cash
                            </label>
                            <label for="bkash">
                                <input type="radio" name="type" class="" style="border-color: red;" value="bkash" id="bkash">
                                Bkash
                            </label>
                            <div class="clearfix">
                                <button type="submit" class="btn btn-primary float-right">Place Order</button>
                            </div><!-- End .clearfix -->
                        </form>
                    {{--<div id="new-checkout-address" class="show">
                        <form action="#">
                            <div class="form-group required-field">
                                <label>First Name </label>
                                <input type="text" class="form-control" required>
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>Last Name </label>
                                <input type="text" class="form-control" required>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label>Company </label>
                                <input type="text" class="form-control">
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>Street Address </label>
                                <input type="text" class="form-control" required>
                                <input type="text" class="form-control" required>
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>City </label>
                                <input type="text" class="form-control" required>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label>State/Province</label>
                                <div class="select-custom">
                                    <select class="form-control">
                                        <option value="CA">California</option>
                                        <option value="TX">Texas</option>
                                    </select>
                                </div><!-- End .select-custom -->
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>Zip/Postal Code </label>
                                <input type="text" class="form-control" required>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label>Country</label>
                                <div class="select-custom">
                                    <select class="form-control">
                                        <option value="USA">United States</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="China">China</option>
                                        <option value="Germany">Germany</option>
                                    </select>
                                </div><!-- End .select-custom -->
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>Phone Number </label>
                                <div class="form-control-tooltip">
                                    <input type="tel" class="form-control" required>
                                    <span class="input-tooltip" data-toggle="tooltip" title="For delivery questions." data-placement="right"><i class="icon-question-circle"></i></span>
                                </div><!-- End .form-control-tooltip -->
                            </div><!-- End .form-group -->
                        </form>
                    </div>--}}<!-- End #new-checkout-address -->


                    </div><!-- End .checkout-payment -->
                </div><!-- End .col-lg-8 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-6"></div><!-- margin -->
    </main><!-- End .main -->
@endsection
