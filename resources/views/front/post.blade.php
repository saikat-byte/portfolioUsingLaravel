@extends('front.layout.app')

@section('seo_title'){{ $post_detail->seo_title }}@endsection
@section('seo_meta_description'){{ $post_detail->seo_meta_description }}@endsection

@section('open_graph_data')
<meta property="og:title" content="{{ $post_detail->title }}">
<meta property="og:url" content="{{ route('post',$post_detail->slug) }}">
<meta property="og:description" content="{{ $post_detail->short_description }}">
<meta property="og:image" content="{{ asset('uploads/'.$post_detail->photo) }}">
@endsection

@section('main_content')

<div class="page-banner" style="background-image: url({{ asset('uploads/'.$post_detail->banner) }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $post_detail->title }}</h1>
            </div>
        </div>
    </div>
</div>

<div class="page-content blog-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="photo">
                    <img src="{{ asset('uploads/'.$post_detail->photo) }}" alt="">
                </div>
                <div class="sub d-flex justify-content-start">
                    <div class="author"><span>By:</span> Admin</div>
                    <div class="dash"> - </div>
                    <div class="date"><span>On:</span> {{ $post_detail->created_at->format('M d, Y') }}</div>
                    <div class="dash"> - </div>
                    <div class="category"><span>Category:</span> <a href="{{ route('category',$post_detail->rPostCategory->category_slug) }}">{{ $post_detail->rPostCategory->category_name }}</a></div>
                </div>
                <div class="text">
                    {!! nl2br($post_detail->description) !!}
                </div>
                
                <div class="share">
                    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=633263d3bfbc4500128cca2f&product=inline-share-buttons" async="async"></script>
                    <div class="sharethis-inline-share-buttons"></div>
                </div>


                @if($post_detail->show_comment == 'Yes')
                <div class="comment">

                    <h2>{{ $total_comments }} Comments</h2>

                    @if($total_comments == 0)
                    <span class="text-danger">No Comment is Found!</span>
                    @endif

                    @foreach($comments as $item)
                    <div class="comment-section">
                        <div class="comment-box d-flex justify-content-start @if($item->person_type == 'Admin') comment-box-admin @endif">
                            <div class="left">
                                @php
                                    $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $item->person_email ) ) ) . "?s=128";
                                @endphp
                                <img src="{{ $grav_url }}" alt="">
                            </div>
                            <div class="right">
                                <div class="name">{{ $item->person_name }}</div>
                                <div class="date">
                                    {{ $item->created_at->format('F').' '.$item->created_at->format('d').', '.$item->created_at->format('Y') }}
                                </div>
                                <div class="text">
                                    {!! nl2br($item->person_comment) !!}
                                </div>
                                <div class="reply">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}"><i class="fas fa-reply"></i> Reply</a>
                                </div>
                            </div>
                        </div>

                        @foreach($item->rReply as $item2)
                            @if($item2->status == 0)
                                @continue
                            @endif
                            <div class="comment-box reply-box d-flex justify-content-start  @if($item2->person_type == 'Admin') comment-box-admin @endif">
                                <div class="left">
                                    @php
                                        $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $item2->person_email ) ) ) . "?s=128";
                                    @endphp
                                    <img src="{{ $grav_url }}" alt="">
                                </div>
                                <div class="right">
                                    <div class="name">{{ $item2->person_name }}</div>
                                    <div class="date">
                                        {{ $item2->created_at->format('F').' '.$item2->created_at->format('d').', '.$item2->created_at->format('Y') }}
                                    </div>
                                    <div class="text">
                                        {!! nl2br($item2->person_comment) !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reply Here</h1>
                                    <button type="button" class="btn btn-close text-white" data-bs-dismiss="modal" aria-label="Close">X</button>
                                </div>
                                <div class="modal-body">
                                    @if(Auth::guard('admin')->user())
                                    <form action="{{ route('reply_submit_admin') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{ $post_detail->id }}">
                                        <input type="hidden" name="comment_id" value="{{ $item->id }}">                                        
                                        <div class="mb-3">
                                            <textarea class="form-control" rows="3" placeholder="Comment" name="comment"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                    @else
                                    <form action="{{ route('reply_submit') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{ $post_detail->id }}">
                                        <input type="hidden" name="comment_id" value="{{ $item->id }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" placeholder="Name" name="name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" placeholder="Email Address" name="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <textarea class="form-control" rows="3" placeholder="Comment" name="comment"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                   

                    <div class="mt_40"></div>

                    <h2>Leave Your Comment</h2>                    
                    
                    @if(Auth::guard('admin')->user())
                    <form action="{{ route('comment_submit_admin') }}" method="post">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post_detail->id }}">
                        <div class="mb-3">
                            <textarea class="form-control" rows="3" placeholder="Comment" name="comment"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    @else
                    <form action="{{ route('comment_submit') }}" method="post">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post_detail->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Name" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Email Address" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="3" placeholder="Comment" name="comment"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    @endif


                    

                    
                </div>
                @endif

            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <div class="widget">
                        <h2>Search</h2>
                        <div class="search">
                            <form class="row g-3" action="{{ route('search') }}" method="post">
                                @csrf
                                <div class="col-auto">
                                    <input type="text" class="form-control" placeholder="Search Anything ..." name="search_text">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-3">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="widget">
                        <h2>Latest Post</h2>
                        <ul>
                            @foreach($posts as $item)
                            <li><a href="{{ route('post',$item->slug) }}">{{ $item->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <h2>Categories</h2>
                        <ul>
                            @foreach($post_categories as $item)
                            <li><a href="{{ route('category',$item->category_slug) }}">{{ $item->category_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <h2>Archives</h2>
                        <ul>
                            @foreach($archives as $item)
                            @php
                            if($item->month == '01') {$month='January';}
                            elseif($item->month == '02') {$month='February';}
                            elseif($item->month == '03') {$month='March';}
                            elseif($item->month == '04') {$month='April';}
                            elseif($item->month == '05') {$month='May';}
                            elseif($item->month == '06') {$month='June';}
                            elseif($item->month == '07') {$month='July';}
                            elseif($item->month == '08') {$month='August';}
                            elseif($item->month == '09') {$month='September';}
                            elseif($item->month == '10') {$month='October';}
                            elseif($item->month == '11') {$month='November';}
                            elseif($item->month == '12') {$month='December';}
                            @endphp
                            <li><a href="{{ route('archive',[$item->month,$item->year]) }}">{{ $month }} {{ $item->year }} ({{ $item->total_post }})</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection