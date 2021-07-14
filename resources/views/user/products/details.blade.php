@extends('layouts.user')

@section('title', 'Trang chi tiết')

@section('css-lib')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/product_responsive.css') }}">
@endsection

@section('css')

@endsection

@section('content')
    <!-- Single Product -->

    <div class="single_product">
        <div class="container">
            <div class="row">

                <!-- Selected Image -->
                <div class="col-lg-7 order-lg-2 order-1">
                    <div class="image_selected"><img src="{{ asset('storage/uploads/' . $product->image) }}" alt=""></div>
                </div>

                <!-- Description -->
                <div class="col-lg-5 order-3">
                    <div class="product_description">
                        <div class="product_category">{{ $product->categories[0]->title }}</div>
                        <div class="product_name">{{ $product->title }}</div>
                        <div class="product_text">
                            <p>{!! $product->summary !!}</p>
                        </div>
                        <div class="order_info d-flex flex-row">
                            <form action="#">
                                <div>
                                    <span
                                        style="line-height: 50px; font-size: 18px; color: {{ $product->quantity > 0 ? '#27ae60' : '#f9495f' }}">
                                        <i class="fa fa-circle" style="font-size: 14px; margin-right: 9px;"></i>
                                        {{ $product->quantity > 0 ? 'Còn hàng' : 'Hết hàng' }}
                                    </span>
                                </div>
                                <div style="display: {{ $product->quantity > 0 ? 'block' : 'none' }}">
{{--                                    <div class="clearfix" style="z-index: 1000;">--}}
{{--                                        <div class="product_quantity clearfix">--}}
{{--                                            <span>Số lượng: </span>--}}
{{--                                            <input id="quantity_input" type="text" pattern="[0-9]*" value="1">--}}
{{--                                            <div class="quantity_buttons">--}}
{{--                                                <div id="quantity_inc_button" class="quantity_inc quantity_control"><i--}}
{{--                                                        class="fas fa-chevron-up"></i>--}}
{{--                                                </div>--}}
{{--                                                <div id="quantity_dec_button" class="quantity_dec quantity_control"><i--}}
{{--                                                        class="fas fa-chevron-down"></i>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    @if ($product->price != 0)
                                        <div class="product_price_container">
                                            @if ($product->discount != 0)
                                                <div class="product_price_discount">
                                                    {{ formatNumber($product->price) }} đ</div>
                                            @endif
                                            <div class="product_price">{{ calculatePriceAfterDiscount($product->price, $product->discount) }} đ</div>
                                        </div>

                                        <div class="button_container">
                                            <a href="{{ route('user.cart.add', ['id' => $product->id]) }}" class="btn btn-primary">
                                                    Thêm vào giỏ hàng
                                            </a>
                                        </div>
                                    @else
                                        <div class="product_price_container">
                                            <div class="product_price">Liên hệ</div>
                                        </div>
                                    @endif
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js-lib')
    <script src="{{ asset('js/product_custom.js') }}"></script>
@endsection

@section('js')

@endsection
