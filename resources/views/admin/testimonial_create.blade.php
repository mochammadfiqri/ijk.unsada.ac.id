@extends('admin.layout.app')

@section('heading', 'Add Testimonial')

@section('button')
<a href="{{ route('admin_testimonial_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_testimonial_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Author *</label>
                            <input type="text" class="form-control" id="testimonial_author" name="testimonial_author" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" id="testimonial_title" name="testimonial_title" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label>Company *</label>
                            <input type="text" class="form-control" id="testimonial_company" name="testimonial_company" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label>Detail *</label>
                            <textarea name="testimonial_detail" class="form-control snote" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Photo *</label>
                            <div><input type="file" name="testimonial_photo"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Active</label>
                            <select name="active" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
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