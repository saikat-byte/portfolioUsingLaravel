@extends('front.layout.app')

@section('seo_title'){{ $page_data->about_seo_title }}@endsection
@section('seo_meta_description'){{ $page_data->about_seo_meta_description }}@endsection

@section('main_content')

<div class="page-banner" style="background-image: url({{ asset('uploads/'.$page_data->about_banner) }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $page_data->about_heading }}</h1>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                @if($page_data->about_photo!='')
                <div class="about-photo d-flex justify-content-center">
                    <img src="{{ asset('uploads/'.$page_data->about_photo) }}" alt="">
                </div>
                @endif

                <div class="about-content">
                    {!! nl2br($page_data->about_description) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection