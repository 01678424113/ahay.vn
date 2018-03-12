@extends('admin.layout')
@section('style')
    {{ Html::style('assets/global/plugins/select2/css/select2.min.css') }}
    {{ Html::style('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}
    {{ Html::style('assets/global/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}
    {{ Html::style('assets/global/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput-typeahead.css') }}
    {{ Html::style('assets/global/plugins/bootstrap-summernote/summernote.css') }}
    {{ Html::style('assets/global/plugins/icheck/skins/all.css') }}
    {{ Html::style('assets/global/plugins/ion.rangeslider/css/ion.rangeSlider.css') }}
    {{ Html::style('assets/global/plugins/ion.rangeslider/css/ion.rangeSlider.skinFlat.css') }}
@endsection
@section('pagecontent')
    <div class="page-bar m-b-20">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{URL::action('Admin\HomeController@index')}}">Bảng điều khiển</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::action('Admin\PromotionController@listPromotion')}}">Khuyến mại
                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{!! $title !!}</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <a href="{{URL::action('Admin\PromotionController@listPromotion')}}" class="btn default btn-sm uppercase"><i
                        class="fa fa-arrow-left m-r-5"></i>Quay
                lại</a>
        </div>
    </div>
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject uppercase">Nội dung khuyến mại</span>
            </div>
        </div>
        <div class="portlet-body form">
            {!! Form::open(['action' => 'Admin\PromotionController@doAddPromotion', 'method' => 'POST', 'id'=> 'promotion-form', 'files' => true]) !!}
            <div class="form-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label class="control-label">Tên khuyến mại <span class="required"> * </span></label>
                            <input type="text" name="txt-name" class="form-control" value=""/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kiểu khuyến mại<span class="required"> * </span></label>
                            <input type="text" name="txt-type" class="form-control" value=""/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Điều kiện<span class="required"> * </span></label>
                            <input type="text" name="txt-condition" class="form-control" value=""/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Giảm %<span class="required"> * </span></label>
                            <input type="text" name="txt-percent-discount" class="form-control" value=""/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Ảnh khuyến mại</label>
                            <div>
                                <a role="button" data-toggle="modal" data-target="#featured-modal">
                                    <img src="{{ env('APP_URL') }}images/default-image.png"
                                         data-old="{{ env('APP_URL') }}images/default-image.png"
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
                                                <input type="text" class="form-control" name="txt-featured">
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
                            <label class="control-label">T.gian bắt đầu<span class="required"> * </span></label>
                            <input type="date" name="txt-start" class="form-control" value=""/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">T.gian kết thúc<span class="required"> * </span></label>
                            <input type="date" name="txt-expired" class="form-control" value=""/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn blue uppercase">Thêm mới</button>
                <a href="{{URL::action('Admin\PromotionController@listPromotion')}}" data-dismiss="modal"
                   class="btn red-soft uppercase">Hủy bỏ</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
@section('script')
    {{ Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}
    {{ Html::script('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}
    {{ Html::script('assets/global/plugins/select2/js/select2.full.min.js') }}
    {{ Html::script('assets/global/plugins/bootstrap-tagsinput/dist/typeahead.bundle.min.js') }}
    {{ Html::script('assets/global/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}
    {{ Html::script('assets/global/plugins/bootstrap-summernote/summernote.min.js') }}
    {{ Html::script('assets/global/plugins/bootstrap-summernote/lang/summernote-vi-VN.min.js') }}
    {{ Html::script('assets/global/plugins/icheck/icheck.min.js') }}
    {{ Html::script('assets/global/plugins/ion.rangeslider/js/ion.rangeSlider.min.js') }}
    <script>
        var tags = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: {
                url: "{{ URL::action('Admin\ArticleController@tagsInput') }}",
                filter: function (list) {
                    return $.map(list, function (tagname) {
                        return {name: tagname};
                    });
                },
                cache: false
            }
        });
        tags.initialize();
        $(document).ready(function () {
            $('#summernote').summernote();
        });
        $('#promotion-form').find('input[name="txt-tags"]').tagsinput({
            typeaheadjs: {
                name: 'tags',
                displayKey: 'name',
                valueKey: 'name',
                source: tags.ttAdapter()
            }
        });
        $(document).ready(function () {
            $('#promotion-form').validate({
                errorElement: 'span',
                errorClass: 'help-block',
                focusInvalid: false,
                rules: {
                    'txt-name': {
                        required: true
                    },
                    'txt-type': {
                        required: true
                    },
                    'txt-condition': {
                        required: true
                    },
                    'txt-percent-discount': {
                        required: true
                    },
                    'txt-start': {
                        required: true
                    },
                    'txt-expired': {
                        required: true
                    }
                },
                messages: {
                    'txt-name': {
                        required: "Tên khuyến mại không được để trống"
                    },
                    'txt-type': {
                        required: "Kiểu không được để trống"
                    },
                    'txt-condition': {
                        required: "Điều kiện không được để trống"
                    },
                    'txt-percent-discount': {
                        required: "Số phần trăm giảm không được để trống"
                    },
                    'txt-start': {
                        required: "Thời gian bắt đầu không được để trống"
                    },
                    'txt-expired': {
                        required: "Thòi gian kết thúc không được để trống"
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
            $('#promotion-form').find('select[name="sl-category"]').select2({
                language: {
                    noResults: function () {
                        return "Không tìm thấy chuyên mục nào";
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
            $('#promotion-form').find('input[name="file-featured"]').change(function () {
                var files = $('#featured-modal').find('input[name="file-featured"]').prop('files');
                if (files.length) {
                    var regex_type = /^(image\/jpeg|image\/png|image\/gif)$/;
                    $.each(files, function (key, file) {
                        if (regex_type.test(file.type)) {
                            var fr = new FileReader();
                            fr.readAsDataURL(file);
                            fr.onload = function (event) {
                                $('#featured-img').attr('src', event.target.result);
                                $('#promotion-form').find('input[name="txt-featured-type"]').val('file');
                                $('#featured-modal').find('input[name="txt-featured"]').val("");
                                $('#featured-modal').modal('hide');
                            };
                        } else {
                            $('#featured-img').attr('src', $('#featured-img').data('old'));
                            $('#promotion-form').find('input[name="txt-featured-type"]').val('none');
                        }
                    });
                } else {
                    $('#featured-img').attr('src', $('#featured-img').data('old'));
                    $('#promotion-form').find('input[name="txt-featured-type"]').val('none');
                }
            });
            $('#btn-featured').click(function () {
                var url = $('#featured-modal').find('input[name="txt-featured"]').val();
                var regex_url = /(https?:\/\/(.*)\.(png|jpg|jpeg|gif))/i;
                if (url !== "" && regex_url.test(url)) {
                    $('#featured-img').attr('src', url);
                    $('#promotion-form').find('input[name="txt-featured-type"]').val('url');
                    $('#promotion-form').find('input[name="file-featured"]').val(null);
                }
                $('#featured-modal').modal('hide');
            });
        });

        function uploadImage(file, editor, welEditable) {
            var data = new FormData();
            data.append('_token', '{{ csrf_token() }}');
            data.append("file-image", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "{{ URL::action('Admin\ArticleController@doHandleImage') }}",
                contentType: false,
                processData: false,
                error: function (jqXHR, textStatus, errorThrow) {
                    toastr['error']('Lỗi trong quá trình xử lý dữ liệu');
                },
                success: function (data) {
                    if (data.status_code === 200) {
                        $('#promotion-form').find('textarea[name="txt-content"]').summernote('editor.insertImage', data.data);
                    } else {
                        toastr['error'](data.message);
                    }
                }
            });
        }

        function optionCategory(categories, n, selected) {
            var html = "";
            $.each(categories, function (key, category) {
                html += '<option value="' + category.category_id + '"';
                if (selected === category.category_id) {
                    html += 'selected';
                }
                html += '>';
                for (var i = 0; i < n; i++) {
                    html += '&nbsp;';
                }
                html += category.category_name;
                html += '</option>';
                if (typeof category.child !== 'undefined') {
                    html += optionCategory(category.child, n + 5, selected);
                }
            });
            return html;
        }
    </script>
@endsection
