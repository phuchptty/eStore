@extends('layouts.user')

@section('title', 'Trang sản phẩm')

@section('css-lib')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/slick-1.8.0/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/shop_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/shop_responsive.css') }}">
@endsection

@section('css')

@endsection

@section('content')
    <!-- Home -->

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll"
             data-image-src="{{ asset('images/shop_background.jpg') }}"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">{{ $category->title }}</h2>
        </div>
    </div>

    <!-- Shop -->

    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                    <!-- Shop Sidebar -->
                    <div class="shop_sidebar">
                        <div class="sidebar_section">
                            <div class="sidebar_title">Danh mục</div>
                            <ul class="sidebar_categories">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('user.product.category', ['id' => $category->id]) }}">{{ $category->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="sidebar_section filter_by_section">
                            <form action="{{ route('user.product.category', ['id' => $category->id]) }}" method="GET">
                                @csrf
                                <div class="sidebar_title">Lọc theo</div>

                                <div class="sidebar_subtitle">Khoảng giá</div>
                                <hr>
                                <input type="radio" id="u10" name="priceFilter" value="u10"
                                       @if(request()->priceFilter == 'u10') checked @endif>
                                <label for="u10"> Dưới 10 triệu</label><br>
                                <input type="radio" id="f10t15" name="priceFilter" value="10-15"
                                       @if(request()->priceFilter == '10-15') checked @endif>
                                <label for="f10t15"> 10 triệu - 15 triệu</label><br>
                                <input type="radio" id="f15t20" name="priceFilter" value="15-20"
                                       @if(request()->priceFilter == '15-20') checked @endif>
                                <label for="f15t20"> 15 triệu - 20 triệu</label><br>
                                <input type="radio" id="f20t25" name="priceFilter" value="20-25"
                                       @if(request()->priceFilter == '20-25') checked @endif>
                                <label for="f20t25"> 20 triệu - 25 triệu</label><br>
                                <input type="radio" id="f25t30" name="priceFilter" value="25-30"
                                       @if(request()->priceFilter == '25-30') checked @endif>
                                <label for="f25t30"> 25 triệu - 30 triệu</label><br>
                                <input type="radio" id="o30" name="priceFilter" value="o30"
                                       @if(request()->priceFilter == 'o30') checked @endif>
                                <label for="o30"> Trên 30 triệu</label><br>

                                <button type="submit" class="btn btn-primary w-100 mb-3 mt-3">Lọc</button>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="col-lg-9">

                    <!-- Shop Content -->

                    <div class="shop_content">
                        <div class="shop_bar clearfix">
                            <div class="shop_product_count"><span>{{ count($products) }}</span> sản phẩm được tìm thấy
                            </div>
                        </div>

                        <div class="product_grid">
                            <div class="product_grid_border"></div>
                        @foreach ($products as $product)
                            <!-- Product Item -->

                                <div class="product_item @if($product->discount != 0) discount @endif is_new">
                                    <div class="product_border"></div>
                                    <div
                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                        <img
                                            src="{{ $product->image }}" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">
                                            @if($product->price != 0)
                                                <div>
                                                    @if($product->discount != 0)
                                                        <span>{{ formatNumber($product->price) }} đ</span>
                                                    @else
                                                        &nbsp;
                                                    @endif
                                                </div>
                                                {{ calculatePriceAfterDiscount($product->price, $product->discount) }}đ
                                            @else
                                                <div>&nbsp;</div>
                                                Liên hệ
                                            @endif
                                        </div>
                                        <div class="product_name">
                                            <div>
                                                <a href="{{ route('user.product.detail', ['id' => $product->id]) }}"
                                                   tabindex="0">{{ $product->title }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">
                                            -{{ formatNumber($product->discount) }}%
                                        </li>
                                        <li class="product_mark product_new">mới</li>
                                    </ul>
                                </div>
                            @endforeach

                        </div>

                        {!! $products->links() !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Recently Viewed -->

        @if(count($recentlyViewed) > 0)
            <div class="viewed">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="viewed_title_container">
                                <h3 class="viewed_title">Đã xem gần đây</h3>
                                <div class="viewed_nav_container">
                                    <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                                    <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                                </div>
                            </div>

                            <div class="viewed_slider_container">

                                <!-- Recently Viewed Slider -->

                                <div class="owl-carousel owl-theme viewed_slider">
                                    <!-- Recently Viewed Item -->
                                    @foreach ($recentlyViewed as $product)
                                        <div class="owl-item">
                                            <div
                                                class="viewed_item is_new discount d-flex flex-column align-items-center justify-content-center text-center">
                                                <div class="viewed_image"><img
                                                        src="{{ $product->image }}" alt="">
                                                </div>
                                                <div class="viewed_content text-center">

                                                    <div class="viewed_price">
                                                        @if($product->discount > 0)
                                                            <span>{{ formatNumber($product->price) }} đ</span>
                                                        @else
                                                            &nbsp;
                                                        @endif
                                                    </div>

                                                    <div class="viewed_price">
                                                        {{ calculatePriceAfterDiscount($product->price, $product->discount) }}
                                                        đ
                                                    </div>
                                                    <div class="viewed_name"><a
                                                            href="{{ route('user.product.detail', ['id' => $product->id]) }}">{{ $product->title }}</a>
                                                    </div>
                                                </div>
                                                <ul class="item_marks">
                                                    @if($product->discount > 0)
                                                        <li class="item_mark item_discount">
                                                            -{{ formatNumber($product->discount) }}%
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
@endsection

@section('js-lib')
    <script src="{{ asset('js/shop_custom.js') }}"></script>
@endsection

@section('js')

@endsection
