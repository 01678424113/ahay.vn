<?php $__env->startSection('style'); ?>
    <?php echo e(Html::style('assets/global/plugins/select2/css/select2.min.css')); ?>

    <?php echo e(Html::style('assets/global/plugins/select2/css/select2-bootstrap.min.css')); ?>

    <?php echo e(Html::style('assets/global/plugins/icheck/skins/all.css')); ?>

    <?php echo e(Html::style('assets/global/plugins/datatables/datatables.min.css')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagecontent'); ?>

    <div class="page-bar m-b-20">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo e(URL::action('Admin\HomeController@index')); ?>">Bảng điều khiển</a>
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
                <span class="caption-subject uppercase">Danh sách đơn hàng</span>
            </div>
        </div>
        <div class="portlet-body">
            <?php if(count($orders) > 0): ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover td-middle">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Người mua</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Tổng tiền</th>
                            <th>Ngày tạo</th>
                            <th style="width: 100px;">Trạng thái</th>
                            <th>Chi tiết</th>
                            <th style="width: 70px;">Sửa</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($orders as $order): ?>
                            <tr class="order" data-id="#order-detail-<?php echo e($order->order_id); ?>">
                                <td><?php echo e($order->order_id); ?></td>
                                <td><?php echo e($order->order_email); ?></td>
                                <td><?php echo e($order->order_name); ?></td>
                                <td><?php echo e($order->order_phone); ?></td>
                                <td><?php echo e($order->order_destination); ?></td>
                                <td><?php echo e($order->order_total_price); ?></td>
                                <td><?php echo e(date('d/m/Y',$order->order_created_at)); ?></td>
                                <td class="font-13">
                                    <?php if($order->order_status == 1): ?>
                                        <span class="text-success">Thành công</span>
                                    <?php elseif($order->order_status == 0): ?>
                                        <span class="text-warning">Đang chờ</span>
                                    <?php elseif($order->order_status == -1): ?>
                                        <span class="text-danger">Bị hủy bỏ</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#order-detail-<?php echo e($order->order_id); ?>">
                                        <i class="fa fa-hand-pointer-o" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" data-id="<?php echo e($order->order_id); ?>"
                                            class="btn btn-xs red-soft m-r-0 btn-delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <a href="<?php echo e(URL::action('Admin\OrderController@editOrder',['order_id'=>$order->order_id])); ?>"
                                       class="btn green btn-xs btn-loaduser">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
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
                <?php foreach($orders as $order): ?>
                    <div id="order-detail-<?php echo e($order->order_id); ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Khách hàng : <?php echo e($order->order_name); ?></h4>
                                </div>
                                <div class="modal-body">
                                    <p>
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
                                            <?php if($order->order_id == $order_detail->order_id): ?>
                                            <tr>
                                                <td><?php echo e($order_detail->product_name); ?></td>
                                                <td><?php echo e($order_detail->comic_keywords); ?></td>
                                                <td><?php echo e($order_detail->unit_price); ?></td>
                                                <td><?php echo e($order_detail->quantity); ?></td>
                                                <td><?php echo e($order_detail->amount); ?></td>
                                            </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
        </div>
    </div>
    <div id="delete-modal" class="modal fade" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog" style="margin-top: 5%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <h4 class="modal-title uppercase">Xóa đơn hàng</h4>
                </div>
                <?php echo Form::open(['action' => 'Admin\OrderController@doDeleteOrder', 'method' => 'POST', 'id' => 'delete-form']); ?>

                <div class="modal-body">
                    <input type="hidden" name="txt-id" value=""/>
                    <div class="font-red-soft">Bạn có chắc chắn muốn xóa đơn hàng này?</div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn blue text-uppercase">Xác nhận</button>
                    <button type="button" data-dismiss="modal" class="btn red-soft uppercase">Hủy bỏ</button>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php echo e(Html::script('assets/global/plugins/icheck/icheck.min.js')); ?>

    <?php echo e(Html::script('assets/global/plugins/select2/js/select2.full.min.js')); ?>

    <?php echo e(Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')); ?>

    <script>
        $(document).ready(function () {
            $('.btn-delete').click(function () {
                var id = $.trim($(this).data('id'));
                if (id !== "") {
                    $('#delete-modal').find('input[name="txt-id"]').val(id);
                    $('#delete-modal').modal('show');
                }
            });
            $('#delete-modal').on('hidden.bs.modal', function () {
                $(this).find('#delete-form').trigger('reset');
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>