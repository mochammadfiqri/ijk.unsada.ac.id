@extends('admin.layout.app')

@section('heading', 'Add Partner')

@section('button')
<a href="{{ route('admin_partner_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_partner_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Photo *</label>
                            <div><input type="file" name="photo"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="caption">
                        </div>
                        <div class="form-group mb-3">
                            <label>URL *</label>
                            <input type="text" class="form-control" name="url">
                        </div>
                        <div class="form-group mb-3">
                            <label>Type</label>
                            <select name="type" class="form-control">
                                <option value="0">University</option>
                                <option value="1">Company</option>
                            </select>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection