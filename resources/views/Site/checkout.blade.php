@extends('Site.App.App')
@push('title', 'Checkout')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </div><!-- End .container -->
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-table-container">
                        <table class="table table-cart">
                            <thead>
                                @if(!$items->isEmpty())
                                    <tr>
                                        <th class="product-col">Product</th>
                                        <th class="price-col">Price</th>
                                        <th class="qty-col">Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                @endif
                            </thead>
                            <tbody>
                                @if(!$items->isEmpty())
                                    @foreach($items as $item)
                                        <tr class="product-row">
                                            <td class="product-col">
                                                <figure class="product-image-container">
                                                    <a href="{{ route('products.SingleProduct', $item->attributes->slug) }}" class="product-image">
                                                        <img src="{{ asset('uploads/product/'.$item->attributes->thumbnail) }}" style="width: 80px; height: 80px" alt="product">
                                                    </a>
                                                </figure>
                                                <h4 class="product-title">
                                                    <a href="{{ route('products.SingleProduct', $item->attributes->slug) }}">{{ $item->name }}</a>
                                                </h4>
                                            </td>
                                            <td>${{ $item->price }}</td>
                                            <td>
                                                <input class="vertical-quantity form-control" type="text">
                                            </td>
                                            <td>${{ $item->price }}</td>
                                        </tr>
                                        <tr class="product-action-row">
                                            <td colspan="4" class="clearfix">
                                                <div class="float-left">
                                                    <a href="#" class="btn-move">Move to Wishlist</a>
                                                </div><!-- End .float-left -->

                                                <div class="float-right">
                                                    <a href="#" title="Edit product" class="btn-edit"><span class="sr-only">Edit</span><i class="icon-pencil"></i></a>
                                                    <a href="javascript:avoid(0)" id="cartItemRemove" data-url="{{ route('cart.destroy') }}" title="Remove product" class="btn-remove"><span class="sr-only">Remove</span></a>
                                                </div><!-- End .float-right -->
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <h3 class="text-center">Your shopping bag is empty.
                                        <br>
                                        <a href="{{ route('products') }}" class="text-primary">shopping now</a>
                                    </h3>
                                    <div class="text-center">
                                        <a href="{{ route('products') }}" class="btn py-3 btn-outline-secondary btn-sm">Continue Shopping</a>
                                    </div>
                                @endif
                            </tbody>

                            @if(!$items->isEmpty())
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="clearfix">
                                            <div class="float-left">
                                                <a href="{{ route('products') }}" class="btn btn-outline-secondary">Continue Shopping</a>
                                            </div><!-- End .float-left -->
                                            <div class="float-right">
                                                <a href="{{ route('cart.clear') }}" class="btn btn-outline-secondary btn-clear-cart">Clear Shopping Cart</a>
                                                <a href="#" class="btn btn-outline-secondary btn-update-cart">Update Shopping Cart</a>
                                            </div><!-- End .float-right -->
                                        </td>
                                    </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div><!-- End .cart-table-container -->
                    @if(!$items->isEmpty())
                        <div class="cart-discount">
                            <h4>Apply Discount Code</h4>
                            <form action="#">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" placeholder="Enter discount code" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-primary" type="submit">Apply Discount</button>
                                    </div>
                                </div><!-- End .input-group -->
                            </form>
                        </div><!-- End .cart-discount -->
                    @endif
                </div><!-- End .col-lg-8 -->

                <div class="col-lg-4">
                    <div class="cart-summary">
                        <h3>Summary</h3>
                        <h4>
                            <a data-toggle="collapse" href="#total-estimate-section" class="collapsed" role="button" aria-expanded="false" aria-controls="total-estimate-section">Estimate Shipping and Tax</a>
                        </h4>
                        <div class="collapse" id="total-estimate-section">
                            <form action="#">
                                <div class="form-group form-group-sm">
                                    <label>Country</label>
                                    <div class="select-custom">
                                        <select class="form-control form-control-sm">
                                            <option value="USA">United States</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="China">China</option>
                                            <option value="Germany">Germany</option>
                                        </select>
                                    </div><!-- End .select-custom -->
                                </div><!-- End .form-group -->

                                <div class="form-group form-group-sm">
                                    <label>State/Province</label>
                                    <div class="select-custom">
                                        <select class="form-control form-control-sm">
                                            <option value="CA">California</option>
                                            <option value="TX">Texas</option>
                                        </select>
                                    </div><!-- End .select-custom -->
                                </div><!-- End .form-group -->

                                <div class="form-group form-group-sm">
                                    <label>Zip/Postal Code</label>
                                    <input type="text" class="form-control form-control-sm">
                                </div><!-- End .form-group -->

                                <div class="form-group form-group-custom-control">
                                    <label>Flat Way</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flat-rate">
                                        <label class="custom-control-label" for="flat-rate">Fixed $5.00</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .form-group -->

                                <div class="form-group form-group-custom-control">
                                    <label>Best Rate</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="best-rate">
                                        <label class="custom-control-label" for="best-rate">Table Rate $15.00</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .form-group -->
                            </form>
                        </div><!-- End #total-estimate-section -->

                        <table class="table table-totals">
                            <tbody>
                                <tr>
                                    <td>Subtotal</td>
                                    <td>$17.90</td>
                                </tr>

                                <tr>
                                    <td>Tax</td>
                                    <td>$0.00</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Order Total</td>
                                    <td>$17.90</td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="checkout-methods">
                            <a href="checkout-shipping.html" class="btn btn-block btn-sm btn-primary">Go to Checkout</a>
                            <a href="#" class="btn btn-link btn-block">Check Out with Multiple Addresses</a>
                        </div><!-- End .checkout-methods -->
                    </div><!-- End .cart-summary -->
                </div><!-- End .col-lg-4 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-6"></div><!-- margin -->
    </main><!-- End .main -->
@endsection
