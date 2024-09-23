<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\FakultasController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\DisclaimerController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\AlumniNewsController;
use App\Http\Controllers\Front\UnsadaController;
use App\Http\Controllers\Front\ServiceController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\SubCategoryController;
use App\Http\Controllers\Front\PhotoController;
use App\Http\Controllers\Front\VideoController;
use App\Http\Controllers\Front\SubscriberController;
use App\Http\Controllers\Front\PollController;
use App\Http\Controllers\Front\ArchiveController;
use App\Http\Controllers\Front\TagController;
use App\Http\Controllers\Front\LanguageController;

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\AdminEducationController;
use App\Http\Controllers\Admin\AdminAlumniController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminCsrController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminAdvertisementController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminSubCategoryController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminPartnerController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminBannerController;
use App\Http\Controllers\Admin\AdminMenuController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminFacultyController;
use App\Http\Controllers\Admin\AdminDepartmentController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminLiveChannelController;
use App\Http\Controllers\Admin\AdminOnlinePollController;
use App\Http\Controllers\Admin\AdminSocialItemController;
use App\Http\Controllers\Admin\AdminAuthorController;
use App\Http\Controllers\Admin\AdminLanguageController;

use App\Http\Controllers\Author\AuthorHomeController;
use App\Http\Controllers\Author\AuthorProfileController;
use App\Http\Controllers\Author\AuthorPostController;


/* Front End */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/language/switch', [LanguageController::class, 'switch_language'])->name('front_language');
Route::get('/subcategory-by-category/{id}', [HomeController::class, 'get_subcategory_by_category'])->name('subcategory-by-category');
Route::post('/search/result', [HomeController::class, 'search'])->name('search_result');
Route::get('/halaman', [PageController::class, 'index'])->name('page');
Route::get('/halaman/{slug}', [PageController::class, 'detail'])->name('detail.page');
Route::get('/profil', [AboutController::class, 'index'])->name('about');
Route::get('/profil/{slug}', [AboutController::class, 'detail'])->name('detail.about');
Route::get('/layanan', [ServiceController::class, 'index'])->name('service');
Route::get('/layanan/{slug}', [ServiceController::class, 'detail'])->name('detail.service');
Route::get('/alumni', [AlumniNewsController::class, 'index'])->name('alumni');
Route::get('/alumni/{slug}', [AlumniNewsController::class, 'detail'])->name('detail.alumni');
Route::get('/unsada', [UnsadaController::class, 'index'])->name('unsada');
Route::get('/unsada/{slug}', [UnsadaController::class, 'detail'])->name('detail.unsada');
Route::get('/fakultas', [FakultasController::class, 'index'])->name('fakultas');
Route::get('/fakultas/{slug}', [FakultasController::class, 'detail'])->name('detail.fakultas');
Route::get('/fakultas/{fakultas}/{prodi}', [FakultasController::class, 'prodi'])->name('detail.prodi');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send-email', [ContactController::class, 'send_email'])->name('contact_form_submit');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/terms-and-conditions', [TermsController::class, 'index'])->name('terms');
Route::get('/privacy-policy', [PrivacyController::class, 'index'])->name('privacy');
Route::get('/disclaimer', [DisclaimerController::class, 'index'])->name('disclaimer');
Route::get('/berita', [PostController::class, 'index'])->name('berita');
Route::get('/berita/{slug}', [PostController::class, 'detail'])->name('berita_detail');
Route::get('/kategori/{slug}', [CategoryController::class, 'index'])->name('category');
Route::get('/photo-gallery', [PhotoController::class, 'index'])->name('photo_gallery');
Route::get('/video-gallery', [VideoController::class, 'index'])->name('video_gallery');

Route::post('/subscriber', [SubscriberController::class, 'index'])->name('subscribe');
Route::get('/subscriber/verify/{token}/{email}', [SubscriberController::class, 'verify'])->name('subscriber_verify');

Route::post('/poll/submit', [PollController::class, 'submit'])->name('poll_submit');
Route::get('/poll/previous', [PollController::class, 'previous'])->name('poll_previous');

