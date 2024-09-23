@extends('admin.layout.app')

@section('heading', 'Edit Laporan Tahunan')

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_page_laporan_update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Title (ID) *</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $page_data->title }}">
                            <input type="hidden" class="form-control" id="slug" name="slug" value="{{ $page_data->slug }}">
                            <input type="hidden" class="form-control" id="id" name="id" value="{{ $page_data->id }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Title (EN) *</label>
                            <input type="text" class="form-control" id="title_en" name="title_en" value="{{ $page_data->title_en }}">
                            <input type="hidden" class="form-control" id="slug_en" name="slug_en" value="{{ $page_data->slug_en }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Title (JP) *</label>
                            <input type="text" class="form-control" id="title_jp" name="title_jp" value="{{ $page_data->title_jp }}">
                            <input type="hidden" class="form-control" id="slug_jp" name="slug_jp" value="{{ $page_data->slug_jp }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Post Detail (ID) *</label>
                            <textarea name="detail" class="form-control snote" cols="30" rows="10">{{ $page_data->detail }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Post Detail (EN) *</label>
                            <textarea name="detail_en" class="form-control snote" cols="30" rows="10">{{ $page_data->detail_en }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Post Detail (JP) *</label>
                            <textarea name="detail_jp" class="form-control snote" cols="30" rows="10">{{ $page_data->detail_jp }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Existing Photo *</label>
                            <div>
                                <img src="{{ asset('uploads/page/'.$page_data->photo) }}" alt="" style="width:300px;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo *</label>
                            <div><input type="file" name="photo"></div>
                        </div>
                       
                        <div class="form-group mb-3">
                            <label>Active</label>
                            <select name="active" class="form-control">
                                <option value="1" @if($page_data->active == '1') selected @endif>Yes</option>
                                <option value="0" @if($page_data->active == '0') selected @endif>No</option>
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