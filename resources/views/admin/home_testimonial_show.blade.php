@extends('admin.layout.app')

@section('heading', 'Edit Home Page Testimonial')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_home_testimonial_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Subtitle</label>
                                    <input type="text" class="form-control" name="testimonial_subtitle" value="{{ $page_data->testimonial_subtitle }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="testimonial_title" value="{{ $page_data->testimonial_title }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Existing Background</label>
                                    <div>
                                        <img src="{{ asset('uploads/'.$page_data->testimonial_background) }}" alt="" class="w_200">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Change Background</label>
                                    <div><input type="file" name="testimonial_background"></div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Status</label>
                                    <select name="testimonial_status" class="form-control">
                                        <option value="Show" @if($page_data->testimonial_status == 'Show') selected @endif>Show</option>
                                        <option value="Hide" @if($page_data->testimonial_status == 'Hide') selected @endif>Hide</option>
                                    </select>
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