@extends('admin.layout.app')

@section('heading', 'Edit Testimonial')

@section('button')
<a href="{{ route('admin_testimonial_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_testimonial_update',$testimonial_single->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Author *</label>
                            <input type="text" class="form-control" id="testimonial_author" name="testimonial_author" value="{{ $testimonial_single->testimonial_author }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" id="testimonial_title" name="testimonial_title" value="{{ $testimonial_single->testimonial_title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Company *</label>
                            <input type="text" class="form-control" id="testimonial_company" name="testimonial_company" value="{{ $testimonial_single->testimonial_company }}" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label>Detail *</label>
                            <textarea name="testimonial_detail" class="form-control snote" cols="30" rows="10">{{ $testimonial_single->testimonial_detail }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Existing Photo *</label>
                            <div>
                                <img src="{{ asset('uploads/'.$testimonial_single->testimonial_photo) }}" alt="" style="width:300px;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo *</label>
                            <div><input type="file" name="testimonial_photo"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Active</label>
                            <select name="active" class="form-control">
                                <option value="1" @if($testimonial_single->active == '1') selected @endif>Yes</option>
                                <option value="0" @if($testimonial_single->active == '0') selected @endif>No</option>
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