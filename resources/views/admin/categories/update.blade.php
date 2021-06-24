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

                        <div class="category_form">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1">
                                        <div class="category_form_container">
                                            <div class="category_form_title">Get in Touch</div>

                                            <form action="#" id="category_form">
                                                <div class="category_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                                    <input type="text" id="category_form_name" class="category_form_name input_field" placeholder="Your name" required="required" data-error="Name is required.">
                                                    <input type="text" id="category_form_email" class="category_form_email input_field" placeholder="Your email" required="required" data-error="Email is required.">
                                                    <input type="text" id="category_form_phone" class="category_form_phone input_field" placeholder="Your phone number">
                                                </div>
                                                <div class="category_form_text">
                                                    <textarea id="category_form_message" class="text_field category_form_message" name="message" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
                                                </div>
                                                <div class="category_form_button">
                                                    <button type="submit" class="button category_submit_button">Send Message</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel"></div>
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
