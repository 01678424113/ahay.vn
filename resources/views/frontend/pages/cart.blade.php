@extends('frontend.layout')
@section('main_content')
    <div class="inner-title">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="breadcrumb">
                        <li><a href="#">Trang chủ</a> <a href="#">{{$title}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="cp-page-content inner-page-content woocommerce">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-table">
                        <ul>
                            <li class="table-caps">
                                <div class="product">Sản phẩm</div>
                                <div class="detail">Chi tiết</div>
                                <div class="quantity">Số lượng</div>
                                <div class="price">Đơn giá</div>
                                <div class="price">Khuyến mại</div>
                                <div class="price">Giá cuối</div>
                                <div class="del">Xóa</div>
                            </li>
                            @if(count($products) > 0 )
                                @foreach($products as $product)
                                    @if(isset($product->product_id))
                                        <li>
                                            <div class="product"><a
                                                        href="{{URL::action('Frontend\ProductController@detailProduct',['product_slug'=>$product->product_slug,'product_id'=>$product->product_id])}}"><img
                                                            style="max-width: 100px" alt=""
                                                            src="{{$product->product_featured}}"></a></div>
                                            <div class="detail">
                                                <p>{{$product->product_name}}</p>
                                                <div class="rating">
                                                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                </div>
                                                <p>Mã sản phẩm: {{$product->product_sku}}</p>
                                            </div>
                                            <div class="quantity">
                                                <div class="quantity-2" style="display: flex;justify-content: center">
                                                    <input type="text" name="product_sku" class="product_sku"
                                                           value="{{$product->product_sku}}" style="display: none">
                                                    <input type="submit" value="+" style="height: 42px;"
                                                           class="ajax_increase_quantity">
                                                    <input type='number' min="0" name='quantity'
                                                           value='{{$product->quantity}}'
                                                           class='qty'/>
                                                    <input type="submit" value="-" style="height: 42px;"
                                                           class="ajax_decrease_quantity">
                                                </div>

                                            </div>
                                            <div class="price">
                                                <p>{{number_format($product->product_price)}} VND</p>
                                            </div>
                                            <div class="price">
                                                <p>{{number_format($product->product_price*$product->product_sale_percent/100)}}
                                                    VND</p>
                                            </div>
                                            <div class="price">
                                                <p>{{number_format($product->product_price - $product->product_price*$product->product_sale_percent/100)}}
                                                    VND</p>
                                            </div>
                                            <div class="del">
                                                <button type="button" class="close" data-toggle="modal"
                                                        data-target="#myModal-{{$product->product_sku}}">x
                                                </button>
                                            </div>
                                            <!-- Modal Delete Product -->
                                            <div id="myModal-{{$product->product_sku}}" class="modal fade"
                                                 role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Xóa sản phẩm</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Bạn có chắc chắn muốn xóa sản phẩm này.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{URL::action('Frontend\ActionBuyController@deleteProductToCart')}}"
                                                                  method="post"
                                                                  id="delete_product_{{$product->product_sku}}">
                                                                <input type="hidden" name="_token"
                                                                       value="{{ csrf_token() }}">
                                                                <input type="hidden" name="del_product_sku"
                                                                       value="{{$product->product_sku}}">
                                                            </form>
                                                            <button class="btn btn-danger"
                                                                    form="delete_product_{{$product->product_sku}}"
                                                                    type="submit">Xóa
                                                            </button>
                                                            <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Đóng
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @elseif(isset($product->comic_name))
                                        <li>
                                            <div class="product"><a
                                                        href="{{URL::action('Frontend\ComicController@editComic',['comic_slug'=>$product->comic_slug,'comic_id'=>$product->comic_id,'product_sku'=>$product->product_sku])}}"><img
                                                            style="max-width: 100px" alt=""
                                                            src="{{$product->comic_featured}}"></a></div>

                                            <div class="detail">
                                                <p>{{mb_strtoupper($product->comic_user)}}</p>
                                                <p style="font-size: 18px;font-weight: 600;">@foreach(json_decode($product->comic_name_story_present) as $word)
                                                        {{mb_substr($word,0,1)}}
                                                        <small style="font-size: 11px;">{{mb_substr($word,1,1)}}</small>
                                                    @endforeach</p>
                                                <div class="rating">
                                                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                </div>
                                                <p class="hidden">Mã sản phẩm: {{$product->product_sku}}</p>
                                                <a href="{{URL::action('Frontend\ComicController@editComic',['comic_slug'=>$product->comic_slug,'comic_id'=>$product->comic_id,'product_sku'=>$product->product_sku])}}">Click
                                                    để sửa</a>
                                            </div>

                                            <div class="quantity">
                                                <div class="quantity-2">
                                                    <input type="hidden" name="product_sku" class="product_sku"
                                                           value="{{$product->product_sku}}">
                                                    {{--  <input type="submit" value="+" style="height: 42px;"
                                                             class="ajax_increase_quantity">--}}
                                                    <input type='hidden' name='quantity'
                                                           value='1'
                                                           class='qty'/>
                                                    <p>1</p><br>
                                                    <form action="{{route('buyMoreComic')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="product_sku"
                                                               value="{{$product->product_sku}}">
                                                        <input type="submit" value="Click để mua thêm"
                                                               style="border: 0;background: transparent;color: #0CA2C0;cursor: pointer;">
                                                    </form>
                                                    {{--  <input type="submit" value="-" style="height: 42px;"
                                                             class="ajax_decrease_quantity">--}}
                                                </div>

                                            </div>

                                            <div class="price">
                                                <p>{{number_format($product->product_price)}} VND</p>
                                            </div>


                                            <div class="price">
                                                <p>{{number_format($product->product_sale_percent)}}
                                                    VND</p>
                                            </div>

                                            <div class="price">
                                                <p>{{number_format($product->product_price - $product->product_sale_percent)}}
                                                    VND</p>
                                            </div>

                                            <div class="del">
                                                <button type="button" class="close" data-toggle="modal"
                                                        data-target="#myModal-{{$product->product_sku}}">x
                                                </button>
                                            </div>

                                            <!-- Modal Delete Product -->
                                            <div id="myModal-{{$product->product_sku}}" class="modal fade"
                                                 role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Xóa sản phẩm</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Bạn có chắc chắn muốn xóa sản phẩm này.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{URL::action('Frontend\ActionBuyController@deleteProductToCart')}}"
                                                                  method="post"
                                                                  id="delete_product_{{$product->product_sku}}">
                                                                <input type="hidden" name="_token"
                                                                       value="{{ csrf_token() }}">
                                                                <input type="hidden" name="del_product_sku"
                                                                       value="{{$product->product_sku}}">
                                                            </form>
                                                            <button class="btn btn-danger"
                                                                    form="delete_product_{{$product->product_sku}}"
                                                                    type="submit">Xóa
                                                            </button>
                                                            <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Đóng
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach

                            @endif
                        </ul>
                        <div class="update-cart">

                        </div>
                    </div>
                    @if(session('order_successfully'))
                        <div class="" style="text-align: center">
                            <div class="alert alert-warning hidden-xs" style="color: #32b1c4">
                                <img src="images/chuc-mung.png" alt="">
                                <div style="position: absolute;max-width: 550px;margin: auto;left: 25%;top: 30%;right:25%">
                                    <p style="margin-bottom: 4px"><strong>Đơn hàng của bạn đã được đặt thành
                                            công.</strong></p>
                                    <p><strong>Chúng tôi sẽ nhanh chóng liên lạc lại với bạn để xác nhận.</strong></p>
                                    <h4>Mã đơn hàng của bạn là: <strong>{{session('order_successfully')}}</strong></h4>
                                    <p><strong>Lưu ý: </strong>Quý khách ghi rõ mã đơn hàng vào nội dung khi chuyển
                                        khoản thanh toán để tránh xảy ra nhầm lẫn giữa các đơn hàng!</p>
                                </div>
                            </div>
                        </div>
                        <div class="" style="text-align: center">
                            <div class="alert alert-warning hidden-lg hidden-md hidden-sm" style="color: #32b1c4">
                                <p style="margin-bottom: 4px"><strong>Đơn hàng của bạn đã được đặt thành công.</strong>
                                </p>
                                <p><strong>Chúng tôi sẽ nhanh chóng liên lạc lại với bạn để xác nhận.</strong></p>
                                <h4>Mã đơn hàng của bạn là: <strong>{{session('order_successfully')}}</strong></h4>
                                <p><strong>Lưu ý: </strong>Quý khách ghi rõ mã hóa đơn vào nội dung khi chuyển khoản
                                    thanh toán để tránh xảy ra nhầm lẫn giữa các đơn hàng!</p>
                            </div>
                            <a href="{{URL::action('Frontend\ProductController@listProducts')}}" class="btn btn-info">Click
                                để tiếp tục mua hàng</a>
                        </div>
                        <div class="col-md-12">
                            <div class="row alert alert-info" style="margin-top: 20px">
                                <div class="col-md-12">
                                    <p style="text-align: center;font-size: 20px">Xin vui lòng thanh toán vào một trong
                                        những tài khoản sau:</p>
                                    <div class="col-md-4">
                                        <strong>Tài khoản BIDV</strong>
                                        <p>Số: 1234459845646</p>
                                        <p>Tên: Nguyễn Văn A</p>
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Tài khoản VCB</strong>
                                        <p>Số: 1234459845646</p>
                                        <p>Tên: Nguyễn Văn B</p>
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Tài khoản ACB</strong>
                                        <p>Số: 1234459845646</p>
                                        <p>Tên: Nguyễn Văn C</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @else
                        <div class="row">
                            <form action="{{URL::action('Frontend\ActionBuyController@saveOrder')}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="woocommerce-cart-options">
                                    <div class="col-md-8 col-sm-12" style="margin-bottom: 15px">
                                        <h4>Địa chỉ giao hàng</h4>
                                        <div class="cart-steps">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4>Email</h4>
                                                    <input type="email" name="order_email" class="input-block-level">
                                                    <h4>Tên người mua</h4>
                                                    <input type="text" name="order_name" class="input-block-level"
                                                           required>
                                                    <h4>Số điện thoại</h4>
                                                    <input type="number" class="input-block-level" name="order_phone"
                                                           required>
                                                </div>
                                                <div class="col-md-6">
                                                    <h4>Tỉnh</h4>
                                                    <input type="text" name="order_country" class="input-block-level"
                                                           required>
                                                    <h4>Quận/Huyện</h4>
                                                    <input type="text" name="order_district" class="input-block-level"
                                                           required>
                                                    <h4>Phường/Xã</h4>
                                                    <input type="text" name="order_ward" class="input-block-level"
                                                           required>
                                                </div>
                                                <div class="col-md-12">
                                                    <h4>Địa chỉ cụ thể ( Có số nhà, ngõ,...)</h4>
                                                    <textarea class="input-block-level" name="details_address"
                                                              rows="3" required></textarea>
                                                    {{--<button class="btn-style">Get a Quote</button>--}}
                                                    <label for="">Chúng tôi sẽ liên hệ quý khách
                                                        theo số điện thoại này để xác nhận
                                                        hoặc thông báo giao hàng</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <h4>Thanh toán</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="cart-steps" style="text-align: center">
                                                    <table>
                                                        @if(isset($_COOKIE['order_total_price']))
                                                            <tr class="grand-totle">
                                                                <td><h4 style="font-size: 23px;margin: 0">Tổng tiền</h4>
                                                                </td>
                                                                <td id="order_total_price">{{number_format($_COOKIE['order_total_price'])}}
                                                                    VND
                                                                </td>
                                                                <input type="hidden" name="order_total_price"
                                                                       value="{{$_COOKIE['order_total_price']}}">
                                                            </tr>
                                                        @else
                                                            <tr class="grand-totle">
                                                                <td><h4 style="font-size: 23px">Tổng tiền</h4></td>
                                                                <td id="order_total_price">0
                                                                    VND
                                                                </td>
                                                                <input type="hidden" name="order_total_price"
                                                                       value="">
                                                            </tr>
                                                        @endif
                                                    </table>
                                                    <button type="submit" style="font-size: 19px;font-family: inherit;"
                                                            class="btn-style input-block-level">Chấp
                                                        nhận
                                                    </button>
                                                    <div style="margin-top: 20px">
                                                        <strong>Thanh toán trước qua chuyển khoản</strong>
                                                        <label for="">Miễn phí vận chuyển với đơn hàng
                                                            từ 300.000đ trở lên. Với đơn hàng
                                                            dưới 300.000đ xin vui lòng cộng
                                                            thêm 30.000 phí vận chuyển.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('frontend.widgets.newsletter')
