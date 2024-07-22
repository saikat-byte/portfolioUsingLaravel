@extends('admin.layout.app')

@section('heading', 'Edit Portfolio')

@section('rightside_button')
<a href="{{ route('admin_portfolio_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_portfolio_update',$row_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Existing Photo</label>
                                    <div>
                                        <img src="{{ asset('uploads/'.$row_data->photo) }}" alt="" class="w_200">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Change Photo</label>
                                    <div>
                                        <input type="file" name="photo">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Existing Banner</label>
                                    <div>
                                        <img src="{{ asset('uploads/'.$row_data->banner) }}" alt="" class="w_200">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Change Banner</label>
                                    <div>
                                        <input type="file" name="banner">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Select Category *</label>
                                    <select name="portfolio_category_id" class="form-control select2">
                                        @foreach($portfolio_categories as $item)
                                            <option value="{{ $item->id }}" @if($item->id == $row_data->portfolio_category_id) selected @endif>{{ $item->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control" name="name" value="{{ $row_data->name }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Slug *</label>
                                    <input type="text" class="form-control" name="slug" value="{{ $row_data->slug }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Description *</label>
                                    <textarea name="description" class="form-control editor" cols="30" rows="10">{{ $row_data->description }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Client Name</label>
                                    <input type="text" class="form-control" name="project_client" value="{{ $row_data->project_client }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Company Name</label>
                                    <input type="text" class="form-control" name="project_company" value="{{ $row_data->project_company }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Start Date</label>
                                    <input type="text" class="form-control" name="project_start_date" value="{{ $row_data->project_start_date }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">End Date</label>
                                    <input type="text" class="form-control" name="project_end_date" value="{{ $row_data->project_end_date }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Cost</label>
                                    <input type="text" class="form-control" name="project_cost" value="{{ $row_data->project_cost }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Website</label>
                                    <input type="text" class="form-control" name="project_website" value="{{ $row_data->project_website }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">SEO Title</label>
                                    <input type="text" class="form-control" name="seo_title" value="{{ $row_data->seo_title }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">SEO Meta Description</label>
                                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $row_data->seo_meta_description }}</textarea>
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