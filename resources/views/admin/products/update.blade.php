@extends('layouts.admin')

@section('title', 'Cập nhât sản phẩm')

@section('css-lib')
    <link rel="stylesheet" href="{{ asset('css/admin/product/product.css') }}">
@endsection

@section('css')
    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
    </style>
@endsection

@section('content')
    <div class="product_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_form_title">Cập nhật sản phẩm</div>

                    <form id="contact_form" action="{{ route('admin.product.update', $product->id) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ $product->title }}">
                        </div>

                        <div class="form-group">
                            <label for="category">Danh mục sản phẩm</label>
                            <select class="form-control" style="margin: 0" id="category" name="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                            @if($category->id == $product->categories[0]->id) selected @endif>
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
                            <input type="number" class="form-control" id="price" name="price"
                                   value="{{ $product->price }}">
                        </div>

                        <div class="form-group">
                            <label for="discount">Giảm giá</label>
                            <input type="number" class="form-control" id="discount" name="discount"
                                   value="{{ $product->discount }}">
                        </div>

                        <div class="form-group">
                            <label for="quantity">Số lượng</label>
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                   value="{{ $product->quantity }}">
                        </div>

                        <label>Quảng cáo</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="banner1" name="banner1"
                                   @if($product->banner_1) checked @endif>
                            <label class="form-check-label" for="banner1">Banner 1</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="banner2" name="banner2"
                                   @if($product->banner_2) checked @endif>
                            <label class="form-check-label" for="banner2">Banner 2</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="active" name="active"
                                   @if($product->active) checked @endif>
                            <label class="form-check-label" for="active">Active</label>
                        </div>

                        <div class="form-group">
                            <label for="image">Hình ảnh</label>
                            <input type="file" class="form-control-file" id="image" name="image"
                                   accept="image/png, image/gif, image/jpeg">
                        </div>

                        <div class="form-group">
                            <label for="summary">Mô tả</label>
                            <br>
                            <textarea id="summary" name="summary"
                                      style="width: 100%; height: 100px; padding: 10px">{{ $product->summary }}</textarea>
                        </div>

                        <div class="text-right">
                            <a href="{{route('admin.product.index') }}" class="btn btn-light">Hủy</a>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>
@endsection

@section('js-lib')
    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
@endsection

@section('js')
    <script>
        ClassicEditor.create(document.querySelector('#summary'), {
                toolbar:
                    ['bold', 'italic', 'bulletedList', 'numberedList']
            }
        )
    </script>
@endsection
