@extends('front.layout.app')
@section('main_content')

<style>
.section-title h2 {
    text-align: center;
    font-size: 18px;
    font-weight: 600;
    text-transform: uppercase;
    padding-bottom: 6px;
    color: #000;
    letter-spacing: 0.3px;
    padding: 0;
}
.section-title::after {
    content: "";
    height: 3px;
    background: #fbb900;
    width: 150px;
    position: absolute;
    left: 0;
    right: 0;
    margin: auto;
}
/****************/
/*	 BX-SLIDER 	*/
/****************/

.bx-controls {
	position: relative;
}
.bx-wrapper .bx-pager {
    text-align: center;
    padding-top: 10px;
}
.bx-wrapper .bx-pager .bx-pager-item, .bx-wrapper .bx-controls-auto .bx-controls-auto-item {
    display: inline-block;
    *zoom: 1;
    *display: inline;
}
.bx-wrapper .bx-pager.bx-default-pager a {
    background: #666;
    text-indent: -9999px;
    display: block;
    width: 10px;
    height: 10px;
    margin: 0 5px;
    outline: 0;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
}

@media screen and (max-width: 767px) {
    .slide img {
        width: 70px !important;
        height: 70px !important;
    }
}


</style>


@php
    $slider_data = \App\Models\Slider::where('active',1)->get();
    $testimonial_data = \App\Models\Testimonial::where('active',1)->get();

@endphp

<section class="mt-4">
    <div class="card__container swiper">
        <div class="card__slider">
            <div class="swiper-wrapper">
                @foreach($slider_data as $slider)
                    <article class="card__article swiper-slide">
                    <div class="container">
                        <!-- row -->
                        <div class="row align-items-center mb-2">
                            <div class="col-md-6 no-padding" data-aos="zoom-in-right">
                                <div class="ms-xxl-8 me-xxl-9 mb-8 mb-md-0 text-center text-md-start">
                                    <div class="middle-line">
                                        <h1 class="mb-6"><span>{{$slider->title}}</span></h1>
                                    </div>
                                    <p class="mb-6">
                                    {!! Str::words(strip_tags($slider->detail), 32, '...'); !!}
                                    </p>
                                    <p class="mb-0 lead"><a href="{{ $slider->url }}" class="btn btn-primary">SELENGKAPNYA</a></p>
                                </div>
                            </div>
                            <div class="col-md-6 no-padding" data-aos="zoom-in-left">
                                <div class="">
                                    <img src="{{ asset('uploads/sliders').'/'.$slider->photo }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    </article>
                @endforeach
            </div>
        </div>

        <!-- Navigation buttons -->
        <div class="swiper-button-next">
            <i class="ri-arrow-right-s-line"></i>
        </div>
        <div class="swiper-button-prev">
            <i class="ri-arrow-left-s-line"></i>
        </div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>

<section class="mt-4 mb-4">
    <!-- container -->
    
</section>

