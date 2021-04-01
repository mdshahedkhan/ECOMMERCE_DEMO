@extends('Site.App.App')
@push('title', 'All Products')
@section('nav-bar')
    @include('Site.App.nav-bar', $category)
@endsection
@section('content')
    <main class="main">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:avoid(0)">Men</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Accessories</li>
                </ol>
            </nav>

            <nav class="toolbox">
                <div class="toolbox-left">
                    <div class="toolbox-item toolbox-sort">
                        <label>Sort By:</label>

                        <div class="select-custom">
                            <select name="orderby" class="form-control">
                                <option value="menu_order" selected="selected">Default sorting</option>
                                <option value="popularity">Sort by popularity</option>
                                <option value="rating">Sort by average rating</option>
                                <option value="date">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </div><!-- End .select-custom -->


                    </div><!-- End .toolbox-item -->
                </div><!-- End .toolbox-left -->

                <div class="toolbox-right">
                    <div class="toolbox-item toolbox-show">
                        <label>Show:</label>

                        <div class="select-custom">
                            <select name="count" class="form-control">
                                <option value="12">12</option>
                                <option value="24">24</option>
                                <option value="36">36</option>
                            </select>
                        </div><!-- End .select-custom -->
                    </div><!-- End .toolbox-item -->

                    <div class="toolbox-item layout-modes">
                        <a href="javascript:avoid(0)" class="layout-btn btn-grid active" title="Grid">
                            <i class="icon-mode-grid"></i>
                        </a>
                        <a href="javascript:avoid(0)" class="layout-btn btn-list" title="List">
                            <i class="icon-mode-list"></i>
                        </a>
                    </div><!-- End .layout-modes -->
                </div><!-- End .toolbox-right -->
            </nav>

            <div class="row" id="DataAppend">

            </div><!-- End .row -->


        </div><!-- End .container -->

        <div class="mb-3"></div><!-- margin -->
    </main><!-- End .main -->
@endsection
@push('JS')
    <script>
        Load_More_Data();

        function Load_More_Data(id = '') {
            $.ajax({
                url: '{{ route('Load_More_Data') }}',
                method: "POST",
                data: { id: id },
                success: function (data) {
                    $('.loading-overlay').hide();
                    $('#LoadMoreBtn').remove();
                    $('#DataAppend').append(data);
                }
            });
        }

        $(document).on('click', '#LoadMoreBtn', function () {
            $('.loading-overlay').show();
            let id = $(this).data('id');
            Load_More_Data(id)
            $(this).html('Loading...').attr('disabled', true);
        });

    </script>
@endpush
