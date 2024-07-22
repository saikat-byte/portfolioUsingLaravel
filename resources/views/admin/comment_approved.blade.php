@extends('admin.layout.app')

@section('heading', 'View Approved Comments')

@section('rightside_button')

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
                                    <th>Post</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($approved_comments as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('post',$item->rPost->slug) }}" target="_blank">{{ $item->rPost->title }}</a>
                                    </td>
                                    <td>{{ $item->person_name }}</td>
                                    <td>{{ $item->person_email }}</td>
                                    <td>{{ $item->person_comment }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_comment_make_pending',$item->id) }}" class="btn btn-primary btn-sm w_100_p mb_10">Make Pending</a>
                                        <a href="{{ route('admin_comment_delete',$item->id) }}" class="btn btn-danger btn-sm w_100_p" onClick="return confirm('Are you sure?');">Delete</a>
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