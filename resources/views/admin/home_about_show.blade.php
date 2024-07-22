@extends('admin.layout.app')

@section('heading', 'Edit Home Page About')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_home_about_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('uploads/'.$page_data->about_photo) }}" alt="" class="profile-photo w_100_p">
                                <input type="file" class="form-control mt_10" name="about_photo">
                            </div>
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Subtitle</label>
                                    <input type="text" class="form-control" name="about_subtitle" value="{{ $page_data->about_subtitle }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Title *</label>
                                    <input type="text" class="form-control" name="about_title" value="{{ $page_data->about_title }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Description</label>
                                    <textarea name="about_description" class="form-control h_100" cols="30" rows="10">{{ $page_data->about_description }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Person Name</label>
                                    <input type="text" class="form-control" name="about_person_name" value="{{ $page_data->about_person_name }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Person Phone</label>
                                    <input type="text" class="form-control" name="about_person_phone" value="{{ $page_data->about_person_phone }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Person Email</label>
                                    <input type="text" class="form-control" name="about_person_email" value="{{ $page_data->about_person_email }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Icon 1</label>
                                    <input type="text" class="form-control" name="about_icon1" value="{{ $page_data->about_icon1 }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Icon 1 URL</label>
                                    <input type="text" class="form-control" name="about_icon1_url" value="{{ $page_data->about_icon1_url }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Icon 2</label>
                                    <input type="text" class="form-control" name="about_icon2" value="{{ $page_data->about_icon2 }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Icon 2 URL</label>
                                    <input type="text" class="form-control" name="about_icon2_url" value="{{ $page_data->about_icon2_url }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Icon 3</label>
                                    <input type="text" class="form-control" name="about_icon3" value="{{ $page_data->about_icon3 }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Icon 3 URL</label>
                                    <input type="text" class="form-control" name="about_icon3_url" value="{{ $page_data->about_icon3_url }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Icon 4</label>
                                    <input type="text" class="form-control" name="about_icon4" value="{{ $page_data->about_icon4 }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Icon 4 URL</label>
                                    <input type="text" class="form-control" name="about_icon4_url" value="{{ $page_data->about_icon4_url }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Icon 5</label>
                                    <input type="text" class="form-control" name="about_icon5" value="{{ $page_data->about_icon5 }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Icon 5 URL</label>
                                    <input type="text" class="form-control" name="about_icon5_url" value="{{ $page_data->about_icon5_url }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Status</label>
                                    <select name="about_status" class="form-control">
                                        <option value="Show" @if($page_data->about_status == 'Show') selected @endif>Show</option>
                                        <option value="Hide" @if($page_data->about_status == 'Hide') selected @endif>Hide</option>
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