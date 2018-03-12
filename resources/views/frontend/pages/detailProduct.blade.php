@extends('frontend.layout')
@section('style')
    {{Html::style('theme/css/slick.css')}}
    <style>
        .slider-nav .slick-slide {
            cursor: pointer;
            padding: 0 5px;
        }

        .slider-nav * {
            outline: none !important;
        }

        .slider-nav .slick-center img {
            border: 2px solid #ff870a;
        }
        .slider-nav{
        }
    </style>
@endsection
@section('main_content')
    <div class="inner-title">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="breadcrumb">
                        <li><a href="#">Trang chủ</a> <a href="#">{{$title}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="cp-page-content inner-page-content woocommerce">
        <div class="container">
            <div class="product-detail">
                <div class="row">
                    <div class="col-md-5">
                        @if($product->product_sale_percent !=0)
                            <div class="saletag">- {{$product->product_sale_percent}}%</div>
                        @endif
                        <div class="slider slider-for" style="margin-bottom: 15px">
                            @foreach(json_decode($product->product_images) as $image)
                                <div>
                                    <img style="height: 400px;" class="thumb" src="{{ env('APP_URL') . $image}}"
                                         alt="">
                                </div>
                            @endforeach
                        </div>
                        <div class="slider slider-nav" >
                            @foreach(json_decode($product->product_images) as $image)
                                <div>
                                    <img style="width: 100px;height: 100px" src="{{ env('APP_URL') . $image}}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="text">
                            <h3>{{$product->product_name}}</h3>
                            <pre class="pre-comic-content">{!! $product->product_description !!}</pre>
                            <div class="price">
                                <span>{{number_format($product->product_price)}} VND</span>{{number_format($product->product_price*(100-$product->product_sale_percent)/100)}} VND</div>
                            <div class="item-detail">
                                <ul>
                                    {{-- <li><span>Brand:</span>Children Store</li>--}}
                                    <li><span>Mã sản phẩm: </span>{{$product->product_sku}}</li>
                                    <li><span>Trạng thái: </span>
                                        @if($product->product_status == 1)
                                            {{"Còn hàng"}}
                                        @elseif($product->product_status == 0)
                                            {{"Sắp có hàng"}}
                                        @else
                                            {{"Hết hàng"}}
                                        @endif
                                    </li>
                                    <li>
                                        <span>Loại sản phẩm:</span>
                                        <a href="#">{{$product->category_name}}</a>
                                    </li>
                                </ul>

                                <div class="rating">
                                    <p style="font-size: 17px">Đánh giá:</p>
                                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span></div>
                            </div>
                            <div class="quantity">
                                <form action="" method="get" style="display: flex;">
                                    <input type="text" name="product_sku" id="product_sku"
                                           value="{{$product->product_sku}}" style="display: none">
                                    <input type='number' name='quantity' value='0' class='qty'
                                           style="height: 34px;margin-right: 5px"/>
                                    <button type="submit" href="" class="btn btn-info btn-buy"
                                            style="pointer-events: none;">Thêm vào giỏ
                                    </button>
                                </form>
                            </div>
                            <div class="item-share">
                                <div class="button-social" style="margin-bottom: 15px;">
                                    <div class="fb-like" style="top: -5px;" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                                    <!-- Đặt thẻ này vào nơi bạn muốn nút chia sẻ kết xuất. -->
                                    <div class="g-plusone" data-size="medium"></div>
                                    <div class="zalo-share-button" data-href="http://developers.zalo.me" data-oaid="579745863508352884"
                                         data-layout="1" data-color="blue" data-customize=false></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-listing">
                <ul class="row">
                    @foreach($related_products as $related_product)
                        <li class="col-md-3 col-sm-6">
                            <div class="pro-list">
                                {{-- <div class="saletag">Sale</div>--}}
                                <div class="thumb"><a
                                            href="{{URL::action('Frontend\ProductController@detailProduct',['product_slug'=>$related_product->product_slug,'product_id'=>$related_product->product_id])}}"><img
                                                src="{{$related_product->product_featured}}" alt=""></a>
                                </div>
                                <div class="text">
                                    <div class="pro-name">
                                        <h4 style="height: 50px;">{{$related_product->product_name}}
                                            - {{$related_product->product_sku}}</h4>
                                        <p class="price">{{number_format($related_product->product_price)}}
                                            VND</p>
                                    </div>
                                    <p>{{str_limit($related_product->product_meta_title,30,'...')}}</p>
                                </div>
                                <div class="cart-options">
                                    <a href="{{URL::action('Frontend\ActionBuyController@buyProductNow',['product_id'=>$related_product->product_id])}}">
                                        <i class="fa fa-shopping-cart"></i>Mua ngay
                                    </a>
                                    <a href="{{URL::action('Frontend\ProductController@detailProduct',['product_slug'=>$related_product->product_slug,'product_id'=>$related_product->product_id])}}">
                                        <i class="fa fa-search"></i>Chi tiết
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-share-alt"></i>Chia sẻ
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @include('frontend.widgets.newsletter')
@endsection
@section('script')
    <script>

        $(document).ready(function () {
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav'
            });
            $('.slider-nav').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: false,
                arrows: false,
                focusOnSelect: true
            });
            $('.slider-for, .slider-nav').show();
        });

        $('.qty').change(function () {
            var quantity = $(this).val();
            var product_sku = $('#product_sku').val();
            if (quantity < 1) {
                $('.btn-buy').attr('style', 'pointer-events: none;');
            } else {
                $('.btn-buy').attr('style', '');
                $('.quantity form').attr('action', 'http://ahay.vn/san-pham/fix-quantity-product/' + product_sku + '/' + quantity);
            }
        })
    </script>
@endsection