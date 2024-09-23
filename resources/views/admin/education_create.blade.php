@extends('admin.layout.app')

@section('heading', 'Tanbah Halaman')

@section('button')
<a href="{{ route('admin_education_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_education_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Title (ID) *</label>
                            <input type="text" class="form-control" id="title" name="title" value="">
                            <input type="hidden" class="form-control" id="slug" name="slug">
                        </div>
                        <div class="form-group mb-3">
                            <label>Title (EN) *</label>
                            <input type="text" class="form-control" id="title_en" name="title_en" value="">
                            <input type="hidden" class="form-control" id="slug_en" name="slug_en">
                        </div>
                        <div class="form-group mb-3">
                            <label>Title (JP) *</label>
                            <input type="text" class="form-control" id="title_jp" name="title_jp" value="">
                            <input type="hidden" class="form-control" id="slug_jp" name="slug_jp">
                        </div>
                        <div class="form-group mb-3">
                            <label>Detail (ID) *</label>
                            <textarea name="detail" class="form-control snote" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Detail (EN) *</label>
                            <textarea name="detail_en" class="form-control snote" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Detail (JP) *</label>
                            <textarea name="detail_jp" class="form-control snote" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Photo *</label>
                            <div><input type="file" name="photo"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" class="form-control" id="url" name="url" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label>Active</label>
                            <select name="active" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Want to send this to subscribers?</label>
                            <select name="subscriber_send_option" class="form-control">
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