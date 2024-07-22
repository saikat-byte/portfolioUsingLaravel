@extends('admin.layout.app')

@section('heading', 'Edit Home Page Skill')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_home_skill_update') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">SubTitle</label>
                                    <input type="text" class="form-control" name="skill_subtitle" value="{{ $page_data->skill_subtitle }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="skill_title" value="{{ $page_data->skill_title }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Status</label>
                                    <select name="skill_status" class="form-control">
                                        <option value="Show" @if($page_data->skill_status == 'Show') selected @endif>Show</option>
                                        <option value="Hide" @if($page_data->skill_status == 'Hide') selected @endif>Hide</option>
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