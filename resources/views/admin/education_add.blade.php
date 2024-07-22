@extends('admin.layout.app')

@section('heading', 'Add Education')

@section('rightside_button')
<a href="{{ route('admin_education_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_education_submit') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Degree *</label>
                                    <input type="text" class="form-control" name="degree">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Institute *</label>
                                    <input type="text" class="form-control" name="institute">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Time *</label>
                                    <input type="text" class="form-control" name="time">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Order *</label>
                                    <input type="text" class="form-control" name="item_order">
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