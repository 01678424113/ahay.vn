<?php $__env->startSection('style'); ?>
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
            <a href="<?php echo e(URL::action('Admin\OrderController@listOrder')); ?>">Đơn hàng</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a><?php echo e($title); ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
    </ul>
    <div class="page-toolbar">
        <a href="<?php echo e(URL::action('Admin\OrderController@listOrder')); ?>" class="btn default btn-sm uppercase"><i
                class="fa fa-arrow-left m-r-5"></i>Quay
            lại</a>
    </div>
</div>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject uppercase">Thông tin đơn hàng</span>
        </div>
    </div>
    <div class="portlet-body form">
        <?php echo Form::open(['action' => ['Admin\OrderController@doEditOrder','order_id'=>$order->order_id], 'method' => 'POST', 'id'=> 'order-form', 'files' => true]); ?>

        <div class="form-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Email <span class="required"> * </span></label>
                                <input type="text" name="txt-email" class="form-control" value="<?php echo e($order->order_email); ?>"/>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Người mua <span class="required"> * </span></label>
                                        <input type="text" name="txt-name" value="<?php echo e($order->order_name); ?>" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số điện thoại<span class="required"> * </span></label>
                                        <input type="text" name="txt-phone" value="<?php echo e($order->order_phone); ?>" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" >
                                <label class="control-label">Địa chỉ  <span class="required"> * </span></label>
                                <textarea class="form-control" name="txt-destination" rows="5"><?php echo $order->order_destination; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tổng tiền<span class="required"> * </span></label>
                                <input type="text" name="txt-total-price" value="<?php echo e($order->order_total_price); ?>" class="form-control" readonly/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Ngày tạo<span class="required"> * </span></label>
                                <input type="text" name="txt-created-at" value="<?php echo e(date('d/m/Y',$order->order_created_at)); ?>" class="form-control" readonly/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Trạng thái</label>
                                <div class="input-group">
                                    <div class="icheck-inline">
                                        <label class="control-label" role="button">
                                            <input type="radio" name="rd-status" class="icheck" value="1"
                                                   data-radio="iradio_minimal-green"
                                                    <?php echo e($order->order_status == 1 ? 'checked' : ''); ?>

                                            />
                                            <span class="text-success">Thành công</span>
                                        </label>
                                        <label class="control-label" role="button">
                                            <input type="radio" name="rd-status" class="icheck" value="0"
                                                   data-radio="iradio_minimal-green"
                                                    <?php echo e($order->order_status == 0 ? 'checked' : ''); ?>

                                            />
                                            <span class="text-warning">Đang chờ</span>
                                        </label>
                                        <label class="control-label" role="button">
                                            <input type="radio" name="rd-status" class="icheck" value="-1"
                                                   data-radio="iradio_minimal-green"
                                                    <?php echo e($order->order_status == -1 ? 'checked' : ''); ?>

                                            />
                                            <span class="text-danger">Bị hủy bỏ</span>
                                        </label>
                                    </div>
                                </div>
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

<script type="text/javascript">
    $(document).ready(function () {
        $('#order-form').validate({
            errorElement: 'span',
            errorClass: 'help-block',
            focusInvalid: false,
            rules: {
                'txt-email': {
                    required: true
                },
                'txt-name': {
                    required: true
                },
                'txt-phone': {
                    required: true,
                    number: true
                },
                'txt-destination': {
                    required: true
                }
            },
            messages: {
                'txt-email': {
                    required: "Email khách hàng không được để trống"
                },
                'txt-name': {
                    required: "Tên khách hàng không được để trống"
                },
                'txt-phone': {
                    required: "Số điện thoại khách hàng không được để trống",
                    number: "Số điện thoại không hợp lệ"
                },
                'txt-destination': {
                    required: "Địa chỉ khách hàng không được để trống"
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
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>