@extends('admin.layout')
@section('style')
    {{Html::style('assets/global/plugins/select2/css/select2.min.css')}}
    {{Html::style('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}
    {{Html::style('assets/global/plugins/icheck/skins/all.css')}}
@endsection
@section('pagecontent')

    <div class="page-bar m-b-20">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{URL::action('Admin\HomeController@index')}}">Bảng điều khiển</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{!! $title !!}</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <a href="{{URL::previous()}}" class="btn default btn-sm uppercase"><i class="fa fa-arrow-left m-r-5"></i>Quay
                lại</a>
        </div>
    </div>
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject uppercase">Danh sách khuyến mại</span>
            </div>
            <div class="actions">
                <button type="button" class="btn blue btn-lg uppercase" data-toggle="modal" data-target="#add-user-modal">Thêm khuyến mại</button>
            </div>
        </div>
        <div class="portlet-body">
            @if(count($setting_sale_comics) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover td-middle">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Số lượng từ</th>
                            <th>Số tiền giảm</th>
                            <th style="width: 100px;">Trạng thái</th>
                            <th style="width: 70px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($setting_sale_comics as $setting_sale_comic)
                            <tr>
                                <td>{!! $setting_sale_comic->id !!}</td>
                                <td>{!! $setting_sale_comic->quantity_word !!}</td>
                                <td>{!! number_format($setting_sale_comic->comic_sale_percent) !!}</td>
                                <td class="font-13">
                                    @if($setting_sale_comic->status == 1)
                                        <span class="text-success">Áp dụng</span>
                                    @elseif($setting_sale_comic->status == 0)
                                        <span class="text-warning">Chưa áp dụng</span>
                                    @else
                                        <span class="text-danger">Khóa</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" data-id="{{ $setting_sale_comic->id }}" class="btn green btn-xs btn-loaduser">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button type="button" data-id="{{ $setting_sale_comic->id }}" class="btn btn-xs red-soft m-r-0 btn-delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                </div>
            @else
                <h4 class="text-center">Không có dữ liệu</h4>
            @endif
        </div>
    </div>
    <div class="modal fade" id="add-user-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title uppercase">Thêm khuyến mại</h4>
                </div>
                {!! Form::open(['action' => ['Admin\SettingSaleComicController@doAddSettingSaleComic'], 'method' => 'POST', 'id'=> 'add-user-form']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Số lượng từ <span class="required"> * </span></label>
                        <input type="text" class="form-control" name="quantity-word" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Số tiền giảm <span class="required"> * </span></label>
                        <input type="text" class="form-control" name="sale-percent" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Trạng thái</label>
                        <div class="input-group">
                            <div class="icheck-inline">
                                <label class="control-label" role="button">
                                    <input type="radio" name="rd-status" class="icheck" value="1"
                                           data-radio="iradio_minimal-green" checked/>
                                    <span class="text-success">Áp dụng</span>
                                </label>
                                <label class="control-label" role="button">
                                    <input type="radio" name="rd-status" class="icheck" value="0"
                                           data-radio="iradio_minimal-green"/>
                                    <span class="text-warning">Chưa áp dụng</span>
                                </label>
                                <label class="control-label" role="button">
                                    <input type="radio" name="rd-status" class="icheck" value="-1"
                                           data-radio="iradio_minimal-green"/>
                                    <span class="text-danger">Khóa</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn blue uppercase">Thêm mới</button>
                    <button type="button" class="btn red-soft uppercase" data-dismiss="modal">Hủy bỏ</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="modal fade" id="edit-user-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Khuyến mại</h4>
                </div>
                {!! Form::open(['action' => ['Admin\SettingSaleComicController@doEditSettingSaleComic'], 'method' => 'POST', 'id'=> 'edit-user-form']) !!}
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="txt-user-id" />
                    <div class="form-group">
                        <label class="control-label">Số lượng từ <span class="required"> * </span></label>
                        <input type="text" class="form-control" name="quantity-word" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Số tiền giảm <span class="required"> * </span></label>
                        <input type="text" class="form-control" name="sale-percent" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Trạng thái</label>
                        <div class="input-group">
                            <div class="icheck-inline">
                                <label class="control-label" role="button">
                                    <input type="radio" name="rd-status" class="icheck" value="1" data-radio="iradio_minimal-green" />
                                    <span class="text-primary">Áp dụng</span>
                                </label>
                                <label class="control-label" role="button">
                                    <input type="radio" name="rd-status" class="icheck" value="0" data-radio="iradio_minimal-green" />
                                    <span class="text-warning">Chưa áp dụng</span>
                                </label>
                                <label class="control-label" role="button">
                                    <input type="radio" name="rd-status" class="icheck" value="-1" data-radio="iradio_minimal-green" />
                                    <span class="text-danger">Khóa</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn-update" class="btn blue uppercase">Lưu chỉnh sửa</button>
                    <button type="button" class="btn red-soft uppercase" data-dismiss="modal">Hủy bỏ</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div id="delete-modal" class="modal fade" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog"  style="margin-top: 5%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <h4 class="modal-title uppercase">Xóa khuyến mại</h4>
                </div>
                {!! Form::open(['action' => 'Admin\SettingSaleComicController@doDeleteSettingSaleComic', 'method' => 'POST', 'id' => 'delete-form']) !!}
                <div class="modal-body">
                    <input type="hidden" name="txt-id" value="" />
                    <div class="font-red-soft">Bạn có chắc chắn muốn xóa khuyến mại này?</div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn blue text-uppercase">Xác nhận</button>
                    <button type="button" data-dismiss="modal" class="btn red-soft uppercase">Hủy bỏ</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{ Html::script('assets/global/plugins/icheck/icheck.min.js') }}
    {{ Html::script('assets/global/plugins/select2/js/select2.full.min.js') }}
    {{ Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}
    <script>
        $(document).ready(function () {
            $('#edit-user-modal').on('hidden.bs.modal', function () {
                var modal = $(this);
                $("#edit-user-form").trigger('reset');
                modal.find('input[name="rd-status"]').iCheck('uncheck');
                modal.find('.form-group').removeClass('has-error');
                modal.find('.form-group').find('.help-block').remove();
                modal.find('.modal-body').hide();
                modal.find('.modal-footer').hide();
            });
            $('#add-user-modal').on('hidden.bs.modal', function () {
                var modal = $(this);
                $("#add-user-form").trigger('reset');
                modal.find('.form-group').removeClass('has-error');
                modal.find('.form-group').find('.help-block').remove();
            });
            $('.btn-loaduser').click(function () {
                var setting_sale_percent_id = $(this).data('id');
                var modal = $('#edit-user-modal');
                modal.modal('show');
                $.ajax({
                    url: "{{URL::action('Admin\SettingSaleComicController@loadSettingSaleComic')}}",
                    type: "GET",
                    data: {
                        setting_sale_percent_id: setting_sale_percent_id
                    },
                    dataType: "text",
                    timeout: 30000,
                    error: function (jqXHR, textStatus, errorThrow) {
                        modal.modal('hide');
                        toastr['error']('Lỗi trong quá trình xử lý dữ liệu');
                    },
                    success: function (data) {
                        var json_data = $.parseJSON(data);
                        if (json_data.status_code === 200) {
                            modal.find('input[name="quantity-word"]').val(json_data.data.quantity_word);
                            modal.find('input[name="sale-percent"]').val(json_data.data.comic_sale_percent);
                            modal.find('input[name="rd-status"][value="' + json_data.data.status + '"]').iCheck('check');
                            modal.find('.modal-body').show();
                            modal.find('.modal-footer').show();
                        } else {
                            modal.modal('hide');
                            toastr['error'](json_data.message);
                        }
                    }
                });
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
            $('#add-user-form').validate({
                errorElement: 'span',
                errorClass: 'help-block',
                focusInvalid: false,
                rules: {
                    'quantity-word': {
                        required: true,
                        min: 1
                    },
                    'sale-price': {
                        required: true,
                        min: 0
                    }
                },
                messages: {
                    'quantity-word': {
                        required: "Số lượng từ không được để trống",
                        min: "Số lượng từ phải lớn hơn 0"
                    },
                    'sale-price': {
                        required: "Phần trăm giảm không được để trống",
                        minlength: "Phần trăm giảm phải lớn hơn 0"
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
            $('#edit-user-form').validate({
                errorElement: 'span',
                errorClass: 'help-block',
                focusInvalid: false,
                rules: {
                    'quantity-word': {
                        required: true,
                        min: 1
                    },
                    'sale-price': {
                        required: true,
                        min: 0
                    }
                },
                messages: {
                    'quantity-word': {
                        required: "Số lượng từ không được để trống",
                        min: "Số lượng từ phải lớn hơn 0"
                    },
                    'sale-price': {
                        required: "Phần trăm giảm không được để trống",
                        minlength: "Phần trăm giảm phải lớn hơn 0"
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
@endsection