@extends('front.layout.app')
@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    @if(!session()->get('session_short_name'))
                        {!! $page_data->title !!}
                    @elseif (session()->get('session_short_name') == 'id')
                        {!! $page_data->title !!}
                    @elseif (session()->get('session_short_name') == 'en')
                        {!! $page_data->title_en !!}
                    @elseif (session()->get('session_short_name') == 'jp')
                        {!! $page_data->title_jp !!}
                    @else
                    @endif
                </h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
                        <li class="breadcrumb-item">{{ FACULTY }}</li>
                        <li class="breadcrumb-item">{!! $faculty->title !!}</li>
                        <li class="breadcrumb-item active" aria-current="page">
                        @if(!session()->get('session_short_name'))
                            {!! $page_data->title !!}
                        @elseif (session()->get('session_short_name') == 'id')
                            {!! $page_data->title !!}
                        @elseif (session()->get('session_short_name') == 'en')
                            {!! $page_data->title_en !!}
                        @elseif (session()->get('session_short_name') == 'jp')
                            {!! $page_data->title_jp !!}
                        @else
                        @endif
                        </li>
                    </ol>
                </nav>
                
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="mt-4 mb-4">
                    <h2>Keunggulan</h2>
                    <div class="col-md-12">
                    @if(!session()->get('session_short_name'))
                        {!! $page_data->info !!}
                    @elseif (session()->get('session_short_name') == 'id')
                        {!! $page_data->info !!}
                    @elseif (session()->get('session_short_name') == 'en')
                        {!! $page_data->info_en !!}
                    @elseif (session()->get('session_short_name') == 'jp')
                        {!! $page_data->info_jp !!}
                    @else
                    @endif
                    </div>
                </div>
               
                <div class="mt-4 mb-4">
                    <h2>Prospek Karir</h2>
                    <div class="row">
                    @if(!session()->get('session_short_name'))
                        {!! $page_data->detail !!}
                    @elseif (session()->get('session_short_name') == 'id')
                        {!! $page_data->detail !!}
                    @elseif (session()->get('session_short_name') == 'en')
                        {!! $page_data->detail_en !!}
                    @elseif (session()->get('session_short_name') == 'jp')
                        {!! $page_data->detail_jp !!}
                    @else
                    @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                 @if($page_data->photo)
                    <img class="img-fluid" width="100%" src="{{ asset('uploads/pages/'.$page_data->photo) }}" alt="">
                @else
                    <img class="img-fluid" width="100%" src="{{ asset('uploads/noimage.jpg') }}" alt="">
                @endif
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <h4>Informasi Pendaftaran</h4>
                        <div><a href="{!!$page_data->url!!}" class="btn btn-primary">Klik Disini</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection