@extends('frontend.layout')
@section('main_content')
<div class="inner-title">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{URL::action('Frontend\HomeController@index')}}">Trang chủ</a> <span>Truyện tranh</span></li>
        </ul>
    </div>
</div>
<div class="cp-page-content">
    @php($i = 1)
    @foreach($comics as $comic)
    <div class="cp-home-welcome">
        <div class="container">

            <div class="row">
                <div class="col-md-6 {{ $i % 2 == 0 ? 'col-md-push-6' : ''}}">
                    <img src="{{ env('APP_URL') . $comic->comic_featured }}"
                         alt="{{ $comic->comic_meta_title }}">
                </div>
                <div class="col-md-6 {{ $i % 2 == 0 ? 'col-md-pull-6' : ''}}">
                    <div class="welcome-content">
                        <h3>{!! $comic->comic_name !!}</h3>
                        <p>{!! $comic->comic_description !!}</p>
                        <a href="{{ URL::action('Frontend\ComicController@detailComic', ['comic_slug' => $comic->comic_slug, 'comic_id' => $comic->comic_id]) }}" class="readmore-bg">
                            Tạo câu chuyện
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php($i++)
    @endforeach
</div>
@endsection