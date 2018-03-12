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
                            <tr>
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
                                    <a href="<?php echo e(URL::action('Admin\OrderController@listOrderDetail',['order_id'=>$order->order_id])); ?>"
                                       class="btn blue btn-xs btn-loaduser">
                                        <i class="fa fa-hand-pointer-o" aria-hidden="true"></i>
                                    </a>
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
                            <tr class="order-details" style="height: 50px">

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


            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase">Basic</span>
                            </div>
                            <div class="tools"></div>
                        </div>
                        <div class="portlet-body">
                            <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="dt-buttons"><a class="dt-button buttons-print btn dark btn-outline"
                                                                   tabindex="0" aria-controls="sample_1" href="#"><span>Print</span></a><a
                                                    class="dt-button buttons-pdf buttons-html5 btn green btn-outline"
                                                    tabindex="0" aria-controls="sample_1"
                                                    href="#"><span>PDF</span></a><a
                                                    class="dt-button buttons-csv buttons-html5 btn purple btn-outline"
                                                    tabindex="0" aria-controls="sample_1" href="#"><span>CSV</span></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-scrollable">
                                    <table class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-inline collapsed"
                                           width="100%" id="sample_1" role="grid" aria-describedby="sample_1_info"
                                           style="width: 100%;">
                                        <thead>
                                        <tr role="row">
                                            <th class="all sorting_asc" tabindex="0" aria-controls="sample_1"
                                                rowspan="1" colspan="1" style="width: 47px;" aria-sort="ascending"
                                                aria-label="First name: activate to sort column descending">First name
                                            </th>
                                            <th class="min-phone-l sorting" tabindex="0" aria-controls="sample_1"
                                                rowspan="1" colspan="1" style="width: 39px;"
                                                aria-label="Last name: activate to sort column ascending">Last name
                                            </th>
                                            <th class="min-tablet sorting" tabindex="0" aria-controls="sample_1"
                                                rowspan="1" colspan="1" style="width: 69px;"
                                                aria-label="Position: activate to sort column ascending">Position
                                            </th>
                                            <th class="none sorting" tabindex="0" aria-controls="sample_1" rowspan="1"
                                                colspan="1" style="width: 0px; display: none;"
                                                aria-label="Office: activate to sort column ascending">Office
                                            </th>
                                            <th class="none sorting" tabindex="0" aria-controls="sample_1" rowspan="1"
                                                colspan="1" style="width: 0px; display: none;"
                                                aria-label="Age: activate to sort column ascending">Age
                                            </th>
                                            <th class="none sorting" tabindex="0" aria-controls="sample_1" rowspan="1"
                                                colspan="1" style="width: 0px; display: none;"
                                                aria-label="Start date: activate to sort column ascending">Start date
                                            </th>
                                            <th class="desktop sorting" tabindex="0" aria-controls="sample_1"
                                                rowspan="1" colspan="1" style="width: 43px;"
                                                aria-label="Salary: activate to sort column ascending">Salary
                                            </th>
                                            <th class="all sorting" tabindex="0" aria-controls="sample_1" rowspan="1"
                                                colspan="1" style="width: 34px;"
                                                aria-label="Extn.: activate to sort column ascending">Extn.
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1" style="">Airi</td>
                                            <td>Satou</td>
                                            <td>Accountant</td>
                                            <td style="display: none;">Tokyo</td>
                                            <td style="display: none;">33</td>
                                            <td style="display: none;">2008/11/28</td>
                                            <td>$162,700</td>
                                            <td>
                                                <div class="btn-group pull-right">
                                                    <button class="btn green btn-xs btn-outline dropdown-toggle"
                                                            data-toggle="dropdown">Tools
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-print"></i> Print </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1" tabindex="0">Angelica</td>
                                            <td>Ramos</td>
                                            <td>Chief Executive Officer (CEO)</td>
                                            <td style="display: none;">London</td>
                                            <td style="display: none;">47</td>
                                            <td style="display: none;">2009/10/09</td>
                                            <td>$1,200,000</td>
                                            <td>
                                                <div class="btn-group pull-right">
                                                    <button class="btn green btn-xs btn-outline dropdown-toggle"
                                                            data-toggle="dropdown">Tools
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-print"></i> Print </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">Ashton</td>
                                            <td>Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td style="display: none;">San Francisco</td>
                                            <td style="display: none;">66</td>
                                            <td style="display: none;">2009/01/12</td>
                                            <td>$86,000</td>
                                            <td>
                                                <div class="btn-group pull-right">
                                                    <button class="btn green btn-xs btn-outline dropdown-toggle"
                                                            data-toggle="dropdown">Tools
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-print"></i> Print </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1" tabindex="0">Bradley</td>
                                            <td>Greer</td>
                                            <td>Software Engineer</td>
                                            <td style="display: none;">London</td>
                                            <td style="display: none;">41</td>
                                            <td style="display: none;">2012/10/13</td>
                                            <td>$132,000</td>
                                            <td>
                                                <div class="btn-group pull-right">
                                                    <button class="btn green btn-xs btn-outline dropdown-toggle"
                                                            data-toggle="dropdown">Tools
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-print"></i> Print </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1" tabindex="0">Brenden</td>
                                            <td>Wagner</td>
                                            <td>Software Engineer</td>
                                            <td style="display: none;">San Francisco</td>
                                            <td style="display: none;">28</td>
                                            <td style="display: none;">2011/06/07</td>
                                            <td>$206,850</td>
                                            <td>
                                                <div class="btn-group pull-right">
                                                    <button class="btn green btn-xs btn-outline dropdown-toggle"
                                                            data-toggle="dropdown">Tools
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-print"></i> Print </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td tabindex="0" class="sorting_1">Brielle</td>
                                            <td>Williamson</td>
                                            <td>Integration Specialist</td>
                                            <td style="display: none;">New York</td>
                                            <td style="display: none;">61</td>
                                            <td style="display: none;">2012/12/02</td>
                                            <td>$372,000</td>
                                            <td>
                                                <div class="btn-group pull-right">
                                                    <button class="btn green btn-xs btn-outline dropdown-toggle"
                                                            data-toggle="dropdown">Tools
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-print"></i> Print </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1" tabindex="0">Bruno</td>
                                            <td>Nash</td>
                                            <td>Software Engineer</td>
                                            <td style="display: none;">London</td>
                                            <td style="display: none;">38</td>
                                            <td style="display: none;">2011/05/03</td>
                                            <td>$163,500</td>
                                            <td>
                                                <div class="btn-group pull-right">
                                                    <button class="btn green btn-xs btn-outline dropdown-toggle"
                                                            data-toggle="dropdown">Tools
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-print"></i> Print </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1" tabindex="0">Caesar</td>
                                            <td>Vance</td>
                                            <td>Pre-Sales Support</td>
                                            <td style="display: none;">New York</td>
                                            <td style="display: none;">21</td>
                                            <td style="display: none;">2011/12/12</td>
                                            <td>$106,450</td>
                                            <td>
                                                <div class="btn-group pull-right">
                                                    <button class="btn green btn-xs btn-outline dropdown-toggle"
                                                            data-toggle="dropdown">Tools
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-print"></i> Print </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1" tabindex="0">Cara</td>
                                            <td>Stevens</td>
                                            <td>Sales Assistant</td>
                                            <td style="display: none;">New York</td>
                                            <td style="display: none;">46</td>
                                            <td style="display: none;">2011/12/06</td>
                                            <td>$145,600</td>
                                            <td>
                                                <div class="btn-group pull-right">
                                                    <button class="btn green btn-xs btn-outline dropdown-toggle"
                                                            data-toggle="dropdown">Tools
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-print"></i> Print </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td tabindex="0" class="sorting_1">Cedric</td>
                                            <td>Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td style="display: none;">Edinburgh</td>
                                            <td style="display: none;">22</td>
                                            <td style="display: none;">2012/03/29</td>
                                            <td>$433,060</td>
                                            <td>
                                                <div class="btn-group pull-right">
                                                    <button class="btn green btn-xs btn-outline dropdown-toggle"
                                                            data-toggle="dropdown">Tools
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-print"></i> Print </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 col-sm-12">
                                        <div class="dataTables_info" id="sample_1_info" role="status"
                                             aria-live="polite">Showing 1 to 10 of 57 entries
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-12">
                                        <div class="dataTables_paginate paging_bootstrap_number" id="sample_1_paginate">
                                            <ul class="pagination" style="visibility: visible;">
                                                <li class="prev disabled"><a href="#" title="Prev"><i
                                                                class="fa fa-angle-left"></i></a></li>
                                                <li class="active"><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">5</a></li>
                                                <li class="next"><a href="#" title="Next"><i
                                                                class="fa fa-angle-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>


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