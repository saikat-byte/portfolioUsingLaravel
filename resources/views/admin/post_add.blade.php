@extends('admin.layout.app')

@section('heading', 'Add Post')

@section('rightside_button')
<a href="{{ route('admin_post_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_post_submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Photo *</label>
                                    <div>
                                        <input type="file" name="photo">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Banner *</label>
                                    <div>
                                        <input type="file" name="banner">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Select Category *</label>
                                    <select name="post_category_id" class="form-control select2">
                                        @foreach($post_categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Title *</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Slug *</label>
                                    <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Short Description *</label>
                                    <textarea name="short_description" class="form-control h_100" cols="30" rows="10">{{ old('short_description') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Description *</label>
                                    <textarea name="description" class="form-control editor" cols="30" rows="10">{{ old('description') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Show Comment? *</label>
                                    <select name="show_comment" class="form-control select2">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">SEO Title</label>
                                    <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">SEO Meta Description</label>
                                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ old('seo_meta_description') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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