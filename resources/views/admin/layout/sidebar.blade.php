<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">
            <img src="{{ asset('dist/img/logo.png') }}" height="60" />
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>

            

            <!-- <li class="{{ Request::is('admin/author/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_author_show') }}"><i class="fas fa-user-edit"></i> <span>Author List</span></a></li> -->

            <!-- <li class="nav-item dropdown {{ Request::is('admin/top-advertisement')||Request::is('admin/home-advertisement')||Request::is('admin/sidebar-advertisement-*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-ad"></i><span>Iklan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/top-advertisement') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_top_ad_show') }}"><i class="fas fa-angle-right"></i> Top Advertisement</a></li>
                    <li class="{{ Request::is('admin/home-advertisement') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home_ad_show') }}"><i class="fas fa-angle-right"></i> Home Advertisement</a></li>
                    <li class="{{ Request::is('admin/sidebar-advertisement-*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_sidebar_ad_show') }}"><i class="fas fa-angle-right"></i> Sidebar Advertisement</a></li>
                </ul>
            </li> -->
            <li class="{{ Request::is('admin/menu/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_menu_show') }}"><i class="fas fa-list"></i> <span>Menu</span></a></li>
            <li class="{{ Request::is('admin/faculty/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faculty_show') }}"><i class="fas fa-graduation-cap"></i> <span>Fakultas</span></a></li>
            <li class="{{ Request::is('admin/department/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_department_show') }}"><i class="fas fa-user-graduate"></i> <span>Program Studi/Jurusan</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/category/*')||Request::is('admin/sub-category/*')||Request::is('admin/post/*')||Request::is('admin/laporan-tahunan/*')||Request::is('admin/lembaga-penjamin-mutu/*') ? 'active' : '' }}" >
                <a href="#" class="nav-link has-dropdown"><i class="far fa-newspaper"></i><span>Berita</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/category/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_category_show') }}"><i class="fas fa-angle-right"></i> Kategori Berita</a></li>
                    <li class="{{ Request::is('admin/post/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_post_show') }}"><i class="fas fa-angle-right"></i> Berita</a></li>
                    <li class="{{ Request::is('admin/laporan-tahunan/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_laporan') }}"><i class="fas fa-angle-right"></i> Laporan Tahunan</a></li>
                </ul>
            </li>
            <!-- <li class="{{ Request::is('admin/video/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_video_show') }}"><i class="fas fa-video"></i> <span>Galeri Video</span></a></li> -->
            <li class="nav-item dropdown {{ Request::is('admin/page/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-copy"></i><span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/page/home/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home_show') }}"><i class="fas fa-angle-right"></i> Home</a></li>
                    <li class="{{ Request::is('admin/page/about/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_about_show') }}"><i class="fas fa-angle-right"></i> Tentang</a></li>
                    <li class="{{ Request::is('admin/page/student/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_student_show') }}"><i class="fas fa-angle-right"></i> Mahasiswa</a></li>
                    <li class="{{ Request::is('admin/page/alumni/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_alumni_show') }}"><i class="fas fa-angle-right"></i> Alumni</a></li>
                    <li class="{{ Request::is('admin/page/csr/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_csr_show') }}"><i class="fas fa-angle-right"></i> Unsada Untuk Bangsa</a></li>
                </ul>
            </li>

            <!-- <li class="{{ Request::is('admin/faq/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faq_show') }}"><i class="fas fa-question-circle"></i> <span>FAQ Section</span></a></li> -->
            <li class="{{ Request::is('admin/slider/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_slider_show') }}"><i class="fas fa-user-shield"></i> <span>Sliders</span></a></li>
            <li class="{{ Request::is('admin/partner/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_partner_show') }}"><i class="fas fa-user-shield"></i> <span>Partners</span></a></li>
            <li class="{{ Request::is('admin/testimonial/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_testimonial_show') }}"><i class="fas fa-quote-left"></i> <span>Testimonial</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/subscriber/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Subscribers</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/subscriber/all') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_subscribers') }}"><i class="fas fa-angle-right"></i> All Subscribers</a></li>
                    <li class="{{ Request::is('admin/subscriber/send-email') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_subscriber_send_email') }}"><i class="fas fa-angle-right"></i> Send Email to All</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/language/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_language_show') }}"><i class="fas fa-language"></i> <span>Bahasa</span></a></li>
            <li class="{{ Request::is('admin/setting') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_setting') }}"><i class="fas fa-cog"></i> <span>Pengaturan</span></a></li>

            <li class="{{ Request::is('admin/social-item/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_social_item_show') }}"><i class="fas fa-share-alt"></i> <span>Social Items</span></a></li>



        </ul>
    </aside>
</div>
