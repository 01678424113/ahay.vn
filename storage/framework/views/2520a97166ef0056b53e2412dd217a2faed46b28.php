<?php $__env->startSection('style'); ?>
<?php echo e(Html::style('assets/global/plugins/icheck/skins/all.css')); ?>

<?php echo e(Html::style('assets/global/plugins/dropzone/dropzone.min.css')); ?>

<?php echo e(Html::style('assets/global/plugins/dropzone/basic.min.css')); ?>

<?php echo e(Html::style('assets/global/plugins/select2/css/select2.min.css')); ?>

<?php echo e(Html::style('assets/global/plugins/select2/css/select2-bootstrap.min.css')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagecontent'); ?>
<div class="page-bar m-b-20">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo e(URL::action('Admin\HomeController@index')); ?>">Bảng điều khiển</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?php echo e(URL::action('Admin\StoryController@listStory')); ?>">Truyện theo chữ cái</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span><?php echo $title; ?></span>
        </li>
    </ul>
    <div class="page-toolbar">
        <a href="<?php echo e(URL::action('Admin\StoryController@listStory')); ?>" class="btn default btn-sm uppercase"><i
                class="fa fa-arrow-left m-r-5"></i>Quay
            lại</a>
    </div>
</div>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject uppercase">Thông tin truyện tranh</span>
        </div>
    </div>
    <div class="portlet-body form">
        <?php echo Form::open(['action' => ['Admin\StoryController@doEditStory','story_id'=>$story->story_id], 'method' => 'POST', 'id'=> 'story-form', 'files' => true]); ?>

        <div class="form-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label class="control-label">Tên truyện <span class="required"> * </span></label>
                        <input type="text" name="txt-name" id="txt-name" class="form-control" value="<?php echo e($story->story_name); ?>"/>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Truyện cha <span class="required"> * </span></label>
                                <select name="sl-comic" id="" class="form-control">
                                    <option value="">Chọn truyện cha</option>
                                    <?php foreach($comics as $comic): ?>
                                    <option value="<?php echo e($comic->comic_id); ?>" 
                                            <?php echo e($story->comic_id ==  $comic->comic_id ? 'selected' : ''); ?>

                                        ><?php echo $comic->comic_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Chữ cái <span class="required"> * </span></label>
                                <input type="text" name="txt-alpha" class="form-control" value="<?php echo e($story->story_alpha); ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ảnh nội dung</label>
                        <div class="form-group dropzone dropzone-file-area clearfix" id="dropzone">
                            <h3 class="dz-message needsclick">Kéo thả hình ảnh hoặc click để chọn hình ảnh tải lên</h3>
                        </div>
                        <div id="story-images">
                            <?php if(is_array($story->story_images)): ?>
                            <?php foreach($story->story_images as $image): ?>
                            <input type="hidden" class="input-image" name="txt-images[]"
                                   value="<?php echo e($image); ?>"/>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Ảnh Icon</label>
                        <div>
                            <?php if($story->story_icon != ""): ?>
                            <a role="button" data-toggle="modal" data-target="#icon-modal">
                                <img src="<?php echo e(env('APP_URL') . $story->story_icon); ?>"
                                     data-old="<?php echo e(env('APP_URL') . $story->story_icon); ?>"
                                     style="max-width: 100%" id="icon-img"
                                     class="img-thumbnail"
                                     />
                            </a>
                            <?php else: ?>
                            <a role="button" data-toggle="modal" data-target="#icon-modal">
                                <img src="<?php echo e(env('APP_URL')); ?>images/default-image.png"
                                     data-old="<?php echo e(env('APP_URL')); ?>images/default-image.png"
                                     style="max-width: 100%" id="icon-img"
                                     class="img-thumbnail"
                                     />
                            </a>
                            <?php endif; ?>
                        </div>
                        <div id="icon-modal" class="modal fade" tabindex="-1" data-keyboard="false"style="margin-top: 5%">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"></button>
                                        <h4 class="modal-title text-uppercase">Chọn ảnh icon</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="txt-icon-type" value="none">
                                        <div class="form-group">
                                            <label class="control-label">Chọn từ files</label>
                                            <input type="file" class="form-control" name="file-icon"
                                                   accept="image/*">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">URL ảnh</label>
                                            <input type="text" class="form-control" name="txt-icon" value="<?php echo e(env('APP_URL') . $story->story_icon); ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="btn-icon" class="btn blue text-uppercase">
                                            Xác nhận
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Trạng thái</label>
                        <div class="input-group">
                            <div class="icheck-inline">
                                <label class="control-label" role="button">
                                    <input type="radio" name="rd-status" class="icheck" value="1"
                                           data-radio="iradio_minimal-green"
                                           <?php echo e($story->story_status == 1 ? 'checked' : ''); ?>

                                    />
                                    <span class="text-success">Công khai</span>
                                </label>
                                <label class="control-label" role="button">
                                    <input type="radio" name="rd-status" class="icheck" value="0"
                                           data-radio="iradio_minimal-green"
                                           <?php echo e($story->story_status == 0 ? 'checked' : ''); ?>

                                    />
                                    <span class="text-warning">Bản nháp</span>
                                </label>
                                <label class="control-label" role="button">
                                    <input type="radio" name="rd-status" class="icheck" value="-1"
                                           data-radio="iradio_minimal-green"
                                           <?php echo e($story->story_status == -1 ? 'checked' : ''); ?>

                                    />
                                    <span class="text-danger">Hủy đăng</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn blue uppercase">Lưu chỉnh sửa</button>
            <a href="<?php echo e(URL::previous()); ?>" data-dismiss="modal" class="btn red-soft uppercase">Hủy bỏ</a>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php echo e(Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')); ?>

<?php echo e(Html::script('assets/global/plugins/jquery-validation/js/additional-methods.min.js')); ?>

<?php echo e(Html::script('assets/global/plugins/dropzone/dropzone.min.js')); ?> 
<?php echo e(Html::script('assets/global/plugins/icheck/icheck.min.js')); ?>

<?php echo e(Html::script('assets/global/plugins/select2/js/select2.full.min.js')); ?>

<script type="text/javascript">
    $(document).ready(function () {
        Dropzone.options.dropzone = {
            url: "<?php echo e(URL::action('Admin\HomeController@uploadImage')); ?>",
            paramName: "file-image",
            maxFilesize: 8,
            thumbnailWidth: null,
            thumbnailHeight: 120,
            maxFiles: 6,
            acceptedFiles: 'image/*',
            dictDefaultMessage: "",
            dictFileTooBig: "Dung lượng ảnh không được lớn hơn 2M",
            dictInvalidFileType: "Định dạng ảnh không hợp lệ",
            dictMaxFilesExceeded: "Ảnh vượt quá số lượng cho phép",
            autoProcessQueue: true,
            sending: function (file, xhr, formData) {
                formData.append("_token", "<?php echo e(csrf_token()); ?>");
            },
            init: function () {
                this.on("addedfile", function (file) {
                    var removeButton = Dropzone.createElement('<a role="button" class="btn btn-remove red-soft btn-xs"><i class="fa fa-trash"></i></a>');
                    var _this = this;
                    removeButton.addEventListener("click", function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        _this.removeFile(file);
                        // If you want to the delete the file on the server as well,
                        // you can do the AJAX request here.
                        var image = $(file.previewElement).find('.dz-filename span').text();
                        $('#story-images').find('input[name="txt-images[]"][value="' + image + '"]').remove();
                    });
                    file.previewElement.appendChild(removeButton);
                });
                this.on("success", function (file, data) {
                    if (data.status_code === 200) {
                        // $(file.previewElement).find('.dz-filename span').text(data.data);
                        var html = '<input type="hidden" class="input-image" name="txt-images[]" value="' + data.data + '" />';
                        $('#story-images').append(html);
                    }
                });
                var images_dropzone = this;
                var files = [
<?php
if (is_array($story->story_images)) {
    foreach ($story->story_images as $image) {
        ?>
                            {
                                name: "<?php echo env('APP_URL') . $image ?>"
                            },
        <?php
    }
}
?>];
                $.each(files, function (key, file) {
                    images_dropzone.emit("addedfile", file);
                    images_dropzone.emit("thumbnail", file, file.name);
                    images_dropzone.emit("complete", file, key);
                    images_dropzone.files.push(file);
                });
            }
        };
        $('#story-form').find('select[name="sl-comic"]').select2({
            language: {
                noResults: function () {
                    return "Không tìm thấy truyện cha nào";
                }
            }
        }).on('change', function () {
            var id = $.trim($(this).val());
            if (id !== "") {
                var parent = $(this).closest('.form-group');
                parent.removeClass('has-error');
                parent.find('.help-block').remove();
            }
        });
        $('#story-form').validate({
            errorElement: 'span',
            errorClass: 'help-block',
            focusInvalid: false,
            rules: {
                'txt-name': {
                    required: true
                },
                'sl-comic': {
                    required: true,
                    number: true
                },
                'txt-alpha': {
                    required: true,
                    minlength: 1
                },
                'file-icon': {
                    accept: "image/*"
                }
            },
            messages: {
                'txt-name': {
                    required: "Tên truyện không được để trống"
                },
                'sl-comic': {
                    required: "Chưa chọn truyện cha",
                    number: "Truyện cha không hợp lệ"
                },
                'txt-alpha': {
                    required: "Chữ cái không được để trống",
                    minlength: "Chữ cái không hợp lệ"
                },
                'file-icon': {
                    accept: "Ảnh icon không hợp lệ"
                }
            },
            invalidHandler: function (event, validator) {
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
            errorPlacement: function (error, element) {
                element.closest('.form-group').append(error);
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
        $('#story-form').find('input[name="file-icon"]').change(function () {
            var files = $('#icon-modal').find('input[name="file-icon"]').prop('files');
            if (files.length) {
                var regex_type = /^(image\/jpeg|image\/png|image\/gif)$/;
                $.each(files, function (key, file) {
                    if (regex_type.test(file.type)) {
                        var fr = new FileReader();
                        fr.readAsDataURL(file);
                        fr.onload = function (event) {
                            $('#icon-img').attr('src', event.target.result);
                            $('#story-form').find('input[name="txt-icon-type"]').val('file');
                            $('#icon-modal').find('input[name="txt-icon"]').val("");
                            $('#icon-modal').modal('hide');
                        };
                    } else {
                        $('#icon-img').attr('src', $('#icon-img').data('old'));
                        $('#story-form').find('input[name="txt-icon-type"]').val('none');
                    }
                });
            } else {
                $('#icon-img').attr('src', $('#icon-img').data('old'));
                $('#story-form').find('input[name="txt-icon-type"]').val('none');
            }
        });
        $('#btn-icon').click(function () {
            var url = $('#icon-modal').find('input[name="txt-icon"]').val();
            var regex_url = /(https?:\/\/(.*)\.(png|jpg|jpeg|gif))/i;
            if (url !== "" && regex_url.test(url)) {
                $('#icon-img').attr('src', url);
                $('#story-form').find('input[name="txt-icon-type"]').val('url');
                $('#story-form').find('input[name="file-icon"]').val(null);
            }
            $('#icon-modal').modal('hide');
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>