@if($products->isEmpty())
    <h4 class="text-center" style="margin-top: 250px; color: #5a555a">Product Not Found</h4>
@else
    <div class="row search-result" id="DataAppend">
        @php
            $i = 0;
        @endphp
        @foreach($products as $product)
            <div class="col-6 col-sm-4">
                <div class="product-default inner-quickview inner-icon">
                    <figure>
                        @php
                            $sp_price = false;
                        if($product->special_price_form <= date('Y-m-d') && $product->special_price_to >= date('Y-m-d')){
                            $sp_price = true;
                        }
                        @endphp
                        <a href="{{ route('products.SingleProduct', $product->slug) }}">
                            <img src="{{ asset('uploads/product/'.$product->thumbnail) }}" style="width: 300px; height: 220px" alt="{{ $product->name }}">
                        </a>
                        @if($sp_price)
                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
                                <div class="product-label label-sale">-{{ sprintf('%d', (($product->selling_price-$product->special_price)/$product->selling_price) * 100) }}%</div>
                            </div>
                        @endif

                        <div class="btn-icon-group">
                            <button data-url="{{ route('cart.add') }}" class="btn-icon btn-add-cart addCart" data-slug="{{ $product->slug }}"><i class="icon-shopping-cart"></i></button>
                            <button class="btn-icon btn-add-cart addCart" data-url="{{ route('cart.add') }}" data-slug="{{ $product->slug }}"><i class="icon-shopping-cart"></i></button>
                        </div>
                        <a href="{{ route('QuickViewProduct', [$product->slug]) }}" id="quickView" class="btn-quickview" title="Quick View">Quick View</a>
                    </figure>
                    <div class="product-details">
                        <div class="category-wrap">
                            <div class="category-list">
                                {{--<a href="category.html" class="product-category">category</a>--}}
                            </div>
                            <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                        </div>
                        <h2 class="product-title">
                            <a href="{{ route('products.SingleProduct', $product->slug) }}">{{ $product->name }}</a>
                        </h2>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div><!-- End .product-ratings -->
                        </div><!-- End .product-container -->
                        <div class="price-box">
                            @if(!$sp_price)
                                <span class="old-price">{{ $product->selling_price }}</span>
                                <span class="product-price">{{ $product->special_price }}</span>
                            @else
                                <span class="product-price">{{ $product->selling_price }}</span>
                            @endif
                        </div><!-- End .price-box -->
                    </div><!-- End .product-details -->
                </div>
            </div><!-- End .col-sm-4 -->
            @php($last_id = $product->id)
            @php($i++)
        @endforeach
        @if($i > 9)
            <button class="btn btn-primary btn-sm" id="LoadMoreBtn" data-id="{{ $last_id }}" style="border-radius: 3px; margin-left: 540px;">Load More</button>
        @else
            <h3 style="margin-top: 350px; color: #c0392b">No More Product</h3>
        @endif
    </div><!-- End .row -->

@endif
