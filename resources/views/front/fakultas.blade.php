@extends('front.layout.app')
@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                {{ FACULTY }}
                </h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        {{ FACULTY }}
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
            <div class="col-lg-12 col-md-6">
                
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
            
            <div class="row mt-3">
                <h2 class="pt-6 mb-6"><span>Fakultas</span></h2>
                @foreach($faculties as $row)
                <div class="col-md-4 mt-3">
                    <a href="{{ route('detail.fakultas',$row->slug) }}">
                        @if($row->photo)
                            <img width="100%" height="250" src="{{ asset('uploads/pages/'.$row->photo) }}" alt="">
                        @else
                            <img width="100%" height="250" src="{{ asset('uploads/noimage.jpg') }}" alt="">
                        @endif
                    </a>
                    <h6 class="text-center  mt-1"> <a href="{{ route('detail.fakultas',$row->slug) }}">{{ $row->title }}</a></h6>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div>
@endsection