@extends('admin.layout.app')

@section('heading', 'Edit Contact Page Content')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_page_contact_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Heading *</label>
                                    <input type="text" class="form-control" name="contact_heading" value="{{ $page_data->contact_heading }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Existing Banner</label>
                                    <div>
                                        <img src="{{ asset('uploads/'.$page_data->contact_banner) }}" alt="" class="w_200">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Change Banner</label>
                                    <div><input type="file" name="contact_banner"></div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Address *</label>
                                    <textarea name="contact_address" class="form-control h_100" cols="30" rows="10">{{ $page_data->contact_address }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Email *</label>
                                    <textarea name="contact_email" class="form-control h_100" cols="30" rows="10">{{ $page_data->contact_email }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Phone *</label>
                                    <textarea name="contact_phone" class="form-control h_100" cols="30" rows="10">{{ $page_data->contact_phone }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Map (iframe code) *</label>
                                    <textarea name="contact_map_iframe" class="form-control h_100" cols="30" rows="10">{{ $page_data->contact_map_iframe }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">SEO Title</label>
                                    <input type="text" class="form-control" name="contact_seo_title" value="{{ $page_data->contact_seo_title }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">SEO Meta Desription</label>
                                    <textarea name="contact_seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $page_data->contact_seo_meta_description }}</textarea>
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