<section class="mb-4">
    <div class="col-md-12">
        <div class="acme-news-ticker">
            <div class="acme-news-ticker-label">{{ LATEST_NEWS }}</div>
            <div class="acme-news-ticker-box">
                <ul class="my-news-ticker">
                    @php $i=0; @endphp
                    @foreach($post_data as $item)
                        @php $i++; @endphp
                        @if($i>$setting_data->news_ticker_total)
                            @break
                        @endif
                        <li><a href="{{ route('berita_detail',$item->post_slug) }}" class="text-primary">{{ $item->post_title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="mt-4 mb-4">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row align-items-center mb-2">
        <div class="col-md-6 no-padding" data-aos="zoom-in-left">
                <div class="">
                    <img src="{{ asset('uploads/pages').'/'.$pendidikan->photo }}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6 no-padding" data-aos="zoom-in-right">
                <div class="ms-xxl-8 me-xxl-9 mb-8 mb-md-0 text-center text-md-start">
                    <div class="middle-line">
                        <h1 class="mb-6"><span>{{$pendidikan->title}}</span></h1>
                    </div>
                    <p class="mb-6">
                    {!! Str::words(strip_tags($pendidikan->detail), 32, '...'); !!}
                    </p>
                    <p class="mb-0 lead"><a href="{{ route('detail.page', $pendidikan->slug) }}" class="btn btn-primary">SELENGKAPNYA</a></p>
                </div>
            </div>
            
        </div>
    </div>
</section>

<section class="bg-unsada py-4 text-primary">
    <div class="container">
        <div class="row">
            <div class="offset-lg-1 col-lg-10">
                <div class="row">
                    <div class="row row-cols-2 row-cols-md-4">
                        <div class="col-xl-6 col-md-4 col-6 mb-4" data-aos="fade-up-right">
                          <div class="card-item">
                              <div class="product-detail-container p-3 mb-3">
                                <h2 class="mb-2">{{$pendaftaran->title}}</h2>
                                <p class="text-primary small">
                                    {!! Str::words(strip_tags($pendaftaran->detail), 32, '...'); !!}
                                </p>
                                <p class="mb-0 lead"><a href="{{ route('detail.page', $pendaftaran->slug) }}" class="btn btn-primary">SELENGKAPNYA</a></p>
                              </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-4 col-6 mb-4" data-aos="fade-up-left">
                          <div class="card-item">
                              <div class="product-detail-container p-3">
                                <h2 class="mb-2">{{$beasiswa->title}}</h2>
                                <p class="text-primary small">
                                    {!! Str::words(strip_tags($beasiswa->detail), 32, '...'); !!}
                                </p>
                                <p class="mb-0 lead"><a href="{{ route('detail.service', $beasiswa->slug) }}" class="btn btn-primary">SELENGKAPNYA</a></p>
                              </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-4 col-6 aos-init" data-aos="fade-up-right">
                          <div class="card-item">
                              <div class="product-detail-container p-3">
                                <h2 class="mb-2">{{$fasilitas->title}}</h2>
                                <p class="text-primary small">
                                {!! Str::words(strip_tags($fasilitas->detail), 32, '...'); !!}
                                </p>
                                <p class="mb-0 lead"><a href="{{ route('detail.page', $fasilitas->slug) }}" class="btn btn-primary">SELENGKAPNYA</a></p>
                              </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-4 col-6 aos-init" data-aos="fade-up-left">
                          <div class="card-item">
                              <div class="product-detail-container p-3 mb-3">
                                <h2 class="mb-2">{{$kegiatan->title}}</h2>
                                <p class="text-primary small">
                                {!! Str::words(strip_tags($kegiatan->detail), 32, '...'); !!}
                                </p>
                                <p class="mb-0 lead"><a href="{{ route('detail.page', $kegiatan->slug) }}" class="btn btn-primary">SELENGKAPNYA</a></p>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mt-4 mb-4">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row align-items-center mb-2">
            <div class="col-md-6 no-padding" data-aos="zoom-in-left">
                <div class="">
                    <img src="{{ asset('uploads/pages').'/'.$kemahasiswaan->photo }}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6 no-padding" data-aos="zoom-in-right">
                <div class="ms-xxl-8 me-xxl-9 mb-8 mb-md-0 text-center text-md-start">
                    <div class="middle-line">
                        <h1 class="mb-6"><span>{{$kemahasiswaan->title}}</span></h1>
                    </div>
                    <p class="mb-6">{!! html_entity_decode($kemahasiswaan->detail) !!}</p>
                    <p class="mb-0 lead"><a href="{{ route('detail.page', $kemahasiswaan->slug) }}" class="btn btn-primary">SELENGKAPNYA</a></p>
                </div>
            </div>
            
        </div>
    </div>
</section>
<section class="mt-4 mb-4">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row align-items-center mb-2">
            <div class="col-md-6 no-padding" data-aos="fade-up-left">
                <div class="ms-xxl-8 me-xxl-9 mb-8 mb-md-0 text-center text-md-start">
                    <div class="middle-line">
                        <h1 class="mb-6"><span>{{$alumni->title}}</span></h1>
                    </div>
                    <p class="mb-6">{!! html_entity_decode($alumni->detail) !!}</p>
                    <p class="mb-0 lead"><a href="{{ route('detail.page', $alumni->slug) }}" class="btn btn-primary">SELENGKAPNYA</a></p>
                </div>
            </div>
            <div class="col-md-6 no-padding" data-aos="fade-up-right">
                <div class="">
                    <img src="{{ asset('uploads/pages').'/'.$alumni->photo }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="card__container swiper">
        <div class="card__content">
            <div class="swiper-wrapper">
                @foreach($testimonial_data as $testi)
                    <article class="card__article swiper-slide">
                        <div class="col-md-12 mt-3">
                            <div class="testimonial" data-aos="fade-up-left">
                                <div class="image">
                                    <div class="clip"></div>
                                    <img src="{{ asset('uploads/testimonials/'.$testi->testimonial_photo) }}" height="130" width="130" />
                                </div>
                                <p>
                                    {!! html_entity_decode($testi->testimonial_detail) !!}
                                </p>
                                <div class="source">		
                                    <div class="student">{{$testi->testimonial_author}}</div>
                                    <div class="position">{{$testi->testimonial_title}}</div>
                                    <div class="position">{{$testi->testimonial_company}}</div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>

        <!-- Navigation buttons -->
        <div class="swiper-button-next">
            <i class="ri-arrow-right-s-line"></i>
        </div>
        <div class="swiper-button-prev">
            <i class="ri-arrow-left-s-line"></i>
        </div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>
<section class="mt-4 mb-4">
    <div class="home-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8  col-md-12 left">
                    <h1 class="mb-6"><span>Berita</span></h1>
                </div>
                <div class="col-lg-4  col-md-12 text-md-end">
                    <a href="{{ route('berita') }}" class="btn btn-primary">SELENGKAPNYA <i class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-lg-8 col-md-12 left">
                    @php $i=0; @endphp
                    @foreach($post_data as $item)
                    @php $i++; @endphp
                    @if($i>1)
                        @break
                    @endif
                    <div class="inner" data-aos="zoom-in-left">
                        <div class="photo">
                            <div class="bg"></div>
                            <img src="{{ asset('uploads/'.$item->post_photo) }}" alt="">
                            <div class="text">
                                <div class="text-inner">
                                    <div class="category">
                                        <span class="badge bg-success badge-sm">{{ $item->category_name }}</span>
                                    </div>
                                    <h2><a href="{{ route('berita_detail',$item->post_slug) }}">{{ $item->post_title }}</a></h2>
                                    <div class="date-user">
                                        <div class="user">
                                            @if($item->author_id==0)
                                                @php
                                                $user_data = \App\Models\Admin::where('id',$item->admin_id)->first();
                                                @endphp
                                            @else
                                                @php
                                                $user_data = \App\Models\Author::where('id',$item->author_id)->first();
                                                @endphp
                                            @endif
                                            <a href="javascript:void;">{{ $user_data->name }}</a>
                                        </div>
                                        <div class="date">
                                            @php
                                            $ts = strtotime($item->updated_at);
                                            $updated_date = date('d F, Y',$ts);
                                            @endphp
                                            <a href="javascript:void;">{{ $updated_date }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-4 col-md-12">
                    @php $i=0; @endphp
                    @foreach($post_data as $item)
                    @php $i++; @endphp
                    @if($i==1)
                        @continue
                    @endif
                    @if($i>3)
                        @break
                    @endif
                    <div class="inner inner-right" data-aos="zoom-in-right">
                        <div class="photo">
                            <div class="bg"></div>
                            <img src="{{ asset('uploads/'.$item->post_photo) }}" alt="">
                            <div class="text">
                                <div class="text-inner">
                                    <div class="category">
                                        <span class="badge bg-success badge-sm">{{ $item->category_name }}</span>
                                    </div>
                                    <h2><a href="{{ route('berita_detail',$item->post_slug) }}">{{ $item->post_title }}</a></h2>
                                    <div class="date-user">
                                        <div class="user">
                                            @if($item->author_id==0)
                                                @php
                                                $user_data = \App\Models\Admin::where('id',$item->admin_id)->first();
                                                @endphp
                                            @else
                                                @php
                                                $user_data = \App\Models\Author::where('id',$item->author_id)->first();
                                                @endphp
                                            @endif
                                            <a href="javascript:void;">{{ $user_data->name }}</a>
                                        </div>
                                        <div class="date">
                                            @php
                                            $ts = strtotime($item->updated_at);
                                            $updated_date = date('d F, Y',$ts);
                                            @endphp
                                            <a href="javascript:void;">{{ $updated_date }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>


<section class="mt-4 mb-4 hidden-mobile">
	<div class="container">
		<div class="row">
            <div class="col-md-12">
			<div class="section-title partner">
				<h2> University Partnerships </h2>
			</div>
			<div class="carousel-partner-desktop">
                @foreach($partner_data as $partner)
				<div class="slide">
                    <a href="{{ $partner->url }}">
                    <img src="{{ asset('uploads/'.$partner->photo) }}" height="100" alt="{{ $partner->caption }}">
                    </a>
                </div>
                @endforeach
			</div>
            <div class="section-title client">
				<h2> Company Partnerships </h2>
			</div>
			<div class="carousel-client-desktop">
                @foreach($client_data as $client)
				<div class="slide">
                    <a href="{{ $client->url }}">
                    <img src="{{ asset('uploads/'.$client->photo) }}" height="100" alt="{{ $client->caption }}">
                    </a>
                </div>
                @endforeach
			</div>
		</div>
        </div>
	</div>
</section>

<section class="mt-4 mb-4 hidden-desktop">
	<div class="container">
		<div class="row">
            <div class="col-md-12">
			<div class="section-title partner">
				<h2> University Partnerships </h2>
			</div>
			<div class="carousel-partner-mobile">
                @foreach($partner_data as $partner)
				<div class="slide">
                    <a href="{{ $partner->url }}">
                    <img src="{{ asset('uploads/'.$partner->photo) }}"  height="100" alt="{{ $partner->caption }}">
                    </a>
                </div>
                @endforeach
			</div>
            <div class="section-title client">
				<h2> Company Partnerships </h2>
			</div>
			<div class="carousel-client-mobile">
                @foreach($client_data as $client)
				<div class="slide">
                    <a href="{{ $client->url }}">
                    <img src="{{ asset('uploads/'.$client->photo) }}"  alt="{{ $client->caption }}">
                    </a>
                </div>
                @endforeach
			</div>
		</div>
        </div>
	</div>
</section>
<section class="mt-4 mb-4 hidden-mobile">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126903.4481275965!2d106.8143479528735!3d-6.298805838200796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698cb9fdf4455d%3A0x25ba1bc88e8121ea!2sUniversitas%20Darma%20Persada!5e0!3m2!1sen!2sus!4v1717693582741!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
<script>
        $(document).ready(function(){
            $("#category").on("change", function(){
                var categoryId = $("#category").val();
                if(categoryId) {
                    $.ajax({
                        type: "get",
                        url: "{{ url('/subcategory-by-category/') }}" + "/" + categoryId,
                        success: function(response) {
                            $("#sub_category").html(response.sub_category_data);
                        },
                        error:function(err){

                        }
                    })
                }
            });
        });

        $(document).ready(function(){
            $('.carousel-partner-desktop').bxSlider({
                auto: true,
                slideWidth: 250,
                minSlides: 1,
                maxSlides: 6,
                slideMargin: 50,
                controls: false
            });

            $('.carousel-client-desktop').bxSlider({
                auto: true,
                slideWidth: 250,
                minSlides: 1,
                maxSlides: 6,
                slideMargin: 50,
                controls: false
            });

            $('.carousel-partner-mobile').bxSlider({
                auto: true,
                slideWidth:50,
                minSlides: 1,
                maxSlides: 6,
                slideMargin: 50,
                controls: false
            });

            $('.carousel-client-mobile').bxSlider({
                auto: true,
                slideWidth:50,
                minSlides: 1,
                maxSlides: 6,
                slideMargin: 50,
                controls: false
            });
        });

        let swiperSliders = new Swiper(".card__slider", {
            loop: true,
            spaceBetween: 32,
            grabCursor: true,
            autoplay: {
                delay: 3000,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },

            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            breakpoints:{
                968: {
                slidesPerView: 1,
                },
            },
        });

        let swiperCards = new Swiper(".card__content", {
            loop: true,
            spaceBetween: 32,
            grabCursor: true,
            autoplay: {
                delay: 3000,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },

            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            breakpoints:{
                600: {
                slidesPerView: 1,
                },
                968: {
                slidesPerView: 2,
                },
            },
        });
</script>

@endsection
