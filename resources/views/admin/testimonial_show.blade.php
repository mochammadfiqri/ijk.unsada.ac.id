@extends('admin.layout.app')

@section('heading', 'Testimonial')

@section('button')
<a href="{{ route('admin_testimonial_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                    <th>No.</th>
                                    <th>Photo</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Company</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($testimonials as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/testimonials/'.$row->testimonial_photo) }}" alt="" style="width:80px;height:80px">
                                    </td>
                                    <td>{{ $row->testimonial_author }}</td>
                                    <td>{{ $row->testimonial_title }}</td>
                                    <td>{{ $row->testimonial_company}}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_testimonial_edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin_testimonial_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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