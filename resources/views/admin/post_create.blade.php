@extends('admin.layout.app')

@section('heading', 'Add Berita')

@section('button')
<a href="{{ route('admin_post_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_post_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Title (ID) *</label>
                            <input type="text" class="form-control" id="post_title" name="post_title" value="">
                            <input type="hidden" class="form-control" id="post_slug" name="post_slug">
                        </div>
                        <div class="form-group mb-3">
                            <label>Title (EN) *</label>
                            <input type="text" class="form-control" id="post_title_en" name="post_title_en" value="">
                            <input type="hidden" class="form-control" id="post_slug_en" name="post_slug_en">
                        </div>
                        <div class="form-group mb-3">
                            <label>Title (JP) *</label>
                            <input type="text" class="form-control" id="post_title_jp" name="post_title_jp" value="">
                            <input type="hidden" class="form-control" id="post_slug_jp" name="post_slug_jp">
                        </div>
                        <div class="form-group mb-3">
                            <label>Detail (ID) *</label>
                            <textarea name="post_detail" class="form-control snote" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Detail (EN) *</label>
                            <textarea name="post_detail_en" class="form-control snote" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Detail (JP) *</label>
                            <textarea name="post_detail_jp" class="form-control snote" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Photo *</label>
                            <div><input type="file" name="post_photo"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Category *</label>
                            <select name="category_id" class="form-control select2">
                                @foreach($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Sharable?</label>
                            <select name="is_share" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Comment?</label>
                            <select name="is_comment" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Tags</label>
                            <input type="text" class="form-control" name="tags" value="">
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
        $('#post_title').on('input', function() {
            var judul = $(this).val().toLowerCase();
            var slug = judul.replace(/[^a-z0-9\s-]/g, '');
            slug = slug.replace(/\s+/g, '-');
            slug = slug.replace(/-+$/, '');
            $('#post_slug').val(slug);
        });

        $('#post_title_en').on('input', function() {
            var judul = $(this).val().toLowerCase();
            var slug = judul.replace(/[^a-z0-9\s-]/g, '');
            slug = slug.replace(/\s+/g, '-');
            slug = slug.replace(/-+$/, '');
            $('#post_slug_en').val(slug);
        });

        $('#post_title_jp').on('input', function() {
            var judul = $(this).val().toLowerCase();
            var slug = judul.replace(/[^a-z0-9\s-]/g, '');
            slug = slug.replace(/\s+/g, '-');
            slug = slug.replace(/-+$/, '');
            $('#post_slug_jp').val(slug);
        });
    });
</script>
@endsection