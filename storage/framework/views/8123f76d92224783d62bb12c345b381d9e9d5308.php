<?php $__env->startSection('style'); ?>
<?php echo e(Html::style('assets/global/plugins/select2/css/select2.min.css')); ?>

<?php echo e(Html::style('assets/global/plugins/select2/css/select2-bootstrap.min.css')); ?>

<?php echo e(Html::style('assets/global/plugins/icheck/skins/all.css')); ?>

<?php echo e(Html::style('assets/global/plugins/dropzone/dropzone.min.css')); ?>

<?php echo e(Html::style('assets/global/plugins/dropzone/basic.min.css')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagecontent'); ?>
<div class="page-bar m-b-20">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo e(URL::action('Admin\HomeController@index')); ?>">Bảng điều khiển</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?php echo e(URL::action('Admin\ProductController@listProduct')); ?>">Sản phẩm</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span><?php echo $title; ?></span>
        </li>
    </ul>
    <div class="page-toolbar">
        <a href="<?php echo e(URL::action('Admin\ProductController@listProduct')); ?>" class="btn default btn-sm uppercase">
            <i class="fa fa-arrow-left m-r-5"></i>Quay lại</a>
    </div>
</div>

<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject uppercase">Thông tin sản phẩm</span>
        </div>
    </div>
    <div class="portlet-body form">
        <?php echo Form::open(['action' => ['Admin\ProductController@doEditProduct','product_id'=>$product->product_id], 'method' => 'POST', 'id'=> 'product-form', 'files' => true]); ?>

        <div class="form-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tên sản phẩm <span class="required"> * </span></label>
                                <input type="text" name="txt-name" class="form-control"
                                       value="<?php echo e($product->product_name); ?>"/>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã sản phẩm <span class="required"> * </span></label>
                                        <input type="text" name="txt-sku" class="form-control" value="<?php echo e($product->product_sku); ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Giá bán</label>
                                        <input type="text" name="txt-price" class="form-control"
                                               value="<?php echo e($product->product_price); ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Mô tả</label>
                                <textarea class="form-control" name="txt-description"
                                          rows="5"><?php echo $product->product_description; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ảnh sản phẩm</label>
                        <div class="form-group dropzone dropzone-file-area clearfix" id="dropzone">
                            <h3 class="dz-message needsclick">Kéo thả hình ảnh hoặc click để chọn hình ảnh tải
                                lên</h3>
                        </div>
                        <div id="product-images">
                            <?php if(is_array($product->product_images)): ?>
                            <?php foreach($product->product_images as $image): ?>
                            <input type="hidden" class="input-image" name="txt-images[]"
                                   value="<?php echo e($image); ?>"/>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Ảnh tiêu biểu</label>
                        <div>
                            <a role="button" data-toggle="modal" data-target="#featured-modal">
                                <img src="<?php echo e(env('APP_URL') . $product->product_featured); ?>"
                                     data-old="<?php echo e(env('APP_URL') . $product->product_featured); ?>"
                                     style="max-width: 100%" id="featured-img"
                                     class="img-thumbnail"
                                     />
                            </a>
                        </div>
                        <div id="featured-modal" class="modal fade" tabindex="-1" data-keyboard="false"
                             style="margin-top: 5%">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"></button>
                                        <h4 class="modal-title text-uppercase">Chọn ảnh tiêu biểu</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="txt-featured-type" value="none">
                                        <div class="form-group">
                                            <label class="control-label">Chọn từ files</label>
                                            <input type="file" class="form-control" name="file-featured"
                                                   accept="image/*">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">URL ảnh</label>
                                            <input type="text" class="form-control" name="txt-featured" value="<?php echo e(env('APP_URL') . $product->product_featured); ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="btn-featured" class="btn blue text-uppercase">
                                            Xác nhận
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Chuyên mục <span class="required"> * </span></label>
                        <select class="form-control" name="sl-category">
                            <option value="">Chọn chuyên mục</option>
                            <?php foreach($categories as $category): ?>
                            <option value="<?php echo e($category->category_id); ?>"
                                    <?php echo e($product->category_id == $category->category_id ? 'selected' : ''); ?>

                                ><?php echo $category->category_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tiêu đề SEO</label>
                        <input type="text" name="txt-meta-title" class="form-control"
                               value="<?php echo e($product->product_meta_title); ?>"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mô tả SEO</label>
                        <textarea class="form-control" name="txt-meta-desc"
                                  rows="5"><?php echo $product->product_meta_desc; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Trạng thái</label>
                        <div class="input-group">
                            <div class="icheck-inline">
                                <label class="control-label" role="button">
                                    <input type="radio" name="rd-status" class="icheck" value="1"
                                           data-radio="iradio_minimal-green"
                                           <?php echo e($product->product_status == 1 ? 'checked' : ''); ?>

                                    />
                                    <span class="text-success">Còn hàng</span>
                                </label>
                                <label class="control-label" role="button">
                                    <input type="radio" name="rd-status" class="icheck" value="0"
                                           data-radio="iradio_minimal-green"
                                           <?php echo e($product->product_status == 0 ? 'checked' : ''); ?>

                                    />
                                    <span class="text-warning">Sắp có hàng</span>
                                </label>
                                <label class="control-label" role="button">
                                    <input type="radio" name="rd-status" class="icheck" value="-1"
                                           data-radio="iradio_minimal-green"
                                           <?php echo e($product->product_status == -1 ? 'checked' : ''); ?>

                                    />
                                    <span class="text-danger">Hết hàng</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn blue uppercase">Lưu chỉnh sửa</button>
            <a href="<?php echo e(URL::action('Admin\ProductController@listProduct')); ?>" data-dismiss="modal" class="btn red-soft uppercase">Hủy bỏ</a>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php echo e(Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')); ?>

<?php echo e(Html::script('assets/global/plugins/jquery-validation/js/additional-methods.min.js')); ?>

<?php echo e(Html::script('assets/global/plugins/select2/js/select2.full.min.js')); ?>

<?php echo e(Html::script('assets/global/plugins/dropzone/dropzone.min.js')); ?>

<?php echo e(Html::script('assets/global/plugins/icheck/icheck.min.js')); ?>

<script>
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
                        $('#product-images').find('input[name="txt-images[]"][value="' + image + '"]').remove();
                    });
                    file.previewElement.appendChild(removeButton);
                });
                this.on("success", function (file, data) {
                    if (data.status_code === 200) {
                        // $(file.previewElement).find('.dz-filename span').text(data.data);
                        var html = '<input type="hidden" class="input-image" name="txt-images[]" value="' + data.data + '" />';
                        $('#product-images').append(html);
                    }
                });
                var images_dropzone = this;
                var files = [
<?php
if (is_array($product->product_images)) {
    foreach ($product->product_images as $image) {
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
        $('#product-form').validate({
            errorElement: 'span',
            errorClass: 'help-block',
            focusInvalid: false,
            rules: {
                'txt-name': {
                    required: true
                },
                'txt-price': {
                    number: true
                },
                'sl-category': {
                    required: true,
                    number: true
                },
                'file-featured': {
                    accept: "image/*"
                }
            },
            messages: {
                'txt-title': {
                    required: "Tên sản phẩm không được để trống"
                },
                'txt-price': {
                    number: "Giá sản phẩm không hợp lệ"
                },
                'sl-category': {
                    required: "Chưa chọn chuyên mục sản phẩm",
                    number: "Chuyên mục sản phẩm không hợp lệ"
                },
                'file-featured': {
                    accept: "Ảnh tiêu biểu không hợp lệ"
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
        $('#product-form').find('select[name="sl-category"]').select2({
            language: {
                noResults: function () {
                    return "Không tìm thấy chuyên mục sản phẩm nào";
                }
            }
        }).on('change', function () {
            var category_id = $.trim($(this).val());
            if (category_id !== "") {
                var parent = $(this).closest('.form-group');
                parent.removeClass('has-error');
                parent.find('.help-block').remove();
            }
        });
        $('#product-form').find('input[name="file-featured"]').change(function () {
            var files = $('#featured-modal').find('input[name="file-featured"]').prop('files');
            if (files.length) {
                var regex_type = /^(image\/jpeg|image\/png|image\/gif)$/;
                $.each(files, function (key, file) {
                    if (regex_type.test(file.type)) {
                        var fr = new FileReader();
                        fr.readAsDataURL(file);
                        fr.onload = function (event) {
                            $('#featured-img').attr('src', event.target.result);
                            $('#product-form').find('input[name="txt-featured-type"]').val('file');
                            $('#featured-modal').find('input[name="txt-featured"]').val("");
                            $('#featured-modal').modal('hide');
                        };
                    } else {
                        $('#featured-img').attr('src', $('#featured-img').data('old'));
                        $('#product-form').find('input[name="txt-featured-type"]').val('none');
                    }
                });
            } else {
                $('#featured-img').attr('src', $('#featured-img').data('old'));
                $('#product-form').find('input[name="txt-featured-type"]').val('none');
            }
        });
        $('#btn-featured').click(function () {
            var url = $('#featured-modal').find('input[name="txt-featured"]').val();
            var regex_url = /(https?:\/\/(.*)\.(png|jpg|jpeg|gif))/i;
            if (url !== "" && regex_url.test(url)) {
                $('#featured-img').attr('src', url);
                $('#product-form').find('input[name="txt-featured-type"]').val('url');
                $('#product-form').find('input[name="file-featured"]').val(null);
            }
            $('#featured-modal').modal('hide');
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>