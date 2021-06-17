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
                    <div class="category_title" style="display: flex; justify-content: space-between">
                        <div>
                            Danh mục
                        </div>
                        <div>
                            <a href="{{ route('admin.category.store') }}" class="button category_button_create">Tạo danh mục</a>
                        </div>
                    </div>
                    <div class="category_items">
                        <ul class="category_list">
                            <li class="category_item clearfix">
                                <div class="category_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="category_item_name category_info_col">
                                        <div class="category_item_title">Tên danh mục</div>
                                        <div class="category_item_text">Camera/Camera hành trình/Go Pro</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="category_buttons">
                            <button type="button" class="button category_button_update">Cập nhật danh mục</button>
                            <button type="button" class="button category_button_delete">Xoá danh mục</button>
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