Route::post('/archive/show', [ArchiveController::class, 'show'])->name('archive_show');
Route::get('/archive/{year}/{month}', [ArchiveController::class, 'detail'])->name('archive_detail');

Route::get('/tag/{tag_name}', [TagController::class, 'show'])->name('tag_posts_show');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-submit', [LoginController::class, 'login_submit'])->name('login_submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/forget-password', [LoginController::class, 'forget_password'])->name('forget_password');
Route::post('/forget-password-submit', [LoginController::class, 'forget_password_submit'])->name('forget_password_submit');
Route::get('/reset-password/{token}/{email}', [LoginController::class, 'reset_password'])->name('reset_password');
Route::post('/reset-password-submit', [LoginController::class, 'reset_password_submit'])->name('reset_password_submit');



/* Author */
Route::get('/author/home', [AuthorHomeController::class, 'index'])->name('author_home')->middleware('author:author');
Route::get('/author/edit-profile', [AuthorProfileController::class, 'index'])->name('author_profile')->middleware('author:author');
Route::post('/author/edit-profile-submit', [AuthorProfileController::class, 'profile_submit'])->name('author_profile_submit');

Route::get('/author/post/show', [AuthorPostController::class, 'show'])->name('author_post_show')->middleware('author:author');
Route::get('/author/post/create', [AuthorPostController::class, 'create'])->name('author_post_create')->middleware('author:author');
Route::post('/author/post/store', [AuthorPostController::class, 'store'])->name('author_post_store');
Route::get('/author/post/edit/{id}', [AuthorPostController::class, 'edit'])->name('author_post_edit')->middleware('author:author');
Route::post('/author/post/update/{id}', [AuthorPostController::class, 'update'])->name('author_post_update');
Route::get('/author/post/delete/{id}', [AuthorPostController::class, 'delete'])->name('author_post_delete')->middleware('author:author');
Route::get('/author/post/tag/delete/{id}/{id1}', [AuthorPostController::class, 'delete_tag'])->name('author_post_delete_tag')->middleware('author:author');







