@extends('admin.layout.app')

@section('heading', 'Dashboard')

@section('main_content')
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fab fa-atlassian"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Kategori Berita</h4>
                </div>
                <div class="card-body">
                    {{ $total_category }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Berita</h4>
                </div>
                <div class="card-body">
                    {{ $total_news }}
                </div>
            </div>
        </div>
    </div>
   
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Subscribers</h4>
                </div>
                <div class="card-body">
                    {{ $total_subscriber }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