@endsection
@section('script')
    <script>
        $('.ajax_increase_quantity').click(function () {
            var product_sku = $(this).closest('.quantity-2').children('.product_sku').val();
            var quantity = $(this).closest('.quantity-2').children('.qty').val();
            quantity = parseInt(quantity) + 1;
            $(this).closest('.quantity-2').children('.qty').val(quantity);
            $.ajax({
                url: 'http://ahay.vn/san-pham/ajax-fix-quantity-product/' + product_sku + '/' + quantity,
                success: function (result) {
                    console.log(result);
                    $('#order_total_price').text(result.order_total_price + " VND");
                }
            });
        });
        $('.ajax_decrease_quantity').click(function () {
            var product_sku = $(this).closest('.quantity-2').children('.product_sku').val();
            var quantity = $(this).closest('.quantity-2').children('.qty').val();
            quantity = parseInt(quantity) - 1;
            var delete_product = "#delete_product_" + product_sku;
            if (quantity < 1) {
                $(delete_product).submit();
            }
            $(this).closest('.quantity-2').children('.qty').val(quantity);
            $.ajax({
                url: 'http://ahay.vn/san-pham/ajax-fix-quantity-product/' + product_sku + '/' + quantity,
                success: function (result) {
                    console.log(result.order_total_price);
                    $('#order_total_price').text(result.order_total_price + " VND");
                }
            });
        });
        $('.qty').change(function () {
            var product_sku = $(this).closest('.quantity-2').children('.product_sku').val();
            var quantity = $(this).closest('.quantity-2').children('.qty').val();
            var delete_product = "#delete_product_" + product_sku;
            if (quantity < 1) {
                $(delete_product).submit();
            }
            $.ajax({
                url: 'http://ahay.vn/san-pham/ajax-fix-quantity-product/' + product_sku + '/' + quantity,
                success: function (result) {
                    console.log(result.order_total_price);
                    $('#order_total_price').text(result.order_total_price + " VND");
                }
            });
        })
    </script>
@endsection