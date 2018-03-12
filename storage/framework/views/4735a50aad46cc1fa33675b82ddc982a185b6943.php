<?php $__env->startSection('style'); ?>
    <?php echo e(Html::style('assets/global/plugins/select2/css/select2.min.css')); ?>

    <?php echo e(Html::style('assets/global/plugins/select2/css/select2-bootstrap.min.css')); ?>

    <?php echo e(Html::style('assets/global/plugins/icheck/skins/all.css')); ?>

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
                <span><?php echo $title; ?></span>
            </li>
        </ul>
        <div class="page-toolbar">
            <a href="<?php echo e(URL::previous()); ?>" class="btn default btn-sm uppercase"><i class="fa fa-arrow-left m-r-5"></i>Quay
                lại</a>
        </div>
    </div>
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject uppercase"><?php echo e($title); ?></span>
            </div>
        </div>
        <div class="portlet-body">
            <?php if(count($order_details) > 0): ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover td-middle">
                        <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Chữ cái</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($order_details as $order_detail): ?>
                            <tr>
                                <td><?php echo e($order_detail->product_name); ?></td>
                                <td><?php echo e($order_detail->comic_keywords); ?></td>
                                <td><?php echo e($order_detail->unit_price); ?></td>
                                <td><?php echo e($order_detail->quantity); ?></td>
                                <td><?php echo e($order_detail->amount); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                </div>
            <?php else: ?>
                <h4 class="text-center">Không có dữ liệu</h4>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php echo e(Html::script('assets/global/plugins/icheck/icheck.min.js')); ?>

    <?php echo e(Html::script('assets/global/plugins/select2/js/select2.full.min.js')); ?>

    <?php echo e(Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>