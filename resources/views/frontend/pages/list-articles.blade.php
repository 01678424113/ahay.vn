@extends('frontend.layout')
@section('main_content')
    <div class="inner-title">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="breadcrumb">
                        <li><a href="{{URL::action('Frontend\HomeController@index')}}">Trang chủ</a> <span>{{$title}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="cp-page-content inner-page-content blog-posts blog-with-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        @foreach($articles as $article)
                            <div class="col-md-4">
                                <div class="blog-post">
                                    <div class="post-thumb"><a href="{{URL::action('Frontend\ArticleController@detailArticle', [
                                            'article_slug' => $article->article_slug,
                                            'article_id' => $article->article_id
                            ])}}"><img style="height: 210px;" src="{{$article->article_featured}}" alt=""></a>
                                    </div>
                                    <div class="post-tools">
                                        <ul>
                                            <li>
                                                <h4 class="user"><i class="fa fa-user"></i>
                                                    by {{$article->user_fullname}}</h4>
                                            </li>
                                            <li>
                                                <i class="fa fa-calendar"></i> {{date('d M Y',$article->article_created_at)}}
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
                                            'article_slug' => $article->article_slug,
                                            'article_id' => $article->article_id
                            ])}}">{{str_limit($article->article_title,70,'...')}}</a></h3>
                                    <p style="height: 72px;">{{str_limit($article->article_summary,70,'...')}}</p>
                                    <a href="{{URL::action('Frontend\ArticleController@detailArticle', [
                                            'article_slug' => $article->article_slug,
                                            'article_id' => $article->article_id
                            ])}}" class="readmore-blue" style="font-family: inherit">Đọc thêm <i
                                                class="fa fa-caret-right"></i></a></div>
                            </div>
                        @endforeach
                        @if(count($articles) == 0)
                            <p style="text-align: center;font-size: 20px;">Không có dữ liệu</p>
                        @endif

                    </div>
                    <div class="paging">
                        <ul class="pagination">
                            {{$articles->links()}}
                            <script>
                                window.onload = function () {
                                    $('.disabled span').remove();
                                    $('.disabled').append("<a href=\"#\" style='padding-top: 5px;' aria-label=\"Next\"> <span aria-hidden=\"true\"><i class=\"fa fa-angle-left\"></i></span> </a>");
                                    $('a[rel=next]').css('padding-top', '5px').html('<i class="fa fa-angle-right"></i>');
                                };
                            </script>
                        </ul>
                    </div>
                </div>

                <aside class="col-md-3">
                    @include('frontend.widgets.sidebar')
                </aside>

            </div>
        </div>
    </div>

    @include('frontend.widgets.newsletter')
@endsection