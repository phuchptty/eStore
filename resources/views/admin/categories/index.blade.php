@extends('layouts.admin')

@section('title', 'Trang chủ')

@section('css-lib')
    <link rel="stylesheet" href="{{ asset('css/admin/category/category.css') }}">
@endsection

@section('css')

@endsection

@section('content')
    <div class="category_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="category_container">
                        <div class="category_title">
                            <div>
                                Danh mục
                            </div>
                            <div>
                                <a href="{{ route('admin.category.store') }}" class="button category_button_create">Thêm
                                    danh mục</a>
                            </div>
                        </div>
                        <div class="category_items">

                            <ul class="category_list">

                                @foreach ($categories as $category)
                                    <li class="category_item clearfix">
                                        <div
                                            class="category_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="category_item_name category_info_col">
                                                <div class="category_item_title">Tên danh mục</div>
                                                <div class="category_item_text">
                                                    @if ($category->parentCategory)
                                                        @include('admin.categories.parent_category', ['parent_category' =>
                                                        $category->parentCategory])
                                                    @endif
                                                    {{ $category->title }}
                                                </div>
                                            </div>
                                            <div class="category_buttons category_info_col">
                                                <div class="category_item_title">Chức năng</div>
                                                <div class="category_item_buttons">
                                                    <form action="{{ route('admin.category.destroy', ['id' => $category->id]) }}" method="POST">
                                                        <a class="button category_button_update"
                                                        href="{{ route('admin.category.edit', ['id' => $category->id]) }}">Cập
                                                        nhật</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="button category_button_delete">Xóa</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
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
