@extends('admin.layout.app')

@section('heading', 'Add Skill')

@section('rightside_button')
<a href="{{ route('admin_skill_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_skill_submit') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Percentage *</label>
                                    <input type="text" class="form-control" name="percentage">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Select Side</label>
                                    <select name="side" class="form-control">
                                        <option value="Left">Left</option>
                                        <option value="Right">Right</option>
                                    </select>
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