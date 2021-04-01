<div class="product-single-container product-single-default product-quick-view" id="ViewsQuick">
    <div class="row row-sparse">
        <div class="col-lg-6 product-single-gallery">
            <div class="product-slider-container">
                <div class="product-single-carousel owl-carousel owl-theme">
                    @php($Product_image = [$QuickView->thumbnail])
                    @foreach(json_decode($QuickView->image) as $image)
                        @php(array_push($Product_image, $image))
                    @endforeach
                    @foreach($Product_image as $images)
                        <div class="product-item">
                            <img class="product-single-image" src="{{ asset('uploads/product/'.$images) }}"  data-zoom-image="{{ asset('uploads/product/'.$images) }}" alt="{{ $QuickView->name }}"/>
                        </div>
                    @endforeach
                </div>
                <!-- End .product-single-carousel -->
            </div>
            <div class="prod-thumbnail owl-dots" id='carousel-custom-dots'>
                @foreach($Product_image as $images)
                    <div class="owl-dot">
                        <img src="{{ asset('uploads/product/'.$images) }}" alt="{{ $QuickView->name }}"/>
                    </div>
                @endforeach
            </div>
        </div><!-- End .product-single-gallery -->

        <div class="col-lg-6 product-single-details">
            <h1 class="product-title">{{ $QuickView->name }}</h1>

            <div class="ratings-container">
                <div class="product-ratings">
                    <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                </div><!-- End .product-ratings -->

                <a href="#" class="rating-link">( 6 Reviews )</a>
            </div><!-- End .product-container -->

            <div class="price-box">
                @php($special_price = false)
                @if($QuickView->special_price_form == date('Y-m-d') && $QuickView->special_price_to == date('Y-m-d'))
                    @php($special_price = true)
                @endif
                @if($special_price)
                    <span class="old-price">{{ $QuickView->selling_price }}</span>
                    <span class="product-price">{{ $QuickView->special_price }}</span>
                @else
                    <span class="product-price">{{ $QuickView->selling_price }}</span>
                @endif
            </div><!-- End .price-box -->

            <div class="product-desc">
                <p>{{ $QuickView->description }}</p>
            </div><!-- End .product-desc -->

            <div class="product-filters-container">
                <div class="product-single-filter">
                    <label>Colors:</label>
                    <ul class="config-swatch-list">
                        <li class="active">
                            <a href="#" style="background-color: #0188cc;"></a>
                        </li>
                        <li>
                            <a href="#" style="background-color: #ab6e6e;"></a>
                        </li>
                        <li>
                            <a href="#" style="background-color: #ddb577;"></a>
                        </li>
                        <li>
                            <a href="#" style="background-color: #6085a5;"></a>
                        </li>
                    </ul>
                </div><!-- End .product-single-filter -->
            </div><!-- End .product-filters-container -->

            <hr class="divider">

            <div class="product-action">
                <div class="product-single-qty">
                    <input class="horizontal-quantity form-control" type="text">
                </div><!-- End .product-single-qty -->

                <a href="https://www.portotheme.com/html/porto_ecommerce/demo_6/ajax/cart.html" class="btn btn-dark add-cart" title="Add to Cart">Add to Cart</a>
            </div><!-- End .product-action -->

            <hr class="divider">

            <div class="product-single-share">
                <label class="sr-only">Share:</label>

                <!-- www.addthis.com share plugin-->
                <div class="addthis_inline_share_toolbox"></div>

                <a href="#" class="add-wishlist" title="Add to Wishlist">Add to Wishlist</a>
            </div><!-- End .product single-share -->
        </div><!-- End .product-single-details -->
    </div><!-- End .row -->
</div><!-- End .product-single-container -->
