@extends('layouts.admin')

@section('title', 'Trang chủ')

@section('css-lib')
    <link rel="stylesheet" href="{{ asset('css/admin/product/product.css') }}">
@endsection

@section('css')

@endsection

@section('content')
    <div class="product_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_container">
                        <div class="product_title">
                            <div>
                                Danh mục sản phẩm
                            </div>
                            <div>
                                <a href="{{ route('admin.product.store') }}" class="button product_button_create">Thêm sản phẩm</a>
                            </div>
                        </div>

                        <div class="product_items">
                            @for ($i = 1; $i <= 5; $i++)
                                <ul class="product_list">
                                    <li class="product_item clearfix">
                                        <div class="product_item_image"><img src="{{ asset('images/shopping_cart.jpg') }}" alt="">
                                        </div>
                                        <div class="product_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="product_item_name product_info_col">
                                                <div class="product_item_title">Tên sản phẩm</div>
                                                <div class="product_item_text">MacBook Air 13</div>
                                            </div>
                                            <div class="product_item_color product_info_col">
                                                <div class="product_item_title">Màu sắc</div>
                                                <div class="product_item_text"><span
                                                        style="background-color:#999999;"></span>Silver</div>
                                            </div>
                                            <div class="product_item_quantity product_info_col">
                                                <div class="product_item_title">Số lượng</div>
                                                <div class="product_item_text">1</div>
                                            </div>
                                            <div class="product_item_price product_info_col">
                                                <div class="product_item_title">Giá</div>
                                                <div class="product_item_text">$2000</div>
                                            </div>
                                            <div class="product_item_total product_info_col">
                                                <div class="product_item_title">Chức năng</div>
                                                <div class="product_item_text">
                                                    <a class="button product_button_update" href="{{ route('admin.category.edit', ['id' => '1']) }}" >Cập nhật</a>
                                                    <a class="button product_button_delete" href="{{ route('admin.category.destroy', ['id' => '1']) }}">Xóa</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            @endfor
                        </div>
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                Phân trang
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-lib')

@endsection

@section('js')

@endsection
