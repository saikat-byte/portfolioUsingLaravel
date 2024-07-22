@extends('front.layout.app')

@section('seo_title'){{ $page_data->seo_title }}@endsection
@section('seo_meta_description'){{ $page_data->seo_meta_description }}@endsection

@section('main_content')
<div class="home-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <div class="left">
                    <h4>{{ $page_data->banner_title }}</h4>
                    <h2>{{ $page_data->banner_person_name }}</h2>
                    <h3>{{ $page_data->banner_person_designation }}</h3>
                    <p>
                        {!! $page_data->banner_description !!}
                    </p>
                    <div class="button">
                        <a href="{{ $page_data->banner_button_url }}" class="btn btn-primary">{{ $page_data->banner_button_text }}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right">
                    <img src="{{ asset('uploads/'.$page_data->banner_photo) }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>


@if($page_data->about_status == 'Show')
<div class="home-about">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="left wow fadeInLeft">
                    <img src="{{ asset('uploads/'.$page_data->about_photo) }}" alt="">
                </div>
            </div>
            <div class="col-md-8">
                <div class="right wow fadeInRight">
                    @if($page_data->about_subtitle != '')
                    <h3>{{ $page_data->about_subtitle }}</h3>
                    @endif
                    <h2>{{ $page_data->about_title }}</h2>
                    @if($page_data->about_description != '')
                    <p>{!! nl2br($page_data->about_description) !!}</p>
                    @endif
                    
                    @if( $page_data->about_person_name!='' || $page_data->about_person_phone!='' || $page_data->about_person_email!='')
                    <div class="contact-info">
                        <div class="table-responsive">
                            <table class="table">

                                @if($page_data->about_person_name!='')
                                <tr>
                                    <td><i class="far fa-user"></i></td>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td>{{ $page_data->about_person_name }}</td>
                                </tr>
                                @endif

                                @if($page_data->about_person_phone!='')
                                <tr>
                                    <td><i class="fas fa-phone"></i></td>
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td>{{ $page_data->about_person_phone }}</td>
                                </tr>
                                @endif

                                @if($page_data->about_person_email!='')
                                <tr>
                                    <td><i class="far fa-envelope"></i></td>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $page_data->about_person_email }}</td>
                                </tr>
                                @endif

                            </table>
                        </div>
                    </div>
                    @endif


                    @if( $page_data->about_icon1!='' || $page_data->about_icon2!='' || $page_data->about_icon3!='' || $page_data->about_icon4!='' || $page_data->about_icon5!='')
                    <div class="social">
                        <h3>Find me on social media:</h3>
                        <ul>                            
                            @if($page_data->about_icon1!='')
                            <li><a href="{{ $page_data->about_icon1_url }}"><i class="{{ $page_data->about_icon1 }}"></i></a></li>
                            @endif

                            @if($page_data->about_icon2!='')
                            <li><a href="{{ $page_data->about_icon2_url }}"><i class="{{ $page_data->about_icon2 }}"></i></a></li>
                            @endif

                            @if($page_data->about_icon3!='')
                            <li><a href="{{ $page_data->about_icon3_url }}"><i class="{{ $page_data->about_icon3 }}"></i></a></li>
                            @endif

                            @if($page_data->about_icon4!='')
                            <li><a href="{{ $page_data->about_icon4_url }}"><i class="{{ $page_data->about_icon4 }}"></i></a></li>
                            @endif

                            @if($page_data->about_icon5!='')
                            <li><a href="{{ $page_data->about_icon5_url }}"><i class="{{ $page_data->about_icon5 }}"></i></a></li>
                            @endif
                        </ul>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endif



@if($page_data->skill_status == 'Show')
<div class="home-skill">
    <div class="container">
        <div class="row">
            <div class="col-md-12 heading">
                @if($page_data->skill_subtitle!='')
                <h2>{{ $page_data->skill_subtitle }}</h2>
                @endif

                @if($page_data->skill_title!='')
                <h3>{{ $page_data->skill_title }}</h3>
                @endif
            </div>
            <div class="col-md-6 wow fadeInLeft">

                @php $i=0; @endphp
                @foreach($left_skills as $item)
                @php $i++; @endphp
                <div class="progress-text">{{ $item->name }}</div>
                <div class="progress">
                    <div class="progress-bar anim_left{{ $i }} w-0" role="progressbar" aria-label="Example with label" aria-valuenow="{{ $item->percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $item->percentage }}%</div>
                </div>
                @endforeach

            </div>
            <div class="col-md-6 wow fadeInRight">
                @php $i=0; @endphp
                @foreach($right_skills as $item)
                @php $i++; @endphp
                <div class="progress-text">{{ $item->name }}</div>
                <div class="progress">
                    <div class="progress-bar anim_right{{ $i }} w-0" role="progressbar" aria-label="Example with label" aria-valuenow="{{ $item->percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $item->percentage }}%</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif


@if($page_data->qualification_status == 'Show')
<div class="home-qualification">
    <div class="container">
        <div class="row">
            <div class="col-md-12 heading">
                <h2>{{ $page_data->qualification_subtitle }}</h2>
                <h3>{{ $page_data->qualification_title }}</h3>
            </div>
            <div class="col-md-6">
                <h2 class="title"><i class="fas fa-graduation-cap"></i> {{ $page_data->education_title }}</h2>
                <div class="inner">
                    @foreach($education as $item)
                    <div class="item wow fadeInUp">
                        <h3>{{ $item->degree }}</h3>
                        <h4>{{ $item->institute }}</h4>
                        <div class="time"><i class="far fa-clock"></i> {{ $item->time }}</div>
                        <div class="v-line"></div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="title"><i class="fas fa-award"></i> {{ $page_data->experience_title }}</h2>
                <div class="inner">
                    @foreach($experiences as $item)
                    <div class="item wow fadeInUp">
                        <h3>{{ $item->company }}</h3>
                        <h4>{{ $item->designation }}</h4>
                        <div class="time"><i class="far fa-clock"></i> {{ $item->time }}</div>
                        <div class="v-line"></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if($page_data->service_status == 'Show')