/* Admin */
Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home')->middleware('admin:admin');
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
Route::get('/admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('/admin/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');
Route::post('/admin/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');

Route::get('/admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin_profile')->middleware('admin:admin');
Route::post('/admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');

Route::get('/admin/home-advertisement', [AdminAdvertisementController::class, 'home_ad_show'])->name('admin_home_ad_show')->middleware('admin:admin');
Route::post('/admin/home-advertisement-update', [AdminAdvertisementController::class, 'home_ad_update'])->name('admin_home_ad_update');

Route::get('/admin/top-advertisement', [AdminAdvertisementController::class, 'top_ad_show'])->name('admin_top_ad_show')->middleware('admin:admin');
Route::post('/admin/top-advertisement-update', [AdminAdvertisementController::class, 'top_ad_update'])->name('admin_top_ad_update');


Route::get('/admin/sidebar-advertisement-view', [AdminAdvertisementController::class, 'sidebar_ad_show'])->name('admin_sidebar_ad_show')->middleware('admin:admin');
Route::get('/admin/sidebar-advertisement-create', [AdminAdvertisementController::class, 'sidebar_ad_create'])->name('admin_sidebar_ad_create')->middleware('admin:admin');
Route::post('/admin/sidebar-advertisement-store', [AdminAdvertisementController::class, 'sidebar_ad_store'])->name('admin_sidebar_ad_store');

Route::get('/admin/sidebar-advertisement-edit/{id}', [AdminAdvertisementController::class, 'sidebar_ad_edit'])->name('admin_sidebar_ad_edit')->middleware('admin:admin');
Route::post('/admin/sidebar-advertisement-update/{id}', [AdminAdvertisementController::class, 'sidebar_ad_update'])->name('admin_sidebar_ad_update');

Route::get('/admin/sidebar-advertisement-delete/{id}', [AdminAdvertisementController::class, 'sidebar_ad_delete'])->name('admin_sidebar_ad_delete')->middleware('admin:admin');


Route::get('/admin/category/show', [AdminCategoryController::class, 'show'])->name('admin_category_show')->middleware('admin:admin');
Route::get('/admin/category/create', [AdminCategoryController::class, 'create'])->name('admin_category_create')->middleware('admin:admin');
Route::post('/admin/category/store', [AdminCategoryController::class, 'store'])->name('admin_category_store');
Route::get('/admin/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin_category_edit')->middleware('admin:admin');
Route::post('/admin/category/update/{id}', [AdminCategoryController::class, 'update'])->name('admin_category_update');
Route::get('/admin/category/delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin_category_delete')->middleware('admin:admin');

Route::get('/admin/sub-category/show', [AdminSubCategoryController::class, 'show'])->name('admin_sub_category_show')->middleware('admin:admin');
Route::get('/admin/sub-category/create', [AdminSubCategoryController::class, 'create'])->name('admin_sub_category_create')->middleware('admin:admin');

Route::post('/admin/sub-category/store', [AdminSubCategoryController::class, 'store'])->name('admin_sub_category_store');

Route::get('/admin/sub-category/edit/{id}', [AdminSubCategoryController::class, 'edit'])->name('admin_sub_category_edit')->middleware('admin:admin');
Route::post('/admin/sub-category/update/{id}', [AdminSubCategoryController::class, 'update'])->name('admin_sub_category_update');
Route::get('/admin/sub-category/delete/{id}', [AdminSubCategoryController::class, 'delete'])->name('admin_sub_category_delete')->middleware('admin:admin');


Route::get('/admin/post/show', [AdminPostController::class, 'show'])->name('admin_post_show')->middleware('admin:admin');
Route::get('/admin/post/create', [AdminPostController::class, 'create'])->name('admin_post_create')->middleware('admin:admin');
Route::post('/admin/post/store', [AdminPostController::class, 'store'])->name('admin_post_store');
Route::get('/admin/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin_post_edit')->middleware('admin:admin');
Route::post('/admin/post/update/{id}', [AdminPostController::class, 'update'])->name('admin_post_update');
Route::get('/admin/post/delete/{id}', [AdminPostController::class, 'delete'])->name('admin_post_delete')->middleware('admin:admin');
Route::get('/admin/post/tag/delete/{id}/{id1}', [AdminPostController::class, 'delete_tag'])->name('admin_post_delete_tag')->middleware('admin:admin');

Route::get('/admin/testimonial/show', [AdminTestimonialController::class, 'show'])->name('admin_testimonial_show')->middleware('admin:admin');
Route::get('/admin/testimonial/create', [AdminTestimonialController::class, 'create'])->name('admin_testimonial_create')->middleware('admin:admin');
Route::post('/admin/testimonial/store', [AdminTestimonialController::class, 'store'])->name('admin_testimonial_store');
Route::get('/admin/testimonial/edit/{id}', [AdminTestimonialController::class, 'edit'])->name('admin_testimonial_edit')->middleware('admin:admin');
Route::post('/admin/testimonial/update/{id}', [AdminTestimonialController::class, 'update'])->name('admin_testimonial_update');
Route::get('/admin/testimonial/delete/{id}', [AdminTestimonialController::class, 'delete'])->name('admin_testimonial_delete')->middleware('admin:admin');

Route::get('/admin/banner/show', [AdminBannerController::class, 'show'])->name('admin_banner_show')->middleware('admin:admin');
Route::get('/admin/banner/create', [AdminBannerController::class, 'create'])->name('admin_banner_create')->middleware('admin:admin');
Route::post('/admin/banner/store', [AdminBannerController::class, 'store'])->name('admin_banner_store');
Route::get('/admin/banner/edit/{id}', [AdminBannerController::class, 'edit'])->name('admin_banner_edit')->middleware('admin:admin');
Route::post('/admin/banner/update/{id}', [AdminBannerController::class, 'update'])->name('admin_banner_update');
Route::get('/admin/banner/delete/{id}', [AdminBannerController::class, 'delete'])->name('admin_banner_delete')->middleware('admin:admin');

Route::get('/admin/partner/show', [AdminPartnerController::class, 'show'])->name('admin_partner_show')->middleware('admin:admin');
Route::get('/admin/partner/create', [AdminPartnerController::class, 'create'])->name('admin_partner_create')->middleware('admin:admin');
Route::post('/admin/partner/store', [AdminPartnerController::class, 'store'])->name('admin_partner_store');
Route::get('/admin/partner/edit/{id}', [AdminPartnerController::class, 'edit'])->name('admin_partner_edit')->middleware('admin:admin');
Route::post('/admin/partner/update/{id}', [AdminPartnerController::class, 'update'])->name('admin_partner_update');
Route::get('/admin/partner/delete/{id}', [AdminPartnerController::class, 'delete'])->name('admin_partner_delete')->middleware('admin:admin');


Route::get('/admin/slider/show', [AdminSliderController::class, 'show'])->name('admin_slider_show')->middleware('admin:admin');
Route::get('/admin/slider/create', [AdminSliderController::class, 'create'])->name('admin_slider_create')->middleware('admin:admin');
Route::post('/admin/slider/store', [AdminSliderController::class, 'store'])->name('admin_slider_store');
Route::get('/admin/slider/edit/{id}', [AdminSliderController::class, 'edit'])->name('admin_slider_edit')->middleware('admin:admin');
Route::post('/admin/slider/update/{id}', [AdminSliderController::class, 'update'])->name('admin_slider_update');
Route::get('/admin/slider/delete/{id}', [AdminSliderController::class, 'delete'])->name('admin_slider_delete')->middleware('admin:admin');

Route::get('/admin/menu/show', [AdminMenuController::class, 'show'])->name('admin_menu_show')->middleware('admin:admin');
Route::get('/admin/menu/create', [AdminMenuController::class, 'create'])->name('admin_menu_create')->middleware('admin:admin');
Route::post('/admin/menu/store', [AdminMenuController::class, 'store'])->name('admin_menu_store');
Route::get('/admin/menu/edit/{id}', [AdminMenuController::class, 'edit'])->name('admin_menu_edit')->middleware('admin:admin');
Route::post('/admin/menu/update/{id}', [AdminMenuController::class, 'update'])->name('admin_menu_update');
Route::get('/admin/menu/delete/{id}', [AdminMenuController::class, 'delete'])->name('admin_menu_delete')->middleware('admin:admin');


Route::get('/admin/setting', [AdminSettingController::class, 'index'])->name('admin_setting')->middleware('admin:admin');
Route::post('/admin/setting/update', [AdminSettingController::class, 'update'])->name('admin_setting_update');


Route::get('/admin/photo/show', [AdminPhotoController::class, 'show'])->name('admin_photo_show')->middleware('admin:admin');
Route::get('/admin/photo/create', [AdminPhotoController::class, 'create'])->name('admin_photo_create')->middleware('admin:admin');
Route::post('/admin/photo/store', [AdminPhotoController::class, 'store'])->name('admin_photo_store');
Route::get('/admin/photo/edit/{id}', [AdminPhotoController::class, 'edit'])->name('admin_photo_edit')->middleware('admin:admin');
Route::post('/admin/photo/update/{id}', [AdminPhotoController::class, 'update'])->name('admin_photo_update');
Route::get('/admin/photo/delete/{id}', [AdminPhotoController::class, 'delete'])->name('admin_photo_delete')->middleware('admin:admin');


Route::get('/admin/video/show', [AdminVideoController::class, 'show'])->name('admin_video_show')->middleware('admin:admin');
Route::get('/admin/video/create', [AdminVideoController::class, 'create'])->name('admin_video_create')->middleware('admin:admin');
Route::post('/admin/video/store', [AdminVideoController::class, 'store'])->name('admin_video_store');
Route::get('/admin/video/edit/{id}', [AdminVideoController::class, 'edit'])->name('admin_video_edit')->middleware('admin:admin');
Route::post('/admin/video/update/{id}', [AdminVideoController::class, 'update'])->name('admin_video_update');
Route::get('/admin/video/delete/{id}', [AdminVideoController::class, 'delete'])->name('admin_video_delete')->middleware('admin:admin');

Route::get('/admin/faculty', [AdminFacultyController::class, 'index'])->name('admin_faculty_home')->middleware('admin:admin');
Route::get('/admin/faculty/show', [AdminFacultyController::class, 'show'])->name('admin_faculty_show')->middleware('admin:admin');
Route::get('/admin/faculty/create', [AdminFacultyController::class, 'create'])->name('admin_faculty_create')->middleware('admin:admin');
Route::post('/admin/faculty/store', [AdminFacultyController::class, 'store'])->name('admin_faculty_store');
Route::get('/admin/faculty/edit/{id}', [AdminFacultyController::class, 'edit'])->name('admin_faculty_edit')->middleware('admin:admin');
Route::post('/admin/faculty/update/{id}', [AdminFacultyController::class, 'update'])->name('admin_faculty_update');
Route::get('/admin/faculty/delete/{id}', [AdminFacultyController::class, 'delete'])->name('admin_faculty_delete')->middleware('admin:admin');

Route::get('/admin/department', [AdminDepartmentController::class, 'index'])->name('admin_department_home')->middleware('admin:admin');
Route::get('/admin/department/show', [AdminDepartmentController::class, 'show'])->name('admin_department_show')->middleware('admin:admin');
Route::get('/admin/department/create', [AdminDepartmentController::class, 'create'])->name('admin_department_create')->middleware('admin:admin');
Route::post('/admin/department/store', [AdminDepartmentController::class, 'store'])->name('admin_department_store');
Route::get('/admin/department/edit/{id}', [AdminDepartmentController::class, 'edit'])->name('admin_department_edit')->middleware('admin:admin');
Route::post('/admin/department/update/{id}', [AdminDepartmentController::class, 'update'])->name('admin_department_update');
Route::get('/admin/department/delete/{id}', [AdminDepartmentController::class, 'delete'])->name('admin_department_delete')->middleware('admin:admin');

Route::get('/admin/page/home/show', [AdminHomeController::class, 'show'])->name('admin_home_show')->middleware('admin:admin');
Route::get('/admin/page/home/create', [AdminHomeController::class, 'create'])->name('admin_home_create')->middleware('admin:admin');
Route::post('/admin/page/home/store', [AdminHomeController::class, 'store'])->name('admin_home_store');
Route::get('/admin/page/home/edit/{id}', [AdminHomeController::class, 'edit'])->name('admin_home_edit')->middleware('admin:admin');
Route::post('/admin/page/home/update/{id}', [AdminHomeController::class, 'update'])->name('admin_home_update');
Route::get('/admin/page/home/delete/{id}', [AdminHomeController::class, 'delete'])->name('admin_home_delete')->middleware('admin:admin');

Route::get('/admin/page/about', [AdminAboutController::class, 'index'])->name('admin_about_home')->middleware('admin:admin');
Route::get('/admin/page/about/show', [AdminAboutController::class, 'show'])->name('admin_about_show')->middleware('admin:admin');
Route::get('/admin/page/about/create', [AdminAboutController::class, 'create'])->name('admin_about_create')->middleware('admin:admin');
Route::post('/admin/page/about/store', [AdminAboutController::class, 'store'])->name('admin_about_store');
Route::get('/admin/page/about/edit/{id}', [AdminAboutController::class, 'edit'])->name('admin_about_edit')->middleware('admin:admin');
Route::post('/admin/page/about/update/{id}', [AdminAboutController::class, 'update'])->name('admin_about_update');
Route::get('/admin/page/about/delete/{id}', [AdminAboutController::class, 'delete'])->name('admin_about_delete')->middleware('admin:admin');

Route::get('/admin/laporan-tahunan', [AdminPageController::class, 'laporan'])->name('admin_page_laporan')->middleware('admin:admin');
Route::post('/admin/laporan-tahunan/update', [AdminPageController::class, 'laporan_update'])->name('admin_page_laporan_update');


Route::get('/admin/lembaga-penjamin-mutu', [AdminPageController::class, 'penjamin'])->name('admin_page_penjamin')->middleware('admin:admin');
Route::post('/admin/lembaga-penjamin-mutu/update', [AdminPageController::class, 'penjamin_update'])->name('admin_page_penjamin_update');


Route::get('/admin/page/education', [AdminEducationController::class, 'index'])->name('admin_education_home')->middleware('admin:admin');
Route::get('/admin/page/education/show', [AdminEducationController::class, 'show'])->name('admin_education_show')->middleware('admin:admin');
Route::get('/admin/page/education/create', [AdminEducationController::class, 'create'])->name('admin_education_create')->middleware('admin:admin');
Route::post('/admin/page/education/store', [AdminEducationController::class, 'store'])->name('admin_education_store');
Route::get('/admin/page/education/edit/{id}', [AdminEducationController::class, 'edit'])->name('admin_education_edit')->middleware('admin:admin');
Route::post('/admin/page/education/update/{id}', [AdminEducationController::class, 'update'])->name('admin_education_update');
Route::get('/admin/page/education/delete/{id}', [AdminEducationController::class, 'delete'])->name('admin_education_delete')->middleware('admin:admin');

Route::get('/admin/page/student', [AdminStudentController::class, 'index'])->name('admin_student_home')->middleware('admin:admin');
Route::get('/admin/page/student/show', [AdminStudentController::class, 'show'])->name('admin_student_show')->middleware('admin:admin');
Route::get('/admin/page/student/create', [AdminStudentController::class, 'create'])->name('admin_student_create')->middleware('admin:admin');
Route::post('/admin/page/student/store', [AdminStudentController::class, 'store'])->name('admin_student_store');
Route::get('/admin/page/student/edit/{id}', [AdminStudentController::class, 'edit'])->name('admin_student_edit')->middleware('admin:admin');
Route::post('/admin/page/student/update/{id}', [AdminStudentController::class, 'update'])->name('admin_student_update');
Route::get('/admin/page/student/delete/{id}', [AdminStudentController::class, 'delete'])->name('admin_student_delete')->middleware('admin:admin');

Route::get('/admin/page/alumni', [AdminAlumniController::class, 'index'])->name('admin_alumni_home')->middleware('admin:admin');
Route::get('/admin/page/alumni/show', [AdminAlumniController::class, 'show'])->name('admin_alumni_show')->middleware('admin:admin');
Route::get('/admin/page/alumni/create', [AdminAlumniController::class, 'create'])->name('admin_alumni_create')->middleware('admin:admin');
Route::post('/admin/page/alumni/store', [AdminAlumniController::class, 'store'])->name('admin_alumni_store');
Route::get('/admin/page/alumni/edit/{id}', [AdminAlumniController::class, 'edit'])->name('admin_alumni_edit')->middleware('admin:admin');
Route::post('/admin/page/alumni/update/{id}', [AdminAlumniController::class, 'update'])->name('admin_alumni_update');
Route::get('/admin/page/alumni/delete/{id}', [AdminAlumniController::class, 'delete'])->name('admin_alumni_delete')->middleware('admin:admin');

Route::get('/admin/page/service', [AdminServiceController::class, 'index'])->name('admin_service_home')->middleware('admin:admin');
Route::get('/admin/page/service/show', [AdminServiceController::class, 'show'])->name('admin_service_show')->middleware('admin:admin');
Route::get('/admin/page/service/create', [AdminServiceController::class, 'create'])->name('admin_service_create')->middleware('admin:admin');
Route::post('/admin/page/service/store', [AdminServiceController::class, 'store'])->name('admin_service_store');
Route::get('/admin/page/service/edit/{id}', [AdminServiceController::class, 'edit'])->name('admin_service_edit')->middleware('admin:admin');
Route::post('/admin/page/service/update/{id}', [AdminServiceController::class, 'update'])->name('admin_service_update');
Route::get('/admin/page/service/delete/{id}', [AdminServiceController::class, 'delete'])->name('admin_service_delete')->middleware('admin:admin');


Route::get('/admin/page/csr', [AdminCsrController::class, 'index'])->name('admin_csr_home')->middleware('admin:admin');
Route::get('/admin/page/csr/show', [AdminCsrController::class, 'show'])->name('admin_csr_show')->middleware('admin:admin');
Route::get('/admin/page/csr/create', [AdminCsrController::class, 'create'])->name('admin_csr_create')->middleware('admin:admin');
Route::post('/admin/page/csr/store', [AdminCsrController::class, 'store'])->name('admin_csr_store');
Route::get('/admin/page/csr/edit/{id}', [AdminCsrController::class, 'edit'])->name('admin_csr_edit')->middleware('admin:admin');
Route::post('/admin/page/csr/update/{id}', [AdminCsrController::class, 'update'])->name('admin_csr_update');
Route::get('/admin/page/csr/delete/{id}', [AdminCsrController::class, 'delete'])->name('admin_csr_delete')->middleware('admin:admin');


Route::get('/admin/page/about', [AdminPageController::class, 'about'])->name('admin_page_about')->middleware('admin:admin');
Route::post('/admin/page/about/update', [AdminPageController::class, 'about_update'])->name('admin_page_about_update');

Route::get('/admin/page/faq', [AdminPageController::class, 'faq'])->name('admin_page_faq')->middleware('admin:admin');
Route::post('/admin/page/faq/update', [AdminPageController::class, 'faq_update'])->name('admin_page_faq_update');

Route::get('/admin/page/terms', [AdminPageController::class, 'terms'])->name('admin_page_terms')->middleware('admin:admin');
Route::post('/admin/page/terms/update', [AdminPageController::class, 'terms_update'])->name('admin_page_terms_update');

Route::get('/admin/page/privacy', [AdminPageController::class, 'privacy'])->name('admin_page_privacy')->middleware('admin:admin');
Route::post('/admin/page/privacy/update', [AdminPageController::class, 'privacy_update'])->name('admin_page_privacy_update');

Route::get('/admin/page/disclaimer', [AdminPageController::class, 'disclaimer'])->name('admin_page_disclaimer')->middleware('admin:admin');
Route::post('/admin/page/disclaimer/update', [AdminPageController::class, 'disclaimer_update'])->name('admin_page_disclaimer_update');

Route::get('/admin/page/login', [AdminPageController::class, 'login'])->name('admin_page_login')->middleware('admin:admin');
Route::post('/admin/page/login/update', [AdminPageController::class, 'login_update'])->name('admin_page_login_update');

Route::get('/admin/page/contact', [AdminPageController::class, 'contact'])->name('admin_page_contact')->middleware('admin:admin');
Route::post('/admin/page/contact/update', [AdminPageController::class, 'contact_update'])->name('admin_page_contact_update');


Route::get('/admin/faq/show', [AdminFaqController::class, 'show'])->name('admin_faq_show')->middleware('admin:admin');
Route::get('/admin/faq/create', [AdminFaqController::class, 'create'])->name('admin_faq_create')->middleware('admin:admin');
Route::post('/admin/faq/store', [AdminFaqController::class, 'store'])->name('admin_faq_store');
Route::get('/admin/faq/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin_faq_edit')->middleware('admin:admin');
Route::post('/admin/faq/update/{id}', [AdminFaqController::class, 'update'])->name('admin_faq_update');
Route::get('/admin/faq/delete/{id}', [AdminFaqController::class, 'delete'])->name('admin_faq_delete')->middleware('admin:admin');

Route::get('/admin/subscriber/all', [AdminSubscriberController::class, 'show_all'])->name('admin_subscribers')->middleware('admin:admin');
Route::get('/admin/subscriber/send-email', [AdminSubscriberController::class, 'send_email'])->name('admin_subscriber_send_email')->middleware('admin:admin');
Route::post('/admin/subscriber/send-email-submit', [AdminSubscriberController::class, 'send_email_submit'])->name('admin_subscriber_send_email_submit');


Route::get('/admin/live-channel/show', [AdminLiveChannelController::class, 'show'])->name('admin_live_channel_show')->middleware('admin:admin');
Route::get('/admin/live-channel/create', [AdminLiveChannelController::class, 'create'])->name('admin_live_channel_create')->middleware('admin:admin');
Route::post('/admin/live-channel/store', [AdminLiveChannelController::class, 'store'])->name('admin_live_channel_store');
Route::get('/admin/live-channel/edit/{id}', [AdminLiveChannelController::class, 'edit'])->name('admin_live_channel_edit')->middleware('admin:admin');
Route::post('/admin/live-channel/update/{id}', [AdminLiveChannelController::class, 'update'])->name('admin_live_channel_update');
Route::get('/admin/live-channel/delete/{id}', [AdminLiveChannelController::class, 'delete'])->name('admin_live_channel_delete')->middleware('admin:admin');


Route::get('/admin/online-poll/show', [AdminOnlinePollController::class, 'show'])->name('admin_online_poll_show')->middleware('admin:admin');
Route::get('/admin/online-poll/create', [AdminOnlinePollController::class, 'create'])->name('admin_online_poll_create')->middleware('admin:admin');
Route::post('/admin/online-poll/store', [AdminOnlinePollController::class, 'store'])->name('admin_online_poll_store');
Route::get('/admin/online-poll/edit/{id}', [AdminOnlinePollController::class, 'edit'])->name('admin_online_poll_edit')->middleware('admin:admin');
Route::post('/admin/online-poll/update/{id}', [AdminOnlinePollController::class, 'update'])->name('admin_online_poll_update');
Route::get('/admin/online-poll/delete/{id}', [AdminOnlinePollController::class, 'delete'])->name('admin_online_poll_delete')->middleware('admin:admin');

Route::get('/admin/social-item/show', [AdminSocialItemController::class, 'show'])->name('admin_social_item_show')->middleware('admin:admin');
Route::get('/admin/social-item/create', [AdminSocialItemController::class, 'create'])->name('admin_social_item_create')->middleware('admin:admin');
Route::post('/admin/social-item/store', [AdminSocialItemController::class, 'store'])->name('admin_social_item_store');
Route::get('/admin/social-item/edit/{id}', [AdminSocialItemController::class, 'edit'])->name('admin_social_item_edit')->middleware('admin:admin');
Route::post('/admin/social-item/update/{id}', [AdminSocialItemController::class, 'update'])->name('admin_social_item_update');
Route::get('/admin/social-item/delete/{id}', [AdminSocialItemController::class, 'delete'])->name('admin_social_item_delete')->middleware('admin:admin');


Route::get('/admin/author/show', [AdminAuthorController::class, 'show'])->name('admin_author_show')->middleware('admin:admin');
Route::get('/admin/author/create', [AdminAuthorController::class, 'create'])->name('admin_author_create')->middleware('admin:admin');
Route::post('/admin/author/store', [AdminAuthorController::class, 'store'])->name('admin_author_store');
Route::get('/admin/author/edit/{id}', [AdminAuthorController::class, 'edit'])->name('admin_author_edit')->middleware('admin:admin');
Route::post('/admin/author/update/{id}', [AdminAuthorController::class, 'update'])->name('admin_author_update');
Route::get('/admin/author/delete/{id}', [AdminAuthorController::class, 'delete'])->name('admin_author_delete')->middleware('admin:admin');


Route::get('/admin/language/show', [AdminLanguageController::class, 'show'])->name('admin_language_show')->middleware('admin:admin');
Route::get('/admin/language/create', [AdminLanguageController::class, 'create'])->name('admin_language_create')->middleware('admin:admin');
Route::post('/admin/language/store', [AdminLanguageController::class, 'store'])->name('admin_language_store');
Route::get('/admin/language/edit/{id}', [AdminLanguageController::class, 'edit'])->name('admin_language_edit')->middleware('admin:admin');
Route::post('/admin/language/update/{id}', [AdminLanguageController::class, 'update'])->name('admin_language_update');
Route::get('/admin/language/delete/{id}', [AdminLanguageController::class, 'delete'])->name('admin_language_delete')->middleware('admin:admin');

Route::get('/admin/language/update-detail/{id}', [AdminLanguageController::class, 'update_detail'])->name('admin_language_update_detail')->middleware('admin:admin');
Route::post('/admin/language/update-detail-submit/{id}', [AdminLanguageController::class, 'update_detail_submit'])->name('admin_language_update_detail_submit');