@extends('admin.layout.app')

@section('heading', 'Edit Skill')

@section('rightside_button')
<a href="{{ route('admin_skill_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_skill_update',$row_data->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control" name="name" value="{{ $row_data->name }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Percentage *</label>
                                    <input type="text" class="form-control" name="percentage" value="{{ $row_data->percentage }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Select Side</label>
                                    <select name="side" class="form-control">
                                        <option value="Left" @if($row_data->side == 'Left') selected @endif>Left</option>
                                        <option value="Right" @if($row_data->side == 'Right') selected @endif>Right</option>
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