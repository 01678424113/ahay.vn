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
                <span class="caption-subject uppercase">Danh sách cảm nhận</span>
            </div>
        </div>
        <div class="portlet-body">
            @if(count($reviews) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover td-middle">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên người viết</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th style="width: 100px;">Trạng thái</th>
                            <th style="width: 70px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <td>{!! $review->id !!}</td>
                                <td>{!! $review->review_name !!}</td>
                                <td>{!! $review->review_title !!}</td>
                                <td>{!! $review->review_content !!}</td>
                                <td class="font-13">
                                    @if($review->status == 1)
                                        <span class="text-success">Áp dụng</span>
                                    @elseif($review->status == 0)
                                        <span class="text-warning">Không áp dụng</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('editReview',['review_id'=>$review->id])}}" type="button" data-id="{{ $review->id }}" class="btn green btn-xs btn-loaduser">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <button type="button" data-id="{{ $review->id }}" class="btn btn-xs red-soft m-r-0 btn-delete">
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
    <div id="delete-modal" class="modal fade" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog"  style="margin-top: 5%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <h4 class="modal-title uppercase">Xóa cảm nhận</h4>
                </div>
                {!! Form::open(['action' => 'Admin\ReviewController@doDeleteReview', 'method' => 'POST', 'id' => 'delete-form']) !!}
                <div class="modal-body">
                    <input type="hidden" name="txt-id" value="" />
                    <div class="font-red-soft">Bạn có chắc chắn muốn xóa cảm nhận này?</div>
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