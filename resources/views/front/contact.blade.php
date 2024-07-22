@extends('front.layout.app')

@section('seo_title'){{ $page_data->contact_seo_title }}@endsection
@section('seo_meta_description'){{ $page_data->contact_seo_meta_description }}@endsection

@section('main_content')

<div class="page-banner" style="background-image: url({{ asset('uploads/'.$page_data->contact_banner) }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $page_data->contact_heading }}</h1>
            </div>
        </div>
    </div>
</div>

<div class="page-content contact">
    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="item">
                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                    <h2>My Location</h2>
                    <div class="text">
                        {!! nl2br($page_data->contact_address) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item">
                    <div class="icon"><i class="fas fa-phone-alt"></i></div>
                    <h2>Phone Number</h2>
                    <div class="text">
                        {!! nl2br($page_data->contact_phone) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item">
                    <div class="icon"><i class="fas fa-envelope"></i></div>
                    <h2>Email Address</h2>
                    <div class="text">
                        {!! nl2br($page_data->contact_email) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row form-map">
            <div class="col-lg-6 col-md-12">
                <h2>Please contact via the following form:</h2>

                <form action="{{ route('contact_send_email') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Name (Required)" name="name">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Email Address (Required)" name="email">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Phone Number" name="phone">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" placeholder="Message (Required)" rows="3" name="comment"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-12">
                <h2>Find me on Map:</h2>
                {!! nl2br($page_data->contact_map_iframe) !!}
            </div>
        </div>
    </div>
</div>
@endsection