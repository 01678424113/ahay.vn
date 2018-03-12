<?php $__env->startSection('style'); ?>
    <?php echo e(Html::style('theme/css/preview-comic.css')); ?>

    <?php echo e(Html::style('theme/css/slick.css')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
    <div class="inner-title">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Trang chủ</a> <a href="#">Truyện tranh</a> <a href="#"><?php echo e($title); ?></a></li>
            </ul>
        </div>
    </div>
    <?php echo Form::open(['action' => ['Frontend\ComicController@createComic'], 'method' => 'POST', 'id'=> 'create-form']); ?>

    <?php echo e(csrf_field()); ?>

    <div class="cp-page-content inner-page-content woocommerce"
         style="background: #F5F5F0; box-shadow: 0 -4px 4px 0 rgba(0, 0, 0, 0.03);padding-top:40px;color: #5a6e73;">
        <?php /*Preview comic*/ ?>
        <div class="container">
            <p style="text-align: center;font-size: 18px;font-weight: 600;">Một cuốn sách được cá nhân hóa cho </p>
            <?php /*Preview word comic*/ ?>
            <div class="preview-word-comic" style="padding-bottom: 0">
                <button type="button" id="previous"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                <?php $i = 3; ?>
                <?php foreach($array_comic_word as $comic_word): ?>
                    <button type="button" class="jump word thumbnail-<?php echo e($i); ?>" data-thumbnail="thumbnail-<?php echo e($i); ?>"
                            data-word-id="<?php echo e($i); ?>"><?php echo e($comic_word); ?></button>
                    <?php $i += 4; ?>
                <?php endforeach; ?>
                <button type="button" id="next"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </div>
            <div class="preview-word-comic">
                <div class="thumbnails-comic-word">
                    <div style="display: inline-flex;justify-content: center;align-items: center;">
                        <?php $i = 3; ?>
                        <?php foreach($stories as $story): ?>
                            <div>
                                <img class="img-thumbnails-word" data-word-id="<?php echo e($i); ?>" id="thumbnail-<?php echo e($i); ?>"
                                     src="<?php echo e($story[0]->story_icon); ?>"
                                     alt="">
                                <a href="javascript:void(0);" id="popover-<?php echo e($story[0]->story_id); ?>"
                                   class="bslink btn-info btn-lg btn-change-story">
                                    Thay đổi
                                </a>
                                <div class="popover fade bottom in"
                                     style="top: 79px; left: -110.5px;">
                                    <div class="arrow" style="left: 50%;"></div>
                                    <h3 class="popover-title">Chọn 1 mẩu truyện khác</h3>
                                    <div class="popover-content">
                                        <?php foreach($stories_all as $item): ?>
                                            <?php if($story[0]->story_alpha == $item->story_alpha && $story[0]->story_id != $item->story_id): ?>
                                                <div class="row" style="margin-bottom: 13px;">
                                                    <div class="col-md-3">
                                                        <img src="<?php echo e($item->story_icon); ?>" alt="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p style="margin-bottom: 0;margin-top: 10px"><?php echo e($item->story_id); ?></p>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <button type="button"
                                                                class="btn btn-lg ajax-change-story"
                                                                data-story-change="<?php echo e($item->story_id); ?>"
                                                                data-story-present="<?php echo e($story[0]->story_id); ?>">Chọn
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php elseif($story[0]->story_alpha == $item->story_alpha && $story[0]->story_id == $item->story_id): ?>
                                                <div class="row" style="margin-bottom: 13px;">
                                                    <div class="col-md-3">
                                                        <img src="<?php echo e($item->story_icon); ?>" alt="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p style="margin-bottom: 0;margin-top: 10px"><?php echo e($item->story_id); ?></p>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <button type="button"
                                                                class="btn btn-lg ajax-present-story ajax-change-story change-story-<?php echo e($story[0]->story_id); ?>"
                                                                data-story-change="<?php echo e($item->story_id); ?>"
                                                                data-story-present="<?php echo e($story[0]->story_id); ?>">Đã chọn
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <?php $i += 4; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php /*End preview word comic*/ ?>
            <?php /*Preview image comic*/ ?>
            <div class="preview-comic shake">
                <div class="Heidelberg-Book with-Spreads" id="Heidelberg-example-1" style="left:-25%">
                    <div class="Heidelberg-Page first-page">
                        <img src="theme/images/comic/transparent.bmp">
                    </div>
                    <div class="Heidelberg-Page first-page">
                        <img src="https://images.wonderbly.com/products/birthday-thief/front-cover-girl-type-iii-fr.jpg?auto=format%2Ccompress&q=60&w=600">
                    </div>
                    <?php  $i = 1; ?>
                    <?php foreach($stories as $story): ?>
                        <?php
                        $story_images = json_decode($story[0]->story_images);
                        $j = 1;
                        ?>
                        <?php foreach($story_images as $image): ?>
                            <div class="Heidelberg-Spread">
                                <img src="<?php echo e($image); ?>" class="image-<?php echo e($story[0]->story_id); ?>-<?php echo e($j); ?>"
                                     data-thumbnail-page="thumbnail-<?php echo e($i); ?>">
                                <input type="checkbox" class="hidden" name="comic_images[]" value="<?php echo e($image); ?>" checked>
                                <input type="checkbox" class="hidden class-story-<?php echo e($story[0]->story_id); ?>-present"
                                       name="comic_id_story_present[]" value="<?php echo e($story[0]->story_id); ?>" checked>
                            </div>
                            <?php $j++; ?>
                        <?php endforeach; ?>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    <div class="Heidelberg-Page last-page">
                        <img src="https://images.wonderbly.com/products/birthday-thief/front-cover-girl-type-iii-fr.jpg?auto=format%2Ccompress&q=60&w=600">
                    </div>
                    <div class="Heidelberg-Page last-page">
                        <img src="theme/images/comic/transparent.bmp">
                    </div>
                </div>
            </div>
            <?php /*End preview image comic*/ ?>
        </div>
        <div class="background-hiden">
        </div>
        <?php /*End preview comic*/ ?>
        <?php /*Form info preview comic*/ ?>
        <div class="cp-our-staff" id="info-preview-comic-name">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <input type="text" name="comic_user_validate" class="form-control input-lg" id="comic-user-create-form" placeholder="Tên"
                                   value="<?php echo e($comic_user); ?>">
                            <input type="hidden" name="comic_user" class="form-control input-lg"  placeholder="Tên"
                                   value="<?php echo e($comic_user); ?>">
                            <span id="comic_user-error-character"
                                  style="display: none;">Bạn chỉ có thể nhập chữ !</span>
                            <span id="comic_user-error-character-same" style="display: none;">Xin lỗi tên bạn chỉ có thể có 2 ký tự giống nhau !</span>
                            <input type="text" name="product_sku" class="hidden" value="<?php echo e($product_sku); ?>">
                            <input type="text" name="comic_name" class="hidden" value="<?php echo e($comic->comic_name); ?>">
                            <input type="text" name="comic_id" class="hidden" value="<?php echo e($comic->comic_id); ?>">
                            <input type="text" name="comic_slug" class="hidden" value="<?php echo e($comic->comic_slug); ?>">
                            <input type="text" name="comic_featured" class="hidden" value="<?php echo e($comic->comic_featured); ?>">
                            <input type="text" name="comic_unit_price" class="hidden"
                                   value="<?php echo e($comic->comic_unit_price); ?>">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12" style="margin-bottom: 15px">
                        <div class="form-group">
                            <div class="btn-group" data-toggle="buttons" style="display:block;">
                                <label class="btn btn-lg btn-info col-sm-6 col-xs-6
                                <?php if($comic_gender == 'boy'): ?>
                                <?php echo e('active'); ?>

                                <?php endif; ?>
                                        ">
                                    <input type="radio" name="comic_gender" value="boy" class="toggle"
                                    <?php if($comic_gender == 'boy'): ?>
                                        <?php echo e('checked'); ?>

                                            <?php endif; ?>
                                    > Trai </label>
                                <label class="btn btn-lg btn-info col-sm-6 col-xs-6
                                <?php if($comic_gender == 'girl'): ?>
                                <?php echo e('active'); ?>

                                <?php endif; ?>
                                        ">
                                    <input type="radio" name="comic_gender" value="girl" class="toggle"
                                    <?php if($comic_gender == 'girl'): ?>
                                        <?php echo e('checked'); ?>

                                            <?php endif; ?>
                                    > Gái </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <button type="button" form="preview-form"
                                class="btn btn-info btn-lg btn-save-info-comic"
                                style="display: block;width: 100%">Lưu thay đổi
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div id="info-preview-comic-message">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p style="color: #3a4d5f;font-weight: 600;font-size: 19px;">Nhập lời nhắn bạn muốn gửi đến người
                            đọc</p>
                        <p style="color: #5a6e73;font-size: 15px;">Nous l'imprimerons sur la page de garde</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 img-dear">
                        <img src="https://images.wonderbly.com/products/lmn/dedication-image-fr.jpg?w=590&q=70&auto=format%2Ccompress"
                             alt="">
                    </div>
                    <div class="col-md-6 col-sm-12 text-dear">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea name="comic_message" id="" class="form-control" cols="30" rows="13"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <p>Tối đa 188 từ</p>
                            </div>
                            <div class="col-md-6 col-xs-12" style="text-align: right">
                                <button type="button" class="btn btn-info btn-lg btn-save-message-comic"
                                        style="display: block;width: 100%">Lưu thay đổi
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php /*End form info preview comic*/ ?>
    </div>
    <?php echo Form::close(); ?>

    <?php /*Form load lại truyện khi đổi tên*/ ?>
    <?php echo Form::open(['action' => ['Frontend\ComicController@previewComic',$comic->comic_slug,$comic->comic_id,$product_sku], 'method' => 'GET', 'id'=> 'preview-form']); ?>

    <input type="hidden" name="comic_user" id="comic-user-preview-form" class="form-control input-lg" value="<?php echo e($comic_user); ?>">
    <input type="hidden" name="product_sku" class="form-control input-lg hidden" value="<?php echo e($product_sku); ?>">
    <input type="hidden" name="comic_gender" value="<?php echo e($comic_gender); ?>">
    <?php echo Form::close(); ?>

    <?php /*End form load lại truyện khi đổi tên*/ ?>
    <div class="nav-info-preview-comic">
        <?php /*Nav info preview comic PC*/ ?>
        <div class="cp-our-staff info-preview-comic hidden-xs hidden-sm">
            <div class="container">
                <div class="col-md-2 info-preview-comic-name nav-info-preview-comic-name">
                    <div>
                        <span>Tên</span>
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        <i class="fa fa-chevron-up" aria-hidden="true"></i>
                    </div>
                    <div>
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        <span style="color: #5a6e73;font-size: 18px;font-weight: 700;"
                              id="comic_user"><?php echo e($comic_user); ?></span>
                    </div>
                </div>
                <div class="col-md-3 info-preview-comic-message nav-info-preview-comic-message">
                    <div>
                        <span>Lời nhắn</span>
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        <i class="fa fa-chevron-up" aria-hidden="true"></i>
                    </div>
                    <div>
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        <span style="color: #5a6e73;font-size: 18px;font-weight: 700;">Viết 1 đoạn</span>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-5 info-preview-comic-button">
                    <button style="border: 0" form="create-form" type="submit" class="readmore-bg">Tạo truyện</button>
                </div>
            </div>
        </div>
        <?php /*End nav info preview comic PC*/ ?>
        <?php /*Nav info preview comic Mobile*/ ?>
        <div class="cp-our-staff info-preview-comic info-preview-comic-mobile hidden-lg hidden-md">
            <div class="col-md-12 info-preview-comic-name nav-info-preview-comic-name">
                <div>
                    <span>Tên</span>
                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    <i class="fa fa-chevron-up" aria-hidden="true"></i>
                </div>
                <div>
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <span style="color: #5a6e73;font-size: 18px;font-weight: 700;"
                          id="comic_name"><?php echo e($comic_user); ?></span>
                </div>
            </div>
            <div class="col-md-12 info-preview-comic-message nav-info-preview-comic-message">
                <div>
                    <span>Lời nhắn</span>
                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    <i class="fa fa-chevron-up" aria-hidden="true"></i>
                </div>
                <div>
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <span style="color: #5a6e73;font-size: 18px;font-weight: 700;">Viết 1 đoạn</span>
                </div>
            </div>
            <div class="col-md-12 info-preview-comic-button">
                <a class="btn btn-default btn-lg" style="border: 0.2rem solid #3a4d5f;">Lưu thay đổi</a>
            </div>
        </div>
        <?php /*End nav info preview comic Mobile*/ ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php echo e(Html::script('theme/js/comic/prefixfree.js')); ?>

    <?php echo e(Html::script('theme/js/comic/modernizr.js')); ?>

    <?php echo e(Html::script('theme/js/comic/hammer.js')); ?>

    <?php echo e(Html::script('theme/js/comic/jquery.hammer.js')); ?>

    <?php echo e(Html::script('theme/js/comic/heidelberg.js')); ?>

    <?php echo e(Html::script('theme/js/comic/prefixfree.js')); ?>

    <?php echo e(Html::script('theme/js/comic/examples.js')); ?>

    <?php echo e(Html::script('theme/js/comic/prism.js')); ?>


    <script>
        $('.Heidelberg-Page,.jump,#previous,#next').click(function () {
            var check = $('.is-active').attr('class');
            if (check.indexOf('first-page') == -1 && check.indexOf('last-page') == -1) {
                $('.Heidelberg-Book').attr('style', 'left:0');
            }

            if (check.indexOf('first-page') != -1 && check.indexOf('last-page') == -1) {
                $('.Heidelberg-Book').attr('style', 'left:-25%');
            }

            if (check.indexOf('last-page') != -1 && check.indexOf('first-page') == -1) {
                $('.Heidelberg-Book').attr('style', 'left:25%');
            }
        });
        //Validator
        $("#create-form").validate({
            errorElement: 'span',
            errorClass: 'help-block',
            focusInvalid: false,
            rules: {
                'comic_user_validate': {
                    required: true,
                    minlength: 3,
                    maxlength: 12,
                    number: false
                },
                'comic_gender': {
                    required: true
                },
                'comic_message': {
                    required: true,
                    minlength: 10,
                    maxlength: 188
                }
            },
            messages: {
                'comic_user_validate': {
                    required: "Bạn chưa nhập tên",
                    minlength: "Xin lỗi tên bạn quá ngắn !",
                    maxlength: "Xin lỗi tên bạn quá dài !",
                    number: "Bạn chỉ có thể nhập chữ !"
                },
                'comic_gender': {
                    required: "Bạn chưa chọn giới tính !"
                },
                'comic_message': {
                    required: "Bạn chưa nhập lời nhắn truyện !",
                    minlength: "Xin lỗi lời nhắn của bạn phải trên 10 ký tự !",
                    maxlength: "Xin lỗi lời nhắn chỉ dài tối đa 188 ký tự !"
                }
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
                //Nếu tên hợp lệ thì gán tên mới vào form preview để load lại các trang truyện
                var comic_user = $('input[name=comic_user_validate]').val();
                $('#preview-form input[name=comic_user]').val(comic_user);
                comic_user = comic_user.charAt(0).toUpperCase() + comic_user.slice(1).toLowerCase();
                if (comic_user != "<?php echo $comic_user ?>") {
                    $('.btn-save-info-comic').attr('type', 'submit');
                }
            },
            errorPlacement: function (error, element) {
                element.closest('.form-group').append(error);
                $('.btn-save-info-comic').attr('type', 'button');
            }
        });
        $('input[name=comic_user_validate]').focusout(function () {
            var comic_user = $(this).val();
            //Biêu thức regex chỉ nhận khoảng trắng và các chữ cái
            var regex = "[^a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\\\\s]+$";
            if (comic_user.match(regex) != null) {
                $('#comic_user-error-character').attr('style', 'display:block');
                $('.btn-save-info-comic').addClass('disabled');
            } else {
                $('#comic_user-error-character').attr('style', 'display:none');
                $('.btn-save-info-comic').removeClass('disabled');
            }
            comic_user = comic_user.replace(' ', '').toUpperCase();
            comic_user = comic_user.split('');
            $.each(comic_user, function (index, value) {
                var i = 0;
                $.each(comic_user, function (index1, value1) {
                    if (value == value1) {
                        i++;
                    }
                });
                if (i > 2 || comic_user.toString().match(regex) != null) {
                    $('#comic_user-error-character-same').attr('style', 'display:block');
                    $('#comic_user-error-character').attr('style', 'display:none');
                    $('.btn-save-info-comic').addClass('disabled');
                } else {
                    $('#comic_user-error-character-same').attr('style', 'display:none');
                    $('.btn-save-info-comic').removeClass('disabled');
                }
            })
        });
        //End validator

        //Xử lí ajax khi thay đổi truyện của từng chữ cái
        $('.ajax-change-story').click(function () {
            var data_present = $(this).attr('data-story-present');
            var data_change = $(this).attr('data-story-change');
            var class_change_story = '.change-story-' + data_present;
            var class_present_story = 'change-story-' + data_change;
            var input_image_story_present = '.class-story-' + data_present + '-present';
            $.ajax({
                url: "<?php echo e(route('changeStory')); ?>",
                data: {
                    data_story_present: data_present,
                    data_story_change: data_change
                },
                success: function (data) {
                    var image_1 = '.image-' + data_present + '-1';
                    var image_2 = '.image-' + data_present + '-2';
                    $(image_1).next().val(data.image_change[0]);
                    $(image_2).next().val(data.image_change[1]);
                    $(image_1).attr('src', data.image_change[0]).addClass('image-' + data_change + '-1').removeClass('image-' + data_present + '-1');
                    $(image_2).attr('src', data.image_change[1]).addClass('image-' + data_change + '-2').removeClass('image-' + data_present + '-2');

                    $(input_image_story_present).val(data.id_comic_present).addClass('class-story-' + data_change + '-present').removeClass('class-story-' + data_present + '-present');
                }
            });
            $(class_change_story).removeClass('ajax-present-story').removeClass(class_change_story).text('Chọn').attr('data-story-present', data_change);
            $(this).addClass('ajax-present-story').addClass(class_present_story).text('Đã chọn').attr('data-story-present', data_change);
        });
        //End xử lí ajax

        //Ẩn hiện nút thay đổi + popover khi click
        $('.btn-change-story').click(function () {
            var popover = $(this).next().css('display');
            if (popover === 'none') {
                $(this).next().css('display', 'block');
            } else {
                $(this).next().css('display', 'none');
            }
        });
        $('.preview-comic').click(function () {
            $('.btn-change-story').hide();
            $('.popover').hide();
        });
        //End ẩn hiện nút thay đổi + popover

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>