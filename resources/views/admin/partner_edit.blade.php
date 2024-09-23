@extends('admin.layout.app')

@section('heading', 'Edit Partner')

@section('button')
<a href="{{ route('admin_partner_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_partner_update',$partner_data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Existing Photo *</label>
                            <div>
                                <img src="{{ asset('uploads/'.$partner_data->photo) }}" alt="" style="width:150px;height:100px">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo *</label>
                            <div><input type="file" name="photo"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="caption" value="{{ $partner_data->caption }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>URL *</label>
                            <input type="text" class="form-control" name="url" value="{{ $partner_data->url }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Type</label>
                            <select name="type" class="form-control">
                                <option value="0" @if($partner_data->type == 0) selected @endif>University</option>
                                <option value="1" @if($partner_data->type == 1) selected @endif>Company</option>
                            </select>
                        </div>
                       
                    </div>
                </div>
            </div>
            
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection