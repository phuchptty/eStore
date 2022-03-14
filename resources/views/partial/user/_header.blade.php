<header class="header">

    <!-- Top Bar -->

    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="top_bar_contact_item">
                        <div class="top_bar_icon"><img src="{{ asset('images/phone.png') }}" alt=""></div>012 345 789
                    </div>

                    <div class="top_bar_contact_item">
                        <div class="top_bar_icon"><img src="{{ asset('images/mail.png') }}" alt=""></div><a
                            href="mailto:fastsales@gmail.com">admin@ach.com</a>
                    </div>

                    <div class="top_bar_content ml-auto">
                        <div class="top_bar_user">
                            <div class="user_icon"><img src="{{ asset('images/user.svg') }}" alt=""></div>
                            @guest
                            <div><a href="{{ route('register') }}">Đăng ký</a></div>
                            <div><a href="{{ route('login') }}">Đăng nhập</a></div>
                            @endguest
                            @auth
                            <div style="font-size: 16px">
                                {{ Auth::user()->first_name . ' ' . Auth::user()->middle_name . ' ' . Auth::user()->last_name }}
                            </div>
                            <div><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Đăng xuất</a></div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Main -->

    <div class="header_main">
        <div class="container">
            <div class="row">

                <!-- Logo -->
                <div class="col-lg-2 col-sm-3 col-3 order-1">
                    <div class="logo_container">
                        <div class="logo"><a href="/">ACH</a></div>
                    </div>
                </div>

                <!-- Search -->
                <div class="col-lg-8 col-12 order-lg-2 order-3 text-lg-left text-right">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">
                                <form action="{{ route('user.product.search') }}" class="header_search_form clearfix">
                                    @csrf
                                    <input type="search" required="required" class="header_search_input"
                                        placeholder="Tìm kiếm sản phẩm..." name="productName">
                                    <button type="submit" class="header_search_button trans_300" value="Submit"><img
                                            src="{{ asset('images/search.png') }}" alt=""></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Wishlist -->
                <div class="col-lg-2 col-9 order-lg-3 order-2 text-lg-left text-right">
                    <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                        <!-- Cart -->
                        <div class="cart">
                            <a href="{{ route('user.cart.index') }}">
                                @if (session('cart'))
                                @php
                                $totalQuantity = 0;
                                $total = 0;
                                foreach (session('cart') as $id => $product) {
                                $totalQuantity += $product['quantity'];
                                $total += $product['price'] * $product['quantity'];
                                }
                                @endphp
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon">
                                        <img src="{{ asset('images/cart.png') }}" alt="">
                                        <div class="cart_count"><span id="cart_quantity">{{ $totalQuantity }}</span>
                                        </div>
                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text"><a href="{{ route('user.cart.index') }}">Giỏ
                                                hàng</a></div>
                                        <div class="cart_price" id="cart_price">{{ formatNumber($total) }} đ
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon">
                                        <img src="{{ asset('images/cart.png') }}" alt="">
                                        <div class="cart_count"><span>0</span></div>
                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text"><a href="{{ route('user.cart.index') }}">Giỏ
                                                hàng</a></div>
                                        <div class="cart_price">0 đ</div>
                                    </div>
                                </div>
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="main_nav_content d-flex flex-row">

                        <!-- Categories Menu -->

                        <div class="cat_menu_container">
                            <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                <div class="cat_burger"><span></span><span></span><span></span></div>
                                <div class="cat_menu_text">danh mục sản phẩm</div>
                            </div>

                            @if (count($categories) > 0)
                            <ul class="cat_menu">
                                @foreach ($categories as $category)
                                <li @if (!$category->childrenCategories->isEmpty()) class="hassubs" @endif>
                                    <a href="{{ route('user.product.category', ['id' => $category->id]) }}">{{ $category->title }}<i
                                            class="fas fa-chevron-right ml-auto"></i></a>
                                    <ul>
                                        @foreach ($category->childrenCategories as $childCategory)
                                        @include('partial.user.child_category', ['child_category' =>
                                        $childCategory])
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>

                        <!-- Main Nav Menu -->

                        {{-- <div class="main_nav_menu m-auto">
                            <ul class="standard_dropdown main_nav_dropdown">
                                <li><a href="{{ route('user.home.index') }}">Trang chủ<i
                                            class="fas fa-chevron-down"></i></a></li>
                                <li class="hassubs">
                                    <a href="#">Featured Brands<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li>
                                            <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Liên hệ<i class="fas fa-chevron-down"></i></a></li>
                            </ul>
                        </div> --}}

                        <!-- Menu Trigger -->

                        <div class="menu_trigger_container ml-auto">
                            <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                <div class="menu_burger">
                                    <div class="menu_trigger_text">menu</div>
                                    <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Menu -->

    <div class="page_menu">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page_menu_content">

                        <div class="page_menu_search">
                            <form action="#">
                                <input type="search" required="required" class="page_menu_search_input"
                                    placeholder="Tìm kiếm sản phẩm...">
                            </form>
                        </div>
                        <ul class="page_menu_nav">
                            <li class="page_menu_item">
                                <a href="#">Trang chủ<i class="fa fa-angle-down"></i></a>
                            </li>
                            <li class="page_menu_item has-children">
                                <a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
                                <ul class="page_menu_selection">
                                    <li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                </ul>
                            </li>
                            <li class="page_menu_item"><a href="contact.html">contact<i
                                        class="fa fa-angle-down"></i></a></li>
                        </ul>

                        <div class="menu_contact">
                            <div class="menu_contact_item">
                                <div class="menu_contact_icon"><img src="{{ asset('images/phone_white.png') }}" alt="">
                                </div>+38 068 005 3570
                            </div>
                            <div class="menu_contact_item">
                                <div class="menu_contact_icon"><img src="{{ asset('images/mail_white.png') }}" alt="">
                                </div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
