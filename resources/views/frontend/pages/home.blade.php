@extends('frontend.layout')
@section('main_content')
    <div class="main-slider hidden-sm hidden-xs">
        <ul class="cp-child-slider">
            <li><img style="width: 100%" src="{{$slider_1[0]->image}}" alt=""/>
                <div class="caption" style="top: 65%;">
                    <div class="container">
                        <div class="slider-data">
                            <a class="shopping-button {{--shopping-button-home--}}"
                               href="{{URL::action('Frontend\ComicController@listComics')}}">Xem ngay</a></div>
                    </div>
                </div>
            </li>
            <li><img style="width: 100%" src="{{$slider_2[0]->image}}" alt=""/>
                <div class="caption" style="top: 65%;">
                    <div class="container">
                        <div class="slider-data">
                            <a class="shopping-button {{--shopping-button-home--}}"
                               href="{{URL::action('Frontend\ComicController@listComics')}}">Xem ngay</a></div>
                    </div>
                </div>
            </li>
            <li><img style="width: 100%" src="{{$slider_3[0]->image}}" alt=""/>
                <div class="caption" style="top: 65%;">
                    <div class="container">
                        <div class="slider-data">
                            <a class="shopping-button {{--shopping-button-home--}}"
                               href="{{URL::action('Frontend\ComicController@listComics')}}">Xem ngay</a></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <div class="cp-page-content">
        @php($i = 1)
        @foreach($comics as $comic)
            <div class="cp-home-welcome">
                <div class="container">
                    @if($i == 1)
                        <h2 class="sec-title">Sản phẩm nổi bật</h2>
                    @endif
                    <div class="row">
                        <div class="col-md-6 {{ $i % 2 == 0 ? 'col-md-push-6' : ''}}">
                            <a href="{{ URL::action('Frontend\ComicController@detailComic', ['comic_slug' => $comic->comic_slug, 'comic_id' => $comic->comic_id]) }}"><img
                                        src="{{ env('APP_URL') . $comic->comic_featured }}"
                                        alt="{{ $comic->comic_meta_title }}"></a>
                        </div>
                        <div class="col-md-6 {{ $i % 2 == 0 ? 'col-md-pull-6' : ''}}">
                            <div class="welcome-content">
                                <h3>{!! $comic->comic_name !!}</h3>
                                <p>{!! $comic->comic_description !!}</p>
                                <a href="{{ URL::action('Frontend\ComicController@detailComic', ['comic_slug' => $comic->comic_slug, 'comic_id' => $comic->comic_id]) }}"
                                   class="readmore-bg">Tạo câu chuyện</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php($i++)
        @endforeach
        @foreach($products as $product)
            <div class="cp-home-welcome">
                <div class="container">
                    @if($i == 1)
                        <h2 class="sec-title">Sản phẩm nổi bật</h2>
                    @endif
                    <div class="row">
                        <div class="col-md-6 {{ $i % 2 == 0 ? 'col-md-push-6' : ''}}">
                            <a href="{{ URL::action('Frontend\ProductController@detailProduct', ['product_slug' => $product->product_slug, 'product_id' => $product->product_id]) }}"><img
                                        src="{{ env('APP_URL') . $product->product_featured }}"
                                        alt="{{ $product->product_meta_title }}"></a>
                        </div>
                        <div class="col-md-6 {{ $i % 2 == 0 ? 'col-md-pull-6' : ''}}">
                            <div class="welcome-content">
                                <h3>{!! $product->product_name . ' - ' . $product->product_sku !!}</h3>
                                <p>{!! $product->product_description !!}</p>
                                <a href="{{ URL::action('Frontend\ProductController@detailProduct', ['product_slug' => $product->product_slug, 'product_id' => $product->product_id]) }}"
                                   class="readmore-bg">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php($i++)
        @endforeach
        <div class="inner-page-content">
            <div class="container">
                <h2 class="sec-title2" style="text-align: center">Tin tức - Sự kiện</h2>
                @include('frontend.widgets.articlesGrid', $articles)
            </div>
        </div>
        <div class="banner">
            <img src="{{$banner->image}}" alt="" style="width: 100%;height: 130px;">
        </div>

    </div>
@endsection