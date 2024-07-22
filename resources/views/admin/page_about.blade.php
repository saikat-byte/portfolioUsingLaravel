@extends('admin.layout.app')

@section('heading', 'Edit About Page Content')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_page_about_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Heading *</label>
                                    <input type="text" class="form-control" name="about_heading" value="{{ $page_data->about_heading }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Description *</label>
                                    <textarea name="about_description" class="form-control editor" cols="30" rows="10">{{ $page_data->about_description }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Existing Photo</label>
                                    <div>
                                        @if($page_data->about_photo == '')
                                            <span class="text-danger">No photo found</span>
                                        @else
                                        <img src="{{ asset('uploads/'.$page_data->about_photo) }}" alt="" class="w_200"><br>
                                        <a href="{{ route('admin_page_about_photo_delete') }}">Remove</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Change Photo</label>
                                    <div><input type="file" name="about_photo"></div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Existing Banner</label>
                                    <div>
                                        <img src="{{ asset('uploads/'.$page_data->about_banner) }}" alt="" class="w_200">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Change Banner</label>
                                    <div><input type="file" name="about_banner"></div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">SEO Title</label>
                                    <input type="text" class="form-control" name="about_seo_title" value="{{ $page_data->about_seo_title }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">SEO Meta Desription</label>
                                    <textarea name="about_seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $page_data->about_seo_meta_description }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection