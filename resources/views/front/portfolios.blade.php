@extends('front.layout.app')

@section('seo_title'){{ $page_data->portfolios_seo_title }}@endsection
@section('seo_meta_description'){{ $page_data->portfolios_seo_meta_description }}@endsection

@section('main_content')
<div class="page-banner" style="background-image: url({{ asset('uploads/'.$page_data->portfolios_banner) }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $page_data->portfolios_heading }}</h1>
            </div>
        </div>
    </div>
</div>

<div class="page-content portfolio">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="filter">
                    <ul>
                        <li data-filter="*">All</li>
                        @foreach($portfolio_categories as $item)
                        <li data-filter=".abc{{ $item->id }}">{{ $item->category_name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="filter-items">
                    @foreach($portfolios as $item)
                    <div class="filter-item abc{{ $item->portfolio_category_id }}">
                        <div class="inner">
                            <div class="photo"><a href="{{ route('portfolio_detail',$item->slug) }}"><img src="{{ asset('uploads/'.$item->photo) }}" alt=""></a></div>
                            <div class="text">
                                <h2>{{ $item->name }}</h2>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection