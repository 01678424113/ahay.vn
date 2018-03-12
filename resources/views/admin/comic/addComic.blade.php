@extends('admin.layout')
@section('style')
{{ Html::style('assets/global/plugins/icheck/skins/all.css') }}
{{ Html::style('assets/global/plugins/dropzone/dropzone.min.css') }}
{{ Html::style('assets/global/plugins/dropzone/basic.min.css') }}
@endsection
@section('pagecontent')
<div class="page-bar m-b-20">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{URL::action('Admin\HomeController@index')}}">Bảng điều khiển</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{URL::action('Admin\ComicController@listComic')}}">Truyện tranh</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>{!! $title !!}</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <a href="{{URL::action('Admin\ComicController@listComic')}}" class="btn default btn-sm uppercase"><i
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
        {!! Form::open(['action' => 'Admin\ComicController@doAddComic', 'method' => 'POST', 'id'=> 'comic-form', 'files' => true]) !!}
        <div class="form-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tên truyện <span class="required"> * </span></label>
                                <input type="text" name="txt-name" id="txt-name" class="form-control"/>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đơn giá <span class="required"> * </span></label>
                                        <input type="text" name="txt-unit-price" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Truyện nổi bật</label>
                                        <select name="comic_suggest" id="" class="form-control">
                                            <option value="0">Không</option>
                                            <option value="1">Có 3</option>
                                            <option value="2">Có 5</option>
                                            <option value="3">Có 3-5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" >
                                <label class="control-label">Mô tả</label>
                                <textarea class="form-control" name="txt-description" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ảnh giới thiệu</label>
                        <div class="form-group dropzone dropzone-file-area clearfix" id="dropzone">
                            <h3 class="dz-message needsclick">Kéo thả hình ảnh hoặc click để chọn hình ảnh tải lên</h3>
                        </div>
                        <div id="comic-images"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nội dung</label>
                        <div class="panel-group accordion" id="content">
                            @for($i = 0; $i < 5; $i ++)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled {{ $i != 0 ? 'collapse' : ''}}" data-toggle="collapse" data-parent="#content" href="#content{{ ($i + 1) }}"> #{{ ($i + 1) }} </a>
                                    </h4>
                                </div>
                                <div id="content{{ ($i + 1) }}" class="panel-collapse {{ $i == 0 ? 'in' : 'collapse'}}">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-5 {{ ($i + 1) % 2 == 0 ? 'col-md-push-7' : ''}}">
                                                <div>
                                                   <a role="button" data-toggle="modal" data-target="#content-image-{{($i + 1)}}">
                                                        <img src="{{ env('APP_URL') }}images/default-image.png"
                                                             data-old="{{ env('APP_URL') }}images/default-image.png"
                                                             style="max-width: 100%"
                                                             class="img-thumbnail content-image"
                                                             />
                                                    </a>
                                                </div>
                                                <div id="content-image-{{ ($i + 1) }}" class="modal fade" tabindex="-1" data-keyboard="false"style="margin-top: 5%">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"></button>
                                                                <h4 class="modal-title text-uppercase">Chọn ảnh</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" class="content-image-type" name="txt-content-image-type-{{ ($i + 1) }}" value="none">
                                                                <div class="form-group">
                                                                    <label class="control-label">Chọn từ files</label>
                                                                    <input type="file" class="file-content-image form-control" name="file-content-image-{{ ($i + 1) }}"
                                                                           accept="image/*">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">URL ảnh</label>
                                                                    <input type="text" class="txt-content-image form-control" name="txt-content-image-{{ ($i + 1) }}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn-content-image btn blue text-uppercase">
                                                                    Xác nhận
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-7 {{ ($i + 1) % 2 == 0 ? 'col-md-pull-5' : ''}}">
                                                <div class="form-group">
                                                    <label class="control-label">Tiêu đề</label>
                                                    <input type="text" name="txt-content-title-{{ ($i + 1) }}" class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Nội dung</label>
                                                    <textarea class="form-control" name="txt-content-text-{{ ($i + 1) }}" rows="8"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Video giới thiệu (Youtube)</label>
                        <input type="text" name="txt-video" class="form-control" placeholder="https://www.youtube.com/watch?v=NZCkhxhHBto"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ảnh tiêu biểu</label>
                        <div>
                            <a role="button" data-toggle="modal" data-target="#featured-modal">
                                <img src="{{ env('APP_URL') }}images/default-image.png"
                                     data-old="{{ env('APP_URL') }}images/default-image.png"
                                     style="max-width: 100%" id="featured-img"
                                     class="img-thumbnail"
                                     />
                            </a>
                        </div>
                        <div id="featured-modal" class="modal fade" tabindex="-1" data-keyboard="false"style="margin-top: 5%">
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
                        <label class="control-label">Tiêu đề SEO</label>
                        <input type="text" name="txt-meta-title" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mô tả SEO</label>
                        <textarea class="form-control" name="txt-meta-desc" rows="5"></textarea>
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
                        image = image.split('http://ahay.vn/').slice(1);
                        $('#comic-images').find('input[name="txt-images[]"][value="' + image + '"]').remove();
                    });
                    file.previewElement.appendChild(removeButton);
                });
                this.on("success", function (file, data) {
                    if (data.status_code === 200) {
                        // $(file.previewElement).find('.dz-filename span').text(data.data);
                        var html = '<input type="hidden" class="input-image" name="txt-images[]" value="' + data.data + '" />';
                        $('#comic-images').append(html);
                    }
                });
            }
        };
        $('#comic-form').validate({
            errorElement: 'span',
            errorClass: 'help-block',
            focusInvalid: false,
            rules: {
                'txt-name': {
                    required: true
                },
                'txt-unit-price': {
                    required: true,
                    number: true
                },
                'file-featured': {
                    accept: "image/*"
                }
            },
            messages: {
                'txt-name': {
                    required: "Tên truyện không được để trống"
                },
                'txt-unit-price': {
                    required: "Đơn giá không được để trống",
                    number: "Đơn giá không hợp lệ"
                },
                'file-featured': {
                    accept: "Ảnh tiêu biểu không hợp lệ"
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
        $('#comic-form').find('input[name="file-featured"]').change(function () {
            var files = $('#featured-modal').find('input[name="file-featured"]').prop('files');
            if (files.length) {
                var regex_type = /^(image\/jpeg|image\/png|image\/gif)$/;
                $.each(files, function (key, file) {
                    if (regex_type.test(file.type)) {
                        var fr = new FileReader();
                        fr.readAsDataURL(file);
                        fr.onload = function (event) {
                            $('#featured-img').attr('src', event.target.result);
                            $('#comic-form').find('input[name="txt-featured-type"]').val('file');
                            $('#featured-modal').find('input[name="txt-featured"]').val("");
                            $('#featured-modal').modal('hide');
                        };
                    } else {
                        $('#featured-img').attr('src', $('#featured-img').data('old'));
                        $('#comic-form').find('input[name="txt-featured-type"]').val('none');
                    }
                });
            } else {
                $('#featured-img').attr('src', $('#featured-img').data('old'));
                $('#comic-form').find('input[name="txt-featured-type"]').val('none');
            }
        });
        $('#btn-featured').click(function () {
            var url = $('#featured-modal').find('input[name="txt-featured"]').val();
            var regex_url = /(https?:\/\/(.*)\.(png|jpg|jpeg|gif))/i;
            if (url !== "" && regex_url.test(url)) {
                $('#featured-img').attr('src', url);
                $('#comic-form').find('input[name="txt-featured-type"]').val('url');
                $('#comic-form').find('input[name="file-featured"]').val(null);
            }
            $('#featured-modal').modal('hide');
        });
        $('#comic-form').find('input.file-content-image').change(function () {
            var collapse = $(this).closest('.panel-collapse');
            var modal = $(this).closest('.modal');
            var files = $(this).prop('files');
            if (files.length) {
                var regex_type = /^(image\/jpeg|image\/png|image\/gif)$/;
                $.each(files, function (key, file) {
                    if (regex_type.test(file.type)) {
                        var fr = new FileReader();
                        fr.readAsDataURL(file);
                        fr.onload = function (event) {
                            collapse.find('.content-image').attr('src', event.target.result);
                            modal.find('input.content-image-type').val('file');
                            modal.find('input.txt-content-image').val("");
                            modal.modal('hide');
                        };
                    } else {
                        collapse.find('.content-image').attr('src', collapse.find('.content-image').data('old'));
                        modal.find('input.content-image-type').val('none');
                    }
                });
            } else {
                collapse.find('.content-image').attr('src', collapse.find('.content-image').data('old'));
                modal.find('input.content-image-type').val('none');
            }
        });
        $('.btn-content-image').click(function () {
            var collapse = $(this).closest('.panel-collapse');
            var modal = $(this).closest('.modal');
            var url = modal.find('input.txt-content-image').val();
            var regex_url = /(https?:\/\/(.*)\.(png|jpg|jpeg|gif))/i;
            if (url !== "" && regex_url.test(url)) {
                collapse.find('.content-image').attr('src', url);
                modal.find('input.content-image-type').val('url');
                modal.find('input.file-content-image').val(null);
            }
            modal.modal('hide');
        });
    });
</script>
@endsection
