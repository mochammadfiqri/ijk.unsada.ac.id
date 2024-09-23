@extends('admin.layout.app')

@section('heading', 'Edit menu')

@section('button')
<a href="{{ route('admin_menu_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_menu_update',$menu_data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group mb-3">
                            <label>Parent</label>
                            <select name="parent_id" class="form-control">
                                <option value="0">Menu Utama</option>
                                @foreach($menus as $row)
                                <option value="{{ $row->id }}" @if($row->id == $menu_data->parent_id) selected @endif>{{ $row->menu }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Menu ID *</label>
                            <input type="text" class="form-control" name="menu" value="{{ $menu_data->menu }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Menu EN *</label>
                            <input type="text" class="form-control" name="menu_en" value="{{ $menu_data->menu_en }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Menu JP *</label>
                            <input type="text" class="form-control" name="menu_jp" value="{{ $menu_data->menu_jp }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>URL *</label>
                            <input type="text" class="form-control" name="url" value="{{ $menu_data->url }}">
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