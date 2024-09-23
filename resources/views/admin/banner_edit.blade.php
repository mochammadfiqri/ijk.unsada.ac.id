@extends('admin.layout.app')

@section('heading', 'Edit Banner')

@section('button')
<a href="{{ route('admin_banner_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_banner_update', $banner_data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Existing Photo *</label>
                            <div>
                                <img src="{{ asset('uploads/'.$banner_data->photo) }}" alt="" style="width:150px;height:100px">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo *</label>
                            <div><input type="file" name="photo"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="caption" value="{{ $banner_data->caption }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>URL *</label>
                            <input type="text" class="form-control" name="url" value="{{ $banner_data->url }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Active</label>
                            <select name="active" class="form-control">
                            <option value="1" @if($banner_data->active == 1) selected @endif>Active</option>
                            <option value="0" @if($banner_data->active == 0) selected @endif>Non Active</option>
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