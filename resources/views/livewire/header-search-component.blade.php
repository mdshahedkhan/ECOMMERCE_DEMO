<div class="header-search header-icon header-search-inline header-search-category w-lg-max mr-lg-4">
    <a href="#" class="search-toggle" role="button"><i class="icon-search-3">{{ str_split($Product_Category, 12)[0] }}</i></a>
    <form action="#" method="get">
        <div class="header-search-wrapper">
            <input type="search" class="form-control" name="search" id="search_product" placeholder="Search..." required>
            <input type="hidden" class="form-control" name="product_category" id="search_product" value="{{ $Product_Category }}" placeholder="Search..." required>
            <input type="hidden" class="form-control" name="product_category_id" id="search_product" value="{{ $Product_Category_id }}" placeholder="Search..." required>
            <div class="select-custom">
                <select id="cat" name="cat">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" data-id="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div><!-- End .select-custom -->
            <button class="btn p-0 icon-search-3" type="submit"></button>
        </div><!-- End .header-search-wrapper -->
        <div class="search_result d-none d-lg-block">
        </div>
    </form>
</div>
