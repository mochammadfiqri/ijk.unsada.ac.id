@extends('front.layout.app')
<style>
    .list-group-item a:hover{
        color : #fdcb2c;
    }

    .list-group-item.active{
        background-color: transparent !important;
        background: transparent !important;
    }
    .list-group-item.active a{
        color : #fdcb2c !important;
    }

    

</style>
<title>Unsada - Universitas Darma Persada -  
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
</title>
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
        <div class="col-lg-12">
            
                <div class="main-text">
                    @if($page_data->slug == 'fasilitas'|| $page_data->slug == 'laporan-tahunan')
                        @if($page_data->photo)
                            <img class="img" src="{{ asset('uploads/pages/'.$page_data->photo) }}" width="100%" alt="">
                        @else
                            <img class="img" src="{{ asset('uploads/noimage.jpg') }}" width="100%" alt="">
                        @endif
                        <p class="pt-3">
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
                        </p>
                    @else
                    <div class="news-content">
                        @if($page_data->photo)
                            <img class="img" src="{{ asset('uploads/pages/'.$page_data->photo) }}" width="100%" alt="">
                        @else
                            <img class="img" src="{{ asset('uploads/noimage.jpg') }}" width="100%" alt="">
                        @endif
                        <p>
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
                        </p>
                    </div>
                    @endif
                    
                </div>
                
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">  
                @foreach($related_page_array as $item)
                @if($page_data->id === $item->parent_id)
                <div class="col-md-4">
                    <img src="{{ asset('uploads/pages/'.$item->photo) }}" alt="">
                    <h5><a href="{{ route('detail.page',$item->slug) }}">{{ $item->title }}</a></h5>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection