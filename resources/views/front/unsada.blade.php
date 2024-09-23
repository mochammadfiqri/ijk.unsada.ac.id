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
                                <a href="{{ route('detail.unsada', $category->slug) }}">
                                    {!! $category->title !!}
                                </a>
                            @elseif (session()->get('session_short_name') == 'id')
                                <a href="{{ route('detail.unsada', $category->slug) }}">
                                    {!! $category->title !!}
                                </a>
                            @elseif (session()->get('session_short_name') == 'en')
                                <a href="{{ route('detail.unsada', $category->slug_en) }}">
                                    {!! $category->title_en !!}
                                </a>
                            @elseif (session()->get('session_short_name') == 'jp')
                                <a href="{{ route('detail.unsada', $category->slug_jp) }}">
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
                    <div class="news-content">
                    @if($page_data->photo)
                        <img class="img" src="{{ asset('uploads/pages/'.$page_data->photo) }}" alt="">
                    @else
                        <img class="img" src="{{ asset('uploads/noimage.jpg') }}" alt="">
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
                </div>
                

                    
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection