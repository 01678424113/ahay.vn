<div class="sidebar">
    @if(Request::is('tin-tuc/*'))
        <div class="widget search">
            <h3>Tìm kiếm bài viết</h3>
            <form action="{{URL::action('Frontend\ArticleController@searchArticle')}}" method="get">
                <div class="input-group"><span class="input-group-addon" id="basic-addon1"><i
                                class="fa fa-search"></i></span>
                    <input type="text" class="form-control" name="article_title" placeholder="Nhập tiêu đề"
                           aria-describedby="basic-addon1">
                </div>
            </form>
        </div>
    @else
        <div class="widget search">
            <h3>Tìm kiếm sản phẩm</h3>
            <form action="{{URL::action('Frontend\ProductController@listProducts')}}" method="get">
                <div class="input-group"><span class="input-group-addon" id="basic-addon1"><i
                                class="fa fa-search"></i></span>
                    <input type="text" class="form-control" name="product_name" placeholder="Nhập tên sản phẩm"
                           aria-describedby="basic-addon1">
                </div>
            </form>
        </div>
    @endif

    <div class="widget archives">
        <h3>Sản phẩm nổi bật</h3>
        @if(count($comic_suggest) > 0)
            @foreach($comic_suggest as $item)
                <div class="row" style="display: flex;justify-content: center;align-items: center;margin-bottom: 10px">
                    <div class="col-md-6">
                        <a href="{{ URL::action('Frontend\ComicController@detailComic', ['comic_slug' => $item->comic_slug, 'comic_id' => $item->comic_id]) }}"><img style="max-width: 100px;" src="{{$item->comic_featured}}" alt=""></a>
                    </div>
                    <div class="col-md-6"><a href="{{ URL::action('Frontend\ComicController@detailComic', ['comic_slug' => $item->comic_slug, 'comic_id' => $item->comic_id]) }}">{{str_limit($item->comic_name,40,'...')}}</a></div>
                </div>
                <hr>
            @endforeach
        @endif
        @if(count($product_suggest) > 0)
            @foreach($product_suggest as $item)
                <div class="row" style="display: flex;justify-content: center;align-items: center;margin-bottom: 10px">
                    <div class="col-md-6">
                        <a href="{{URL::action('Frontend\ProductController@detailProduct',['product_slug'=>$item->product_slug,'product_id'=>$item->product_id])}}"><img style="max-width: 100px;" src="{{$item->product_featured}}" alt=""></a>
                    </div>
                    <div class="col-md-6"><a href="{{URL::action('Frontend\ProductController@detailProduct',['product_slug'=>$item->product_slug,'product_id'=>$item->product_id])}}">{{str_limit($item->product_meta_title,40,'...')}}</a></div>
                </div>
                <hr>
            @endforeach
        @endif
    </div>


    <div class="widget post-tags">
        <h3>Tags</h3>
        <div class="tags"><a href="#">Children</a> <a href="#">Students</a> <a href="#">Kids
                Toys</a> <a href="#">Children Shoes</a> <a href="#">Babies Blothes</a> <a href="#">Students</a>
            <a href="#">Children</a> <a href="#">Kids Toys</a></div>
    </div>
    <div class="widget post-tags">
        <h3>Fanpage</h3>
        <div class="fb-page" data-href="https://www.facebook.com/do.an.ngon.moi.ngay.cooking/" data-width="270"
             data-small-header="true" data-adapt-container-width="false" data-hide-cover="false"
             data-show-facepile="true">
            <blockquote cite="https://www.facebook.com/do.an.ngon.moi.ngay.cooking/" class="fb-xfbml-parse-ignore"><a
                        href="https://www.facebook.com/do.an.ngon.moi.ngay.cooking/">Đồ ăn ngon mỗi ngày - Cooking
                    now</a></blockquote>
        </div>
    </div>
</div>

