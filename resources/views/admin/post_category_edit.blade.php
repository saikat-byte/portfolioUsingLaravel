@extends('admin.layout.app')

@section('heading', 'Edit Post Category')

@section('rightside_button')
<a href="{{ route('admin_post_category_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_post_category_update',$row_data->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control" name="category_name" value="{{ $row_data->category_name }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Slug *</label>
                                    <input type="text" class="form-control" name="category_slug" value="{{ $row_data->category_slug }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">SEO Title</label>
                                    <input type="text" class="form-control" name="category_seo_title" value="{{ $row_data->category_seo_title }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">SEO Meta Description</label>
                                    <textarea name="category_seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $row_data->category_seo_meta_description }}</textarea>
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