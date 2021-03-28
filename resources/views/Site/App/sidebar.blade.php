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
        <form action="#">
            <div class="form-group position-relative sicon-envolope-letter">
                <input type="email" class="form-control" name="newsletter-email" placeholder="Email address">
            </div><!-- Endd .form-group -->
            <input type="submit" class="btn btn-primary btn-md" value="Subscribe">
        </form>
    </div><!-- End .widget -->

    <div class="widget widget-testimonials">
        <div class="owl-carousel owl-theme dots-left">
            <div class="testimonial">
                <div class="testimonial-owner">
                    <figure>
                        <img src="{{ asset('assets/frontend/assets/images/clients/client-1.jpg') }}" alt="client">
                    </figure>

                    <div>
                        <h4 class="testimonial-title">john Smith</h4>
                        <span>CEO &amp; Founder</span>
                    </div>
                </div><!-- End .testimonial-owner -->

                <blockquote class="ml-4 pr-0">
                    <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.</p>
                </blockquote>
            </div><!-- End .testimonial -->

            <div class="testimonial">
                <div class="testimonial-owner">
                    <figure>
                        <img src="{{ asset('assets/frontend/assets/images/clients/client-2.jpg') }}" alt="client">
                    </figure>

                    <div>
                        <h4 class="testimonial-title">Dae Smith</h4>
                        <span>CEO &amp; Founder</span>
                    </div>
                </div><!-- End .testimonial-owner -->

                <blockquote class="ml-4 pr-0">
                    <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.</p>
                </blockquote>
            </div><!-- End .testimonial -->

            <div class="testimonial">
                <div class="testimonial-owner">
                    <figure>
                        <img src="{{ asset('assets/frontend/assets/images/clients/client-3.jpg') }}" alt="client">
                    </figure>

                    <div>
                        <h4 class="testimonial-title">John Doe</h4>
                        <span>CEO &amp; Founder</span>
                    </div>
                </div><!-- End .testimonial-owner -->

                <blockquote class="ml-4 pr-0">
                    <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.</p>
                </blockquote>
            </div><!-- End .testimonial -->
        </div><!-- End .testimonials-slider -->
    </div><!-- End .widget -->

    <div class="widget widget-posts post-date-in-media">
        <div class="owl-carousel owl-theme dots-left dots-m-0" data-owl-options="{
								'margin': 20
							}">
            <article class="post">
                <div class="post-media">
                    <a href="single.html">
                        <img src="{{ asset('assets/frontend/assets/images/blog/home/post-1.jpg') }}" alt="Post">
                    </a>
                    <div class="post-date">
                        <span class="day">29</span>
                        <span class="month">Jun</span>
                    </div><!-- End .post-date -->
                </div><!-- End .post-media -->

                <div class="post-body">
                    <h2 class="post-title m-b-2">
                        <a href="single.html">Fashion Trends</a>
                    </h2>

                    <div class="post-content">
                        <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per incep tos himens.</p>

                        <a href="single.html" class="read-more">read more <i class="icon-right-open"></i></a>
                    </div><!-- End .post-content -->
                </div><!-- End .post-body -->
            </article>

            <article class="post">
                <div class="post-media">
                    <a href="single.html">
                        <img src="{{ asset('assets/frontend/assets/images/blog/home/post-2.jpg') }}" alt="Post">
                    </a>
                    <div class="post-date">
                        <span class="day">29</span>
                        <span class="month">Jun</span>
                    </div><!-- End .post-date -->
                </div><!-- End .post-media -->

                <div class="post-body">
                    <h2 class="post-title m-b-2">
                        <a href="single.html">Fashion Trends</a>
                    </h2>

                    <div class="post-content">
                        <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per incep tos himens.</p>

                        <a href="single.html" class="read-more">read more <i class="icon-right-open"></i></a>
                    </div><!-- End .post-content -->
                </div><!-- End .post-body -->
            </article>

            <article class="post">
                <div class="post-media">
                    <a href="single.html">
                        <img src="{{ asset('assets/frontend/assets/images/blog/home/post-3.jpg') }}" alt="Post">
                    </a>
                    <div class="post-date">
                        <span class="day">29</span>
                        <span class="month">Jun</span>
                    </div><!-- End .post-date -->
                </div><!-- End .post-media -->

                <div class="post-body">
                    <h2 class="post-title m-b-2">
                        <a href="single.html">Fashion Trends</a>
                    </h2>

                    <div class="post-content">
                        <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per incep tos himens.</p>

                        <a href="single.html" class="read-more">read more <i class="icon-right-open"></i></a>
                    </div><!-- End .post-content -->
                </div><!-- End .post-body -->
            </article>
        </div><!-- End .posts-slider -->
    </div><!-- End .widget -->
</aside><!-- End .col-lg-3 -->
