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
                        </div>
                        <div>
                            Đây là trang chỉnh sửa danh mục
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
