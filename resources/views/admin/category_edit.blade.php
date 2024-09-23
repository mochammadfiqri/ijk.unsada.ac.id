@extends('admin.layout.app')

@section('heading', 'Edit Kategori')

@section('button')
<a href="{{ route('admin_category_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_category_update',$category_single->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Category Name (ID) *</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category_single->category_name }}">
                            <input type="hidden" class="form-control" id="category_slug" name="category_slug" value="{{ $category_single->category_slug }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Category Name (EN) *</label>
                            <input type="text" class="form-control" id="category_name_en" name="category_name_en" value="{{ $category_single->category_name_en }}">
                            <input type="hidden" class="form-control" id="category_slug_en" name="category_slug_en" value="{{ $category_single->category_slug_en }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Category Name (JP) *</label>
                            <input type="text" class="form-control" id="category_name_jp" name="category_name_jp" value="{{ $category_single->category_name_jp }}">
                            <input type="hidden" class="form-control" id="category_slug_jp" name="category_slug_jp" value="{{ $category_single->category_slug_jp }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Active</label>
                            <select name="active" class="form-control">
                                <option value="1" @if($category_single->active == '1') selected @endif>Yes</option>
                                <option value="0" @if($category_single->active == '0') selected @endif>No</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Category Order *</label>
                            <input type="text" class="form-control" name="category_order" value="{{ $category_single->category_order }}">
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
        $('#category_name').on('input', function() {
            var judul = $(this).val().toLowerCase();
            var slug = judul.replace(/[^a-z0-9\s-]/g, '');
            slug = slug.replace(/\s+/g, '-');
            slug = slug.replace(/-+$/, '');
            $('#category_slug').val(slug);
        });

        $('#category_name_en').on('input', function() {
            var judul = $(this).val().toLowerCase();
            var slug = judul.replace(/[^a-z0-9\s-]/g, '');
            slug = slug.replace(/\s+/g, '-');
            slug = slug.replace(/-+$/, '');
            $('#category_slug_en').val(slug);
        });

        $('#category_name_jp').on('input', function() {
            var judul = $(this).val().toLowerCase();
            var slug = judul.replace(/[^a-z0-9\s-]/g, '');
            slug = slug.replace(/\s+/g, '-');
            slug = slug.replace(/-+$/, '');
            $('#category_slug_jp').val(slug);
        });
    });
</script>
@endsection