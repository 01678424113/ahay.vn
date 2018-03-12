@extends('frontend.layout')
@section('style')
    {{Html::style('theme/css/slick.css')}}
    <style>
        .slider-nav .slick-slide {
            cursor: pointer;
            padding: 0 5px;
        }

        .slider-nav * {
            outline: none !important;
        }

        .slider-nav .slick-center img {
            border: 2px solid #ff870a;
        }
    </style>
@endsection
@section('main_content')
    <div class="inner-title">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Trang chủ</a> <a href="#">Truyện tranh</a> <a href="#">{{$title}}</a></li>
            </ul>
        </div>
    </div>
    <div class="cp-page-content inner-page-content woocommerce" style="padding: 30px 0">
        <div class="container">
            <div class="product-detail" style="margin: 0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="slider slider-for" style="display: none; margin-bottom: 15px">
                            @foreach($comic->comic_images as $img)
                                <div>
                                    <img class="thumb" src="{{ env('APP_URL') . $img}}"
                                         alt="{{ $comic->comic_meta_title }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="slider slider-nav" style="display: none;">
                            @foreach($comic->comic_images as $img)
                                <div>
                                    <img src="{{ env('APP_URL') . $img}}" alt="{{ $comic->comic_meta_title }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text">
                            <h3 style="color: #e7521d">{!! $comic->comic_name !!}</h3>
                            <pre class="pre-comic-content"
                                 style="font-size: 17px!important;color: #333">{!! $comic->comic_description !!}</pre>
                            <div class="item-detail">
                                <div class="rating">
                                    <p>Đánh giá:</p>
                                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                </div>
                            </div>
                            <div class="item-share">
                                @include('frontend.widgets.buttonSocial')
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="cp-our-staff" style="padding: 15px 0;background: #f2f2f2;">
        <div class="container">
            {!! Form::open(['action' => ['Frontend\ComicController@previewComic',$comic->comic_slug,$comic->comic_id,$product_sku], 'method' => 'GET', 'id'=> 'preview-form']) !!}
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <input type="text" name="comic_user" class="form-control input-lg"
                               placeholder="Tên">
                        <input type="text" name="product_sku" class="form-control input-lg hidden"
                               value="{{$product_sku}}">
                        <input type="hidden" name="number_change" value="4">
                        <span id="comic_user-error-character" style="display: none;">Bạn chỉ có thể nhập chữ !</span>
                        <span id="comic_user-error-character-same" style="display: none;">Xin lỗi tên bạn chỉ có thể có 2 ký tự giống nhau !</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12" style="margin-bottom: 15px">
                    <div class="form-group">
                        <div data-toggle="buttons" style="display:block;">
                            <label class="btn btn-lg btn-info active" style="float:left;padding: 10px 18px;"
                                   disabled="">
                                <input type="radio" name="comic_gender" value="boy" checked class="toggle"> Trai
                            </label>
                            <label class="btn btn-lg btn-info" style="float:right;padding: 10px 18px;">
                                <input type="radio" name="comic_gender" value="girl" class="toggle"> Gái </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12" style="text-align: center;">
                    <button role="button" type="submit" class="btn btn-info btn-lg btn-preview" style="border: 0">Xem
                        trước
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    @php($i = 1)
    @foreach($comic->comic_content as $content)
        @if($content->content_title != "")
            <div class="cp-home-welcome">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 {{ $i % 2 == 0 ? 'col-md-push-6' : ''}}">
                            <img src="{{ env('APP_URL') . $content->content_image }}"
                                 alt="{{ $content->content_title }}">
                        </div>
                        <div class="col-md-6 {{ $i % 2 == 0 ? 'col-md-pull-6' : ''}}">
                            <div class="welcome-content">
                                <h3>{!! $content->content_title !!}</h3>
                                <pre class="pre-comic-content">{!! $content->content_text !!}</pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php($i++)
        @endif
    @endforeach
    <div class="banner">
        <img src="{{$banner->image}}" alt="" style="width: 100%;height: 130px;">
    </div>
    {{--Reviews customer--}}
    <div class="container" style="margin-top: 30px;">
        <div class="reviews">
            <div class="row">
                <div class="col-md-6">
                    <h3>Cảm nhận của độc giả</h3>
                </div>
                <div class="col-md-6">
                    <div class="rating">
                        <p>9.8/10</p>
                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            @if(count($reviews) > 0)
                                @foreach($reviews as $review)
                                    <div class="row" style="padding-top: 30px;padding-bottom: 20px;">
                                        <div class="col-md-3">
                                            <div class="rating" style="float: left;">
                                                <span style="float: inherit">☆</span><span
                                                        style="float: inherit">☆</span><span
                                                        style="float: inherit">☆</span><span
                                                        style="float: inherit">☆</span><span
                                                        style="float: inherit">☆</span>
                                                <p>{{$review->review_name}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <h4>{{$review->review_title}}</h4>
                                            <p>{{$review->review_content}}</p>
                                        </div>
                                    </div>
                                    <hr style="color: #ddd">
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="text-align: center;padding-top: 10px;padding-bottom: 30px;">
                    <button
                            class="btn btn-info btn-lg button-create-comic-bot">Tạo câu chuyện
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--End review customer--}}
    {{--Story relative--}}
    <div class="story-relative">
        <div class="row" style="max-width: 900px;margin: auto">
            <div class="col-md-12" style="text-align: center">
                <h4 style="font-size: 30px;padding-bottom: 40px;">Những sản phẩm tuyệt vời khác !</h4>
            </div>
            @if(count($comic_suggest) > 0)
                @foreach($comic_suggest as $item)
                    <div class="col-md-4 col-xs-6" style="margin-bottom: 15px;">
                        <a href="{{ URL::action('Frontend\ComicController@detailComic', ['comic_slug' => $item->comic_slug, 'comic_id' => $item->comic_id]) }}"><img
                                    style="background: white;border-radius: 5px;height: 220px;margin-bottom: 10px;"
                                    src="{{$item->comic_featured}}"
                                    alt=""></a>
                        <h5 style="text-align: center;font-size: 20px;height: 50px;"><a style="color: #e7521d"
                                    href="{{ URL::action('Frontend\ComicController@detailComic', ['comic_slug' => $item->comic_slug, 'comic_id' => $item->comic_id]) }}">{{str_limit($item->comic_name,40,'...')}}</a>
                        </h5>
                    </div>
                @endforeach
            @endif
            @if(count($product_suggest) > 0)
                @foreach($product_suggest as $item)
                    <div class="col-md-4 col-xs-6" style="margin-bottom: 15px;">
                        <a href="{{URL::action('Frontend\ProductController@detailProduct',['product_slug'=>$item->product_slug,'product_id'=>$item->product_id])}}"><img
                                    style="background: white;border-radius: 5px;height: 220px;margin-bottom: 10px;"
                                    src="{{$item->product_featured}}"
                                    alt=""></a>
                        <h5 style="text-align: center;font-size: 20px;height: 50px;"><a style="color: #e7521d"
                                    href="{{URL::action('Frontend\ProductController@detailProduct',['product_slug'=>$item->product_slug,'product_id'=>$item->product_id])}}">{{str_limit($item->product_name,40,'...')}}</a>
                        </h5>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
    {{--End story relative--}}
    @include('frontend.widgets.newsletter')
