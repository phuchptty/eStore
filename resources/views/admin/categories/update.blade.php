@extends('layouts.admin')

@section('title', 'Cập nhật sản phẩm')

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
                                Chỉnh sửa danh mục
                            </div>
                        </div>
                        <form action="{{ route('admin.category.update', $category->id) }}" method="POST" class="category_form">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="parentSelect">Danh mục cha</label>

                                <select class="form-control" style="margin: 0" id="parentSelect" name='parent'>
                                    <option value="">Không có</option>
                                    @foreach ($categories as $categoryItem)
                                        <option value="{{ $categoryItem->id }}" @if($categoryItem->id == $category->parent_id) selected @endif>
                                            @if ($categoryItem->parentCategory)
                                                @include('admin.categories.parent_category', ['parent_category' =>
                                                $categoryItem->parentCategory])
                                            @endif
                                            {{ $categoryItem->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="titleInput">Tên danh mục</label>
                                <input type="text" class="form-control" id="titleInput" name="title" value="{{ $category->title }}">
                            </div>
                            <div class="text-right" style="padding-top: 35px">
                                <a href="{{route('admin.category.index') }}" class="btn btn-light">Hủy</a>
                                <button type="submit" class="btn btn-primary">Hoàn tất</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('js-lib')

    @endsection

    @section('js')

    @endsection
