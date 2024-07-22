@extends('admin.layout.app')

@section('heading', 'Add Portfolio')

@section('rightside_button')
<a href="{{ route('admin_portfolio_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_portfolio_submit') }}" method="post" enctype="multipart/form-data">
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
                                    <select name="portfolio_category_id" class="form-control select2">
                                        @foreach($portfolio_categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Slug *</label>
                                    <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Description *</label>
                                    <textarea name="description" class="form-control editor" cols="30" rows="10">{{ old('description') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Client Name</label>
                                    <input type="text" class="form-control" name="project_client" value="{{ old('project_client') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Company Name</label>
                                    <input type="text" class="form-control" name="project_company" value="{{ old('project_company') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Start Date</label>
                                    <input type="text" class="form-control" name="project_start_date" value="{{ old('project_start_date') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">End Date</label>
                                    <input type="text" class="form-control" name="project_end_date" value="{{ old('project_end_date') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Cost</label>
                                    <input type="text" class="form-control" name="project_cost" value="{{ old('project_cost') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Website</label>
                                    <input type="text" class="form-control" name="project_website" value="{{ old('project_website') }}">
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