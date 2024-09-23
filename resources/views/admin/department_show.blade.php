@extends('admin.layout.app')

@section('heading', 'Program Studi/Jurusan')

@section('button')
<a href="{{ route('admin_department_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                    <th>Image</th>
                                    <th>Faculty</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pages as $row)
                                <tr>
                                  
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/pages/'.$row->photo) }}" alt="" style="width:150px;height:100px">
                                    </td>
                                    <td>{{ $row->faculty_name }}</td>
                                    <td>{{ $row->prodi_name }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_department_edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin_department_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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