<div class="sticky-wrapper">
    <div class="header-bottom sticky-header d-none d-lg-block">
        <div class="container">
            <nav class="main-nav w-100">
                <ul class="menu sf-js-enabled sf-arrows" style="touch-action: pan-y;">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="">
                        <a href="#" class="sf-with-ul">Categories</a>
                        <ul style="display: none;">
                            @foreach($category as $categories)
                                <li>
                                    <a href="{{ route('products.products', [$categories->slug, $categories->slug]) }}" class="sf-with-ul">{{ $categories->name }}</a>
                                    @if(count($categories->sub_category) > 0)
                                        <ul style="display: none;">
                                            @foreach($categories->sub_category as $sub_2)
                                                <li><a href="{{ route('products.products', [$categories->slug, $sub_2->slug]) }}">{{ $sub_2->name }}</a></li>
                                                @if(count($sub_2->sub_category) > 0)
                                                    <ul style="display: none">
                                                        @foreach($sub_2->sub_category as $sub_3)
                                                            <a href="">{{ $sub_3->name }}</a>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="javascript:avoid(0);">Blog</a></li>
                    <li><a href="javascript:avoid(0);">Contact</a></li>
                    <li class="float-right"><a href="https://1.envato.market/DdLk5" target="_blank">Buy Porto!<span class="tip tip-new tip-top">New</span></a></li>
                    <li class="float-right"><a href="#">Special Offer!</a></li>
                </ul>
            </nav>
        </div><!-- End .container -->
    </div>
</div>