<div class="service">
    <div class="container">
        <div class="row">
            <div class="col-md-12 heading">
                <h2>Services</h2>
                <h3>What Services I Offer</h3>
            </div>
            @php $i=1; @endphp
            @foreach($services as $item)
            @php
            if($i%3 == 1) {
                $anim = 'fadeInLeft';
            } elseif($i%3 == 2) {
                $anim = 'fadeInUp';
            } elseif($i%3 == 0) {
                $anim = 'fadeInRight';
            }
            $i++;
            @endphp
            <div class="col-lg-4 col-md-6 wow {{ $anim }}">
                <div class="item">
                    <div class="icon"><i class="{{ $item->icon }}"></i></div>
                    <h3>{{ $item->name }}</h3>
                    <p>
                        {!! nl2br($item->short_description) !!}
                    </p>
                    <div class="button">
                        <a href="{{ route('service_detail',$item->slug) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif


@if($page_data->counter_status == 'Show')
<div class="home-counter" style="background-image:url({{ asset('uploads/'.$page_data->counter_background) }})">
    <div class="container">
        <div class="row counter-items">
            <div class="col-md-3 counter-item">
                <div class="counter">{{ $page_data->counter1_number }}</div>
                <div class="text">{{ $page_data->counter1_name }}</div>
            </div>
            <div class="col-md-3 counter-item">
                <div class="counter">{{ $page_data->counter2_number }}</div>
                <div class="text">{{ $page_data->counter2_name }}</div>
            </div>
            <div class="col-md-3 counter-item">
                <div class="counter">{{ $page_data->counter3_number }}</div>
                <div class="text">{{ $page_data->counter3_name }}</div>
            </div>
            <div class="col-md-3 counter-item">
                <div class="counter">{{ $page_data->counter4_number }}</div>
                <div class="text">{{ $page_data->counter4_name }}</div>
            </div>
        </div>
    </div>
</div>
@endif


@if($page_data->portfolio_status == 'Show')
<div class="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-md-12 heading">
                
                @if($page_data->portfolio_subtitle != '')
                <h2>{{ $page_data->portfolio_subtitle }}</h2>
                @endif

                @if($page_data->portfolio_title != '')
                <h3>{{ $page_data->portfolio_title }}</h3>
                @endif

            </div>
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
@endif


@if($page_data->testimonial_status == 'Show')
<div class="home-testimonial" style="background-image:url({{ asset('uploads/'.$page_data->testimonial_background) }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12 heading">
                @if($page_data->testimonial_subtitle!='')
                <h2>{{ $page_data->testimonial_subtitle }}</h2>
                @endif

                @if($page_data->testimonial_title!='')
                <h3>{{ $page_data->testimonial_title }}</h3>
                @endif
            </div>
            <div class="col-md-12">
                <div class="owl-carousel owl-theme testimonial-carousel">
                    
                    @foreach($testimonials as $item)
                    <div class="item">
                        <div class="photo d-flex justify-content-center">
                            <img src="{{ asset('uploads/'.$item->photo) }}" alt="">
                        </div>
                        <div class="comment">
                            {!! nl2br($item->comment) !!}
                        </div>
                        <div class="person-detail">
                            <h3>{{ $item->name }}</h3>
                            <h4>{{ $item->designation }}</h4>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if($page_data->blog_status == 'Show')
<div class="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12 heading">                
                @if($page_data->blog_subtitle != '')
                <h2>{{ $page_data->blog_subtitle }}</h2>
                @endif
                @if($page_data->blog_title != '')
                <h3>{{ $page_data->blog_title }}</h3>
                @endif
            </div>
            @foreach($posts as $item)
            <div class="col-md-4 wow fadeInUp">
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
                            <a href="" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif


@if($page_data->client_status == 'Show')
<div class="home-client">
    <div class="container">
        <div class="row">
            <div class="col-md-12 heading">
                @if($page_data->client_subtitle!='')
                <h2>{{ $page_data->client_subtitle }}</h2>
                @endif
                @if($page_data->client_title!='')
                <h3>{{ $page_data->client_title }}</h3>
                @endif
            </div>
            <div class="col-md-12">
                <div class="owl-carousel owl-theme client-carousel">
                    @foreach($clients as $item)
                    <div class="item">

                        @if($item->url!='')
                        <a href="{{ $item->url }}" target="_blank"><img src="{{ asset('uploads/'.$item->photo) }}" alt=""></a>
                        @else
                        <img src="{{ asset('uploads/'.$item->photo) }}" alt="">
                        @endif

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection


@section('skill_animation')

@php $i=0; @endphp
@foreach($left_skills as $item)
@php $i++; @endphp
<script>
$(".anim_left{{ $i }}").animate({width: "{{ $item->percentage }}%"}, 2500);
</script>
@endforeach

@php $i=0; @endphp
@foreach($right_skills as $item)
@php $i++; @endphp
<script>
$(".anim_right{{ $i }}").animate({width: "{{ $item->percentage }}%"}, 2500);
</script>
@endforeach

@endsection