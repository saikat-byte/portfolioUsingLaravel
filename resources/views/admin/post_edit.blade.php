@extends('admin.layout.app')

@section('heading', 'Edit Post')

@section('rightside_button')
<a href="{{ route('admin_post_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
@endsection



@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
                    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

                    <script>
                        $(document).ready(function() {
                            $('.summernote').summernote();
                        });
                    </script>
                    <form action="{{ route('admin_post_update',$row_data->id) }}" method="post" enctype="multipart/form-data">
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
                                    <select name="post_category_id" class="form-control select2">
                                        @foreach($post_categories as $item)
                                            <option value="{{ $item->id }}" @if($item->id == $row_data->post_category_id) selected @endif>{{ $item->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Title *</label>
                                    <input type="text" class="form-control" name="title" value="{{ $row_data->title }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Slug *</label>
                                    <input type="text" class="form-control" name="slug" value="{{ $row_data->slug }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Short Description *</label>
                                    <textarea name="short_description" class="form-control h_100" cols="30" rows="10">{{ $row_data->short_description }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Description *</label>
                                    <textarea name="description" class="form-control summernote" cols="30" rows="10">

                                        {{ $row_data->description }}
                                    
                                    </textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Show Comment? *</label>
                                    <select name="show_comment" class="form-control select2">
                                        <option value="Yes" @if($row_data->show_comment == 'Yes') selected @endif>Yes</option>
                                        <option value="No" @if($row_data->show_comment == 'No') selected @endif>No</option>
                                    </select>
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