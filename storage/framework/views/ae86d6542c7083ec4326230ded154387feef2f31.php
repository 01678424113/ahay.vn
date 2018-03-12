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
            <span class="caption-subject uppercase">Tất cả truyện tranh</span>
        </div>
        <div class="actions">
            <a href="<?php echo e(URL::action('Admin\ComicController@addComic')); ?>" class="btn blue uppercase">Thêm truyện</a>
        </div>
    </div>
    <div class="portlet-body">
        <?php echo Form::open(['action' => 'Admin\ComicController@listComic', 'method' => 'GET', 'id' => 'filter-form']); ?>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Tìm theo tên truyện"
                           value="<?php echo e(Request::has('name') ? Request::input('name') : ''); ?>"/>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="">Chọn trạng thái</option>
                        <option value="1" 
                                <?php echo e(Request::has('status') && Request::input('status') == 1 ? 'selected' : ''); ?>

                                >
                                Công khai</option>
                        <option value="0" 
                                <?php echo e(Request::has('status') && Request::input('status') == 0 ? 'selected' : ''); ?>

                                >
                                Bản nháp</option>
                        <option value="-1" 
                                <?php echo e(Request::has('status') && Request::input('status') == -1 ? 'selected' : ''); ?>

                                >
                                Hủy đăng</option>
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

        <?php if(count($comics) > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover td-middle">
                <thead>
                    <tr>
                        <th style="width:67px;"></th>
                        <th>Tên truyện</th>
                        <th>Tiêu đề SEO</th>
                        <th style="width: 150px;">Đơn giá</th>
                        <th style="width: 150px;">Giá mặc định</th>
                        <th style="width: 100px;">Trạng thái</th>
                        <th style="width: 70px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($comics as $comic): ?>
                    <tr>
                        <td>
                            <img src="<?php echo e(env('APP_URL'). $comic->comic_featured); ?>"
                                 class="img-thumbnail featured-popover"
                                 style="max-width: 50px; display: block;"
                                 data-content="<img src='<?php echo e(env('APP_URL') . $comic->comic_featured); ?>' style='max-width:100%;'>"
                                 />
                        </td>
                        <td><?php echo $comic->comic_name; ?></td>

                        <td class="font-13"><?php echo $comic->comic_meta_title; ?></td>
                        <td><?php echo e(number_format($comic->comic_unit_price, 0, '', ',')); ?></td>
                        <td><?php echo e(number_format($comic->comic_increase_price, 0, '', ',')); ?></td>
                        <td class="font-12">
                            <?php if($comic->comic_status == 1): ?>
                            <span class="text-success">Công khai</span>
                            <?php elseif($comic->comic_status == 0): ?>
                            <span class="text-warning">Bản nháp</span>
                            <?php else: ?>
                            <span class="text-danger">Hủy đăng</span>
                            <?php endif; ?>
                        <td>
                            <a href="<?php echo e(URL::action('Admin\ComicController@editComic', ['comic_id' => $comic->comic_id])); ?>"
                               class="btn green btn-xs"><i class="fa fa-pencil"></i></a>
                            <button type="button" data-id="<?php echo e($comic->comic_id); ?>"
                                    class="btn btn-xs red-soft m-r-0 btn-delete"><i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="text-right">
            <?php echo $comics->appends(Request::all())->links(); ?>

        </div>
        <?php else: ?>
        <h4 class="text-center">Không có dữ liệu</h4>
        <?php endif; ?>
    </div>
</div>
<div id="delete-modal" class="modal fade" tabindex="-1" data-keyboard="false">
    <div class="modal-dialog" style="margin-top: 5%">
        <?php echo Form::open(['action' => 'Admin\ComicController@doDeleteComic', 'method' => 'POST', 'id' => 'delete-form']); ?>

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title uppercase">Xóa truyện tranh</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="txt-id" value="">
                <div class="font-red-soft">Bạn có chắc chắn muốn xóa truyện tranh này?</div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn blue text-uppercase">Xác nhận</button>
                <button type="button" data-dismiss="modal" class="btn red-soft uppercase">Hủy bỏ</button>
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