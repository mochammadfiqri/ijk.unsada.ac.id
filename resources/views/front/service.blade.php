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
                        <li class="breadcrumb-item">{{ SERVICE }}</li>
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
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-3">
                    <ul class="list-group text-center">
                    @foreach($category_data as $category)
                    <li class="list-group-item {{ request()->segment(2) == $category->slug ? 'active' : '' }}">
                        <h5>
                            @if(!session()->get('session_short_name'))
                                <a href="{{ route('detail.service', $category->slug) }}">
                                    {!! $category->title !!}
                                </a>
                            @elseif (session()->get('session_short_name') == 'id')
                                <a href="{{ route('detail.service', $category->slug) }}">
                                    {!! $category->title !!}
                                </a>
                            @elseif (session()->get('session_short_name') == 'en')
                                <a href="{{ route('detail.service', $category->slug_en) }}">
                                    {!! $category->title_en !!}
                                </a>
                            @elseif (session()->get('session_short_name') == 'jp')
                                <a href="{{ route('detail.service', $category->slug_jp) }}">
                                    {!! $category->title_jp !!}
                                </a>
                            @else
                            @endif
                            
                        </h5>
                    </li>
                    @endforeach
                    </ul>
                </div>
                <div class="col-md-9">
                <div class="main-text">
                @if($page_data->slug == 'beasiswa' || $page_data->slug ==  'layanan-mahasiswa' || $page_data->slug ==  'afiliasi-universitas-jepang')
                        @if($page_data->photo)
                            <img width="100%" height="500" src="{{ asset('uploads/pages/'.$page_data->photo) }}" width="100%" alt="">
                        @else
                            <img width="100%" height="500" src="{{ asset('uploads/noimage.jpg') }}" width="100%" alt="">
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
                        <img width="100%" height="500" src="{{ asset('uploads/pages/'.$page_data->photo) }}" width="100%" alt="">
                    @else
                        <img width="100%" height="500" src="{{ asset('uploads/noimage.jpg') }}" width="100%" alt="">
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
            </div>
        </div>
    </div>
</div>
@endsection