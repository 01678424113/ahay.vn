@extends('frontend.layout')
@section('main_content')
    <div class="inner-title">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Trang chủ</a> <a href="#">Tin tức</a> <a href="#">{{$title}}</a></li>
            </ul>
        </div>
    </div>
    <div class="cp-page-content inner-page-content blog-posts blog-with-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="blog-post">
                        <div class="post-thumb">
                            <img src="{{ env('APP_URL') . $article->article_featured }}"
                                 alt="{{ $article->article_meta_title }}"/>
                        </div>
                        <div class="post-tools">
                            <ul>
                                <li>
                                    <i class="fa fa-user"></i> {!! $article->user_fullname !!}
                                </li>
                                <li>
                                    <i class="fa fa-calendar"></i> {!! date('d F, Y', $article->article_created_at) !!}
                                </li>
                                <li>
                                    <i class="fa fa-folder"></i> <a href="#"
                                                                    title="{{ $article->category_meta_title }}">{!! $article->category_name !!}</a>
                                </li>

                            </ul>
                        </div>
                        <h1>{!! $article->article_title !!}</h1>
                        <p class="font-bold font-14">{!! $article->article_summary !!}</p>
                        {!! $article->article_content !!}
                        <div class="button-social" style="margin-bottom: 15px;">
                            <div class="fb-like" style="top: -5px;"
                                 data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count"
                                 data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                            <!-- Đặt thẻ này vào nơi bạn muốn nút chia sẻ kết xuất. -->
                            <div class="g-plusone" data-size="medium"></div>
                            <div class="zalo-share-button" data-href="http://developers.zalo.me"
                                 data-oaid="579745863508352884"
                                 data-layout="1" data-color="blue" data-customize=false></div>
                        </div>
                    </div>
                    @include('frontend.widgets.commentForm')
                    <div class="row">
                        <h2 style="margin-left: 15px;margin-top: 20px;margin-bottom: 20px;">Tin tức cùng chuyên mục</h2>
                        @if(count($articles_r)>0)
                            @foreach($articles_r as $article_r)
                                <div class="col-md-4">
                                    <div class="blog-post">
                                        <div class="post-thumb"><a href="{{URL::action('Frontend\ArticleController@detailArticle', [
                                            'article_slug' => $article_r->article_slug,
                                            'article_id' => $article_r->article_id
                            ])}}"><img style="height: 210px;" src="{{$article_r->article_featured}}" alt=""></a>
                                        </div>
                                        <div class="post-tools">
                                            <ul>
                                                <li>
                                                    <h4 class="user"><i class="fa fa-user"></i>
                                                        by {{$article_r->user_fullname}}</h4>
                                                </li>
                                                <li>
                                                    <i class="fa fa-calendar"></i> {{date('d M Y',$article_r->article_created_at)}}
                                                </li>
                                                {{-- <li>
                                                     <div class="post-tags"><a href="#">children</a>, <a href="#">toys</a>, <a
                                                                 href="#">baby
                                                             sitter</a>, <a href="#">prams</a>, <a href="#">bornbaby cloths</a></div>
                                                 </li>
                                                 <li>
                                                     <div class="post-comments">27 comments</div>
                                                 </li>--}}
                                            </ul>
                                        </div>
                                        <h3 style="height: 160px;"><a href="{{URL::action('Frontend\ArticleController@detailArticle', [
                                            'article_slug' => $article_r->article_slug,
                                            'article_id' => $article_r->article_id
                            ])}}">{{str_limit($article_r->article_title,70,'...')}}</a></h3>
                                        <p style="height: 72px;">{{str_limit($article_r->article_summary,70,'...')}}</p>
                                        <a href="{{URL::action('Frontend\ArticleController@detailArticle', [
                                            'article_slug' => $article_r->article_slug,
                                            'article_id' => $article_r->article_id
                            ])}}" class="readmore-blue" style="font-family: inherit">Đọc thêm <i
                                                    class="fa fa-caret-right"></i></a></div>
                                </div>
                            @endforeach
                        @else
                            <p>Không có tin cùng chuyên mục</p>
                        @endif
                    </div>
                </div>
                <aside class="col-md-3">
                    @include('frontend.widgets.sidebar')
                </aside>
            </div>
        </div>
    </div>
@endsection