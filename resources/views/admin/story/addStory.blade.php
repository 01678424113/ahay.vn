@extends('admin.layout')
@section('style')
{{ Html::style('assets/global/plugins/icheck/skins/all.css') }}
{{ Html::style('assets/global/plugins/dropzone/dropzone.min.css') }}
{{ Html::style('assets/global/plugins/dropzone/basic.min.css') }}
{{ Html::style('assets/global/plugins/select2/css/select2.min.css') }}
{{ Html::style('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}
@endsection
@section('pagecontent')
<div class="page-bar m-b-20">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{URL::action('Admin\HomeController@index')}}">Bảng điều khiển</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{URL::action('Admin\StoryController@listStory')}}">Truyện theo chữ cái</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>{!! $title !!}</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <a href="{{URL::action('Admin\StoryController@listStory')}}" class="btn default btn-sm uppercase"><i
                class="fa fa-arrow-left m-r-5"></i>Quay
            lại</a>
    </div>
</div>
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject uppercase">Thông tin truyện tranh</span>
        </div>
    </div>
    <div class="portlet-body form">
        {!! Form::open(['action' => 'Admin\StoryController@doAddStory', 'method' => 'POST', 'id'=> 'story-form', 'files' => true]) !!}
        <div class="form-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label class="control-label">Tên truyện <span class="required"> * </span></label>
                        <input type="text" name="txt-name" id="txt-name" class="form-control"/>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Truyện cha <span class="required"> * </span></label>
                                <select name="sl-comic" id="" class="form-control">
                                    <option value="">Chọn truyện cha</option>
                                    @foreach($comics as $comic)
                                    <option value="{{$comic->comic_id}}">{!! $comic->comic_name !!}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Chữ cái <span class="required"> * </span></label>
                                <input type="text" name="txt-alpha" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Giới tính  <span class="required"> * </span></label><br>
                                <select name="txt-gender" id="" class="form-control">
                                    <option value="boy">Trai</option>
                                    <option value="girl">Gái</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ảnh nội dung</label>
                        <div class="form-group dropzone dropzone-file-area clearfix" id="dropzone">
                            <h3 class="dz-message needsclick">Kéo thả hình ảnh hoặc click để chọn hình ảnh tải lên</h3>
                        </div>
                        <div id="story-images"></div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Ảnh Icon</label>
                        <div>
                            <a role="button" data-toggle="modal" data-target="#icon-modal">
                                <img src="{{ env('APP_URL') }}images/default-image.png"
                                     data-old="{{ env('APP_URL') }}images/default-image.png"
                                     style="max-width: 100%" id="icon-img"
                                     class="img-thumbnail"
                                     />
                            </a>
                        </div>
                        <div id="icon-modal" class="modal fade" tabindex="-1" data-keyboard="false"style="margin-top: 5%">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"></button>
                                        <h4 class="modal-title text-uppercase">Chọn ảnh icon</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="txt-icon-type" value="none">
                                        <div class="form-group">
                                            <label class="control-label">Chọn từ files</label>
                                            <input type="file" class="form-control" name="file-icon"
                                                   accept="image/*">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">URL ảnh</label>
                                            <input type="text" class="form-control" name="txt-icon">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="btn-icon" class="btn blue text-uppercase">
                                            Xác nhận
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Trạng thái</label>
                        <div class="input-group">
                            <div class="icheck-inline">
                                <label class="control-label" role="button">
                                    <input type="radio" name="rd-status" class="icheck" value="1"
                                           data-radio="iradio_minimal-green" checked/>
                                    <span class="text-success">Công khai</span>
                                </label>
                                <label class="control-label" role="button">
                                    <input type="radio" name="rd-status" class="icheck" value="0"
                                           data-radio="iradio_minimal-green"/>
                                    <span class="text-warning">Bản nháp</span>
                                </label>
                                <label class="control-label" role="button">
                                    <input type="radio" name="rd-status" class="icheck" value="-1"
                                           data-radio="iradio_minimal-green"/>
                                    <span class="text-danger">Hủy đăng</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn blue uppercase">Thêm mới</button>
            <a href="{{URL::previous()}}" data-dismiss="modal" class="btn red-soft uppercase">Hủy bỏ</a>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@section('script')
{{ Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}
{{ Html::script('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}
{{ Html::script('assets/global/plugins/dropzone/dropzone.min.js') }} 
{{ Html::script('assets/global/plugins/icheck/icheck.min.js') }}
{{ Html::script('assets/global/plugins/select2/js/select2.full.min.js') }}
<script type="text/javascript">
    $(document).ready(function () {
        Dropzone.options.dropzone = {
            url: "{{ URL::action('Admin\HomeController@uploadImage') }}",
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
                formData.append("_token", "{{ csrf_token() }}");
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

                        $('#story-images').find('input[name="txt-images[]"][value="' + image + '"]').remove();
                    });
                    file.previewElement.appendChild(removeButton);
                });
                this.on("success", function (file, data) {
                    if (data.status_code === 200) {
                        // $(file.previewElement).find('.dz-filename span').text(data.data);
                        var html = '<input type="hidden" class="input-image" name="txt-images[]" value="' + data.data + '" />';
                        $('#story-images').append(html);
                    }
                });
            }
        };
        $('#story-form').find('select[name="sl-comic"]').select2({
            language: {
                noResults: function () {
                    return "Không tìm thấy truyện cha nào";
                }
            }
        }).on('change', function () {
            var id = $.trim($(this).val());
            if (id !== "") {
                var parent = $(this).closest('.form-group');
                parent.removeClass('has-error');
                parent.find('.help-block').remove();
            }
        });
        $('#story-form').validate({
            errorElement: 'span',
            errorClass: 'help-block',
            focusInvalid: false,
            rules: {
                'txt-name': {
                    required: true
                },
                'sl-comic': {
                    required: true,
                    number: true
                },
                'txt-alpha': {
                    required: true,
                    minlength: 1
                },
                'file-icon': {
                    accept: "image/*"
                }
            },
            messages: {
                'txt-name': {
                    required: "Tên truyện không được để trống"
                },
                'sl-comic': {
                    required: "Chưa chọn truyện cha",
                    number: "Truyện cha không hợp lệ"
                },
                'txt-alpha': {
                    required: "Chữ cái không được để trống",
                    minlength: "Chữ cái không hợp lệ"
                },
                'file-icon': {
                    accept: "Ảnh icon không hợp lệ"
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
        $('#story-form').find('input[name="file-icon"]').change(function () {
            var files = $('#icon-modal').find('input[name="file-icon"]').prop('files');
            if (files.length) {
                var regex_type = /^(image\/jpeg|image\/png|image\/gif)$/;
                $.each(files, function (key, file) {
                    if (regex_type.test(file.type)) {
                        var fr = new FileReader();
                        fr.readAsDataURL(file);
                        fr.onload = function (event) {
                            $('#icon-img').attr('src', event.target.result);
                            $('#story-form').find('input[name="txt-icon-type"]').val('file');
                            $('#icon-modal').find('input[name="txt-icon"]').val("");
                            $('#icon-modal').modal('hide');
                        };
                    } else {
                        $('#icon-img').attr('src', $('#icon-img').data('old'));
                        $('#story-form').find('input[name="txt-icon-type"]').val('none');
                    }
                });
            } else {
                $('#icon-img').attr('src', $('#icon-img').data('old'));
                $('#story-form').find('input[name="txt-icon-type"]').val('none');
            }
        });
        $('#btn-icon').click(function () {
            var url = $('#icon-modal').find('input[name="txt-icon"]').val();
            var regex_url = /(https?:\/\/(.*)\.(png|jpg|jpeg|gif))/i;
            if (url !== "" && regex_url.test(url)) {
                $('#icon-img').attr('src', url);
                $('#story-form').find('input[name="txt-icon-type"]').val('url');
                $('#story-form').find('input[name="file-icon"]').val(null);
            }
            $('#icon-modal').modal('hide');
        });
    });
</script>
@endsection
