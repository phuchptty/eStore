@extends('layouts.user')

@section('title', 'Trang chủ')

@section('css-lib')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/slick-1.8.0/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
@endsection

@section('css')
@endsection

@section('content')
    <!-- Banner -->

    <div class="banner">
        <div class="banner_background"
            style="background-image:url(https://mediaonlinevn.com/wp-content/uploads/2020/06/200629-asus-rog-zephyrus-g14-03_resize.jpg)">
        </div>
        <div class="container fill_height">
            <div class="row fill_height">
                <div class="banner_product_image">
                    {{-- <img src="{{ asset('storage/uploads/' . $banner1->image) }}" alt=""> --}}
                </div>
                <div class="col-lg-5 offset-lg-4 fill_height">
                    <div class="banner_content">
                        <h1 class="banner_text">new era of smartphones</h1>
                        <div class="banner_price">
                            <span>47.499.000 đ</span><br>47.499.000 đ
                        </div>
                        <div class="banner_product_name">{{ $banner1->title }}</div>
                        <div class="button banner_button"><a href="#">Xem ngay</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Characteristics -->

    <div class="characteristics">
        <div class="container">
            <div class="row">

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('images/char_1.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Giao hàng nhanh trên toàn quốc</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('images/char_2.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Hoàn tiền 200% nếu có hàng giả</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('images/char_3.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Hỗ trợ trả góp 0%, trả trước 0đ</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('images/char_4.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Giảm giá hấp dẫn từ 30%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner -->

    <div class="banner_2">
        <div class="banner_2_background" style="background-image:url(images/banner_2_background.jpg)"></div>
        <div class="banner_2_container">
            <div class="banner_2_dots"></div>
            <!-- Banner 2 Slider -->

            <div class="owl-carousel owl-theme banner_2_slider">

                <!-- Banner 2 Slider Item -->

                @foreach ($banner2 as $banner)
                    <div class="owl-item">
                        <div class="banner_2_item">
                            <div class="container fill_height">
                                <div class="row fill_height">
                                    <div class="col-lg-4 col-md-6 fill_height">
                                        <div class="banner_2_content">
                                            <div class="banner_2_category">Laptops</div>
                                            <div class="banner_2_title">{{ $banner->title }}</div>
                                            <div class="banner_2_text">{!! $banner->summary !!}</div>
                                            <div class="button banner_2_button"><a
                                                    href="{{ route('user.product.detail', ['id' => $banner->id]) }}">Khám
                                                    phá</a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-6 fill_height">
                                        <div class="banner_2_image_container">
                                            <div class="banner_2_image"><img
                                                    src="{{ asset('storage/uploads/' . $banner->image) }}" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- Hot New Arrivals -->

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="new_arrivals_title">Sản phẩm mới về</div>
                        <div class="tabs_line"></div>
                        <div class="row">
                            <div class="col-lg-12" style="z-index: 1;">
                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="arrivals_slider slider">
                                        <!-- Slider Item -->
                                        @foreach ($newProducts as $newProduct)
                                            <div class="arrivals_slider_item">
                                                <div class="border_active"></div>
                                                <div
                                                    class="product_item @if($newProduct->discount != 0) discount @endif is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div
                                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="{{ asset('storage/uploads/' . $newProduct->image) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="product_content">
                                                        <div class="product_price">
                                                            <div>
                                                                @if($newProduct->discount != 0)
                                                                <span>{{ formatNumber($newProduct->price) }} đ</span>
                                                                @else
                                                                &nbsp;
                                                                @endif
                                                            </div>
                                                            {{ calculatePriceAfterDiscount($newProduct->price, $newProduct->discount) }} đ
                                                        </div>
                                                        <div class="product_name">
                                                            <div>
                                                                <a href="{{ route('user.product.detail', ['id' => $newProduct->id]) }}">{{ $newProduct->title }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="product_extras">
                                                            <a href="{{ route('user.cart.add', ['id' => $newProduct->id]) }}">
                                                                <button class="product_cart_button"
                                                                    >Thêm vào giỏ hàng</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <ul class="product_marks">
                                                        @if($newProduct->discount != 0)
                                                            <li class="product_mark product_discount">-{{ formatNumber($newProduct->discount) }}%</li>
                                                        @endif
                                                        <li class="product_mark product_new">mới</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- End Slider Item -->
                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>
                                <!-- End Product Panel -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recently Viewed -->

    @if (count($recentlyViewed) > 0)
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
                                            class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="viewed_image"><img
                                                    src="{{ asset('storage/uploads/' . $product->image) }}" alt=""></div>
                                            <div class="viewed_content text-center">

                                                <div class="viewed_price">
                                                    @if ($product->discount > 0)
                                                        <span>{{ formatNumber($product->price) }} đ</span>
                                                    @else
                                                        &nbsp;
                                                    @endif
                                                </div>

                                                <div class="viewed_price">
                                                    {{ calculatePriceAfterDiscount($product->price, $product->discount) }} đ
                                                </div>
                                                <div class="viewed_name"><a
                                                        href="{{ route('user.product.detail', ['id' => $product->id]) }}">{{ $product->title }}</a>
                                                </div>
                                            </div>
                                            <ul class="item_marks">
                                                @if ($product->discount > 0)
                                                    <li class="item_mark item_discount">
                                                        -{{ formatNumber($product->discount) }}%</li>
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

    <!-- Brands -->

    <div class="brands">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brands_slider_container">

                        <!-- Brands Slider -->

                        <div class="owl-carousel owl-theme brands_slider">

                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('images/brands_1.jpg') }}" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('images/brands_2.jpg') }}" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('images/brands_3.jpg') }}" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('images/brands_4.jpg') }}" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('images/brands_5.jpg') }}" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('images/brands_6.jpg') }}" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('images/brands_7.jpg') }}" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('images/brands_8.jpg') }}" alt=""></div>
                            </div>

                        </div>

                        <!-- Brands Slider Navigation -->
                        <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-lib')
    <script src="{{ asset('plugins/slick-1.8.0/slick.js') }}"></script>
    <script src="{{ asset('plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection

@section('js')
@endsection
