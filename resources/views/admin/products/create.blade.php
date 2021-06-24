@extends('layouts.admin')

@section('title', 'Trang chủ')

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

                    <form action="#" id="contact_form" action="{{ route('admin.product.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>

                        <div class="form-group">
                            <label for="category">Danh mục sản phẩm</label>
                            <select class="form-control" style="margin: 0" id="category" name="category">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input type="number" class="form-control" id="price" name="price">
                        </div>

                        <div class="form-group">
                            <label for="quantity">Số lượng</label>
                            <input type="number" class="form-control" id="quantity" name="quantity">
                        </div>

                        <div class="form-group">
                            <label for="images">Hình ảnh</label>
                            <input type="file" class="form-control-file" id="images">
                        </div>

                        <div class="form-group">
                            <label for="summary">Mô tả</label>
                            <textarea id="summary" name="summary"></textarea>
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
<script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
@endsection

@section('js')
<script>
    ClassicEditor.create(document.querySelector('#summary'));
</script>
@endsection
