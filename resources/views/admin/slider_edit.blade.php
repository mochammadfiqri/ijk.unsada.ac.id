@extends('admin.layout.app')

@section('heading', 'Edit Slide')

@section('button')
<a href="{{ route('admin_slider_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_slider_update',$slider_data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Existing Photo *</label>
                            <div>
                                <img src="{{ asset('uploads/sliders/'.$slider_data->photo) }}" alt="" style="width:150px;height:100px">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo *</label>
                            <div><input type="file" name="photo"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="title" value="{{ $slider_data->title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Detail *</label>
                            <textarea name="detail" class="form-control snote" cols="30" rows="10">{{ $slider_data->detail }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL *</label>
                            <input type="text" class="form-control" name="url" value="{{ $slider_data->url }}">
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