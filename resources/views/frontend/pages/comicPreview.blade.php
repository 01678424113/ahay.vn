@extends('frontend.layout')
@section('style')
    {{Html::style('theme/css/preview-comic.css')}}
    {{Html::style('theme/css/slick.css')}}
@endsection
@section('main_content')
    <div class="inner-title" style="border-bottom: 1px solid #dedede;">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Trang chủ</a> <a href="#">Truyện tranh</a> <a href="#">{{$title}}</a></li>
            </ul>
        </div>
    </div>
    {!! Form::open(['action' => ['Frontend\ComicController@createComic'], 'method' => 'POST', 'id'=> 'create-form']) !!}
    {{csrf_field()}}
    <div class="cp-page-content inner-page-content woocommerce"
         style="background: #EBEBEB; box-shadow: 0 -4px 4px 0 rgba(0, 0, 0, 0.03);padding-top:40px;color: #5a6e73;">
        {{--Preview comic--}}
        <div class="container-fluid" style="max-width: 1300px;margin: auto;">
            <div class="button-social" style="text-align: center;margin-bottom: 15px;">
                <div class="fb-like" style="top: -5px;" data-href="https://developers.facebook.com/docs/plugins/"
                     data-layout="button_count" data-action="like" data-size="small" data-show-faces="true"
                     data-share="true"></div>
                <!-- Đặt thẻ này vào nơi bạn muốn nút chia sẻ kết xuất. -->
                <div class="g-plusone" data-size="medium"></div>
                <div class="zalo-share-button" data-href="http://developers.zalo.me" data-oaid="579745863508352884"
                     data-layout="1" data-color="blue" data-customize=false></div>
            </div>
            <p style="text-align: center;font-size: 18px;font-weight: 600;">Một quyển duy nhất dành riêng cho</p>
            {{--Preview word comic--}}
            <div class="preview-word-comic" style="padding-bottom: 0">
                <button type="button" id="previous"><i class="fa fa-circle" aria-hidden="true"
                                                       style="font-size: 10px;"></i></button>
                <?php $i = 3; ?>
                <?php
                $comic_user_top = str_replace(' ', '', $comic_user);
                $comic_user_top = preg_split("//u", $comic_user_top);
                array_shift($comic_user_top);
                array_pop($comic_user_top);
                ?>
                @foreach($comic_user_top as $comic_word)
                    <button type="button" class="jump word thumbnail-{{$i}}" data-thumbnail="thumbnail-{{$i}}"
                            data-word-id="{{$i}}">{{mb_strtoupper($comic_word)}}</button>
                    <?php $i += 4; ?>
                @endforeach
                <button type="button" id="next" data-page-last="{{$i}}"><i class="fa fa-circle" aria-hidden="true"
                                                                           style="font-size: 10px;"></i></button>
            </div>
            <div class="preview-word-comic">
                <div class="thumbnails-comic-word">
                    <div style="display: inline-flex;justify-content: center;align-items: center;">
                        <?php $i = 3; ?>
                        @foreach($stories as $story)
                            <div>
                                <img class="img-thumbnails-word thumbnail-{{$story[0]->story_id}}" data-word-id="{{$i}}"
                                     id="thumbnail-{{$i}}"
                                     src="{{$story[0]->story_icon}}"
                                     alt="">
                                <a href="javascript:void(0);" id="popover-{{$story[0]->story_id}}"
                                   class="bslink btn-info btn-lg btn-change-story">
                                    Thay đổi
                                </a>
                                <div class="popover fade bottom in"
                                     style="top: 75px;left: -75px;">
                                    <div class="arrow" style="left: 50%;"></div>
                                    <h3 class="popover-title">Chọn 1 truyện khác</h3>
                                    <div class="popover-content"
                                         style="padding: 25px;padding-bottom: 0;padding-top: 28px">
                                        @foreach($stories_all as $item)
                                            @if($story[0]->story_alpha == $item->story_alpha && $item->story_gender == $comic_gender && in_array($item->story_id,$list_id_stories) == false)
                                                <div class="row" style="margin-bottom: 30px;">
                                                    <div class="col-md-4 col-sm-5 col-xs-5">
                                                        <img style="border: 3px solid #dedede;padding: 1px;border-radius: 5px;height: 46.5px;margin-left: 5px"
                                                             src="{{$item->story_icon}}" alt="">
                                                    </div>
                                                    {{--  <div class="col-md-4">
                                                          <p style="margin-bottom: 0;margin-top: 10px">{{$item->story_id}}</p>
                                                      </div>--}}
                                                    <div class="col-md-8 col-sm-7 col-xs-7"
                                                         style="padding-right: 18px;">
                                                        <button type="button"
                                                                class="btn btn-lg ajax-change-story"
                                                                data-story-change="{{$item->story_id}}"
                                                                data-story-present="{{$story[0]->story_id}}">Chọn
                                                        </button>
                                                    </div>
                                                </div>
                                            @elseif($story[0]->story_alpha == $item->story_alpha && $item->story_gender == $comic_gender && in_array($item->story_id,$list_id_stories) == true)
                                                <div class="row" style="margin-bottom: 30px;">
                                                    <div class="col-md-4 col-sm-5 col-xs-5">
                                                        <img style="border: 3px solid #dedede;padding: 1px;border-radius: 5px;height: 46.5px;margin-left: 5px"
                                                             src="{{$item->story_icon}}" alt="">
                                                    </div>
                                                    {{--  <div class="col-md-4">
                                                          <p style="margin-bottom: 0;margin-top: 10px">{{$item->story_id}}</p>
                                                      </div>--}}
                                                    <div class="col-md-8 col-sm-7 col-xs-7"
                                                         style="padding-right: 18px;">
                                                        <button type="button"
                                                                class="btn btn-lg ajax-present-story ajax-change-story change-story-{{$story[0]->story_id}}"
                                                                data-story-change="{{$item->story_id}}"
                                                                data-story-present="{{$story[0]->story_id}}">Đã chọn
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                {{--  <p class="story-name-{{$story[0]->story_id}}">{{$story[0]->story_name}}</p>--}}
                            </div>
                            <?php $i += 4; ?>
                        @endforeach
                    </div>
                </div>

            </div>
            {{--End preview word comic--}}
            {{--Preview image comic--}}
            <div class="preview-comic shake" style="overflow: hidden;">
                <div class="Heidelberg-Book with-Spreads" id="Heidelberg-example-1" style="left:-25%">
                    <div class="Heidelberg-Page first-page">
                        <p class="hidden-xs"
                           style="position: absolute;z-index: 100;margin-top: 35%;margin-left: 50%; margin-right: 5%;font-size: 19px;color: #F08113;">
                            Click để xem truyện
                        </p>
                        <span class="hidden-sm hidden-xs"
                              style="position: absolute;z-index: 100;margin-top: 34.8%;margin-right: 5%;margin-left: 80%;font-size: 21px;color: #F08113;"><i
                                    class="fa fa-caret-right" aria-hidden="true" style="font-size: 22px;"></i></span>
                        <img src="theme/images/comic/transparent.bmp">
                    </div>
                    <?php  $i = 3; ?>
                    <div class="Heidelberg-Page first-page">
                        <img src="{{$bm->story_icon}}"
                             data-thumbnail-page="thumbnail-{{$i}}">
                    </div>
                    <div class="Heidelberg-Spread">
                        <img src="{{$tm1->story_icon}}"
                             data-thumbnail-page="thumbnail-{{$i}}">
                        <pre style="padding-left: 15px;" class="p-comic-message">Chào bé yêu!</pre>
                    </div>
                    <div class="Heidelberg-Spread">
                        <img src="{{$tm2->story_icon}}"
                             data-thumbnail-page="thumbnail-{{$i}}">
                    </div>
                    @foreach($stories as $story)
                        <?php
                        $story_images = json_decode($story[0]->story_images);
                        $j = 1;
                        ?>
                        @foreach($story_images as $image)
                            <div class="Heidelberg-Spread">
                                <img src="{{$image}}" class="image-{{$story[0]->story_id}}-{{$j}}"
                                     data-thumbnail-page="thumbnail-{{$i}}">
                                <input type="checkbox" class="hidden" name="comic_images[]" value="{{$image}}" checked>
                                <input type="checkbox" class="hidden class-story-{{$story[0]->story_id}}-present"
                                       name="comic_id_story_present[]" value="{{$story[0]->story_id}}" checked>
                            </div>
                            <?php $j++; ?>
                        @endforeach
                        <?php $i += 4; ?>
                    @endforeach
                    <div class="Heidelberg-Spread">
                        <img src="{{$tk->story_icon}}"
                             data-thumbnail-page="thumbnail-{{$i - 4}}">
                        <p class="p-comic-end-story"
                           @if(mb_strlen($comic_user) <= 6)
                           style="left:68%"
                           @else
                           style="left:65%"
                                @endif
                        >{{mb_strtoupper($comic_user)}}</p>
                    </div>
                    <div class="Heidelberg-Page last-page">
                        <img src="{{$bk->story_icon}}"
                             data-thumbnail-page="thumbnail-{{$i - 3}}">
                    </div>
                    <div class="Heidelberg-Page last-page">
                        <img src="theme/images/comic/transparent.bmp">
                    </div>
                </div>
            </div>
            {{--End preview image comic--}}
        </div>
        <div class="background-hiden">
        </div>
        {{--End preview comic--}}
        {{--Form info preview comic--}}
        <div class="cp-our-staff" id="info-preview-comic-name">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <input type="text" name="comic_user_validate" class="form-control input-lg"
                                   id="comic-user-create-form" placeholder="Tên"
                                   value="{{$comic_user}}">
                            <input type="hidden" name="comic_user" class="form-control input-lg" placeholder="Tên"
                                   value="{{$comic_user}}">
                            <span id="comic_user-error-character"
                                  style="display: none;">Bạn chỉ có thể nhập chữ !</span>
                            <span id="comic_user-error-character-same" style="display: none;">Xin lỗi tên bạn chỉ có thể có 2 ký tự giống nhau !</span>
                            <input type="text" name="product_sku" class="hidden" value="{{$product_sku}}">
                            <input type="text" name="comic_name" class="hidden" value="{{$comic->comic_name}}">
                            <input type="text" name="comic_id" class="hidden" value="{{$comic->comic_id}}">
                            <input type="text" name="comic_slug" class="hidden" value="{{$comic->comic_slug}}">
                            <input type="text" name="comic_featured" class="hidden" value="{{$comic->comic_featured}}">
                            <input type="text" name="comic_unit_price" class="hidden"
                                   value="{{$comic->comic_unit_price}}">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12" style="margin-bottom: 15px">
                        <div class="form-group">
                            <div class="btn-group" data-toggle="buttons" style="display:block;">
                                <label class="btn btn-lg btn-info col-sm-6 col-xs-6
                                @if($comic_gender == 'boy')
                                {{'active'}}
                                @endif
                                        ">
                                    <input type="radio" name="comic_gender" value="boy" class="toggle"
                                    @if($comic_gender == 'boy')
                                        {{'checked'}}
                                            @endif
                                    > Trai </label>
                                <label class="btn btn-lg btn-info col-sm-6 col-xs-6
                                @if($comic_gender == 'girl')
                                {{'active'}}
                                @endif
                                        ">
                                    <input type="radio" name="comic_gender" value="girl" class="toggle"
                                    @if($comic_gender == 'girl')
                                        {{'checked'}}
                                            @endif
                                    > Gái </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12" style="text-align: center;">
                        @if($number_change == 1)
                            <p>Bạn đã sửa dụng quá số lần thay đổi. Hãy like để tiếp tục sử dụng</p>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                Like FanPage
                            </button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Like FanPage</h4>
                                            {{--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>--}}
                                        </div>
                                        <div class="modal-body">
                                            <div class="fb-like "
                                                 data-href="https://developers.facebook.com/docs/plugins/"
                                                 data-layout="button" data-action="like" data-size="large"
                                                 data-show-faces="true" data-share="true"></div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary btn-save-info-comic"
                                                    form="preview-form"></button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy
                                                bỏ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <button type="button" form="preview-form"
                                    class="btn btn-info btn-lg btn-save-info-comic"
                                    style="display: block;width: 100%">Lưu thay đổi
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div id="info-preview-comic-message">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p style="color: #3a4d5f;font-weight: 600;font-size: 19px;margin-bottom: 15px;">Nhập lời nhắn
                            bạn muốn gửi đến người
                            đọc</p>
                        <p style="color: #5a6e73;font-size: 15px;"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 img-dear">
                        <img src="images/de-tang.jpg"
                             alt="">
                    </div>
                    <div class="col-md-6 col-sm-12 text-dear">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea name="comic_message" class="form-control textarea-comic-message" cols="30"
                                              rows="13">Gửi bạn thân mến !</textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <p>Tối đa 400 ký tự</p>
                            </div>
                            <div class="col-md-6 col-xs-12" style="text-align: right">
                                <button type="button" class="btn btn-info btn-lg btn-save-message-comic"
                                        style="display: block;width: 100%">Lưu thay đổi
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--End form info preview comic--}}
    </div>
    {!! Form::close() !!}
    {{--Form load lại truyện khi đổi tên--}}
    {!! Form::open(['action' => ['Frontend\ComicController@previewComic',$comic->comic_slug,$comic->comic_id,$product_sku], 'method' => 'GET', 'id'=> 'preview-form']) !!}
    <input type="hidden" name="comic_user" id="comic-user-preview-form" class="form-control input-lg"
           value="{{$comic_user}}">
    <input type="hidden" name="product_sku" class="form-control input-lg hidden" value="{{$product_sku}}">
    <input type="hidden" name="comic_gender" value="{{$comic_gender}}">
    <input type="hidden" name="number_change" id="number_change" value="{{$number_change}}">
    {!! Form::close() !!}
    {{--End form load lại truyện khi đổi tên--}}
    <div class="nav-info-preview-comic">
        {{--Nav info preview comic PC--}}
        <div class="cp-our-staff info-preview-comic hidden-xs hidden-sm">
            <div class="container">
                <div class="col-md-2 info-preview-comic-name nav-info-preview-comic-name">
                    <div>
                        <span>Tên</span>
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        <i class="fa fa-chevron-up" aria-hidden="true"></i>
                    </div>
                    <div>
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        <span style="color: #5a6e73;font-size: 18px;font-weight: 700;"
                              id="comic_user">{{$comic_user}}</span>
                    </div>
                </div>
                <div class="col-md-3 info-preview-comic-message nav-info-preview-comic-message">
                    <div>
                        <span>Lời nhắn</span>
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        <i class="fa fa-chevron-up" aria-hidden="true"></i>
                    </div>
                    <div>
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        <span style="color: #5a6e73;font-size: 18px;font-weight: 700;">Viết 1 đoạn</span>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-5 info-preview-comic-button">
                    <button style="border: 0" form="create-form" type="submit" class="readmore-bg">Tiếp tục</button>
                </div>
            </div>
        </div>
        {{--End nav info preview comic PC--}}
        {{--Nav info preview comic Mobile--}}
        <div class="cp-our-staff info-preview-comic info-preview-comic-mobile hidden-lg hidden-md">
            <div class="col-md-12 info-preview-comic-name nav-info-preview-comic-name">
                <div>
                    <span>Tên</span>
                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    <i class="fa fa-chevron-up" aria-hidden="true"></i>
                </div>
                <div>
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <span style="color: #5a6e73;font-size: 18px;font-weight: 700;"
                          id="comic_name">{{$comic_user}}</span>
                </div>
            </div>
            <div class="col-md-12 info-preview-comic-message nav-info-preview-comic-message">
                <div>
                    <span>Lời nhắn</span>
                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    <i class="fa fa-chevron-up" aria-hidden="true"></i>
                </div>
                <div>
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <span style="color: #5a6e73;font-size: 18px;font-weight: 700;">Viết 1 đoạn</span>
                </div>
            </div>
            <div class="col-md-12 info-preview-comic-button">
                <button class="btn btn-default btn-lg" form="create-form" type="submit"
                        style="border: 0.2rem solid #3a4d5f;display: block;width: 100%;">Lưu thay đổi
                </button>
            </div>
        </div>
        {{--End nav info preview comic Mobile--}}
    </div>
