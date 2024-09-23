@extends('admin.layout.app')

@section('heading', 'Edit Berita')

@section('button')
<a href="{{ route('admin_post_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_post_update',$post_single->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Title (ID) *</label>
                            <input type="text" class="form-control" id="post_title" name="post_title" value="{{ $post_single->post_title }}">
                            <input type="hidden" class="form-control" id="post_slug" name="post_slug" value="{{ $post_single->post_slug }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Title (EN) *</label>
                            <input type="text" class="form-control" id="post_title_en" name="post_title_en" value="{{ $post_single->post_title_en }}">
                            <input type="hidden" class="form-control" id="post_slug_en" name="post_slug_en" value="{{ $post_single->post_slug_en }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Title (JP) *</label>
                            <input type="text" class="form-control" id="post_title_jp" name="post_title_jp" value="{{ $post_single->post_title_jp }}">
                            <input type="hidden" class="form-control" id="post_slug_jp" name="post_slug_jp" value="{{ $post_single->post_slug_jp }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Detail (ID) *</label>
                            <textarea name="post_detail" class="form-control snote" cols="30" rows="10">{{ $post_single->post_detail }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Detail (EN) *</label>
                            <textarea name="post_detail_en" class="form-control snote" cols="30" rows="10">{{ $post_single->post_detail_en }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Detail (JP) *</label>
                            <textarea name="post_detail_jp" class="form-control snote" cols="30" rows="10">{{ $post_single->post_detail_jp }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Existing Photo *</label>
                            <div>
                                <img src="{{ asset('uploads/'.$post_single->post_photo) }}" alt="" style="width:300px;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo *</label>
                            <div><input type="file" name="post_photo"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Category *</label>
                            <select name="category_id" class="form-control select2">
                                @foreach($categories as $item)
                                <option value="{{ $item->id }}" @if($item->id == $post_single->category_id) selected @endif>{{ $item->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Sharable?</label>
                            <select name="is_share" class="form-control">
                                <option value="1" @if($post_single->is_share == 1) selected @endif>Yes</option>
                                <option value="0" @if($post_single->is_share == 0) selected @endif>No</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Comment?</label>
                            <select name="is_comment" class="form-control">
                                <option value="1" @if($post_single->is_comment == 1) selected @endif>Yes</option>
                                <option value="0" @if($post_single->is_comment == 0) selected @endif>No</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Existing Tags</label>
                            <table class="table table-bordered">
                                @foreach($existing_tags as $item)
                                    <tr>
                                        <td>{{ $item->tag_name }}</td>
                                        <td>
                                            <a href="{{ route('admin_post_delete_tag', [$item->id,$post_single->id]) }}" onClick="return confirm('Are you sure?');">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="form-group mb-3">
                            <label>New Tags</label>
                            <input type="text" class="form-control" name="tags" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label>Active</label>
                            <select name="active" class="form-control">
                                <option value="1" @if($post_single->active == '1') selected @endif>Yes</option>
                                <option value="0" @if($post_single->active == '0') selected @endif>No</option>
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