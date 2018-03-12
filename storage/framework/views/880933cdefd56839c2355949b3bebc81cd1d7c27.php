<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title . ' - ' . env('APP_NAME'); ?></title>
    <base href="<?php echo e(asset('')); ?>">
    <?php echo e(Html::style('theme/css/custom.css')); ?>

    <?php echo e(Html::style('theme/css/bootstrap.css')); ?>

    <?php echo e(Html::style('theme/css/jquery.bxslider.css')); ?>

    <?php echo e(Html::style('theme/css/font-awesome.min.css')); ?>

    <?php echo e(Html::style('theme/css/color.css')); ?>

    <?php echo e(Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')); ?>

    <?php echo e(Html::style('theme/css/style.css')); ?>


    <?php echo $__env->yieldContent('style'); ?>
</head>
<body>
<div class="wrapper index">
    <header id="cp-child-header" class="cp-child-header">
        <div class="cp-child-topbar">
            <div class="container">
                <div class="theme-language-currency hidden-sm hidden-xs">
                    <p>Vận chuyển miễn phí! Khuyến mại 20% với đơn hàng từ 500k trở lên</p>
                </div>
                <div class="cart-menu">
                    <ul>
                        <li><a href="#">Hotline: 0123.456.789</a></li>
                        <li><a href="<?php echo e(URL::action('Frontend\PageController@cart')); ?>">Giỏ hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php echo $__env->make('frontend.widgets.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </header>
    <?php echo $__env->yieldContent('main_content', ''); ?>
    <div id="footer" class="cp-footer">
        <div class="footer-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <div class="widget_text">

                        </div>
                    </div>
                    <div class="col-md-2">
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
                    <div class="col-md-2">
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
                    <div class="col-md-2">
                        <div class="widget_text">
                            <h3>Tin tức</h3>
                            <ul>
                                <li>
                                    <a href="#">Thiết kế</a>
                                </li>
                                <li>
                                    <a href="#">Nghệ thuật</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="widget_text">
                            <h3>Liên hệ</h3>
                            <ul>
                                <li>Địa chỉ: ABC, Lê Văn Lương, Hà Nội</li>
                                <li>Số điện thoại: 0123.456.789</li>
                                <li>Email: abc@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
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
                    <div class="col-md-6">
                        <p style="padding: 15px 0; margin: 0;">Copyright 2016. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6">
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
<?php echo e(Html::script('theme/js/jquery.min.js')); ?>

<?php echo e(Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/core.js')); ?>

<?php echo e(Html::script('theme/js/jquery.validate.js')); ?>

<?php echo e(Html::script('theme/js/jquery-migrate-1.2.1.min.js')); ?>

<?php echo e(Html::script('theme/js/bootstrap.min.js')); ?>

<?php echo e(Html::script('theme/js/jquery.easing.1.3.js')); ?>

<?php echo e(Html::script('theme/js/jquery.bxslider.min.js')); ?>

<?php echo e(Html::script('theme/js/owl.carousel.min.js')); ?>

<?php echo e(Html::script('theme/js/jquery.cookie.js')); ?>

<?php echo e(Html::script('theme/js/jquery.number.js')); ?>

<?php echo e(Html::script('theme/js/slick.js')); ?>

<?php echo $__env->yieldContent('script'); ?>
<?php echo e(Html::script('theme/js/custom.js')); ?>


</body>
</html>