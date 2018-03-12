<!DOCTYPE html>
<html lang="vi" xmlns:fb='http://www.facebook.com/2008/fbml' >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="fb:app_id" content="874373596059321"/>
    <meta property="fb:admins" content="100003102711569"/>
    <meta property="og:url"
          content="{{URL::current()}}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="Thế giới truyện tranh của bé."/>
    <meta property="og:description" content="Thế giới truyện tranh của bé. Tha hồ sáng tạo"/>
    <meta property="og:image"
          content="http://ahay.vn/images/avatar.png"/>
    <title>{!! $title . ' - ' . env('APP_NAME') !!}</title>
    <base href="{{asset('')}}">
    {{Html::style('theme/css/custom.css')}}
    {{Html::style('theme/css/bootstrap.css')}}
    {{Html::style('theme/css/jquery.bxslider.css')}}
    {{Html::style('theme/css/font-awesome.min.css')}}
    {{Html::style('theme/css/color.css')}}
    {{Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}
    {{Html::style('theme/css/style.css')}}
    @yield('style')
</head>
<body>
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId : '874373596059321',
            status : true, // check login status
            cookie : true, // enable cookies to allow the server to access the session
            xfbml : true // parse XFBML
        });
    };
    (function() {
        var e = document.createElement('script');
        e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
        e.async = true;
        document.getElementById('fb-root').appendChild(e);
    }());
</script>
<script src="https://apis.google.com/js/platform.js" async defer>
    {
        lang: 'vi'
    }
</script>

<div class="wrapper index">
    <header id="cp-child-header" class="cp-child-header">
        <div class="cp-child-topbar">
            <div class="container">
                <div class="theme-language-currency hidden-sm hidden-xs">
                    <p style="font-size: 13px">Chúng tôi tự hào là Website đầu tiên chuyên về thể loại truyện tranh
                        <strong>"Cá nhân hóa"</strong> ở Việt Nam</p>
                </div>
                <div class="cart-menu">
                    <ul>
                        <li><a style="font-size: 13px" href="#">Hotline: 0989.426.068</a></li>
                        {{--  <li><a href="{{ URL::action('Frontend\PageController@cart') }}">Giỏ hàng</a></li>--}}
                    </ul>
                </div>
            </div>
        </div>
        @include('frontend.widgets.nav')
    </header>
    @yield('main_content', '')
    <div id="footer" class="cp-footer">
        <div class="footer-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 col-sm-6">
                        <div class="widget_text">
                            <h3>Logo</h3>
                            <ul>
                                <li>
                                    <a href="#">Logo</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="widget_text">
                            <h3>Sản phẩm</h3>
                            <ul>
                                <li>
                                    <a href="#">Cuộc phiêu lưu đi tìm cái tên bị mất</a>
                                </li>
                                <li>
                                    <a href="#">Bộ gấp giấy những chữ cái ngộ nghĩnh</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="widget_text">
                            <h3>Dịch vụ</h3>
                            <ul>
                                <li>
                                    <a href="#">Thiết kế logo biểu tượng</a>
                                </li>
                                <li>
                                    <a href="#">Thiết kế sách báo</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="widget_text">
                            <h3>Tin tức</h3>
                            <ul>
                                <li>
                                    <a href="#">Thiết kế</a>
                                </li>
                                <li>
                                    <a href="#">Nghệ thuật</a>
                                </li>
                                <li>
                                    <a href="#">Kiến trúc</a>
                                </li>
                                <li>
                                    <a href="#">Tổng hợp</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="widget_text">
                            <h3>Liên hệ</h3>
                            <ul>
                                <li>Địa chỉ: ABC, Lê Văn Lương, Hà Nội</li>
                                <li>Số điện thoại: 0123.456.789</li>
                                <li>Email: abc@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="widget_text">
                            <h3>Cách thức thanh toán</h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-5">
                        <p style="padding: 15px 0; margin: 0;">Copyright 2018. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6 col-sm-7">
                        <div class="footer-social"><a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i
                                        class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a
                                    href="#"><i class="fa fa-google-plus"></i></a> <a href="#"><i
                                        class="fa fa-pinterest"></i></a> <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{Html::script('theme/js/jquery.min.js')}}
{{Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js')}}
{{Html::script('theme/js/jquery.validate.js')}}
{{Html::script('theme/js/jquery-migrate-1.2.1.min.js')}}
{{Html::script('theme/js/bootstrap.min.js')}}
{{Html::script('theme/js/jquery.easing.1.3.js')}}
{{Html::script('theme/js/jquery.bxslider.min.js')}}
{{Html::script('theme/js/owl.carousel.min.js')}}
{{Html::script('theme/js/jquery.cookie.js')}}
{{Html::script('theme/js/jquery.number.js')}}
{{Html::script('theme/js/slick.js')}}
@yield('script')
{{Html::script('theme/js/custom.js')}}
<script src="https://sp.zalo.me/plugins/sdk.js"></script>
<script>
    $('.form-search-top').hide();
    $('.search-panel').hover(function () {
        $('.form-search-top').toggle();
    });
    $('body').bind('copy', function (e) {
        e.preventDefault();
    });
</script>
</body>
</html>