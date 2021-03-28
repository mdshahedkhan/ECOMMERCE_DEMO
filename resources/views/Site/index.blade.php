@extends('Site.App.App')

@push('title' , 'Hello World')
@section('content')
    <main class="main">
        <div class="container mb-2">
            <div class="info-boxes-container row row-joined mb-2 font2">
                <div class="info-box info-box-icon-left col-lg-4">
                    <i class="icon-shipping"></i>

                    <div class="info-box-content">
                        <h4>FREE SHIPPING &amp; RETURN</h4>
                        <p class="text-body">Free shipping on all orders over $99</p>
                    </div><!-- End .info-box-content -->
                </div><!-- End .info-box -->

                <div class="info-box info-box-icon-left col-lg-4">
                    <i class="icon-money"></i>

                    <div class="info-box-content">
                        <h4>MONEY BACK GUARANTEE</h4>
                        <p class="text-body">100% money back guarantee</p>
                    </div><!-- End .info-box-content -->
                </div><!-- End .info-box -->

                <div class="info-box info-box-icon-left col-lg-4">
                    <i class="icon-support"></i>

                    <div class="info-box-content">
                        <h4>ONLINE SUPPORT 24/7</h4>
                        <p class="text-body">Lorem ipsum dolor sit amet.</p>
                    </div><!-- End .info-box-content -->
                </div><!-- End .info-box -->
            </div>

            <div class="row">
                <div class="col-lg-9">
                    <div class="home-slider owl-carousel owl-theme owl-carousel-lazy mb-2" data-owl-options="{
							'loop': false,
							'dots': true,
							'nav': false
						}">
                        <div class="home-slide home-slide1 banner banner-md-vw banner-sm-vw">
                            <img class="owl-lazy slide-bg" src="{{ asset('assets/frontend/assets/images/lazy.png') }}" data-src="{{ asset('assets/frontend/assets/images/slider/slide-2.jpg') }}" alt="slider image">
                            <div class="banner-layer banner-layer-middle">
                                <h4 class="text-white pb-4 mb-0">Find the Boundaries. Push Through!</h4>
                                <h2 class="text-white mb-0">Summer Sale</h2>
                                <h3 class="text-white text-uppercase m-b-3">70% Off</h3>
                                <h5 class="text-white text-uppercase d-inline-block mb-0 ls-n-20 align-text-bottom">Starting At <b class="coupon-sale-text bg-secondary text-white d-inline-block">$<em class="align-text-top">199</em>99</b>
                                </h5>
                                <a href="category.html" class="btn btn-dark btn-md ls-10">Shop Now!</a>
                            </div><!-- End .banner-layer -->
                        </div><!-- End .home-slide -->

                        <div class="home-slide home-slide2 banner banner-md-vw banner-sm-vw">
                            <img class="owl-lazy slide-bg" src="{{ asset('assets/frontend/assets/images/lazy.png') }}" data-src="{{ asset('assets/frontend/assets/images/slider/slide-2.jpg') }}" alt="slider image">
                            <div class="banner-layer banner-layer-middle text-uppercase">
                                <h4 class="m-b-2">Over 200 products with discounts</h4>
                                <h2 class="m-b-3">Great Deals</h2>
                                <h5 class="d-inline-block mb-0 align-top mr-5">Starting At <b>$<em>299</em>99</b></h5>
                                <a href="category.html" class="btn btn-dark btn-md ls-10">Get Yours!</a>
                            </div><!-- End .banner-layer -->
                        </div><!-- End .home-slide -->

                        <div class="home-slide home-slide3 banner banner-md-vw banner-sm-vw">
                            <img class="owl-lazy slide-bg" data-src="{{ asset('assets/frontend/assets/images/slider/slide-3.jpg') }}"></img>
                            <div class="banner-layer banner-layer-middle text-uppercase">
                                <h4 class="m-b-2">Up to 70% off</h4>
                                <h2 class="m-b-3">New Arrivals</h2>
                                <h5 class="d-inline-block mb-0 align-top mr-5">Starting At <b>$<em>299</em>99</b></h5>
                                <a href="category.html" class="btn btn-dark btn-md ls-10">Get Yours!</a>
                            </div><!-- End .banner-layer -->
                        </div><!-- End .home-slide -->
                    </div><!-- End .home-slider -->

                    <div class="banners-container m-b-2 owl-carousel owl-theme" data-owl-options="{
							'dots': false,
							'margin': 20,
							'loop': false,
							'responsive': {
								'480': {
									'items': 2
								},
								'768': {
									'items': 3
								}
							}
						}">
                        <div class="banner banner1 banner-hover-shadow mb-2">
                            <figure>
                                <img src="{{ asset('assets/frontend/assets/images/banners/banner-1.jpg') }}" alt="banner">
                            </figure>
                            <div class="banner-layer banner-layer-middle">
                                <h3 class="m-b-2">Porto Watches</h3>
                                <h4 class="m-b-4 text-primary"><sup class="text-dark">
                                        <del>20%</del>
                                    </sup>30%<sup>OFF</sup></h4>
                                <a href="#" class="text-dark text-uppercase ls-10">Shop Now</a>
                            </div>
                        </div><!-- End .banner -->
                        <div class="banner banner2 text-uppercase banner-hover-shadow mb-2">
                            <figure>
                                <img src="{{ asset('assets/frontend/assets/images/banners/banner-2.jpg') }}" alt="banner">
                            </figure>
                            <div class="banner-layer banner-layer-middle text-center pt-2">
                                <h3 class="m-b-1 ls-n-20">Deal Promos</h3>
                                <h4 class="m-b-4 text-body">Starting at $99</h4>
                                <a href="#" class="text-dark text-uppercase ls-10">Shop Now</a>
                            </div>
                        </div><!-- End .banner -->
                        <div class="banner banner3 banner-hover-shadow mb-2">
                            <figure>
                                <img src="{{ asset('assets/frontend/assets/images/banners/banner-3.jpg') }}" alt="banner">
                            </figure>
                            <div class="banner-layer banner-layer-middle text-right">
                                <h3 class="m-b-2">Handbags</h3>
                                <h4 class="mb-3 pb-1 text-secondary text-uppercase">Starting at $99</h4>
                                <a href="#" class="text-dark text-uppercase ls-10">Shop Now</a>
                            </div>
                        </div><!-- End .banner -->
                    </div>

                    <h2 class="section-title ls-n-10 m-b-4">Featured Products</h2>

                    <div class="products-slider owl-carousel owl-theme dots-top m-b-1 pb-1">
                        @foreach($FeatureProducts as $featurePro)
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="{{ route('products.SingleProduct', $featurePro->slug) }}">
                                        <img src="{{ asset('uploads/product/'.$featurePro->thumbnail) }}" style="width: 300px; height: 190px">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                                    </div>
                                    <a src="{{ asset('uploads/product/'.$featurePro->thumbnail) }}" class="btn-quickview" title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list"></div>
                                        <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                    </div>
                                    <h2 class="product-title">
                                        <a href="{{ route('products.SingleProduct', $featurePro->slug) }}">{{ $featurePro->name }}</a>
                                    </h2>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$9.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        @endforeach
                    </div><!-- End .featured-proucts -->

                    <div class="brands-slider owl-carousel owl-theme images-center mb-3" data-owl-options="{
							'responsive': {
								'768': {
									'items': 5
								}
							}
						}">
                        <img src="{{ asset('assets/frontend/assets/images/brands/brand1.png') }}" width="140" height="60" alt="brand">
                        <img src="{{ asset('assets/frontend/assets/images/brands/brand2.png') }}" width="140" height="60" alt="brand">
                        <img src="{{ asset('assets/frontend/assets/images/brands/brand3.png') }}" width="140" height="60" alt="brand">
                        <img src="{{ asset('assets/frontend/assets/images/brands/brand4.png') }}" width="140" height="60" alt="brand">
                        <img src="{{ asset('assets/frontend/assets/images/brands/brand5.png') }}" width="140" height="60" alt="brand">
                        <img src="{{ asset('assets/frontend/assets/images/brands/brand6.png') }}" width="140" height="60" alt="brand">
                    </div><!-- End .brands-slider -->

                    <div class="row products-widgets">
                        <div class="col-sm-6 col-md-4 pb-4 pb-md-0">
                            <div class="product-column">
                                <h3 class="section-sub-title ls-n-20">Top Rated Products</h3>

                                <div class="product-default left-details product-widget mb-3">
                                    <figure>
                                        <a href="product.html">
                                            <img src="{{ asset('assets/frontend/assets/images/products/home-featured-3.jpg') }}">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <a href="product.html">Product Short Name</a>
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
                                <div class="product-default left-details product-widget mb-3">
                                    <figure>
                                        <a href="product.html">
                                            <img src="{{ asset('assets/frontend/assets/images/products/home-featured-4.jpg') }}">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <a href="product.html">Product Short Name</a>
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
                                <div class="product-default left-details product-widget mb-3">
                                    <figure>
                                        <a href="product.html">
                                            <img src="{{ asset('assets/frontend/assets/images/products/small/product-1.jpg') }}">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <a href="product.html">Product Short Name</a>
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
                            </div><!-- End .product-column -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-sm-6 col-md-4 pb-4 pb-md-0">
                            <div class="product-column">
                                <h3 class="section-sub-title ls-n-20">Best Selling Products</h3>

                                <div class="product-default left-details product-widget mb-3">
                                    <figure>
                                        <a href="product.html">
                                            <img src="{{ asset('assets/frontend/assets/images/products/home-featured-1.jpg') }}">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <a href="product.html">Product Short Name</a>
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
                                <div class="product-default left-details product-widget mb-3">
                                    <figure>
                                        <a href="product.html">
                                            <img src="{{ asset('assets/frontend/assets/images/products/home-featured-2.jpg') }}">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <a href="product.html">Product Short Name</a>
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
                                <div class="product-default left-details product-widget mb-3">
                                    <figure>
                                        <a href="product.html">
                                            <img src="{{ asset('assets/frontend/assets/images/products/home-featured-5.jpg') }}">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <a href="product.html">Product Short Name</a>
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
                            </div><!-- End .product-column -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-sm-6 col-md-4 pb-4 pb-md-0">
                            <div class="product-column">
                                <h3 class="section-sub-title ls-n-20">Latest Products</h3>

                                <div class="product-default left-details product-widget mb-3">
                                    <figure>
                                        <a href="product.html">
                                            <img src="{{ asset('assets/frontend/assets/images/products/home-featured-4.jpg') }}">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <a href="product.html">Product Short Name</a>
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
                                <div class="product-default left-details product-widget mb-3">
                                    <figure>
                                        <a href="product.html">
                                            <img src="{{ asset('assets/frontend/assets/images/products/small/product-1.jpg') }}">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <a href="product.html">Product Short Name</a>
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
                                <div class="product-default left-details product-widget mb-3">
                                    <figure>
                                        <a href="product.html">
                                            <img src="{{ asset('assets/frontend/assets/images/products/home-featured-3.jpg') }}">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <a href="product.html">Product Short Name</a>
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
                            </div><!-- End .product-column -->
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .row -->

                    <hr class="mt-1 mb-4">

                    <div class="feature-boxes-container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="feature-box px-sm-3 feature-box-simple text-center">
                                    <i class="icon-earphones-alt"></i>

                                    <div class="feature-box-content">
                                        <h3 class="m-b-1">Customer Support</h3>
                                        <h5 class="m-b-3">Need Assistance?</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                    </div><!-- End .feature-box-content -->
                                </div><!-- End .feature-box -->
                            </div><!-- End .col-md-4 -->

                            <div class="col-md-4">
                                <div class="feature-box px-sm-3 feature-box-simple text-center">
                                    <i class="icon-credit-card"></i>

                                    <div class="feature-box-content">
                                        <h3 class="m-b-1">Secured Payment</h3>
                                        <h5 class="m-b-3">Safe & Fast</h5>

                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                    </div><!-- End .feature-box-content -->
                                </div><!-- End .feature-box -->
                            </div><!-- End .col-md-4 -->

                            <div class="col-md-4">
                                <div class="feature-box px-sm-3 feature-box-simple text-center">
                                    <i class="icon-action-undo"></i>

                                    <div class="feature-box-content">
                                        <h3 class="m-b-1">Returns</h3>
                                        <h5 class="m-b-3">Easy & Free</h5>

                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                    </div><!-- End .feature-box-content -->
                                </div><!-- End .feature-box -->
                            </div><!-- End .col-md-4 -->
                        </div><!-- End .row -->
                    </div><!-- End .feature-boxes-container -->
                </div><!-- End .col-lg-9 -->

                <div class="sidebar-overlay"></div>
                <div class="sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
                @include('Site.App.sidebar')
            </div><!-- End .row -->
        </div><!-- End .container -->
    </main><!-- End .main -->
@endsection
