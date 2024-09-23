@extends('admin.layout.app')

@section('heading', 'Edit Halaman')

@section('button')
<a href="{{ route('admin_student_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_student_update',$page_single->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Title (ID) *</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $page_single->title }}">
                            <input type="hidden" class="form-control" id="slug" name="slug" value="{{ $page_single->slug }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Title (EN) *</label>
                            <input type="text" class="form-control" id="title_en" name="title_en" value="{{ $page_single->title_en }}">
                            <input type="hidden" class="form-control" id="slug_en" name="slug_en" value="{{ $page_single->slug_en }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Title (JP) *</label>
                            <input type="text" class="form-control" id="title_jp" name="title_jp" value="{{ $page_single->title_jp }}">
                            <input type="hidden" class="form-control" id="slug_jp" name="slug_jp" value="{{ $page_single->slug_jp }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Post Detail (ID) *</label>
                            <textarea name="detail" class="form-control snote" cols="30" rows="10">{{ $page_single->detail }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Post Detail (EN) *</label>
                            <textarea name="detail_en" class="form-control snote" cols="30" rows="10">{{ $page_single->detail_en }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Post Detail (JP) *</label>
                            <textarea name="detail_jp" class="form-control snote" cols="30" rows="10">{{ $page_single->detail_jp }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Existing Photo *</label>
                            <div>
                                <img src="{{ asset('uploads/pages/'.$page_single->photo) }}" alt="" style="width:300px;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo *</label>
                            <div><input type="file" name="photo"></div>
                        </div>
                       
                        <div class="form-group mb-3">
                            <label>Active</label>
                            <select name="active" class="form-control">
                                <option value="1" @if($page_single->active == '1') selected @endif>Yes</option>
                                <option value="0" @if($page_single->active == '0') selected @endif>No</option>
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
<script>
    $(document).ready(function() {
        $('#title').on('input', function() {
            var judul = $(this).val().toLowerCase();
            var slug = judul.replace(/[^a-z0-9\s-]/g, '');
            slug = slug.replace(/\s+/g, '-');
            slug = slug.replace(/-+$/, '');
            $('#slug').val(slug);
        });

        $('#title_en').on('input', function() {
            var judul = $(this).val().toLowerCase();
            var slug = judul.replace(/[^a-z0-9\s-]/g, '');
            slug = slug.replace(/\s+/g, '-');
            slug = slug.replace(/-+$/, '');
            $('#slug_en').val(slug);
        });

        $('#title_jp').on('input', function() {
            var judul = $(this).val().toLowerCase();
            var slug = judul.replace(/[^a-z0-9\s-]/g, '');
            slug = slug.replace(/\s+/g, '-');
            slug = slug.replace(/-+$/, '');
            $('#slug_jp').val(slug);
        });
    });
</script>
@endsection