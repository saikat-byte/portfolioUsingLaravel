@extends('front.layout.app')

@section('seo_title'){{ $page_data->search_seo_title }}@endsection
@section('seo_meta_description'){{ $page_data->search_seo_meta_description }}@endsection

@section('main_content')

<div class="page-banner" style="background-image: url({{ asset('uploads/'.$page_data->search_banner) }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Search By: {{ $search_text }}</h1>
            </div>
        </div>
    </div>
</div>

<div class="page-content blog">
    <div class="container">
        <div class="row">
            @if(!$posts->count())
                <span class="text-danger">No Post Found</span>
            @else
            @foreach($posts as $item)
            <div class="col-md-4">
                <div class="item">
                    <div class="photo">
                        <img src="{{ asset('uploads/'.$item->photo) }}" alt="">
                    </div>
                    <div class="text">
                        <h3>{{ $item->title }}</h3>
                        <p>
                            {!! nl2br($item->short_description) !!}
                        </p>
                        <div class="button">
                            <a href="{{ route('post',$item->slug) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection