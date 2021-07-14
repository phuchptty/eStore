@extends('layouts.user')

@section('title', 'Giỏ hàng')

@section('css-lib')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cart_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cart_responsive.css') }}">
@endsection

@section('css')

@endsection

@section('content')

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart_container">
                        <div class="cart_title">Giỏ hàng</div>
                        @php $total = 0; @endphp
                        @if (session('cart'))
                            <div class="cart_items">
                                <ul class="cart_list">
                                    @foreach (session('cart') as $id => $product)
                                        @php $total += $product['price'] * $product['quantity']; @endphp
                                        <li class="cart_item clearfix">
                                            <div class="cart_item_image"><img
                                                    src="{{ asset('storage/uploads/' . $product['image']) }}" alt="">
                                            </div>
                                            <div class="cart_item_info d-flex flex-md-row justify-content-between">
                                                <div class="cart_item_name product_info_col"
                                                    style="width: 25%; overflow: hidden; white-space: nowrap;">
                                                    <div class="cart_item_title">Tên sản phẩm</div>
                                                    <div class="cart_item_text">{{ $product['title'] }}</div>
                                                </div>
                                                <div class="cart_item_price product_info_col">
                                                    <div class="cart_item_title">Giá</div>
                                                    <div class="cart_item_text">{{ formatNumber($product['price']) }} đ
                                                    </div>
                                                </div>
                                                <div class="cart_item_quantity cart_info_col" sty>
                                                    <div class="cart_item_title">Số lượng</div>

                                                    <div class="cart_item_text">
                                                        <input type="number" class="text-center"
                                                            style="border: 1px solid #ced4da; border-radius: 0.25rem;"
                                                            min="1" max="100" id="quantity-input" name="quantity"
                                                            value="{{ $product['quantity'] }}">
                                                    </div>
                                                </div>
                                                <div class="cart_item_total cart_info_col">
                                                    <div class="cart_item_title">Tổng</div>
                                                    <div class="cart_item_text">
                                                        {{ formatNumber($product['price'] * $product['quantity']) }} đ
                                                    </div>
                                                </div>
                                                <div class="cart_buttons cart_info_col">
                                                    <div class="cart_item_title">Chức năng</div>
                                                    <div class="cart_item_buttons">
                                                        <button class="button cart_button_update"
                                                            data_id="{{ $id }}"><span
                                                                class="spinner-border spinner-border-sm" role="status"
                                                                aria-hidden="true" style="display: none"></span>
                                                            <div class="button-text">Lưu</div>
                                                        </button>
                                                        <button class="button cart_button_delete"
                                                            data_id="{{ $id }}">Xóa</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Order Total -->
                            <div class="order_total">
                                <div class="order_total_content text-md-right">
                                    <div class="order_total_title">Tổng đơn:</div>
                                    <div class="order_total_amount">{{ formatNumber($total) }} đ</div>
                                </div>
                            </div>
                        @else
                            <div>Trống</div>
                        @endif
                    </div>
                    <div class="text-right" style="padding-top: 35px">
                        <a href="{{ route('user.home.index') }}">
                            <button type="submit" style="font-size: 18px;
                                    font-weight: 400;
                                    line-height: 40px;" class="btn btn-primary">Tiếp tục mua hàng</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(".cart_button_update").click(function(e) {
            e.preventDefault();

            let ele = $(this);

            let parent = ele.parents('div .cart_item');

            let subTotal = parent.find('.cart_item_total > .cart_item_text');

            let total = $('.order_total_amount');

            let quantity = parent.find('#quantity-input').val();

            let loading = ele.find('.spinner-border');

            let text = ele.find('.button-text')

            loading.show();
            text.hide();

            $.ajax({
                url: "{{ route('user.cart.update') }}",
                method: "PUT",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data_id"),
                    quantity: quantity
                },
                success: function(response) {
                    loading.hide();
                    text.show();
                    subTotal.text(response.subTotal + ' đ');
                    total.text(response.total + ' đ');
                    $('#cart_price').text(response.total + ' đ');
                    $('#cart_quantity').text(response.quantity);
                }
            });
        });

        $(".cart_button_delete").click(function(e) {
            e.preventDefault();

            let ele = $(this);

            let parent = ele.parents('div .cart_item');

            let total = $('.order_total_amount');

            if (confirm("Are you sure")) {
                $.ajax({
                    url: "{{ route('user.cart.remove') }}",
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data_id")
                    },
                    success: function(response) {
                        parent.remove();
                        total.text(response.total + ' đ');
                        $('#cart_price').text(response.total + ' đ');
                        $('#cart_quantity').text(response.quantity);
                    }
                })
                // .done(response => {
                //     parent.remove();
                //     total.text(response.total);
                // });
            };
        });
    </script>
@endsection
