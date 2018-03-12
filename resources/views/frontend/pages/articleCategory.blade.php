@extends('frontend.layout')
@section('main_content')
<div class="inner-title">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>{!! $category->category_name !!}</h1>
            </div>
            <div class="col-md-6 text-right">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a> <a href="#">Blog</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="cp-page-content inner-page-content blog-posts blog-with-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @foreach($articles as $article)
                <div class="blog-post">
                    <div class="post-thumb">
                        <img src="{{ env('APP_URL') . $article->article_featured }}" alt="{{ $article->article_meta_title }}" />
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
                                <i class="fa fa-folder"></i> <a href="#" title="{{ $article->category_meta_title }}">{!! $article->category_name !!}</a>
                            </li>

                        </ul>
                    </div>
                    <h3>
                        <a href="{{ URL::action('Frontend\ArticleController@index', ['slug' => $article->article_slug, 'id' => $article->article_id]) }}">{!! $article->article_title !!}</a>
                    </h3>
                    <p>{!! $article->article_summary !!}</p>
                    <a href="{{ URL::action('Frontend\ArticleController@index', ['slug' => $article->article_slug, 'id' => $article->article_id]) }}" class="readmore-blue">Đọc thêm </a> 
                </div>
                @endforeach
            </div>
            <aside class="col-md-3">
                @include('frontend.widgets.sidebar')
            </aside>
        </div>
    </div>
</div>
@endsection