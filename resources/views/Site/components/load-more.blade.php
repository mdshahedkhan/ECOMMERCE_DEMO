@if($data->isEmpty())
    <p>Product Notfound</p>
@else
    @php
        $i=0;
    @endphp
    @foreach($data as $items)
        <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
            <div class="product-default inner-quickview inner-icon">
                <figure>
                    <a href="{{ route('products.SingleProduct', [$items->slug]) }}">
                        <img style="width: 200px; height: 200px" src="{{ asset('uploads/product/'.$items->thumbnail) }}" alt="{{ $items->name }}">
                    </a>
                    @php
                        $sp_price = false;
                    if($items->special_price_form <= date('Y-m-d') && $items->special_price_to >= date('Y-m-d')){
                        $sp_price = true;
                    }
                    @endphp
                    @if($sp_price)
                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                            <div class="product-label label-sale">-{{ sprintf('%.2f', (($items->selling_price-$items->special_price)/$items->selling_price)*100) }}%</div>
                        </div>
                    @endif
                    <div class="btn-icon-group">
                        <button class="btn-icon btn-add-cart addCart" data-url="{{ route('cart.add') }}" data-slug="{{ $items->slug }}"><i class="icon-shopping-cart"></i></button>
                    </div>
                    <a href="{{ route('QuickViewProduct', [$items->slug]) }}" class="btn-quickview" title="Quick View">Quick View</a>
                </figure>
                <div class="product-details">
                    <div class="category-wrap">
                        <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                    </div>
                    <h2 class="product-title">
                        <a href="{{ route('products.SingleProduct', [$items->slug]) }}">{{ $items->name }}</a>
                    </h2>
                    <div class="ratings-container">
                        <div class="product-ratings">
                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                            <span class="tooltiptext tooltip-top"></span>
                        </div><!-- End .product-ratings -->
                    </div><!-- End .product-container -->
                    <div class="price-box">
                        @if($sp_price)
                            <span class="old-price">{{ $items->selling_price }}</span>
                            <span class="product-price">{{ $items->special_price }}</span>
                        @else
                            <span class="product-price">{{ $items->selling_price }}</span>
                        @endif
                    </div><!-- End .price-box -->
                </div><!-- End .product-details -->
            </div>
        </div><!-- End .col-xl-2 -->
        @php($last_id = $items->id)
        @php($i++)
    @endforeach
    @if($i > 9)
        <button class="btn btn-primary btn-sm" id="LoadMoreBtn" data-id="{{ $last_id }}" style="border-radius: 3px; margin-left: 540px;">Load More</button>
    @else
        <h3 style="margin-top: 350px; color: #c0392b">No More Product</h3>
    @endif
@endif
