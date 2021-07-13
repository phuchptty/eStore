@extends('layouts.admin')

@section('title', 'Tạo mới sản phẩm')

@section('css-lib')
    <link rel="stylesheet" href="{{ asset('css/admin/product/product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact_styles.css') }}">
@endsection

@section('css')
<style>
    .ck-editor__editable {
        min-height: 300px;
    }
</style>
@endsection

@section('content')
<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact_form_container">
                    <div class="contact_form_title">Thêm sản phẩm</div>

                    <form id="contact_form" action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>

                        <div class="form-group">
                            <label for="category">Danh mục sản phẩm</label>
                            <select class="form-control" style="margin: 0" id="category" name="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        @if($category->parentCategory)
                                            @include('admin.categories.parent_category', ['parent_category' => $category->parentCategory])
                                        @endif
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input type="number" class="form-control" id="price" name="price" min="0" step="100000">
                        </div>

                        <div class="form-group">
                            <label for="discount">Giảm giá</label>
                            <input type="number" class="form-control" id="discount" name="discount" min="0" max="100" step="5">
                        </div>

                        <div class="form-group">
                            <label for="quantity">Số lượng</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" min="1" step="1">
                        </div>

                        <label>Quảng cáo</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="banner1" name="banner1">
                            <label class="form-check-label" for="banner1">Banner 1</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="banner2" name="banner2">
                            <label class="form-check-label" for="banner2">Banner 2</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="active" name="active" checked>
                            <label class="form-check-label" for="active">Active</label>
                        </div>

                        <div class="form-group">
                            <label for="image">Hình ảnh</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>

                        <div class="form-group">
                            <label for="summary">Mô tả</label>
                            <textarea id="summary" name="summary" style="width: 100%; height: 100px; padding: 10px"></textarea>
                        </div>


                        <div class="contact_form_button">
                            <button type="submit" class="button contact_submit_button">Lưu</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>
@endsection

@section('js-lib')

@endsection

@section('js')

@endsection
