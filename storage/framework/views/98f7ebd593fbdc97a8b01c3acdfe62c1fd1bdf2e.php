<?php $__env->startSection('main_content'); ?>
    <div class="inner-title">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="breadcrumb">
                        <li><a href="#">Trang chủ</a> <a href="#"><?php echo e($title); ?></a></li>
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
                                <div class="price">Đơn giá</div>
                                <div class="quantity">Số lượng</div>
                                <div class="del">Xóa</div>
                            </li>
                            <?php if(count($products) > 0 ): ?>
                                <?php foreach($products as $product): ?>
                                    <?php if(isset($product->product_id)): ?>
                                        <li>
                                            <div class="product"><a
                                                        href="<?php echo e(URL::action('Frontend\ProductController@detailProduct',['product_slug'=>$product->product_slug,'product_id'=>$product->product_id])); ?>"><img
                                                            style="max-width: 100px" alt=""
                                                            src="<?php echo e($product->product_featured); ?>"></a></div>
                                            <div class="detail">
                                                <p><?php echo e($product->product_name); ?></p>
                                                <div class="rating">
                                                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                </div>
                                                <p>Mã sản phẩm: <?php echo e($product->product_sku); ?></p>
                                            </div>
                                            <div class="price">
                                                <p><?php echo e(number_format($product->product_price)); ?> VND</p>
                                            </div>
                                            <div class="quantity">
                                                <div class="quantity-2" style="display: flex;justify-content: center">
                                                    <input type="text" name="product_sku" class="product_sku"
                                                           value="<?php echo e($product->product_sku); ?>" style="display: none">
                                                    <input type="submit" value="+" style="height: 42px;"
                                                           class="ajax_increase_quantity">
                                                    <input type='number' min="0" name='quantity'
                                                           value='<?php echo e($product->quantity); ?>'
                                                           class='qty'/>
                                                    <input type="submit" value="-" style="height: 42px;"
                                                           class="ajax_decrease_quantity">
                                                </div>

                                            </div>
                                            <div class="del">
                                                <button type="button" class="close" data-toggle="modal"
                                                        data-target="#myModal-<?php echo e($product->product_sku); ?>">x
                                                </button>
                                            </div>
                                            <!-- Modal Delete Product -->
                                            <div id="myModal-<?php echo e($product->product_sku); ?>" class="modal fade"
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
                                                            <form action="<?php echo e(URL::action('Frontend\ActionBuyController@deleteProductToCart')); ?>"
                                                                  method="post"
                                                                  id="delete_product_<?php echo e($product->product_sku); ?>">
                                                                <input type="hidden" name="_token"
                                                                       value="<?php echo e(csrf_token()); ?>">
                                                                <input type="hidden" name="del_product_sku"
                                                                       value="<?php echo e($product->product_sku); ?>">
                                                            </form>
                                                            <button class="btn btn-danger"
                                                                    form="delete_product_<?php echo e($product->product_sku); ?>"
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
                                    <?php elseif(isset($product->comic_name)): ?>
                                        <li>
                                            <div class="product"><a
                                                        href="<?php echo e(URL::action('Frontend\ComicController@editComic',['comic_slug'=>$product->comic_slug,'comic_id'=>$product->comic_id,'product_sku'=>$product->product_sku])); ?>"><img
                                                            style="max-width: 100px" alt=""
                                                            src="<?php echo e($product->comic_featured); ?>"></a></div>
                                            <div class="detail">
                                                <p><?php echo e($product->comic_name); ?></p>
                                                <p><?php echo e($product->comic_user); ?></p>
                                                <div class="rating">
                                                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                </div>
                                                <p>Mã sản phẩm: <?php echo e($product->product_sku); ?></p>
                                            </div>
                                            <div class="price">
                                                <p><?php echo e(number_format($product->product_price)); ?> VND</p>
                                            </div>
                                            <div class="quantity">
                                                <div class="quantity-2" style="display: flex;justify-content: center">
                                                    <input type="text" name="product_sku" class="product_sku"
                                                           value="<?php echo e($product->product_sku); ?>" style="display: none">
                                                    <input type="submit" value="+" style="height: 42px;"
                                                           class="ajax_increase_quantity">
                                                    <input type='number' min="0" name='quantity'
                                                           value='<?php echo e($product->quantity); ?>'
                                                           class='qty'/>
                                                    <input type="submit" value="-" style="height: 42px;"
                                                           class="ajax_decrease_quantity">
                                                </div>

                                            </div>
                                            <div class="del">
                                                <button type="button" class="close" data-toggle="modal"
                                                        data-target="#myModal-<?php echo e($product->product_sku); ?>">x
                                                </button>
                                            </div>
                                            <!-- Modal Delete Product -->
                                            <div id="myModal-<?php echo e($product->product_sku); ?>" class="modal fade"
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
                                                            <form action="<?php echo e(URL::action('Frontend\ActionBuyController@deleteProductToCart')); ?>"
                                                                  method="post"
                                                                  id="delete_product_<?php echo e($product->product_sku); ?>">
                                                                <input type="hidden" name="_token"
                                                                       value="<?php echo e(csrf_token()); ?>">
                                                                <input type="hidden" name="del_product_sku"
                                                                       value="<?php echo e($product->product_sku); ?>">
                                                            </form>
                                                            <button class="btn btn-danger"
                                                                    form="delete_product_<?php echo e($product->product_sku); ?>"
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
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            <?php endif; ?>
                        </ul>
                        <div class="update-cart">

                        </div>
                    </div>

                    <?php if(session('order_successfully')): ?>
                        <div class="" style="text-align: center">
                            <div class="alert alert-info">
                                <?php echo e(session('order_successfully')); ?>

                            </div>
                            <a href="<?php echo e(URL::action('Frontend\ProductController@listProducts')); ?>" class="btn btn-info">Click
                                để tiếp tục mua hàng</a>
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <form action="<?php echo e(URL::action('Frontend\ActionBuyController@saveOrder')); ?>" method="post">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <div class="woocommerce-cart-options">
                                    <div class="col-md-8">

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
                                                    <select class="input-block-level" name="order_country">
                                                        <option value="Hà Nội">Hà Nội</option>
                                                    </select>
                                                    <h4>Quận/Huyện</h4>
                                                    <select class="input-block-level" name="order_district">
                                                        <option value="Cầu Giấy">Cầu Giấy</option>
                                                    </select>
                                                    <h4>Phường/Xã</h4>
                                                    <select class="input-block-level" name="order_ward">
                                                        <option value="Hoàng Quốc Việt">Hoàng Quốc Việt</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <h4>Địa chỉ cụ thể ( Có số nhà, ngõ,...)</h4>
                                                    <textarea class="input-block-level" name="details_address"
                                                              rows="3"></textarea>
                                                    <?php /*<button class="btn-style">Get a Quote</button>*/ ?>
                                                    <label for="">Chúng tôi sẽ liên hệ quý khách
                                                        theo số điện thoại này để xác nhận
                                                        hoặc thông báo giao hàng</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <h4>Thanh toán</h4>
                                        <div class="cart-steps">
                                            <table>
                                                <tr class="sub-totle">
                                                    <td><h4>Phí vận chuyển</h4></td>
                                                    <td>$10,000.00</td>
                                                </tr>
                                                <?php if(isset($_COOKIE['order_total_price'])): ?>
                                                    <tr class="grand-totle">
                                                        <td><h4 style="font-size: 23px">Tổng tiền</h4></td>
                                                        <td id="order_total_price"><?php echo e(number_format($_COOKIE['order_total_price'])); ?>

                                                            VND
                                                        </td>
                                                        <input type="hidden" name="order_total_price"
                                                               value="<?php echo e($_COOKIE['order_total_price']); ?>">
                                                    </tr>
                                                <?php else: ?>
                                                    <tr class="grand-totle">
                                                        <td><h4 style="font-size: 23px">Tổng tiền</h4></td>
                                                        <td id="order_total_price">0
                                                            VND
                                                        </td>
                                                        <input type="hidden" name="order_total_price"
                                                               value="">
                                                    </tr>
                                                <?php endif; ?>
                                            </table>
                                            <button type="submit" class="btn-style input-block-level">Chấp nhận</button>
                                            <label for="">Miễn phí vận chuyển với đơn hàng
                                                từ 300.000đ trở lên. Với đơn hàng
                                                dưới 300.000đ xin vui lòng cộng
                                                thêm 30.000 phí vận chuyển</label>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="cp-home-newsletter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Want to hear more story,subscribe for our newsletter</h3>
                    <a class="subscribe-button" href="#">Subscribe</a></div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('.ajax_increase_quantity').click(function () {
            var product_sku = $(this).closest('.quantity-2').children('.product_sku').val();
            var quantity = $(this).closest('.quantity-2').children('.qty').val();
            quantity = parseInt(quantity) + 1;
            $(this).closest('.quantity-2').children('.qty').val(quantity);
            $.ajax({
                url: 'http://localhost/truyentranh-2/public/san-pham/ajax-fix-quantity-product/' + product_sku + '/' + quantity,
                headers: {
                    Accept : "text/plain; charset=utf-8",
                    "Content-Type": "text/plain; charset=utf-8"
                },
                method: "get",
                xhrFields: {
                    withCredentials: true
                },
                crossDomain: true,
                data: {},
                dataType: "json",
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
                url: 'http://localhost/truyentranh-2/public/san-pham/ajax-fix-quantity-product/' + product_sku + '/' + quantity,
                xhrFields: {
                    withCredentials: true
                },
                crossDomain: true,
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
                url: 'http://localhost/truyentranh-2/public/san-pham/ajax-fix-quantity-product/' + product_sku + '/' + quantity,
                xhrFields: {
                    withCredentials: true
                },
                crossDomain: true,
                success: function (result) {
                    console.log(result.order_total_price);
                    $('#order_total_price').text(result.order_total_price + " VND");
                }
            });
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>