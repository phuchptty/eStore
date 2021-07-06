@extends('layouts.admin')

@section('title', 'Tạo mới danh mục')

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
                                Thêm danh mục
                            </div>
                        </div>
                        <form action="{{route('admin.category.store')}}" method="POST" class="category_form">
                            @csrf
                            <div class="form-group">
                                <label for="parentSelect">Danh mục cha</label>

                                <select class="form-control" style="margin: 0" id="parentSelect" name="parent">
                                    <option value="">Không có</option>
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
                                <label for="title">Tên danh mục</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="">
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="active" name="active" checked>
                                <label class="form-check-label" for="active">Active</label>
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
