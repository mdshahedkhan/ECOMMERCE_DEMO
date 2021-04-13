@extends('Site.App.App')

@push('title' , $SingleProduct->name)
{{--@section('nav-bar')
    @include('Site.App.nav-bar', $category)
@endsection--}}
@section('content')
    <main class="main">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:avoid(0)">{{ $SingleProduct->name }}</a></li>
                </ol>
            </nav>
            <div class="row search-result">
                <div class="col-lg-9 main-content">
                    <div class="product-single-container product-single-default">
                        <div class="row">
                            <div class="col-lg-7 col-md-6 product-single-gallery">
                                <div class="product-slider-container">
                                    <div class="product-single-carousel owl-carousel owl-theme owl-loaded owl-drag">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage" style="transform: translate3d(-2400px, 0px, 0px); transition: all 0.3s ease 0s; width: 3841px;">
                                                @php
                                                    $myImage = [];
                                                    $myImage[0] = $SingleProduct->thumbnail;
                                                    foreach (json_decode($SingleProduct->image) as $image){
                                                        array_push($myImage, $image);
                                                    }
                                                @endphp
                                                @foreach($myImage as $image)
                                                    <div class="owl-item cloned" style="width: 480.031px;">
                                                        <div class="product-item">
                                                            <img style=" height: 300px; width: 300px" class="product-single-image" src="{{ asset('uploads/product/'.$image) }}" alt="{{ $SingleProduct->name }}"
                                                                 data-zoom-image="{{ asset('uploads/product/'.$image) }}">
                                                            <div class="zoomContainer" style="-webkit-transform: translateZ(0);position:absolute;left:0;top:0;height:480.016px;width:480.016px;">
                                                                <div class="zoomWindowContainer" style="width: 400px;">
                                                                    <div
                                                                        style="z-index: 999; overflow: hidden; margin-left: 0; margin-top: 0; background-position: 0 0; width: 480.016px; height: 480.016px; float: left; display: none; cursor: grab; background-repeat: no-repeat; position: absolute; background-image: url(&quot;{{ asset('uploads/product/'.$image) }}&quot;);"
                                                                        class="zoomWindow">&nbsp;
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="owl-nav">
                                            <button type="button" role="presentation" class="owl-prev"><i class="icon-angle-left"></i></button>
                                            <button type="button" role="presentation" class="owl-next"><i class="icon-angle-right"></i></button>
                                        </div>
                                    </div>
                                    <!-- End .product-single-carousel -->
                                    <span class="prod-full-screen">
                                        <i class="icon-plus"></i>
                                    </span>
                                </div>
                                <div style="height:250px; width:500px;" class="prod-thumbnail owl-dots" id="carousel-custom-dots">
                                    @foreach($myImage as $image)
                                        <div class="owl-dot">
                                            <img style="width: 60px; height: 60px" src="{{ asset('uploads/product/'.$image) }}" alt="{{ $SingleProduct->name }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div><!-- End .col-lg-7 -->

                            <div class="col-lg-5 col-md-6 product-single-details">
                                <h1 class="product-title">{{ $SingleProduct->name }}</h1>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                                    </div><!-- End .product-ratings -->

                                    <a href="#" class="rating-link">( 6 Reviews )</a>
                                </div><!-- End .product-container -->

                                <hr class="short-divider">

                                <div class="price-box">
                                    <span class="old-price">{{ $SingleProduct->special_price }}</span>
                                    <span class="product-price">{{ $SingleProduct->selling_price }}</span>
                                </div><!-- End .price-box -->

                                <div class="product-desc">
                                    <p>{{ $SingleProduct->description }}</p>
                                </div><!-- End .product-desc -->

                                <div class="product-filters-container">
                                    <div class="product-single-filter">
                                        <label>Colors:</label>
                                        <ul class="config-swatch-list">
                                            @php
                                                $colors = json_decode($SingleProduct->color);
                                            @endphp
                                            @foreach($colors as $color)
                                                <li class="color-items" data-value="{{ $color }}">
                                                    <a href="javascript:;" style="background-color: {{ $color }};"></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div><!-- End .product-single-filter -->
                                </div><!-- End .product-filters-container -->
                                <div class="sticky-wrapper" style="min-height: 90px;">
                                    <div class="sticky-header fixed" style="top: 48px;">
                                        <div class="container">
                                            <div class="sticky-img mr-4">
                                                <img src="{{ asset('uploads/product/'.$SingleProduct->thumbnail) }}" alt="{{ $SingleProduct->name }}">
                                            </div>
                                            <div class="sticky-detail">
                                                <div class="sticky-product-name">
                                                    <h2 class="product-title ls-0">{{ $SingleProduct->name }}</h2>
                                                    <div class="price-box">
                                                        <span class="old-price">{{ $SingleProduct->selling_price }}</span>
                                                        <span class="product-price">{{ $SingleProduct->special_price }}</span>
                                                    </div><!-- End .price-box -->
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                                                    </div><!-- End .product-ratings -->

                                                    @if($SingleProduct->quantity > 0)
                                                        <a href="javascript:;" class="rating-link">In stock</a>
                                                    @else
                                                        <a href="javascript:;" class="rating-link">Out Of stock</a>
                                                    @endif
                                                </div><!-- End .product-container -->
                                            </div><!-- End .sticky-detail -->
                                            <hr class="divider">
                                            <div class="product-action">
                                                <div class="product-single-qty">
                                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected"><span class="input-group-btn input-group-prepend"><button
                                                                class="btn btn-outline btn-down-icon bootstrap-touchspin-down" type="button"></button></span><input class="horizontal-quantity form-control" type="text"><span
                                                            class="input-group-btn input-group-append"><button class="btn btn-outline btn-up-icon bootstrap-touchspin-up" type="button"></button></span></div>
                                                </div><!-- End .product-single-qty -->
                                                <a href="javascript:;" data-url="{{ route('cart.add')  }}" data-slug="{{ $SingleProduct->slug }}" class="addCart btn btn-dark add-cart icon-shopping-cart" title="Add to Cart">Add
                                                    to
                                                    Cart</a>
                                            </div>

                                            <hr class="divider mb-1">
                                        </div><!-- end .container -->
                                    </div>
                                </div><!-- end .sticky-header -->

                            </div><!-- End .product-single-details -->
                        </div><!-- End .row -->
                    </div><!-- End .product-single-container -->

                    <div class="product-single-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-tab-more-info" data-toggle="tab" href="#product-more-info-content" role="tab" aria-controls="product-more-info-content" aria-selected="false">More Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews (3)</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                                <div class="product-desc-content">
                                    <p>{{ $SingleProduct->description }}</p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- End .tab-pane -->

                            <div class="tab-pane fade fade" id="product-more-info-content" role="tabpanel" aria-labelledby="product-tab-more-info">
                                <div class="product-desc-content">
                                    <p>{{ $SingleProduct->warranty_description }}</p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- End .tab-pane -->


                            <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                                <div class="product-reviews-content">

                                    <div class="row">
                                        <div class="col-xl-7">
                                            <h2 class="reviews-title">3 reviews for Product Long Name</h2>

                                            <ol class="comment-list">
                                                <li class="comment-container">
                                                    <div class="comment-avatar">
                                                        <img src="assets/images/avatar/avatar1.jpg" width="65" height="65" alt="avatar">
                                                    </div><!-- End .comment-avatar-->

                                                    <div class="comment-box">
                                                        <div class="ratings-container">
                                                            <div class="product-ratings">
                                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                            </div><!-- End .product-ratings -->
                                                        </div><!-- End .ratings-container -->

                                                        <div class="comment-info mb-1">
                                                            <h4 class="avatar-name">John Doe</h4> - <span class="comment-date">Novemeber 15, 2019</span>
                                                        </div><!-- End .comment-info -->

                                                        <div class="comment-text">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                                exercitation ullamco laboris nisi ut aliquip.</p>
                                                        </div><!-- End .comment-text -->
                                                    </div><!-- End .comment-box -->
                                                </li><!-- comment-container -->

                                                <li class="comment-container">
                                                    <div class="comment-avatar">
                                                        <img src="assets/images/avatar/avatar2.jpg" width="65" height="65" alt="avatar">
                                                    </div><!-- End .comment-avatar-->

                                                    <div class="comment-box">
                                                        <div class="ratings-container">
                                                            <div class="product-ratings">
                                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                            </div><!-- End .product-ratings -->
                                                        </div><!-- End .ratings-container -->

                                                        <div class="comment-info mb-1">
                                                            <h4 class="avatar-name">John Doe</h4> - <span class="comment-date">Novemeber 15, 2019</span>
                                                        </div><!-- End .comment-info -->

                                                        <div class="comment-text">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                                exercitation ullamco laboris nisi ut aliquip.</p>
                                                        </div><!-- End .comment-text -->
                                                    </div><!-- End .comment-box -->
                                                </li><!-- comment-container -->

                                                <li class="comment-container">
                                                    <div class="comment-avatar">
                                                        <img src="assets/images/avatar/avatar3.jpg" width="65" height="65" alt="avatar">
                                                    </div><!-- End .comment-avatar-->

                                                    <div class="comment-box">
                                                        <div class="ratings-container">
                                                            <div class="product-ratings">
                                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                            </div><!-- End .product-ratings -->
                                                        </div><!-- End .ratings-container -->

                                                        <div class="comment-info mb-1">
                                                            <h4 class="avatar-name">John Doe</h4> - <span class="comment-date">Novemeber 15, 2019</span>
                                                        </div><!-- End .comment-info -->

                                                        <div class="comment-text">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                                exercitation ullamco laboris nisi ut aliquip.</p>
                                                        </div><!-- End .comment-text -->
                                                    </div><!-- End .comment-box -->
                                                </li><!-- comment-container -->
                                            </ol><!-- End .comment-list -->
                                        </div>

                                        <div class="col-xl-5">
                                            <div class="add-product-review">
                                                <form action="#" class="comment-form m-0">
                                                    <h3 class="review-title">Add a Review</h3>
                                                    <div class="rating-form">
                                                        <label for="rating">Your rating</label>
                                                        <span class="rating-stars">
                                                            <a class="star-1" href="#">1</a>
                                                            <a class="star-2" href="#">2</a>
                                                            <a class="star-3" href="#">3</a>
                                                            <a class="star-4" href="#">4</a>
                                                            <a class="star-5" href="#">5</a>
                                                        </span>

                                                        <select name="rating" id="rating" required="" style="display: none;">
                                                            <option value="">Rate…</option>
                                                            <option value="5">Perfect</option>
                                                            <option value="4">Good</option>
                                                            <option value="3">Average</option>
                                                            <option value="2">Not that bad</option>
                                                            <option value="1">Very poor</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Your Review</label>
                                                        <textarea cols="5" rows="6" class="form-control form-control-sm"></textarea>
                                                    </div><!-- End .form-group -->


                                                    <div class="row">
                                                        <div class="col-md-6 col-xl-12">
                                                            <div class="form-group">
                                                                <label>Your Name</label>
                                                                <input type="text" class="form-control form-control-sm" required="">
                                                            </div><!-- End .form-group -->
                                                        </div>

                                                        <div class="col-md-6 col-xl-12">
                                                            <div class="form-group">
                                                                <label>Your E-mail</label>
                                                                <input type="text" class="form-control form-control-sm" required="">
                                                            </div><!-- End .form-group -->
                                                        </div>
                                                    </div>

                                                    <input type="submit" class="btn btn-dark ls-n-15" value="Submit">
                                                </form>
                                            </div><!-- End .add-product-review -->
                                        </div>
                                    </div>
                                </div><!-- End .product-reviews-content -->
                            </div><!-- End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-single-tabs -->
                </div><!-- End .col-lg-9 -->

                <div class="sidebar-overlay"></div>
                <div class="sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
                <aside class="sidebar-product col-lg-3 mobile-sidebar">
                    <div class="pin-wrapper" style="height: 939.219px;">
                        <div class="sidebar-wrapper" style="border-bottom: 0px none rgb(119, 119, 119); width: 280px; position: absolute; top: 105.311px;">
                            <div class="widget widget-info">
                                <ul>
                                    <li>
                                        <i class="icon-shipping"></i>
                                        <h4>FREE<br>SHIPPING</h4>
                                    </li>
                                    <li>
                                        <i class="icon-us-dollar"></i>
                                        <h4>100% MONEY<br>BACK GUARANTEE</h4>
                                    </li>
                                    <li>
                                        <i class="icon-online-support"></i>
                                        <h4>ONLINE<br>SUPPORT 24/7</h4>
                                    </li>
                                </ul>
                            </div><!-- End .widget -->

                            <div class="widget widget-banners px-5 pb-5 text-center">
                                <div class="banner d-flex flex-column align-items-center">
                                    <h3 class="badge-sale bg-primary d-flex flex-column align-items-center justify-content-center text-uppercase"><em class="pt-3 ls-0">Sale</em>Many Item</h3>
                                    <h4 class="sale-text font1 text-uppercase m-b-3">45<sup>%</sup><sub>off</sub></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <a href="#" class="btn btn-dark btn-md font1">View Sale</a>
                                </div><!-- End .banner -->
                            </div><!-- End .widget -->
                            <div class="widget widget-featured">
                                <h3 class="widget-title">Featured</h3>

                                <div class="widget-body">
                                    <div class="owl-carousel widget-featured-products owl-loaded owl-drag">
                                        <!-- End .featured-col -->

                                        <!-- End .featured-col -->
                                        {{--<div class="owl-stage-outer owl-height" style="height: 256.219px;">
                                            <div class="owl-stage" style="transform: translate3d(-840px, 0px, 0px); transition: all 0.25s ease 0s; width: 1680px;">
                                                <div class="owl-item cloned" style="width: 280px;">
                                                    @php($sl = 1)
                                                    @foreach($feature_product as $products)
                                                        @if(($sl%3) == 1)
                                                            <div class="featured-col">
                                                                @endif
                                                                <div class="product-default left-details product-widget">
                                                                    <figure>
                                                                        <a href="{{ route('products.SingleProduct' , $products->slug) }}">
                                                                            <img src="{{ asset('uploads/product/'.$products->thumbnail) }}" alt="{{ $products->name }}">
                                                                        </a>
                                                                    </figure>
                                                                    <div class="product-details">
                                                                        <h2 class="product-title">
                                                                            <a href="{{ route('products.SingleProduct' , $products->slug) }}">{{ $products->name }}</a>
                                                                        </h2>
                                                                        <div class="ratings-container">
                                                                            <div class="product-ratings">
                                                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                                                <span class="tooltiptext tooltip-top"></span>
                                                                            </div><!-- End .product-ratings -->
                                                                        </div><!-- End .product-container -->
                                                                        <div class="price-box">
                                                                            <span class="product-price">$49.00</span>
                                                                        </div><!-- End .price-box -->
                                                                    </div><!-- End .product-details -->
                                                                </div>
                                                                @if(($sl%3) == 0)
                                                            </div>
                                                        @endif
                                                        @php($sl++)
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>--}}
                                        <div class="owl-nav">
                                            <button type="button" role="presentation" class="owl-prev"><i class="icon-angle-left"></i></button>
                                            <button type="button" role="presentation" class="owl-next"><i class="icon-angle-right"></i></button>
                                        </div>
                                        <div class="owl-dots disabled"></div>
                                    </div><!-- End .widget-featured-slider -->
                                </div><!-- End .widget-body -->
                            </div>
                        </div>
                    </div>
                </aside><!-- End .col-md-3 -->
            </div><!-- End .row -->

            <div class="products-section pt-0">
                <h2 class="section-title">Related Products</h2>
                <div class="products-slider owl-carousel owl-theme dots-top owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2100px;">
                            @foreach($related_product as $product)
                                <div class="owl-item active" style="width: 280px; margin-right: 20px;">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="{{ route('products.SingleProduct', $product->slug) }}">
                                                <img src="{{ asset('uploads/product/'. $product->thumbnail) }}" style="width: 200px; height: 200px" alt="{{ $product->name }}">
                                            </a>
                                            @php($special_price = false)
                                            @if($product->special_price_form == date('Y-m-d') && $product->special_price_to == date('Y-m-d'))
                                                @php($special_price = true)
                                            @endif
                                            @if($special_price)
                                                <div class="label-group">
                                                    <span class="product-label label-sale">-{{ sprintf('%.2f', (($product->selling_price-$product->special_price)/$product->selling_price)*100) }}%</span>
                                                </div>
                                            @endif
                                            <div class="btn-icon-group">
                                                <button class="btn-icon btn-add-cart addCart" data-url="{{ route('cart.add') }}" data-slug="{{ $product->slug }}"><i class="icon-shopping-cart"></i></button>
                                            </div>
                                            <a href="{{ route('QuickViewProduct', [$product->slug]) }}" class="btn-quickview" title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title">
                                                <a href="{{ route('products.SingleProduct', $product->slug) }}">{{ $product->name }}</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .ratings-container -->
                                            <div class="price-box">
                                                <span class="old-price">{{ $product->selling_price }}</span>
                                                <span class="product-price">{{ $product->special_price }}</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="owl-nav disabled">
                        <button type="button" role="presentation" class="owl-prev"><i class="icon-angle-left"></i></button>
                        <button type="button" role="presentation" class="owl-next"><i class="icon-angle-right"></i></button>
                    </div>
                    <div class="owl-dots">
                        <button role="button" class="owl-dot active"><span></span></button>
                        <button role="button" class="owl-dot"><span></span></button>
                    </div>
                </div><!-- End .products-slider -->
            </div><!-- End .products-section -->
        </div><!-- End .container -->
    </main>
@endsection

