@extends('Site.App.App')

@push('title', 'Shipping')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div><!-- End .container -->
        </nav>
        <div class="container">
            <ul class="checkout-progress-bar">
                <li class="active">
                    <span>Shipping</span>
                </li>
                <li>
                    <span>Review &amp; Payments</span>
                </li>
            </ul>
            <div class="row">
                <div class="col-lg-8">
                    <ul class="checkout-steps">
                        <li>
                            <h2 class="step-title">Shipping Address</h2>
                            @if(!Session::get('customer'))
                                <form action="{{ route('auth.login') }}" method="post">
                                    @csrf
                                    <div class="form-group required-field">
                                        <label for="email">Email Address </label>
                                        <div class="form-control-tooltip">
                                            <input type="email" class="form-control" required name="email" id="email">
                                            <span class="input-tooltip" data-toggle="tooltip" title="We'll send your order confirmation here." data-placement="right"><i class="icon-question-circle"></i></span>
                                        </div><!-- End .form-control-tooltip -->
                                    </div><!-- End .form-group -->

                                    <div class="form-group required-field">
                                        <label for="password">Password </label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                    </div><!-- End .form-group -->

                                    <p>You already have an account with us. Sign in or continue as guest.</p>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary">LOGIN</button>
                                        <a href="forgot-password.html" class="forget-pass"> Forgot your password?</a>
                                    </div><!-- End .form-footer -->
                                </form>
                            @endif

                            <form action="{{ route('checkout.shipping') }}" method="post" id="ShippingForm">
                                @csrf
                                <div class="form-group required-field">
                                    <label for="first_name">First Name </label>
                                    <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter First Name">
                                    @error('first_name') <p class="text-danger">{{ $message }}</p>@enderror
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    <label for="last_name">Last Name </label>
                                    <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter Last Name">
                                    @error('last_name') <p class="text-danger">{{ $message }}</p>@enderror
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    <label for="address">Address </label>
                                    <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Delivery  Address">
                                    @error('address') <p class="text-danger">{{ $message }}</p>@enderror
                                </div><!-- End .form-group -->
                                <div class="form-group required-field">
                                    <label for="phone">Phone Number </label>
                                    <input id="phone" name="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Phone Number">
                                    @error('phone') <p class="text-danger">{{ $message }}</p>@enderror
                                </div><!-- End .form-group -->
                                <div class="checkout-steps-action">
                                    <button type="submit" class="btn btn-primary float-right">NEXT</button>
                                </div><!-- End .checkout-steps-action -->
                            </form>
                        </li>
                    </ul>
                </div><!-- End .col-lg-8 -->

                <div class="col-lg-4">
                    <div class="order-summary">
                        <h3>Summary</h3>
                        <h4>
                            <a data-toggle="collapse" href="#order-cart-section" class="collapsed" role="button" aria-expanded="false" aria-controls="order-cart-section">{{ $CartItems->count() }} products in Cart</a>
                        </h4>

                        <div class="collapse" id="order-cart-section">
                            <table class="table table-mini-cart">
                                <tbody>
                                    @foreach($CartItems as $item)
                                        <tr>
                                            <td class="product-col">
                                                <figure class="product-image-container">
                                                    <a href="{{ route('products.SingleProduct', $item->attributes->slug) }}" class="product-image">
                                                        <img src="{{ asset('uploads/product/'.$item->attributes->thumbnail) }}" alt="{{ $item->name }}">
                                                    </a>
                                                </figure>
                                                <div>
                                                    <h2 class="product-title">
                                                        <a href="{{ route('products.SingleProduct', $item->attributes->slug) }}">{{ $item->name }}</a>
                                                    </h2>

                                                    <span class="product-qty">Qty: {{ $item->quantity }}</span>
                                                </div>
                                            </td>
                                            <td class="price-col">{{ $item->price }}&#2547</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- End #order-cart-section -->
                    </div><!-- End .order-summary -->
                </div><!-- End .col-lg-4 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-6"></div><!-- margin -->
    </main><!-- End .main -->
@endsection
@push('JS')
    <script>
        $('#ShippingForm').validate({
            rule: {
                first_name: {
                    required: true,
                    alpha: true
                },
                last_name: {
                    required: true
                },
                address: {
                    required: true
                },
                phone: {
                    required: true
                }
            }
        });
    </script>
@endpush
