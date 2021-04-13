@if(!Cart::isEmpty())
    <div class="dropdown-cart-header">
        <span>{{ Cart::getContent()->count() }} Items</span>

        <a href="" class="float-right">View Cart</a>
    </div><!-- End .dropdown-cart-header -->

    <div class="dropdown-cart-products">
        <div id="CheckOutItems">
            @foreach($CartItems as $items)
                <div class="product">
                    <div class="product-details">
                        <h4 class="product-title">
                            <a href="{{ route('products.SingleProduct', [$items->attributes->slug]) }}">{{ $items->name }}</a></h4>
                        <span class="cart-product-info">
                    <span class="cart-product-qty">{{ $items->quantity }}</span>x ${{ $items->price }}</span>
                    </div><!-- End .product-details -->
                    <figure class="product-image-container">
                        <a href="{{ route('products.SingleProduct', [$items->attributes->slug]) }}" class="product-image">
                            <img src="{{ asset('uploads/product/'.$items->attributes->thumbnail) }}" alt="{{ $items->name }}" style="width: 50px; height: 50px">
                        </a>
                        <a href="javascript:;" id="cartItemRemove" data-url="{{ route('cart.destroy') }}" data-id="{{ $items->id }}" class="btn-remove icon-cancel" title="Remove Product"></a>
                    </figure>
                </div><!-- End .product -->
            @endforeach
        </div>
    </div><!-- End .cart-product -->

    <div class="dropdown-cart-total">
        <span>Total</span>
        <span class="cart-total-price float-right">${{ Cart::getTotal() }}</span>
    </div><!-- End .dropdown-cart-total -->

    <div class="dropdown-cart-action">
        <a href="{{ route('cart.show') }}" class="btn btn-dark btn-block">Checkout</a>
    </div><!-- End .dropdown-cart-total -->
@else
    <h6 class="text-center">Your shopping bag is empty.
        <br>
        <a href="{{ route('products') }}" class="text-primary">Start shopping</a>
    </h6>
@endif
<script>
    $('#Items').text('{{ Cart::getContent()->count() }}');
</script>
