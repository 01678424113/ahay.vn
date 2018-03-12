<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title . ' - ' . env('APP_NAME'); ?></title>
        <?php echo e(Html::style('theme/css/custom.css')); ?>

        <?php echo e(Html::style('theme/css/bootstrap.css')); ?>

        <?php echo e(Html::style('theme/css/jquery.bxslider.css')); ?>

        <?php echo e(Html::style('theme/css/font-awesome.min.css')); ?> 
        <?php echo e(Html::style('theme/css/color.css')); ?> 
        <?php echo e(Html::style('theme/css/owl.carousel.css')); ?> 
        <?php echo e(Html::style('theme/css/style.css')); ?>

    </head>

    <body>
        <div id="child-care" class="wrapper index">
            <header id="cp-child-header" class="cp-child-header">
                <div class="cp-child-topbar">
                    <div class="container">
                        <div class="theme-language-currency hidden-sm hidden-xs">
                            <p>Vận chuyển miễn phí! Khuyến mại 20% với đơn hàng từ 500k trở lên</p>
                        </div>
                        <div class="cart-menu">
                            <ul>
                                <li><a href="#">Hotline: 0123.456.789</a></li>
                                <li><a href="#">Giỏ hàng</a></li>
                                <li><a href="#">Thanh toán</a></li>
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
                                <div class="footer-social"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-google-plus"></i></a> <a href="#"><i class="fa fa-pinterest"></i></a> <a href="#"><i class="fa fa-dribbble"></i></a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo e(Html::script('theme/js/jquery.min.js')); ?>

        <?php echo e(Html::script('theme/js/jquery-migrate-1.2.1.min.js')); ?>

        <?php echo e(Html::script('theme/js/bootstrap.min.js')); ?>

        <?php echo e(Html::script('theme/js/jquery.easing.1.3.js')); ?>

        <?php echo e(Html::script('theme/js/jquery.bxslider.min.js')); ?>

        <?php echo e(Html::script('theme/js/owl.carousel.min.js')); ?> 
        <?php echo e(Html::script('theme/js/custom.js')); ?>

        <script>
            /* <![CDATA[ */
            (function (d, s, a, i, j, r, l, m, t) {
                try {
                    l = d.getElementsByTagName('a');
                    t = d.createElement('textarea');
                    for (i = 0; l.length - i; i++) {
                        try {
                            a = l[i].href;
                            s = a.indexOf('/cdn-cgi/l/email-protection');
                            m = a.length;
                            if (a && s > -1 && m > 28) {
                                j = 28 + s;
                                s = '';
                                if (j < m) {
                                    r = '0x' + a.substr(j, 2) | 0;
                                    for (j += 2; j < m && a.charAt(j) != 'X'; j += 2)
                                        s += '%' + ('0' + ('0x' + a.substr(j, 2) ^ r).toString(16)).slice(-2);
                                    j++;
                                    s = decodeURIComponent(s) + a.substr(j, m - j)
                                }
                                t.innerHTML = s.replace(/</g, '&lt;').replace(/\>/g, '&gt;');
                                l[i].href = 'mailto:' + t.value
                            }
                        } catch (e) {
                        }
                    }
                } catch (e) {
                }
            })(document); /* ]]> */
        </script>
    </body>

</html>