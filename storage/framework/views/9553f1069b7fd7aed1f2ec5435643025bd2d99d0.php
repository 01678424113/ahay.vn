<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8"/>
        <title><?php echo $title; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">
        <base href="<?php echo e(asset('')); ?>">
        <?php echo e(Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all')); ?>

        <?php echo e(Html::style('assets/global/plugins/font-awesome/css/font-awesome.min.css')); ?>

        <?php echo e(Html::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')); ?>

        <?php echo e(Html::style('assets/global/plugins/bootstrap/css/bootstrap.min.css')); ?>

        <?php echo e(Html::style('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')); ?>

        <?php echo $__env->yieldContent('style', ''); ?>
        <?php echo e(Html::style('assets/global/plugins/bootstrap-toastr/toastr.min.css')); ?>

        <?php echo e(Html::style('assets/global/css/components.css')); ?>

        <?php echo e(Html::style('assets/global/css/plugins.min.css')); ?>

        <?php echo e(Html::style('assets/layouts/layout/css/layout.css')); ?>

        <?php echo e(Html::style('assets/layouts/layout/css/themes/darkblue.min.css')); ?>

        <?php echo e(Html::style('assets/layouts/layout/css/custom.css')); ?>


        <?php echo e(Html::favicon(env('APP_FAVICON'))); ?>

    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid" >
        <div class="page-wrapper">
            <div class="page-header navbar navbar-fixed-top">
                <div class="page-header-inner ">
                    <div class="page-logo">
                        <a href="<?php echo e(URL::action('Admin\HomeController@index')); ?>"></a>
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
                                    <?php echo e(HTML::image(env('APP_URL').'images/avatar.png', 'alt', ['class' => 'img-circle' ])); ?>

                                    <span class="username"> <?php echo Session::get('user')->user_fullname; ?> </span>
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
                                        <a href="<?php echo e(URL::action('Admin\AccessController@logout')); ?>">
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
                            <li class="nav-item <?php echo e(Request::is('admin') ? 'active' : ''); ?>">
                                <a href="<?php echo e(URL::action('Admin\HomeController@index')); ?>">
                                    <i class="fa fa-dashboard"></i>
                                    <span class="title"> Bảng điều khiển </span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <?php /* Truyện tranh*/ ?>
                            <li class="nav-item <?php echo e(Request::is('admin/comic*') ? 'active' : ''); ?>">
                                <a role="button" class="nav-link nav-toggle">
                                    <i class="fa fa-book"></i>
                                    <span class="title">Truyện tranh</span>
                                    <span class="selected"></span>
                                    <span class="arrow <?php echo e(Request::is('comic*') ? 'active open' : ''); ?>"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item <?php echo e(Request::is('admin/comic/add') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(URL::action('Admin\ComicController@addComic')); ?>" class="nav-link">
                                            <span class="title">Thêm truyện tranh</span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/comic') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(URL::action('Admin\ComicController@listComic')); ?>" class="nav-link">
                                            <span class="title">Tất cả truyện tranh</span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/comic/story*') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(URL::action('Admin\StoryController@listStory')); ?>" class="nav-link">
                                            <span class="title">Truyện theo chữ cái</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php /* Sản phẩm*/ ?>
                            <li class="nav-item <?php echo e(Request::is('admin/product*') ? 'active' : ''); ?>">
                                <a role="button" class="nav-link nav-toggle">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="title">Sản phẩm</span>
                                    <span class="selected"></span>
                                    <span class="arrow <?php echo e(Request::is('admin/product*') ? 'active open' : ''); ?>"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item <?php echo e(Request::is('admin/product/add') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(URL::action('Admin\ProductController@addProduct')); ?>" class="nav-link">
                                            <span class="title">Thêm sản phẩm</span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/product') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(URL::action('Admin\ProductController@listProduct')); ?>" class="nav-link">
                                            <span class="title">Tất cả sản phẩm</span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/product/category*') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(URL::action('Admin\ProductController@listCategory')); ?>" class="nav-link">
                                            <span class="title">Chuyên mục sản phẩm</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php /* Tin tức*/ ?>
                            <li class="nav-item <?php echo e(Request::is('admin/article*') ? 'active' : ''); ?>">
                                <a role="button" class="nav-link nav-toggle">
                                    <i class="fa fa-rss"></i>
                                    <span class="title">Tin tức</span>
                                    <span class="selected"></span>
                                    <span class="arrow <?php echo e(Request::is('admin/article*') ? 'active open' : ''); ?>"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item <?php echo e(Request::is('admin/article/add') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(URL::action('Admin\ArticleController@addArticle')); ?>" class="nav-link">
                                            <span class="title">Thêm tin tức</span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/article') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(URL::action('Admin\ArticleController@listArticle')); ?>" class="nav-link">
                                            <span class="title">Tất cả tin tức</span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/article/category*') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(URL::action('Admin\ArticleController@listCategory')); ?>" class="nav-link">
                                            <span class="title">Chuyên mục tin tức</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php /* Thành viên*/ ?>
                            <li class="nav-item <?php echo e(Request::is('admin/user*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(URL::action('Admin\UserController@listUser')); ?>">
                                    <i class="fa fa-user"></i>
                                    <span class="title">Thành viên</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <?php /* Phân quyền*/ ?>
                            <li class="nav-item <?php echo e(Request::is('admin/permission*') ? 'active' : ''); ?>">
                                <a role="button" class="nav-link nav-toggle">
                                    <i class="fa fa-sitemap"></i>
                                    <span class="title">Phân quyền</span>
                                    <span class="selected"></span>
                                    <span class="arrow <?php echo e(Request::is('admin/permission*') ? 'active open' : ''); ?>"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item <?php echo e(Request::is('admin/permission/group*') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(URL::action('Admin\PermissionController@listGroup')); ?>" class="nav-link">
                                            <span class="title">Nhóm thành viên</span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/permission/function*') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(URL::action('Admin\PermissionController@listFunction')); ?>" class="nav-link">
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
                        <?php echo $__env->yieldContent('pagecontent', ''); ?>
                    </div>
                </div>
            </div>
            <div class="page-footer">
                <div class="page-footer-inner"> 2017 &copy; <a target="_blank" href="<?php echo e(URL::action('Admin\HomeController@index')); ?>"><?php echo env('APP_NAME', ''); ?></a>
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
        </div>
        <?php echo e(Html::script('assets/global/plugins/jquery.min.js')); ?>

        <?php echo e(Html::script('assets/global/plugins/bootstrap/js/bootstrap.min.js')); ?>

        <?php echo e(Html::script('assets/global/plugins/js.cookie.min.js')); ?>

        <?php echo e(Html::script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')); ?>

        <?php echo e(Html::script('assets/global/plugins/jquery.blockui.min.js')); ?>

        <?php echo e(Html::script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')); ?>

        <?php echo e(Html::script('assets/global/scripts/app.min.js')); ?>

        <?php echo e(Html::script('assets/layouts/layout/scripts/layout.min.js')); ?>

        <?php echo e(Html::script('assets/global/plugins/bootstrap-toastr/toastr.min.js')); ?>

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
            <?php if(Session::has('error')): ?>
                    toastr['error']('<?php echo Session::get("error"); ?>');
            <?php elseif(Session::has('success')): ?>
                    toastr['success']('<?php echo Session::get("success"); ?>');
            <?php elseif(Session::has('warning')): ?>
                    toastr['warning']('<?php echo Session::get("warning"); ?>');
            <?php endif; ?>
        </script>
        <?php echo $__env->yieldContent('script', ''); ?>
    </body>
</html>