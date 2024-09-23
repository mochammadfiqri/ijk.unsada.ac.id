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
                        <li class="breadcrumb-item">{{ PROFILE }}</li>
                         <li class="breadcrumb-item active">
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
            <div class="col-md-3">
                <ul class="list-group text-center">
                @foreach($category_data as $category)
                <li class="list-group-item {{ request()->segment(2) == $category->slug ? 'active' : '' }}">
                    <h5>
                        @if(!session()->get('session_short_name'))
                            <a href="{{ route('detail.about', $category->slug) }}">
                                {!! $category->title !!}
                            </a>
                        @elseif (session()->get('session_short_name') == 'id')
                            <a href="{{ route('detail.about', $category->slug) }}">
                                {!! $category->title !!}
                            </a>
                        @elseif (session()->get('session_short_name') == 'en')
                            <a href="{{ route('detail.about', $category->slug_en) }}">
                                {!! $category->title_en !!}
                            </a>
                        @elseif (session()->get('session_short_name') == 'jp')
                            <a href="{{ route('detail.about', $category->slug_jp) }}">
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
                    <div class="row">
                    @if($page_data->slug == 'struktur-tugas')
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
                    @else
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
                        @if($page_data->slug == '' || $page_data->slug == 'tentang-unsada')
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126903.4481275965!2d106.8143479528735!3d-6.298805838200796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698cb9fdf4455d%3A0x25ba1bc88e8121ea!2sUniversitas%20Darma%20Persada!5e0!3m2!1sen!2sus!4v1717693582741!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        @endif
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection