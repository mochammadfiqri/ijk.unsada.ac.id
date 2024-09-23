<!-- All Meta -->
@php
$post_data = \App\Models\Post::where('posts.post_slug', Request::segment(2))->leftJoin('categories', 'posts.category_id', '=', 'categories.id')->first();
if (Request::segment(1) == 'berita' && Request::segment(2) == '') {
  $title = "Berita";
  $description = "Berita";
  $image = asset('uploads/logo.png');
}elseif (!empty($post_data) && Request::segment(1) == "berita" && Request::segment(2) != "") {
    $title = "Berita - ".$post_data->post_title;
    $description = Str::words(strip_tags($post_data->post_detail), 25, '...');
    $image = asset('uploads/'.$post_data->post_photo);
}else{
   if (Request::segment(1) == 'berita'){
        $title = "Berita";
        $description = "Berita";
        $image = asset('uploads/logo.png');
    }else{
        if (!empty($page_data)){
            $image = asset('uploads/pages/'.$page_data->photo);
            if(!session()->get('session_short_name')){
                $title = $page_data->title;
                $description = Str::words(strip_tags($page_data->detail), 25, '...');
            }elseif (session()->get('session_short_name') == 'id'){
                $title = $page_data->title;
                $description = Str::words(strip_tags($page_data->detail), 25, '...');
            }elseif (session()->get('session_short_name') == 'en'){
                $title = $page_data->title_en;
                $description = Str::words(strip_tags($page_data->detail_en), 25, '...');
            }elseif (session()->get('session_short_name') == 'jp'){
                $title = $page_data->title_jp;
                $description = Str::words(strip_tags($page_data->detail_jp), 25, '...');
            }else{
                $title = "";
            }
        }else{
            $title = "Unsada";
            $description = "Unsada";
            $image = asset('uploads/logo.png');
        }
    }
}
@endphp

<title>Universitas Darma Persada - {!!$title !!}</title>
<meta http-equiv="X-UA-Compatible" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Universitas Darma Persada - {{$description}}" itemprop="description" />
<meta property="og:type" content="article" />
<meta property="og:site_name" content="unsada" />
<meta property="og:title" content="Unsada - {{$title}}" />
<meta property="og:image" content="{{$image}}" />
<meta property="og:description" content="Universitas Darma Persada - {{$description}} " />
<meta property="og:url" content="https://www.unsada.ac.id" />
<meta property="fb:app_id" content="unsadaofficial" />
<meta property="fb:admins" content="unsadaofficial" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image:width" content="650" />
<meta property="og:image:height" content="366" />
<meta name="copyright" content="" itemprop="dateline" />
<meta name="robots" content="index, follow" />
<meta name="googlebot" content="index, follow" />
<meta name="googlebot-news" content="index, follow" />

<meta content="Universitas Darma Persada - {{$description}} " itemprop="headline" />
<meta name="keywords" content="berita kampus, berita terkini, pendidikan, beasiswa, berita kampus, teknik, bahasa, budaya, kelautan, ekonomi, Indonesia, Internasional" itemprop="keywords" />
<meta name="thumbnailUrl" content="{{ asset('uploads/logo.png') }}" itemprop="thumbnailUrl" />
