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
                                    {{ Auth::user()->first_name . ' ' .  Auth::user()->middle_name . ' ' .  Auth::user()->last_name }}
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

    <nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="main_nav_content d-flex flex-row">

                        <div class="logo"><a href="/">ACH</a></div>

                        <!-- Main Nav Menu -->

                        <div class="main_nav_menu ml-auto">
                            <ul class="standard_dropdown main_nav_dropdown">
                                <li><a href="{{ route('admin.home.index') }}">Trang chủ<i
                                            class="fas fa-chevron-down"></i></a></li>
                                <li><a href="{{ route('admin.category.index') }}">Danh mục<i
                                            class="fas fa-chevron-down"></i></a></li>
                                <li><a href="{{ route('admin.product.index') }}">Danh sách sản phẩm<i
                                            class="fas fa-chevron-down"></i></a></li>
                            </ul>
                        </div>

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
