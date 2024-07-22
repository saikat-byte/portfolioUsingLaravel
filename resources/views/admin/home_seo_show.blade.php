@extends('admin.layout.app')

@section('heading', 'Edit Home Page SEO')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_home_seo_update') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">SEO Title</label>
                                    <input type="text" class="form-control" name="seo_title" value="{{ $page_data->seo_title }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">SEO Meta Description</label>
                                    <textarea name="seo_meta_description" class="form-control" cols="30" rows="10">{{ $page_data->seo_meta_description }}</textarea>
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