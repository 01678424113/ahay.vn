<div class="logo-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <nav class="navbar navbar-default main-nav">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="logo" href="{{URL::action('Frontend\HomeController@index')}}"><img
                                    src="{{ env('APP_URL') }}/theme/images/bigmart.png" alt=""></a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav menu">
                            <li class="m1">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    Sản phẩm <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a style="padding-left: 12px;"
                                           href="{{URL::action('Frontend\ComicController@listComics')}}">Ấn phẩm quà
                                            tặng</a></li>
                                    <li><a style="padding-left: 12px;"
                                           href="{{URL::action('Frontend\ProductController@listProducts')}}">Sản phẩm
                                            khác</a></li>
                                </ul>
                            </li>
                            <li class="m2">
                                <a href="{{URL::action('Frontend\ArticleController@service')}}">Dịch vụ</a>
                            </li>
                            <li class="m3">
                                <a href="{{URL::action('Frontend\ArticleController@support')}}">Hỗ trợ</a>
                            </li>
                            <li class="m4">
                                <a href="{{URL::action('Frontend\ArticleController@QandA')}}">Hỏi đáp</a>
                            </li>
                            <li class="m5 dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    Tin tức <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a style="padding-left: 22px;"
                                           href="{{URL::action('Frontend\ArticleController@listArticles',['type_article'=>'thiet-ke'])}}">Thiết kế</a></li>
                                    <li><a  style="padding-left: 22px;" href="{{URL::action('Frontend\ArticleController@listArticles',['type_article'=>'nghe-thuat'])}}">Nghệ
                                            thuật</a></li>
                                    <li><a style="padding-left: 22px;"  href="{{URL::action('Frontend\ArticleController@listArticles',['type_article'=>'kien-truc'])}}">Kiến
                                            trúc</a></li>
                                    <li><a style="padding-left: 22px;"
                                           href="{{URL::action('Frontend\ArticleController@listArticles',['type_article'=>'tong-hop'])}}">Tổng hợp</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="m6">
                                <a href="{{URL::action('Frontend\PageController@contact')}}">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-3">
                <div class="login-container" style="padding-bottom: 0">
                    <div class="search-panel" style="display: flex;align-items: flex-end;">
                        <ul>
                            <li>
                                <a role="button" style="width: 80px;" class="search" id="btn-search-top">
                                    <i class="fa fa-search"></i>
                                    <p>Tìm kiếm</p>
                                    <form class="form-search-top" action="{{URL::action('Frontend\ComicController@listComics')}}" method="get">
                                        {{csrf_field()}}
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search_comic" placeholder="Tên truyện">
                                            <div class="input-group-btn">
                                                <button class="btn btn-default" type="submit">
                                                    <i class="glyphicon glyphicon-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="cart-option" style="display: flex">
                        <div class="dropdown" style="display: flex;align-items: center;">
                            <div class="dropdown-menu" role="menu" aria-labelledby="cart">
                                @if(isset($_COOKIE))
                                    <?php $count = 0; ?>
                                    @foreach($_COOKIE as $product)
                                        <?php
                                        $product = json_decode($product);
                                        ?>
                                        @if(isset($product->product_sku))
                                            <div style="display: flex; margin-bottom: 5px">
                                                @if(isset($product->product_featured))
                                                    <img style="width: 50px;margin: 0;height: 50px;margin-right: 10px;"
                                                         src="{{$product->product_featured}}" alt="">
                                                    <a href=""
                                                       style="display: flex;align-items: center;">{{$product->product_name}}
                                                        ({{$product->quantity}})</a>
                                                @elseif(isset($product->comic_featured))
                                                    <img style="width: 50px;margin: 0;height: 50px;margin-right: 10px;"
                                                         src="{{$product->comic_featured}}" alt="">
                                                    <a href="">{{$product->comic_name}} ({{$product->quantity}})</a>
                                                @endif
                                            </div>
                                            <p>Tổng tiền :
                                                @if(isset($_COOKIE['order_total_price']))
                                                    {{number_format($_COOKIE['order_total_price'])}} VNĐ
                                                @endif
                                            </p>
                                            <?php $count = $count + $product->quantity; ?>
                                        @endif
                                    @endforeach
                                    <?php
                                    if ($count == 0)
                                        echo " <p>Không có sản phẩm</p>";
                                    ?>
                                @endif
                            </div>
                            <a id="cart" style="width: 65px;display:flex; height: auto; margin-top: 2px"
                               data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <p style="display: flex;align-items: flex-end;margin-left: 5px;"><?php echo $count; ?>
                                    SP</p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>