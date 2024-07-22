@extends('admin.layout.app')

@section('heading', 'View Educations')

@section('rightside_button')
<a href="{{ route('admin_education_add') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Degree</th>
                                    <th>Institute</th>
                                    <th>Time</th>
                                    <th>Order</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->degree }}</td>
                                    <td>{{ $item->institute }}</td>
                                    <td>{{ $item->time }}</td>
                                    <td>{{ $item->item_order }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_education_edit',$item->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin_education_delete',$item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection