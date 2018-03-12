<?php $__env->startSection('style'); ?>
<style>
    .popover {
        max-width: 360px;
    }
</style>
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
            <span class="caption-subject uppercase">Tất cả sản phẩm</span>
        </div>
        <div class="actions">
            <a href="<?php echo e(URL::action('Admin\ProductController@addProduct')); ?>" class="btn blue uppercase">Thêm sản
                phẩm</a>
        </div>
    </div>
    <div class="portlet-body">
        <?php echo Form::open(['action' => 'Admin\ProductController@listProduct', 'method' => 'GET', 'id' => 'filter-form']); ?>

        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" name="sku" class="form-control" placeholder="Tìm theo mã sản phẩm"
                           value="<?php echo e(Request::has('sku') ? Request::input('sku') : ''); ?>"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Tìm theo tên sản phẩm"
                           value="<?php echo e(Request::has('name') ? Request::input('name') : ''); ?>"/>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <select name="category" class="form-control">
                        <option value="">Chọn chuyên mục</option>
                        <?php foreach($categories as $category): ?>
                        <option value="<?php echo e($category->category_id); ?>" 
                                <?php echo e(Request::has('category') && Request::input('category') == $category->category_id ? 'selected' : ''); ?>

                                ><?php echo $category->category_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="">Chọn trạng thái</option>
                        <option value="1" <?php echo Request::has('status') && Request::input('status') == 1 ? 'selected' : ''; ?>>
                                Còn hàng
                    </option>
                    <option value="0" <?php echo Request::has('status') && Request::input('status') == 0 ? 'selected' : ''; ?>>
                            Sắp có hàng
                </option>
                <option value="-1" <?php echo Request::has('status') && Request::input('status') == -1 ? 'selected' : ''; ?>>
                        Hết hàng
            </option>
        </select>
    </div>
</div>
<div class="col-md-1">
    <div class="form-group">
        <button type="submit" class="btn uppercase yellow-lemon btn-block"><i class="fa fa-search"></i>
        </button>
    </div>
</div>
</div>
<?php echo Form::close(); ?>

<?php if(count($products) > 0): ?>
<div class="table-responsive">
    <table class="table table-bordered table-hover td-middle">
        <thead>
            <tr>
                <th style="width: 67px;"></th>
                <th style="width: 125px;">Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Tiêu đề SEO</th>
                <th>Chuyên mục</th>
                <th>Giá bán</th>
                <th style="width: 100px;">Trạng thái</th>
                <th style="width: 70px;"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product): ?>
            <tr>
                <td class="text-center">
                    <img src="<?php echo e(env('APP_URL') . $product->product_featured); ?>"
                         class="img-thumbnail featured-popover"
                         style="max-width: 50px; display: block;"
                         data-content="<img src='<?php echo e(env('APP_URL') . $product->product_featured); ?>' style='max-width:100%;'>"
                         />
                </td>
                <td><?php echo $product->product_sku; ?></td>
                <td>
                    <a href="#" target="_blank"><?php echo $product->product_name; ?></a>
                </td>
                <td class="font-13"><?php echo $product->product_meta_title; ?></td>
                <td><?php echo $product->category_name; ?></td>
                <td><?php echo e(number_format($product->product_price, 0, '', ',')); ?></td>
                <td class="font-12">
                    <?php if($product->product_status == 1): ?>
                    <span class="text-success">Còn hàng</span>
                    <?php elseif($product->product_status == 0): ?>
                    <span class="text-warning">Sắp có hàng</span>
                    <?php else: ?>
                    <span class="text-danger">Hết hàng</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo e(URL::action('Admin\ProductController@editProduct', ['product_id' => $product->product_id])); ?>"
                       class="btn green btn-xs"><i class="fa fa-pencil"></i></a>
                    <button type="button" data-id="<?php echo e($product->product_id); ?>"
                            class="btn btn-xs red-soft m-r-0 btn-delete"><i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="text-right">
    <?php echo $products->appends(Request::all())->links(); ?>

</div>
<?php else: ?>
<h4 class="text-center">Không có dữ liệu</h4>
<?php endif; ?>
</div>
</div>
<div id="delete-modal" class="modal fade" tabindex="-1" data-keyboard="false">
    <div class="modal-dialog" style="margin-top: 5%">
        <?php echo Form::open(['action' => 'Admin\ProductController@doDeleteProduct', 'method' => 'POST', 'id' => 'delete-form']); ?>

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title uppercase">Xóa sản phẩm</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="txt-id" value="">
                <div class="font-red-soft">Bạn có chắc chắn muốn xóa sản phẩm này?</div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn blue text-uppercase">Xác nhận</button>
                <a href="<?php echo e(URL::previous()); ?>" data-dismiss="modal" class="btn red-soft uppercase">Hủy bỏ</a>
            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php echo e(Html::script('assets/global/plugins/select2/js/select2.full.min.js')); ?>

<script>
    $(document).ready(function () {
        $('#filter-form').find('select').change(function () {
            $('#filter-form').submit();
        });
        $('#filter-form').find('input, textarea').keyup(function (e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                $('#filter-form').submit();
            }
        });
        $('#filter-form').submit(function () {
            $(this).find('select, input, textarea').each(function () {
                if ($.trim($(this).val()) === "") {
                    $(this).prop('disabled', true);
                }
            });
        });
        $('#filter-form').find('select[name="category"]').select2({
            language: {
                noResults: function () {
                    return "Không tìm thấy chuyên mục sản phẩm nào";
                }
            }
        });
        $('#filter-form').find('select[name="status"]').select2({
            minimumResultsForSearch: -1
        });
        $('.featured-popover').popover({
            container: '.portlet',
            placement: 'auto right',
            html: true,
            trigger: 'hover',
            content: ''
        });
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