@extends('layouts.admin')

@section('title', 'Danh sách sản phẩm')

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
                            <a href="{{ route('admin.product.store') }}" class="button product_button_create">Thêm sản
                                phẩm</a>
                        </div>
                    </div>

                    @if(count($products) > 0)
                        <div class="product_items">
                            <ul class="product_list">
                                @foreach($products as $product)
                                <li class="product_item clearfix">
                                    <div class="product_item_image"><img src="{{ asset('storage/uploads/' . $product->image) }}"
                                            alt="">
                                    </div>
                                    <div class="product_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="product_item_name product_info_col" style="width: 35%; overflow: hidden; white-space: nowrap;">
                                            <div class="product_item_title">Tên sản phẩm</div>
                                            <div class="product_item_text">{{ $product->title }}</div>
                                        </div>

                                        <div class="product_item_name product_info_col" style="width: 25%; overflow: hidden; white-space: nowrap;">
                                            <div class="product_item_title">Danh mục</div>
                                            <div class="product_item_text">{{ $product->categories[0]->title }}</div>
                                        </div>

                                        <div class="product_item_price product_info_col" style="width: 15%">
                                            <div class="product_item_title">Giá</div>
                                            <div class="product_item_text">{{ formatNumber($product->price) }} đ</div>
                                        </div>

                                        <div class="product_item_quantity product_info_col" style="width: 10%">
                                            <div class="product_item_title">Số lượng</div>
                                            <div class="product_item_text">{{ $product->quantity }}</div>
                                        </div>

                                        <div class="product_item_total product_info_col" style="width: 15%">
                                            <div class="product_item_title">Chức năng</div>
                                            <div class="product_item_text">
                                                <a class="button product_button_update"
                                                    href="{{ route('admin.product.edit', ['id' => $product->id]) }}"><i class="fas fa-wrench"></i></a>
                                                <a class="button product_button_delete"
                                                    href="{{ route('admin.product.destroy', ['id' => $product->id]) }}"><i class="far fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                {!! $products->links() !!}
                            </div>
                        </div>
                    @endif
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
