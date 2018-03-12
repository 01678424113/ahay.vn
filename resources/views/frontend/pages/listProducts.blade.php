@extends('frontend.layout')
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
            <div class="home-banner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner-container"><img style="width: 100%;max-height: 275px;" src="{{env('APP_URL') . $banner->image }}" alt="">
                            {{--<div class="banner-caption">
                                <h3>Newborn Collection
                                    Winter 2016</h3>
                                <h4>Now in store</h4>
                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-listing">
                <ul class="row">
                    @if(count($products) > 0)
                        @foreach($products as $product)
                            <li class="col-md-3 col-sm-6">
                                <div class="pro-list">
                                    @if($product->product_sale_percent !=0)
                                        <div class="saletag">- {{$product->product_sale_percent}}%</div>
                                    @endif
                                    <div class="thumb"><a
                                                href="{{URL::action('Frontend\ProductController@detailProduct',['product_slug'=>$product->product_slug,'product_id'=>$product->product_id])}}"><img
                                                    src="{{$product->product_featured}}" alt=""></a>
                                    </div>
                                    <div class="text">
                                        <div class="pro-name">
                                            <h4 style="height: 50px;">{{$product->product_name}}
                                                - {{$product->product_sku}}</h4>
                                            @if($product->product_sale_percent == 0)
                                                <p class="price">{{number_format($product->product_price)}} VND</p>
                                            @else

                                                <p class="price">{{number_format($product->product_price*(100-$product->product_sale_percent)/100)}}
                                                    VND</p>
                                                <small style="text-decoration: line-through;">{{number_format($product->product_price)}}
                                                    VND
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="cart-options">
                                        <a href="{{URL::action('Frontend\ActionBuyController@buyProductNow',['product_id'=>$product->product_id])}}">
                                            <i class="fa fa-shopping-cart"></i>Mua ngay
                                        </a>
                                        <a href="{{URL::action('Frontend\ProductController@detailProduct',['product_slug'=>$product->product_slug,'product_id'=>$product->product_id])}}">
                                            <i class="fa fa-search"></i>Chi tiết
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-share-alt"></i>Chia sẻ
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <div class="paging">

                    <ul class="pagination">

                        {{$products->links()}}
                        <script>
                            window.onload = function () {
                                $('.disabled span').remove();
                                $('.disabled').append("<a href=\"#\" aria-label=\"Next\"> <span aria-hidden=\"true\"><i class=\"fa fa-angle-right\"></i></span> </a>");
                            };
                        </script>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.widgets.newsletter')
@endsection
@section('script')
    <script>
        $('.add_to_cart').click(function () {
            var product_sku = $(this).attr('data-sku');
            $.get('/truyentranh-2/public/add-to-cart/' + product_sku, function (data) {
                alert(data);
            })
        })

    </script>
@endsection
