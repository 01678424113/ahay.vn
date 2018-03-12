<?php $__env->startSection('style'); ?>
    <?php echo e(Html::style('theme/css/slick.css')); ?>

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
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
    <div class="inner-title">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Trang chủ</a> <a href="#">Truyện tranh</a> <a href="#"><?php echo e($title); ?></a></li>
            </ul>
        </div>
    </div>
    <div class="cp-page-content inner-page-content woocommerce">
        <div class="container">
            <div class="product-detail">
                <div class="row">
                    <div class="col-md-5">
                        <div class="slider slider-for" style="display: none; margin-bottom: 15px">
                            <?php foreach($comic->comic_images as $img): ?>
                                <div>
                                    <img class="thumb" src="<?php echo e(env('APP_URL') . $img); ?>"
                                         alt="<?php echo e($comic->comic_meta_title); ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="slider slider-nav" style="display: none;">
                            <?php foreach($comic->comic_images as $img): ?>
                                <div>
                                    <img src="<?php echo e(env('APP_URL') . $img); ?>" alt="<?php echo e($comic->comic_meta_title); ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="text">
                            <h3><?php echo $comic->comic_name; ?></h3>
                            <p><?php echo $comic->comic_description; ?></p>
                            <div class="item-detail">
                                <div class="rating">
                                    <p>Đánh giá:</p>
                                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                </div>
                            </div>
                            <div class="item-share">
                                <p>Share:</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="cp-our-staff">
        <div class="container">
            <?php echo Form::open(['action' => ['Frontend\ComicController@previewComic',$comic->comic_slug,$comic->comic_id,$product_sku], 'method' => 'GET', 'id'=> 'preview-form']); ?>

            <?php echo e(csrf_field()); ?>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <input type="text" name="comic_user" class="form-control input-lg"
                               placeholder="Tên">
                        <input type="text" name="product_sku" class="form-control input-lg hidden"
                               value="<?php echo e($product_sku); ?>">
                        <span id="comic_user-error-character" style="display: none;">Bạn chỉ có thể nhập chữ !</span>
                        <span id="comic_user-error-character-same" style="display: none;">Xin lỗi tên bạn chỉ có thể có 2 ký tự giống nhau !</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12" style="margin-bottom: 15px">
                    <div class="form-group">
                        <div class="btn-group" data-toggle="buttons" style="display:block;">
                            <label class="btn btn-lg btn-info active col-sm-6 col-xs-6">
                                <input type="radio" name="comic_gender" value="boy" checked class="toggle"> Trai
                            </label>
                            <label class="btn btn-lg btn-info col-sm-6 col-xs-6">
                                <input type="radio" name="comic_gender" value="girl" class="toggle"> Gái </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12" style="text-align: center;">
                    <button role="button" type="submit" class="btn btn-info btn-lg btn-preview" style="border: 0">Xem trước</button>
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>

    <?php ($i = 1); ?>
    <?php foreach($comic->comic_content as $content): ?>
        <?php if($content->content_title != ""): ?>
            <div class="cp-home-welcome">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 <?php echo e($i % 2 == 0 ? 'col-md-push-6' : ''); ?>">
                            <img src="<?php echo e(env('APP_URL') . $content->content_image); ?>"
                                 alt="<?php echo e($content->content_title); ?>">
                        </div>
                        <div class="col-md-6 <?php echo e($i % 2 == 0 ? 'col-md-pull-6' : ''); ?>">
                            <div class="welcome-content">
                                <h3><?php echo $content->content_title; ?></h3>
                                <p><?php echo $content->content_text; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php ($i++); ?>
        <?php endif; ?>
    <?php endforeach; ?>
    <div class="cp-home-newsletter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Want to hear more story,subscribe for our newsletter</h3>
                    <a class="subscribe-button" href="#">Subscribe</a></div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php echo e(Html::script('theme/js/slick.js')); ?>

    <script>
        //Validator
        $("#preview-form").validate({
            errorElement: 'span',
            errorClass: 'help-block',
            focusInvalid: false,
            rules: {
                'comic_user': {
                    required: true,
                    minlength: 3,
                    maxlength: 12,
                    number: false
                },
                'comic_gender': "required"
            },
            messages: {
                'comic_user': {
                    required: "Bạn chưa nhập tên",
                    minlength: "Xin lỗi tên bạn quá ngắn !",
                    maxlength: "Xin lỗi tên bạn quá dài !",
                    number: "Bạn chỉ có thể nhập chữ !"
                },
                'comic_gender': {
                    required: "Bạn chưa chọn giới tính !"
                }
            }
        });
        $('input[name=comic_user]').focusout(function () {
            var comic_user = $(this).val();
            //Biêu thức regex chỉ nhận khoảng trắng và các chữ cái
            var regex = "[^a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\\\\s]+$";
            console.log(comic_user.match(regex));
            if (comic_user.match(regex) != null) {
                $('#comic_user-error-character').attr('style', 'display:block');
                $('.btn-preview').addClass('disabled');
            } else {
                $('#comic_user-error-character').attr('style', 'display:none');
                $('.btn-preview').removeClass('disabled');
            }
            comic_user = comic_user.replace(' ','').toUpperCase();
            comic_user = comic_user.split('');
            $.each(comic_user,function(index,value){
                var i = 0;
                $.each(comic_user,function(index1,value1){
                    if(value == value1){
                        i++;
                    }
                });
                if ( i > 2) {
                    $('#comic_user-error-character-same').attr('style', 'display:block');
                    $('.btn-preview').addClass('disabled');
                } else {
                    $('#comic_user-error-character-same').attr('style', 'display:none');
                    $('.btn-preview').removeClass('disabled');
                }
            })


        });
        //End validator

        $(document).ready(function () {
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav'
            });
            $('.slider-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: false,
                centerMode: true,
                arrows: false,
                focusOnSelect: true
            });
            $('.slider-for, .slider-nav').show();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>