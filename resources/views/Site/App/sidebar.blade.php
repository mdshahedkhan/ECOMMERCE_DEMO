<aside class="sidebar-home col-lg-3 order-lg-first mobile-sidebar">
    <div class="side-menu-wrapper text-uppercase mb-2 d-none d-lg-block">
        <h2 class="side-menu-title bg-gray ls-n-25">Browse Categories</h2>

        <nav class="side-nav">
            {!! Site_Category($Categories) !!}
        </nav>
    </div><!-- End .side-menu-container -->

    <div class="widget widget-banners px-5 pb-3 text-center">
        <div class="owl-carousel owl-theme">
            <div class="banner d-flex flex-column align-items-center">
                <h3 class="badge-sale bg-primary d-flex flex-column align-items-center justify-content-center text-uppercase"><em class="pt-3 ls-0">Sale</em>Many Item</h3>
                <h4 class="sale-text font1 text-uppercase m-b-3">45<sup>%</sup><sub>off</sub></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <a href="#" class="btn btn-dark btn-md font1">View Sale</a>
            </div><!-- End .banner -->

            <div class="banner d-flex flex-column align-items-center">
                <h3 class="badge-sale bg-primary d-flex flex-column align-items-center justify-content-center text-uppercase"><em class="pt-3 ls-0">Sale</em>Many Item</h3>
                <h4 class="sale-text font1 text-uppercase m-b-3">45<sup>%</sup><sub>off</sub></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <a href="#" class="btn btn-dark btn-md font1">View Sale</a>
            </div><!-- End .banner -->

            <div class="banner d-flex flex-column align-items-center">
                <h3 class="badge-sale bg-primary d-flex flex-column align-items-center justify-content-center text-uppercase"><em class="pt-3 ls-0">Sale</em>Many Item</h3>
                <h4 class="sale-text font1 text-uppercase m-b-3">45<sup>%</sup><sub>off</sub></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <a href="#" class="btn btn-dark btn-md font1">View Sale</a>
            </div><!-- End .banner -->
        </div><!-- End .banner-slider -->
    </div><!-- End .widget -->

    <div class="widget widget-newsletters bg-gray text-center">
        <h3 class="widget-title text-uppercase">Subscribe Newsletter</h3>
        <p class="mb-2">Get all the latest information on Events, Sales and Offers. </p>
        <form action="{{ route('Subscriber') }}" method="post">
            <div class="form-group position-relative sicon-envolope-letter">
                @csrf
                <input type="email" class="form-control is-invalid @error('email') is-invalid @enderror" name="email" placeholder="Email address">
            </div><!-- Endd .form-group -->
            <input type="submit" class="btn btn-primary btn-md" value="Subscribe">
        </form>
    </div><!-- End .widget -->
</aside><!-- End .col-lg-3 -->
