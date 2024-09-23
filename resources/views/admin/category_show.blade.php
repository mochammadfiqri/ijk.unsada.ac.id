@extends('admin.layout.app')

@section('heading', 'Kategori Berita')

@section('button')
<a href="{{ route('admin_category_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                    <th>Category Name (ID)</th>
                                    <th>Category Name (EN)</th>
                                    <th>Category Name (JP)</th>
                                    <th>Status</th>
                                    <th>Order</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->category_name }}</td>
                                    <td>{{ $row->category_name_en }}</td>
                                    <td>{{ $row->category_name_jp }}</td>
                                    <td>@if($row->active == '1')
                                         Active
                                         @else
                                         Non active
                                         @endif</td>
                                    <td>{{ $row->category_order }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_category_edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin_category_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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