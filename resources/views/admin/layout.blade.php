<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8"/>
        <title>{!! $title !!}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">

        {{Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all')}}
        {{Html::style('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}
        {{Html::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}
        {{Html::style('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}
        {{Html::style('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}
        @yield('style', '')
        {{Html::style('assets/global/plugins/bootstrap-toastr/toastr.min.css')}}
        {{Html::style('assets/global/css/components.css')}}
        {{Html::style('assets/global/css/plugins.min.css')}}
        {{Html::style('assets/layouts/layout/css/layout.css')}}
        {{Html::style('assets/layouts/layout/css/themes/darkblue.min.css')}}
        {{Html::style('assets/layouts/layout/css/custom.css')}}
        {{Html::style('assets/style.css')}}

        {{Html::favicon(env('APP_FAVICON'))}}

    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid" >
        <div class="page-wrapper">
            <div class="page-header navbar navbar-fixed-top">
                <div class="page-header-inner ">
                    <div class="page-logo">
                        <a href="{{ URL::action('Admin\HomeController@index') }}"></a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <a role="button" class="menu-toggler responsive-toggler" data-toggle="collapse"
                       data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user">
                                <a role="button" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                   data-close-others="true">
                                    {{ HTML::image(env('APP_URL').'images/avatar.png', 'alt', ['class' => 'img-circle' ]) }}
                                    <span class="username"> {!! Session::get('user')->user_fullname !!} </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user"></i> Cá nhân
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-key"></i> Đổi mật khẩu
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{URL::action('Admin\AccessController@logout')}}">
                                            <i class="fa fa-sign-out"></i> Đăng xuất
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="page-container">
                <div class="page-sidebar-wrapper">
                    <div class="page-sidebar navbar-collapse collapse">
                        <ul class="page-sidebar-menu page-header-fixed" data-keep-expanded="false" data-auto-scroll="true"
                            data-slide-speed="200">
                            <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
                                <a href="{{URL::action('Admin\HomeController@index')}}">
                                    <i class="fa fa-dashboard"></i>
                                    <span class="title"> Bảng điều khiển </span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            {{-- Truyện tranh--}}
                            <li class="nav-item {{ Request::is('admin/comic*') ? 'active' : '' }}">
                                <a role="button" class="nav-link nav-toggle">
                                    <i class="fa fa-book"></i>
                                    <span class="title">Truyện tranh</span>
                                    <span class="selected"></span>
                                    <span class="arrow {{ Request::is('comic*') ? 'active open' : '' }}"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item {{ Request::is('admin/comic/add') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\ComicController@addComic')}}" class="nav-link">
                                            <span class="title">Thêm truyện tranh</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('admin/comic') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\ComicController@listComic')}}" class="nav-link">
                                            <span class="title">Tất cả truyện tranh</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('admin/comic/story*') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\StoryController@listStory')}}" class="nav-link">
                                            <span class="title">Truyện theo chữ cái</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('admin/comic/story*') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\SettingSaleComicController@listSettingSaleComic')}}" class="nav-link">
                                            <span class="title">Khuyến mại truyện</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            {{-- Sản phẩm--}}
                            <li class="nav-item {{ Request::is('admin/product*') ? 'active' : '' }}">
                                <a role="button" class="nav-link nav-toggle">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="title">Sản phẩm</span>
                                    <span class="selected"></span>
                                    <span class="arrow {{ Request::is('admin/product*') ? 'active open' : '' }}"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item {{ Request::is('admin/product/add') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\ProductController@addProduct')}}" class="nav-link">
                                            <span class="title">Thêm sản phẩm</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('admin/product') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\ProductController@listProduct')}}" class="nav-link">
                                            <span class="title">Tất cả sản phẩm</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('admin/product/category*') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\ProductController@listCategory')}}" class="nav-link">
                                            <span class="title">Chuyên mục sản phẩm</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            {{-- Tin tức--}}
                            <li class="nav-item {{ Request::is('admin/article*') ? 'active' : '' }}">
                                <a role="button" class="nav-link nav-toggle">
                                    <i class="fa fa-rss"></i>
                                    <span class="title">Tin tức</span>
                                    <span class="selected"></span>
                                    <span class="arrow {{ Request::is('admin/article*') ? 'active open' : '' }}"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item {{ Request::is('admin/article/add') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\ArticleController@addArticle')}}" class="nav-link">
                                            <span class="title">Thêm tin tức</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('admin/article') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\ArticleController@listArticle')}}" class="nav-link">
                                            <span class="title">Tất cả tin tức</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('admin/article/category*') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\ArticleController@listCategory')}}" class="nav-link">
                                            <span class="title">Chuyên mục tin tức</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            {{-- Hóa đơn--}}
                            <li class="nav-item {{ Request::is('admin/order*') ? 'active' : '' }}">
                                <a role="button" class="nav-link nav-toggle">
                                    <i class="fa fa-sitemap"></i>
                                    <span class="title">Hóa đơn</span>
                                    <span class="selected"></span>
                                    <span class="arrow {{ Request::is('admin/order*') ? 'active open' : '' }}"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item {{ Request::is('admin/order*') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\OrderController@listOrder')}}" class="nav-link">
                                            <span class="title">Tất cả hóa đơn</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            {{-- Cam  nhan--}}
                            <li class="nav-item {{ Request::is('admin/review*') ? 'active' : '' }}">
                                <a role="button" class="nav-link nav-toggle">
                                    <i class="fa fa-rss"></i>
                                    <span class="title">Cảm nhận</span>
                                    <span class="selected"></span>
                                    <span class="arrow {{ Request::is('admin/review*') ? 'active open' : '' }}"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item {{ Request::is('admin/review/add') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\ReviewController@addReview')}}" class="nav-link">
                                            <span class="title">Thêm cảm nhận</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('admin/review') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\ReviewController@listReview')}}" class="nav-link">
                                            <span class="title">Danh sách cảm nhận</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            {{-- Website--}}
                            <li class="nav-item {{ Request::is('admin/website*') ? 'active' : '' }}">
                                <a role="button" class="nav-link nav-toggle">
                                    <i class="fa fa-rss"></i>
                                    <span class="title">Banner</span>
                                    <span class="selected"></span>
                                    <span class="arrow {{ Request::is('admin/website*') ? 'active open' : '' }}"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item {{ Request::is('admin/website/banner') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\WebsiteController@getSettingBanner1')}}" class="nav-link">
                                            <span class="title">Banner 1</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('admin/website/banner') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\WebsiteController@getSettingBanner2')}}" class="nav-link">
                                            <span class="title">Banner 2</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('admin/website/banner') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\WebsiteController@getSettingBanner3')}}" class="nav-link">
                                            <span class="title">Banner 3</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('admin/website/banner') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\WebsiteController@getSettingBanner4')}}" class="nav-link">
                                            <span class="title">Banner 4</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('admin/website/banner') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\WebsiteController@getSettingBanner5')}}" class="nav-link">
                                            <span class="title">Banner 5</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('admin/website/banner') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\WebsiteController@getSettingBanner6')}}" class="nav-link">
                                            <span class="title">Banner 6</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            {{-- Thành viên--}}
                            <li class="nav-item {{ Request::is('admin/user*') ? 'active' : '' }}">
                                <a href="{{URL::action('Admin\UserController@listUser')}}">
                                    <i class="fa fa-user"></i>
                                    <span class="title">Thành viên</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            {{-- Phân quyền--}}
                            <li class="nav-item {{ Request::is('admin/permission*') ? 'active' : '' }}">
                                <a role="button" class="nav-link nav-toggle">
                                    <i class="fa fa-sitemap"></i>
                                    <span class="title">Phân quyền</span>
                                    <span class="selected"></span>
                                    <span class="arrow {{ Request::is('admin/permission*') ? 'active open' : '' }}"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item {{ Request::is('admin/permission/group*') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\PermissionController@listGroup')}}" class="nav-link">
                                            <span class="title">Nhóm thành viên</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::is('admin/permission/function*') ? 'active' : '' }}">
                                        <a href="{{URL::action('Admin\PermissionController@listFunction')}}" class="nav-link">
                                            <span class="title">Chức năng hệ thống</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="page-content-wrapper">
                    <div class="page-content">
                        @yield('pagecontent', '')
                    </div>
                </div>
            </div>
            <div class="page-footer">
                <div class="page-footer-inner"> 2017 &copy; <a target="_blank" href="{{URL::action('Admin\HomeController@index')}}">{!! env('APP_NAME', '') !!}</a>
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
        </div>
        {{Html::script('assets/global/plugins/jquery.min.js')}}
        {{Html::script('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}
        {{Html::script('assets/global/plugins/js.cookie.min.js')}}
        {{Html::script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}
        {{Html::script('assets/global/plugins/jquery.blockui.min.js')}}
        {{Html::script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}
        {{Html::script('assets/global/scripts/app.min.js')}}
        {{Html::script('assets/layouts/layout/scripts/layout.min.js')}}
        {{Html::script('assets/global/plugins/bootstrap-toastr/toastr.min.js')}}
        {{Html::script('assets/global/plugins/datatables/datatables.min.js')}}
        {{Html::script('assets/global/plugins/datatables/datatables.all.min.js')}}
        {{Html::script('assets/pages/scripts/table-datatables-responsive.min.js')}}

        <script type="text/javascript">
            toastr.options = {
            closeButton: true,
                    debug: false,
                    positionClass: "toast-top-right",
                    onclick: null,
                    showDuration: "1000",
                    hideDuration: "1000",
                    timeOut: "5000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut"
            };
            @if (Session::has('error'))
                    toastr['error']('{!! Session::get("error") !!}');
            @elseif(Session::has('success'))
                    toastr['success']('{!! Session::get("success") !!}');
            @elseif(Session::has('warning'))
                    toastr['warning']('{!! Session::get("warning") !!}');
            @endif
        </script>
        @yield('script', '')
    </body>
</html>