@endsection
@section('script')
    {{Html::script('theme/js/comic/prefixfree.js')}}
    {{Html::script('theme/js/comic/modernizr.js')}}
    {{Html::script('theme/js/comic/hammer.js')}}
    {{Html::script('theme/js/comic/jquery.hammer.js')}}
    {{Html::script('theme/js/comic/heidelberg.js')}}
    {{Html::script('theme/js/comic/prefixfree.js')}}
    {{Html::script('theme/js/comic/examples.js')}}
    {{Html::script('theme/js/comic/prism.js')}}

    <script>
        $(document).ready(function () {
            $(".fb-like").click(function () {
                alert('ok')
            });
        });


        $('.Heidelberg-Page,.jump,#previous,#next').click(function () {
            var check = $('.is-active').attr('class');
            if (check.indexOf('first-page') == -1 && check.indexOf('last-page') == -1) {
                $('.Heidelberg-Book').attr('style', 'left:0');
            }

            if (check.indexOf('first-page') != -1 && check.indexOf('last-page') == -1) {
                $('.Heidelberg-Book').attr('style', 'left:-25%');
                $('.jump').removeClass('active-word');
                $('.img-thumbnails-word').removeClass('active-thumbnail');
            }

            if (check.indexOf('last-page') != -1 && check.indexOf('first-page') == -1) {
                $('.Heidelberg-Book').attr('style', 'left:25%');
                $('.jump').removeClass('active-word');
                $('.img-thumbnails-word').removeClass('active-thumbnail');
            }
        });
        //Validator
        $("#create-form").validate({
            errorElement: 'span',
            errorClass: 'help-block',
            focusInvalid: false,
            rules: {
                'comic_user_validate': {
                    required: true,
                    minlength: 4,
                    maxlength: 12,
                    number: false
                },
                'comic_gender': {
                    required: true
                },
                'comic_message': {
                    required: true,
                    minlength: 10,
                    maxlength: 400
                }
            },
            messages: {
                'comic_user_validate': {
                    required: "Bạn chưa nhập tên",
                    minlength: "Xin lỗi tên bạn phải phải trên 4 kí tự !",
                    maxlength: "Xin lỗi tên bạn không được quá 12 kí tự !",
                    number: "Bạn chỉ có thể nhập chữ !"
                },
                'comic_gender': {
                    required: "Bạn chưa chọn giới tính !"
                },
                'comic_message': {
                    required: "Bạn chưa nhập lời nhắn truyện !",
                    minlength: "Xin lỗi lời nhắn của bạn phải trên 10 ký tự !",
                    maxlength: "Xin lỗi lời nhắn chỉ dài tối đa 400 ký tự !"
                }
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
                //Nếu tên hợp lệ thì gán tên mới vào form preview để load lại các trang truyện
                var comic_user = $('input[name=comic_user_validate]').val();
                $('#preview-form input[name=comic_user]').val(comic_user);
                comic_user = comic_user.charAt(0).toUpperCase() + comic_user.slice(1).toLowerCase();
                if (comic_user != "<?php echo $comic_user ?>") {
                    $('.btn-save-info-comic').attr('type', 'submit');
                }
            },
            errorPlacement: function (error, element) {
                element.closest('.form-group').append(error);
                $('.btn-save-info-comic').attr('type', 'button');
            }
        });
        $('input[name=comic_user_validate]').keyup(function () {
            var comic_user = $(this).val();
            //Biêu thức regex chỉ nhận khoảng trắng và các chữ cái
            var regex = "[^a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\\\\s]+$";
            if (comic_user.match(regex) != null) {
                $('#comic_user-error-character').attr('style', 'display:block');
                $('.btn-save-info-comic').addClass('disabled');
            } else {
                $('#comic_user-error-character').attr('style', 'display:none');
                $('.btn-save-info-comic').removeClass('disabled');
            }
            var obj = {};
            var repeats = [];
            $('#comic_user-error-character-same').attr('style', 'display:none');
            $('.btn-preview').removeClass('disabled');
            for (x = 0, length = comic_user.length; x < length; x++) {
                var l = comic_user.charAt(x).toUpperCase();
                obj[l] = (isNaN(obj[l]) ? 1 : obj[l] + 1);
            }
            $.each(obj, function (index, value) {
                if (value > 2) {
                    $('#comic_user-error-character-same').attr('style', 'display:block');
                    $('.btn-preview').addClass('disabled');
                }
            });

        });
        //End validator

        //Xử lí ajax khi thay đổi truyện của từng chữ cái
        $('.ajax-change-story').click(function () {
            var data_present = $(this).attr('data-story-present');
            var data_change = $(this).attr('data-story-change');
            var class_change_story = 'change-story-' + data_present;
            var class_present_story = 'change-story-' + data_change;
            $.ajax({
                url: "{{route('changeStory')}}",
                data: {
                    data_story_present: data_present,
                    data_story_change: data_change
                },
                success: function (data) {
                    var image_1 = '.image-' + data_present + '-1';
                    var image_2 = '.image-' + data_present + '-2';
                    $(image_1).next().val(data.image_change[0]);
                    $(image_2).next().val(data.image_change[1]);
                    $(image_1).attr('src', data.image_change[0]).addClass('image-' + data_change + '-1').removeClass('image-' + data_present + '-1');
                    $(image_2).attr('src', data.image_change[1]).addClass('image-' + data_change + '-2').removeClass('image-' + data_present + '-2');

                    $(".class-story-" + data_present + "-present").val(data.id_comic_present).addClass('class-story-' + data_change + '-present').removeClass('class-story-' + data_present + '-present');
                    $(".story-name-" + data_present).text(data.story_name_change);
                    $(".thumbnail-" + data_present).attr('src', data.story_icon_change);
                }
            });
            $("button[data-story-change=" + data_present + "]").removeClass('ajax-present-story').removeClass(class_change_story).text('Chọn');
            $("button[data-story-change=" + data_change + "]").addClass('ajax-present-story').addClass(class_present_story).text('Đã chọn');
            $("button[data-story-present=" + data_present + "]").attr('data-story-present', data_change);
            $(this).attr('data-story-present', data_change);
        });
        //End xử lí ajax

        //Ẩn hiện nút thay đổi + popover khi click
        $('.btn-change-story').click(function () {
            var popover = $(this).next().css('display');
            $(this).next().toggle();
        });
        $('.preview-comic').click(function () {
            //$('.btn-change-story').hide();
            $('.popover').hide();
        });
        //End ẩn hiện nút thay đổi + popover
        $('.textarea-comic-message').change(function () {
            var comic_message = $(this).val();
            $('.p-comic-message').html(comic_message);
        })
    </script>
@endsection