@endsection
@section('script')
    {{Html::script('theme/js/slick.js')}}
    <script>
        $('.button-create-comic-bot').click(function () {
            $('html, body').animate({
                scrollTop: 100
            }, 1000);
        });
        //Validator
        $("#preview-form").validate({
            errorElement: 'span',
            errorClass: 'help-block',
            focusInvalid: false,
            rules: {
                'comic_user': {
                    required: true,
                    minlength: 4,
                    maxlength: 12,
                    number: false
                },
                'comic_gender': "required"
            },
            messages: {
                'comic_user': {
                    required: "Bạn chưa nhập tên",
                    minlength: "Xin lỗi tên bạn phải phải trên 4 kí tự !",
                    maxlength: "Xin lỗi tên bạn không được quá 12 kí tự !",
                    number: "Bạn chỉ có thể nhập chữ !"
                },
                'comic_gender': {
                    required: "Bạn chưa chọn giới tính !"
                }
            }
        });
        $('input[name=comic_user]').focusout(function () {
            var comic_user = $(this).val();
            //Biêu thức regex chỉ nhận khoảng trắng và các chữ cái
            var regex = "[^a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\\\\s]+$";
            console.log(comic_user.match(regex));
            if (comic_user.match(regex) != null) {
                $('#comic_user-error-character').attr('style', 'display:block');
                $('.btn-preview').addClass('disabled');
            } else {
                $('#comic_user-error-character').attr('style', 'display:none');
                $('.btn-preview').removeClass('disabled');
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

        $(document).ready(function () {
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav'
            });
            $('.slider-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: false,
                centerMode: true,
                arrows: false,
                focusOnSelect: true
            });
            $('.slider-for, .slider-nav').show();
        });
    </script>
@endsection