@extends('admin.layout')
@section('style')
    {{ Html::style('assets/global/plugins/select2/css/select2.min.css') }}
    {{ Html::style('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}
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
                <a href="">Banner</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{!! $title !!}</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <a href="{{URL::action('Admin\HomeController@index')}}" class="btn default btn-sm uppercase">
                <i class="fa fa-arrow-left m-r-5"></i>Quay lại</a>
        </div>
    </div>

    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject uppercase">{{$title}}</span>
            </div>
        </div>
        <div class="portlet-body form">
            {!! Form::open(['action' => 'Admin\WebsiteController@postSettingBanner', 'method' => 'POST', 'id'=> 'product-form', 'files' => true]) !!}
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Ảnh tiêu biểu</label>
                            <div>
                                <a role="button" data-toggle="modal" data-target="#featured-modal">
                                    <img src="{{ env('APP_URL') . $banner->image }}"
                                         data-old="{{ env('APP_URL') . $banner->image }}"
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
                                                <input type="text" class="form-control" name="txt-featured" value="{{ env('APP_URL') . $banner->image }}">
                                                <input type="hidden" name="banner_id" value="{{$banner->id}}">
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
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn blue uppercase">Lưu chỉnh sửa</button>
                <a href="{{URL::action('Admin\HomeController@index')}}" data-dismiss="modal" class="btn red-soft uppercase">Hủy bỏ</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('script')
    {{ Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}
    {{ Html::script('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}
    {{ Html::script('assets/global/plugins/select2/js/select2.full.min.js') }}
    {{ Html::script('assets/global/plugins/dropzone/dropzone.min.js') }}
    {{ Html::script('assets/global/plugins/icheck/icheck.min.js') }}
    <script>
        $(document).ready(function () {;
            $('#product-form').find('input[name="file-featured"]').change(function () {
                var files = $('#featured-modal').find('input[name="file-featured"]').prop('files');
                if (files.length) {
                    var regex_type = /^(image\/jpeg|image\/png|image\/gif)$/;
                    $.each(files, function (key, file) {
                        if (regex_type.test(file.type)) {
                            var fr = new FileReader();
                            fr.readAsDataURL(file);
                            fr.onload = function (event) {
                                $('#featured-img').attr('src', event.target.result);
                                $('#product-form').find('input[name="txt-featured-type"]').val('file');
                                $('#featured-modal').find('input[name="txt-featured"]').val("");
                                $('#featured-modal').modal('hide');
                            };
                        } else {
                            $('#featured-img').attr('src', $('#featured-img').data('old'));
                            $('#product-form').find('input[name="txt-featured-type"]').val('none');
                        }
                    });
                } else {
                    $('#featured-img').attr('src', $('#featured-img').data('old'));
                    $('#product-form').find('input[name="txt-featured-type"]').val('none');
                }
            });
            $('#btn-featured').click(function () {
                var url = $('#featured-modal').find('input[name="txt-featured"]').val();
                var regex_url = /(https?:\/\/(.*)\.(png|jpg|jpeg|gif))/i;
                if (url !== "" && regex_url.test(url)) {
                    $('#featured-img').attr('src', url);
                    $('#product-form').find('input[name="txt-featured-type"]').val('url');
                    $('#product-form').find('input[name="file-featured"]').val(null);
                }
                $('#featured-modal').modal('hide');
            });
        });
    </script>
@endsection
