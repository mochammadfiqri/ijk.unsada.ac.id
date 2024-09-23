@if(!session()->get('session_short_name'))
    @php
    $current_short_name = $global_short_name;
    @endphp
@else
    @php
    $current_short_name = session()->get('session_short_name');
    @endphp
@endif
@php
    $current_language_id = \App\Models\Language::where('short_name',$current_short_name)->first()->id;
@endphp

<div class="sidebar">

    <div class="widget">
        @foreach($global_sidebar_top_ad as $row)
            <div class="ad-sidebar">
                @if($row->sidebar_ad_url == '')
                    <img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt="">
                @else
                    <a href="{{ $row->sidebar_ad_url }}"><img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt=""></a>
                @endif
            </div>
        @endforeach
    </div>


    <div class="widget">
        <div class="tag-heading">
            <h2>{{ TAGS }}</h2>
        </div>
        <div class="tag">
            @php
            $all_tags = \App\Models\Tag::select('tag_name')->distinct()->get();
            @endphp
            @foreach($all_tags as $item)
            @php
                $count = 0;
                $all_data = \App\Models\Tag::where('tag_name',$item->tag_name)->get();
                foreach($all_data as $row) {
                    $temp = \App\Models\Post::where('id',$row->post_id)->where('active','1')->count();
                    if($temp>0) {
                        $count=1;
                        break;
                    }
                }
                if($count==0)
                {
                    continue;
                }
            @endphp
            <div class="tag-item">
                <a href="{{ route('tag_posts_show',$item->tag_name) }}"><span class="badge bg-secondary">{{ $item->tag_name }}</span></a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="widget">
        <div class="archive-heading">
            <h2>{{ ARCHIVE }}</h2>
        </div>
        <div class="archive">
            @php
                $archive_array = [];
                $all_post_data = \App\Models\Post::orderBy('id','desc')->get();
                foreach($all_post_data as $row) {
                    $ts = strtotime($row->created_at);
                    $month = date('m',$ts);
                    $month_full = date('F',$ts);
                    $year = date('Y',$ts);
                    $archive_array[] = $month.'-'.$month_full.'-'.$year;
                }
                $archive_array = array_values(array_unique($archive_array));
            @endphp
            <form action="{{ route('archive_show') }}" method="post">
                @csrf
                <select name="archive_month_year" class="form-select" onChange="this.form.submit()">
                    <option value="">{{ SELECT_MONTH }}</option>
                    @for($i=0;$i<count($archive_array);$i++)
                        @php
                            $temp_arr = explode('-',$archive_array[$i]);
                        @endphp
                        <option value="{{ $temp_arr[0].'-'.$temp_arr[2] }}">{{ $temp_arr[1] }}, {{ $temp_arr[2] }}</option>
                    @endfor
                </select>
            </form>
        </div>
    </div>

    <div class="widget">
        <div class="news">
            <div class="news-heading">
                <h2>{{ POPULAR_RECENT_NEWS }}</h2>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{ RECENT_NEWS }}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">{{ POPULAR_NEWS }}</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @php
                    $recent_news_data = \App\Models\Post::where('posts.active', '1')->leftJoin('categories', 'posts.category_id', '=', 'categories.id')->orderBy('posts.id','desc')->get();
                    @endphp
                    @foreach($recent_news_data as $item)
                        @if($loop->iteration > 5)
                            @break
                        @endif
                        <div class="news-item">
                            <div class="left">
                                <img src="{{ asset('uploads/'.$item->post_photo) }}" alt="">
                            </div>
                            <div class="right">
                                <div class="category">
                                    <span class="badge bg-success"><a href="{{ route('category',$item->category_slug) }}">{{ $item->category_name }}</a></span>
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
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @php
                    $popular_news_data = \App\Models\Post::where('posts.active', '1')->leftJoin('categories', 'posts.category_id', '=', 'categories.id')->orderBy('posts.visitors','desc')->get();
                    
                    @endphp
                    @foreach($popular_news_data as $item)
                        @if($loop->iteration > 5)
                            @break
                        @endif
                        <div class="news-item">
                            <div class="left">
                                <img src="{{ asset('uploads/'.$item->post_photo) }}" alt="">
                            </div>
                            <div class="right">
                                <div class="category">
                                    <span class="badge bg-success"><a href="{{ route('category',$item->category_slug) }}">{{ $item->category_name }}</a></span>
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
