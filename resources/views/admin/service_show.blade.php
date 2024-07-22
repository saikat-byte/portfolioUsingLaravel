@extends('admin.layout.app')

@section('heading', 'View Services')

@section('rightside_button')
<a href="{{ route('admin_service_add') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
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
                                    <th>Photo</th>
                                    <th>Banner</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/'.$item->photo) }}" alt="" class="w_150">
                                    </td>
                                    <td>
                                        <img src="{{ asset('uploads/'.$item->banner) }}" alt="" class="w_150">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_service_edit',$item->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin_service_delete',$item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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