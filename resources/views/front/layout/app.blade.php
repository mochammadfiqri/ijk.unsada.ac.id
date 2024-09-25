@if(!session()->get('session_short_name'))
    @php
    $current_short_name = $global_short_name;
    @endphp
@else
    @php
    $current_short_name = session()->get('session_short_name');
    @endphp
@endif

<!DOCTYPE html>
<html lang="en">
    <head>
        @include('front.layout.meta')
        @include('front.layout.styles')
        @include('front.layout.scripts')
        <link rel="icon" type="image/png" href="{{ asset('uploads/'.$global_setting_data->favicon) }}">
        <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6212352ed76fda0a"></script>

        <!-- Google Analytics -->
        @if($global_setting_data->analytic_status == 'Show')
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $global_setting_data->analytic_id }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $global_setting_data->analytic_id }}');
        </script>
        @endif

        <style>
            .website-menu,
            .website-menu .bg-primary,
            .acme-news-ticker-label,
            .search-section button[type="submit"],
            .home-content .left .news-total-item .see-all a,
            /* .video-content, */
            .top::before,
            .footer ul.social li a,
            .footer input[type="submit"],
            .scroll-top,
            .widget .poll button,
            .nav-pills .nav-link.active,
            .related-news .owl-nav .owl-prev,
            .related-news .owl-nav .owl-next,
            .bg-website,
            .page-item.active .page-link {
                background: #{{ $global_setting_data->theme_color_2 }}!important;
                color: #{{ $global_setting_data->theme_color_1 }}!important;
            }

            .acme-news-ticker,
            .page-item.active .page-link {
                border-color: #{{ $global_setting_data->theme_color_2 }}!important;
                color: #{{ $global_setting_data->theme_color_1 }}!important;
            }

            ul.my-news-ticker li a,
            .home-content .left .news-total-item .left-side h3 a:hover,
            .home-content .left .news-total-item .right-side-item .right h2 a:hover,
            .home-content .left .news-total-item .left-side .date-user .user a:hover,
            .home-content .left .news-total-item .left-side .date-user .date a:hover,
            .home-content .left .news-total-item .right-side-item .right .date-user .user a:hover,
            .home-content .left .news-total-item .right-side-item .right .date-user .date a:hover,
            .widget .news-item .right h2 a:hover,
            .widget .news-item .right .date-user .user a:hover,
            .widget .news-item .right .date-user .date a:hover,
            .nav-pills .nav-link,
            .video-carousel .owl-nav .owl-prev,
            .video-carousel .owl-nav .owl-next,
            li.breadcrumb-item a,
            .category-page-post-item h3 a:hover,
            .category-page-post-item .date-user .user a:hover,
            .category-page-post-item .date-user .date a:hover,
            .related-news .item h3 a:hover,
            .related-news .item .date-user .user a:hover,
            .related-news .item .date-user .date a:hover,
            .accordion-button:not(.collapsed),
            .login-form a,
            ul.pagination .page-link {
                color: #{{ $global_setting_data->theme_color_1 }}!important;
            }


            .home-main .inner .text-inner .category span,
            .home-main .inner .text-inner .category span a,
            .home-content .left .news-total-item .left-side .category span,
            .home-content .left .news-total-item .left-side .category span a,
            .home-content .left .news-total-item .right-side-item .right .category span,
            .home-content .left .news-total-item .right-side-item .right .category span a,
            .widget .news-item .right .category span,
            .widget .news-item .right .category span a,
            .category-page-post-item .category span,
            .category-page-post-item .category span a,
            .tag-section-content span {
                background: #{{ $global_setting_data->theme_color_2 }}!important;
                color: #{{ $global_setting_data->theme_color_1 }}!important;
            }

            
            .dropdown-menu-list.active{
                background: #{{ $global_setting_data->theme_color_2 }}!important;
                color: #fff !important;
            }
            .dropdown-menu-list .dropdown-item{
                color: #fff !important;
            }

            .dropdown-menu-list .dropdown-item:hover{
                color:  #{{ $global_setting_data->theme_color_2 }}!important;
                background: #fff !important;
            }
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

    </head>
    <body>
    @php
    $current_lang_id = \App\Models\Language::where('short_name',$current_short_name)->first()->id;
    $page_data = \App\Models\Page::where('is_menu',1)->first();
    $menu_header_data = \App\Models\Menu::where('active',1)->orderBy('short_by','asc')->get();
    $menu_footer_data = \App\Models\Menu::where('parent_id',0)->orderBy('short_by','asc')->get()

    @endphp
       
        <div class="heading-area sticky-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 d-flex align-items-center hidden-mobile">
                        <a class="nav-link text-white home-header menu-toggle-btn"><h2><i class="fas fa-bars"></i></h2></a>
                        <nav>
                            <ul class="menu menu-bar">
                                <li>
                                <ul class="mega-menu mega-menu--multiLevel" style="display:none">
                                    @foreach($menu_header_data as $menu)
                                    @if($menu->parent_id == 0)
                                        <li>
                                            <a href="{{ $menu->url }}" class="menu-link mega-menu-link" aria-haspopup="true">
                                                
                                                @if($current_lang_id == 1)
                                                    <h5>{{ $menu->menu }}</h5>
                                                @endif
                                                @if($current_lang_id == 2)
                                                    <h5>{{ $menu->menu_en }}</h5>
                                                @endif
                                                @if($current_lang_id == 3)
                                                    <h5>{{ $menu->menu_jp }}</h5>
                                                @endif
                                    
                                            </a>
                                            <ul class="menu menu-list">
                                                @if($current_lang_id == 1)
                                                    <h5 class="text-white px-6 pt-3">{{ $menu->menu }}</h5>
                                                @endif
                                                @if($current_lang_id == 2)
                                                    <h5 class="text-white px-6 pt-3">{{ $menu->menu_en }}</h5>
                                                @endif
                                                @if($current_lang_id == 3)
                                                    <h5 class="text-white px-6 pt-3">{{ $menu->menu_jp }}</h5>
                                                @endif
                                                @foreach($menu_header_data as $submenu)
                                                    @if($submenu->parent_id == $menu->id)
                                                        <li>
                                                            
                                                            @if($submenu->three == "1")
                                                                <a href="{{ $menu->url }}{{ $submenu->url }}" class="menu-link mega-menu-link" aria-haspopup="true">
                                                                    @if($current_lang_id == 1)
                                                                        {{ $submenu->menu }}
                                                                    @endif
                                                                    @if($current_lang_id == 2)
                                                                        {{ $submenu->menu_en }}
                                                                    @endif
                                                                    @if($current_lang_id == 3)
                                                                        {{ $submenu->menu_jp }}
                                                                    @endif
                                                                </a>
                                                                <ul class="menu menu-list">
                                                                    <h5 class="text-white padding-item pt-3">
                                                                        @if($current_lang_id == 1)
                                                                            {{ $submenu->menu }}
                                                                        @endif
                                                                        @if($current_lang_id == 2)
                                                                            {{ $submenu->menu_en }}
                                                                        @endif
                                                                        @if($current_lang_id == 3)
                                                                            {{ $submenu->menu_jp }}
                                                                        @endif
                                                                    </h5>
                                                                    @foreach($menu_header_data as $subsubmenu)
                                                                    @if($subsubmenu->parent_id == $submenu->id)
                                                                        <li>
                                                                            <a href="{{ $menu->url }}{{ $submenu->url }}/{{ $subsubmenu->url }}" class="menu-link mega-menu-link">
                                                                            @if($current_lang_id == 1)
                                                                                {{ $subsubmenu->menu }}
                                                                            @endif
                                                                            @if($current_lang_id == 2)
                                                                                {{ $subsubmenu->menu_en }}
                                                                            @endif
                                                                            @if($current_lang_id == 3)
                                                                                {{ $subsubmenu->menu_jp }}
                                                                            @endif
                                                                            </a>
                                                                            
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            @elseif($menu->url == "/berita")
                                                                <a href="{{ $submenu->url }}" class="menu-link mega-menu-link">
                                                                    @if($current_lang_id == 1)
                                                                        {{ $submenu->menu }}
                                                                    @endif
                                                                    @if($current_lang_id == 2)
                                                                        {{ $submenu->menu_en }}
                                                                    @endif
                                                                    @if($current_lang_id == 3)
                                                                        {{ $submenu->menu_jp }}
                                                                    @endif
                                                                </a>
                                                            @else
                                                                <a href="{{ $menu->url }}{{ $submenu->url }}" class="menu-link mega-menu-link">
                                                                    @if($current_lang_id == 1)
                                                                        {{ $submenu->menu }}
                                                                    @endif
                                                                    @if($current_lang_id == 2)
                                                                        {{ $submenu->menu_en }}
                                                                    @endif
                                                                    @if($current_lang_id == 3)
                                                                        {{ $submenu->menu_jp }}
                                                                    @endif
                                                                </a>
                                                            @endif
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                                    <li class="mobile-menu-back-item">
                                        <a href="#" class="menu-link mobile-menu-back-link">Back</a>
                                    </li>
                                </ul>
                                </li>
                                <li class="mobile-menu-header">
                                    <a href="/home" class="">
                                        <span>Home</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('uploads/'.$global_setting_data->logo) }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center hidden-desktop">
                        <!-- mobile menu toggle button start -->
                        <button class="ma5menu__toggle" type="button">
                            <span class="ma5menu__icon-toggle"></span> <span class="ma5menu__sr-only">Menu</span>
                        </button>
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('uploads/'.$global_setting_data->logo) }}" alt="">
                            </a>
                            {{-- <a href="{{REGISTRASI_URL}}" class="btn btn-warning" style="font-size:10px">{{REGISTRASI_TITLE}}</a> --}}
                        </div>  
                        <div class="ma5menu__search">
                            <a href="#" class="social-links" data-bs-toggle="modal" data-bs-target="#modal-search-mobile">
                                <div class="text-white">
                                    <i class="fas fa-search"></i>
                                </div>
                            </a>
                        </div>
                        <div class="ma5menu__language">
                            @if($current_short_name == "id")
                                    <img src="{{ asset('uploads/id.png') }}" height="24" width="24" alt="">
                                @elseif($current_short_name == "en")
                                    <img src="{{ asset('uploads/eng.png') }}" height="24" width="24" alt="">
                                @else
                                    <img src="{{ asset('uploads/jp.png') }}" height="24" width="24" alt="">
                                @endif
                        </div>
                        <div class="ma5menu__language_opsi">
                                <a href="#" class="text-inherit" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="text-white"><i class="fa fa-chevron-down"></i></div>
                                </a>
                                
                                <ul class="dropdown-menu dropdown-menu-sm" style="background:#083d62 !important; border: 1px solid #fdcb2c;">
                                @foreach($global_language_data as $item)
                                    <li class="dropdown-menu-list language-change @if($item->short_name == $current_short_name) active @endif" data-value="{{ $item->short_name }}">
                                        <div class="dropdown-item d-flex justify-content-between mb-1 py-1 ">
                                            <div>
                                                <img src="{{ asset('uploads').'/'.$item->icon }}" height="24" width="24" alt="">
                                                <span class="ms-1">{{ $item->short_name }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    
                                @endforeach
                            </ul>
                        </div>
                        <!-- mobile menu toggle button end -->
                        <div style="display: none;">
                            <!-- source for mobile menu start -->
                            <ul class="site-menu">
                            @foreach($menu_header_data as $menu)
                                @if($menu->parent_id == 0)
                                <li>
                                    <a href="{{ $menu->url }}">
                                        @if($current_lang_id == 1)
                                            {{ $menu->menu }}
                                        @endif
                                        @if($current_lang_id == 2)
                                            {{ $menu->menu_en }}
                                        @endif
                                        @if($current_lang_id == 3)
                                            {{ $menu->menu_jp }}
                                        @endif
                                    </a>
                                    <ul>
                                        @foreach($menu_header_data as $submenu)
                                            @if($submenu->parent_id == $menu->id)
                                            <li>
                                                
                                                @if($submenu->three == "1")
                                                    <a href="{{ $menu->url }}{{ $submenu->url }}" class="menu-link mega-menu-link" aria-haspopup="true">
                                                        @if($current_lang_id == 1)
                                                            {{ $submenu->menu }}
                                                        @endif
                                                        @if($current_lang_id == 2)
                                                            {{ $submenu->menu_en }}
                                                        @endif
                                                        @if($current_lang_id == 3)
                                                            {{ $submenu->menu_jp }}
                                                        @endif
                                                    </a>
                                                    <ul>
                                                        
                                                        @foreach($menu_header_data as $subsubmenu)
                                                        @if($subsubmenu->parent_id == $submenu->id)
                                                            <li>
                                                                <a href="{{ $menu->url }}{{ $subsubmenu->url }}" class="menu-link mega-menu-link" aria-haspopup="true">
                                                                @if($current_lang_id == 1)
                                                                    {{ $subsubmenu->menu }}
                                                                @endif
                                                                @if($current_lang_id == 2)
                                                                    {{ $subsubmenu->menu_en }}
                                                                @endif
                                                                @if($current_lang_id == 3)
                                                                    {{ $subsubmenu->menu_jp }}
                                                                @endif
                                                                </a>
                                                                <ul>
                                                                    @foreach($menu_header_data as $subsubsubmenu)
                                                                    @if($subsubsubmenu->parent_id == $subsubmenu->id)
                                                                    <li>
                                                                        <a href="{{url('/')}}/{{ $subsubsubmenu->url }}">
                                                                        @if($current_lang_id == 1)
                                                                            {{ $subsubsubmenu->menu }}
                                                                        @endif
                                                                        @if($current_lang_id == 2)
                                                                            {{ $subsubsubmenu->menu_en }}
                                                                        @endif
                                                                        @if($current_lang_id == 3)
                                                                            {{ $subsubsubmenu->menu_jp }}
                                                                        @endif
                                                                        </a>
                                                                    </li>
                                                                    @endif
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                                @elseif($menu->url == "/berita")
                                                    <a href="{{ $submenu->url }}">
                                                        @if($current_lang_id == 1)
                                                            {{ $submenu->menu }}
                                                        @endif
                                                        @if($current_lang_id == 2)
                                                            {{ $submenu->menu_en }}
                                                        @endif
                                                        @if($current_lang_id == 3)
                                                            {{ $submenu->menu_jp }}
                                                        @endif
                                                    </a>
                                                @else
                                                    <a href="{{ $menu->url }}{{ $submenu->url }}">
                                                        @if($current_lang_id == 1)
                                                            {{ $submenu->menu }}
                                                        @endif
                                                        @if($current_lang_id == 2)
                                                            {{ $submenu->menu_en }}
                                                        @endif
                                                        @if($current_lang_id == 3)
                                                            {{ $submenu->menu_jp }}
                                                        @endif
                                                    </a>
                                                @endif
                                            </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                @endif
                            @endforeach
                            </ul>
                            <!-- source for mobile menu end -->
                        </div>
                    </div>
                    <div class="col-md-8 ">
                        <div class="row hidden-mobile align-items-center mb-3">
                            <div class="col col-md-auto ms-md-auto">
                                <div class="item-header">
                                    <ul class="social-header">
                                        @foreach($global_social_item_data as $item)
                                        <li><a href="{{ $item->url }}" target="_blank"><i class="{{ $item->icon }}"></i></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col col-md-auto">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <div class="search-header me-4">
                                            <a href="#" class="social-links" data-bs-toggle="modal" data-bs-target="#modal-search-desktop">
                                                <div class="text-white">
                                                    <i class="fas fa-search"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="language-header">
                                            <ul class="navbar-nav align-items-center ">
                                                <li class="dropdown me-2 d-none d-lg-block">
                                                    <a href="#" class="text-inherit" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <div class="text-white"><i class="fa fa-chevron-down"></i></div>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-sm" style="background:#083d62 !important; border: 1px solid #fdcb2c;">
                                                        @foreach($global_language_data as $item)
                                                            <li class="dropdown-menu-list language-change @if($item->short_name == $current_short_name) active @endif" data-value="{{ $item->short_name }}">
                                                                <div class="dropdown-item d-flex justify-content-between mb-1 py-1 ">
                                                                    <div>
                                                                        <img src="{{ asset('uploads').'/'.$item->icon }}" height="24" width="24" alt="">
                                                                        <span class="ms-1">{{ $item->short_name }}</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="language-header me-2">
                                            @if($current_short_name == "id")
                                                <img src="{{ asset('uploads/id.png') }}" height="24" width="24" alt="">
                                            @elseif($current_short_name == "en")
                                                <img src="{{ asset('uploads/eng.png') }}" height="24" width="24" alt="">
                                            @else
                                                <img src="{{ asset('uploads/jp.png') }}" height="24" width="24" alt="">
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row hidden-mobile">
                            <div class="col-md-auto ms-md-auto ">
                                <div class="info-header mt-2 mb-2">
                                    <a href="{{REGISTRASI_URL}}" class="btn btn-warning">{{REGISTRASI_TITLE}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('front.layout.nav')

        @yield('main_content')

        <div class="modal" id="modal-search-desktop" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content" style="background: #1a2d42 !important; color: #fff">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="#" class="pe-auto"><h1 class="text-white" data-bs-dismiss="modal"><i class="fa fa-times"></i></h1></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-md-3 col-md-6 pb-5">
                                <div class="search-menu">
                                    <h3 class="fas fa-search"></h3>
                                    <form action="/berita" autocomplete="off">
                                        <input type="input" class="form-input" name="q" id="search" placeholder="Ketikan kata kunci lalu ENTER...">
                                    </form>
                                <div class="offset-md-2 col-md-6 pt-2">
                                        <a href="#">
                                            <img src="{{ asset('uploads/logo.png') }}" height="120" alt="Universitas Darma Persada">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>

        <div class="modal" id="modal-search-mobile" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content" style="background: #1a2d42 !important; color: #fff">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="#" class="pe-auto"><h1 class="text-white" data-bs-dismiss="modal"><i class="fa fa-times"></i></h1></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-md-3 col-md-6">
                                <div class="search-menu">
                                    <h3 class="fas fa-search"></h3>
                                    <form action="/berita" autocomplete="off">
                                        <input type="input" class="form-input" name="q" id="search" placeholder="Ketikan kata kunci lalu ENTER...">
                                </form>
                                <div class="offset-md-2 col-md-6 pt-2">
                                        <a href="#">
                                            <img src="{{ asset('uploads/logo.png') }}" height="80" alt="Universitas Darma Persada">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    <a href="https://api.whatsapp.com/send?phone=6287873015450&amp;text=Hi Hana, Mau tanya terkait Penerimaan Mahasiswa Baru dong?" class="float-contact" target="_blank">
        <img class="chat-hana" src="{{ asset('uploads/hana.png') }}" alt="Hana Unsada">
    </a>

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">{{ FOOTER_COL_1_HEADING }}</h2>
                            <p>
                                {{ FOOTER_COL_1_TEXT }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">{{ FOOTER_COL_2_HEADING }}</h2>
                            <ul class="useful-links">
                                <li><a href="{{ route('home') }}">{{ HOME }}</a></li>
                                @foreach($menu_footer_data as $item)
                                    @if($current_lang_id == 1)
                                    <li>
                                        <a href="{{ $item->url }}">{{ $item->menu }}</a>
                                    </li>
                                    @endif

                                    @if($current_lang_id == 2)
                                    <li>
                                        <a href="{{ $item->url }}">{{ $item->menu_en }}</a>
                                    </li>
                                    @endif

                                    @if($current_lang_id == 3)
                                    <li>
                                        <a href="{{ $item->url }}">{{ $item->menu_jp }}</a>
                                    </li>
                                    @endif
                                    
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">{{ FOOTER_COL_3_HEADING }}</h2>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="right">
                                <a style="color: white;" href="https://www.google.com/maps/place/{{ FOOTER_ADDRESS }}" target="_blank">{{ FOOTER_ADDRESS }}</a>
                                </div>
                            </div>
                            <div class="list-item text-white">
                                <div class="left">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="right">
                                    <a style="color: white;" href="mailto:{{ FOOTER_EMAIL }}" target="_blank">{{ FOOTER_EMAIL }}</a>
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="right">
                                    <a style="color: white;" href="https://wa.me/{{ FOOTER_PHONE }}" target="_blank">{{ FOOTER_PHONE }}</a>
                                </div>
                            </div>
                            <ul class="social">
                                @foreach($global_social_item_data as $item)
                                <li><a href="{{ $item->url }}" target="_blank"><i class="{{ $item->icon }}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">{{ FOOTER_COL_4_HEADING }}</h2>
                            <p>
                                {{ NEWSLETTER_TEXT }}
                            </p>
                            <form action="{{ route('subscribe') }}" method="post" class="form_subscribe_ajax">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="{{ EMAIL_ADDRESS }}">
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="{{ SUBSCRIBE_NOW }}">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="copyright">
            {{ COPYRIGHT_TEXT }}
        </div>

        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>

        @include('front.layout.scripts_footer')

        <script>
        $(document).ready(function() {
            $(".language-change").click(function() {
                var value = $(this).data('value');
                console.log("value", value)
                $.ajax({
                    type: "POST",
                    url: "{{ route('front_language') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "short_name": value
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
                
    		});

            $(".menu-toggle-btn").click(function() {
                if($(this).hasClass('open')){
                    $(this).removeClass('open');
                    $('.mega-menu').hide();
                    $(".menu-toggle-btn i").removeClass("fa fa-times").addClass("fas fa-bars");
                }else{
                    $(this).toggleClass("open")
                    $('.mega-menu').show();
                    $(".menu-toggle-btn i").removeClass("fas fa-bars").addClass("fa fa-times");
                    
                }
                
    		});
            @if(request()->segment(1) == '')
                $(window).scroll(function () {
                    if ($(window).scrollTop() >= 100) {
                        $('.heading-area').css({'background':'#083d62', 'border-bottom': '2px solid #ffca52', 'color':'#fff'});
                    } else {
                        $('.heading-area').css({'background':'#083d62', 'border-bottom':'2px solid #ffca52'});;
                    }
                });
            @else
                $('.heading-area').css({'background':'#083d62',  'border-bottom':'2px solid #ffca52', 'color':'#fff'});
            @endif
            
        });

    </script>

        <script>
            (function($){
                $(".form_subscribe_ajax").on('submit', function(e){
                    e.preventDefault();
                    $('#loader').show();
                    var form = this;
                    $.ajax({
                        url:$(form).attr('action'),
                        method:$(form).attr('method'),
                        data:new FormData(form),
                        processData:false,
                        dataType:'json',
                        contentType:false,
                        beforeSend:function(){
                            $(form).find('span.error-text').text('');
                        },
                        success:function(data)
                        {
                            $('#loader').hide();
                            if(data.code == 0)
                            {
                                $.each(data.error_message, function(prefix, val) {
                                    $(form).find('span.'+prefix+'_error').text(val[0]);
                                });
                            }
                            else if(data.code == 1)
                            {
                                $(form)[0].reset();
                                iziToast.success({
                                    title: '',
                                    position: 'topRight',
                                    message: data.success_message,
                                });
                            }

                        }
                    });
                });
            })(jQuery);
        </script>
        <div id="loader"></div>



        @if($errors->any())
            @foreach($errors->all() as $error)
                <script>
                    iziToast.error({
                        title: '',
                        position: 'topRight',
                        message: '{{ $error }}',
                    });
                </script>
            @endforeach
        @endif

        @if(session()->get('error'))
            <script>
                iziToast.error({
                    title: '',
                    position: 'topRight',
                    message: '{{ session()->get('error') }}',
                });
            </script>
        @endif

        @if(session()->get('success'))
            <script>
                iziToast.success({
                    title: '',
                    position: 'topRight',
                    message: '{{ session()->get('success') }}',
                });
            </script>
        @endif
        <script>
            AOS.init({
                easing: 'ease-out-back',
                duration: 1000
            });
        </script>
        <script>
        $(document).ready(function () {
            ma5menu({
                menu: '.site-menu',
                activeClass: 'active',
                footer: '#ma5menu-tools',
                position: 'left',
                closeOnBodyClick: true
            });
        });
    </script>
   </body>
</html>

