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
            <div class="product-detail">
                <div class="row">
                    <div class="col-md-5">
                        <div class='zoom thumb' id='product-zoom'>
                            <img src="<?php echo e($product->product_featured); ?>" alt="">
                        </div>
                        <div class="row">
                            <div class="owl-carousel owl-theme">
                                <?php foreach(json_decode($product->product_images) as $images): ?>
                                    <img class="owl-lazy" src="<?php echo e($images); ?>"
                                         alt="">
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="text">
                            <h3><?php echo e($product->product_name); ?></h3>
                            <p><?php echo $product->product_description; ?></p>
                            <div class="price"><span>#105.36</span>VND <?php echo e(number_format($product->product_price)); ?></div>
                            <div class="item-detail">
                                <ul>
                                    <?php /* <li><span>Brand:</span>Children Store</li>*/ ?>
                                    <li><span>Mã sản phẩm: </span><?php echo e($product->product_sku); ?></li>
                                    <li><span>Trạng thái: </span>
                                        <?php if($product->product_status == 1): ?>
                                            <?php echo e("Còn hàng"); ?>

                                        <?php elseif($product->product_status == 0): ?>
                                            <?php echo e("Sắp có hàng"); ?>

                                        <?php else: ?>
                                            <?php echo e("Hết hàng"); ?>

                                        <?php endif; ?>
                                    </li>
                                    <li>
                                        <span>Loại sản phẩm:</span>
                                        <a href="#"><?php echo e($product->category_name); ?></a>
                                    </li>
                                </ul>

                                <div class="rating">
                                    <p>Đánh giá:</p>
                                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span></div>
                            </div>
                            <div class="quantity">
                                <form action="" method="get">
                                    <input type="text" name="product_sku" id="product_sku"
                                           value="<?php echo e($product->product_sku); ?>" style="display: none">
                                    <input type='number' name='quantity' value='0' class='qty'
                                           style="height: 34px;margin-right: 5px"/>
                                    <button type="submit" href="" class="btn btn-info">Thêm vào giỏ</button>
                                </form>
                            </div>
                            <div class="item-share">
                                <p>Chia sẻ:</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-listing">
                <ul class="row">
                    <?php foreach($related_products as $related_product): ?>
                        <li class="col-md-3 col-sm-6">
                            <div class="pro-list">
                                <?php /* <div class="saletag">Sale</div>*/ ?>
                                <div class="thumb"><a
                                            href="<?php echo e(URL::action('Frontend\ProductController@detailsProduct',['category_slug'=>$product->category_slug,'product_slug'=>$related_product->product_slug,'product_id'=>$related_product->product_id])); ?>"><img
                                                src="<?php echo e($related_product->product_featured); ?>" alt=""></a>
                                </div>
                                <div class="text">
                                    <div class="pro-name">
                                        <h4 style="height: 50px;"><?php echo e($related_product->product_name); ?>

                                            - <?php echo e($related_product->product_sku); ?></h4>
                                        <p class="price"><?php echo e(number_format($related_product->product_price)); ?> VND</p>
                                    </div>
                                    <p><?php echo e(str_limit($related_product->product_meta_title,30,'...')); ?></p>
                                </div>
                                <div class="cart-options">
                                    <a href="<?php echo e(URL::action('Frontend\ActionBuyController@buyProductNow',['product_sku'=>$related_product->product_sku])); ?>"
                                    >
                                        <i class="fa fa-shopping-cart"></i>Mua ngay
                                    </a>
                                    <a class="add_to_cart" data-sku="<?php echo e($related_product->product_sku); ?>">
                                        <i class="fa fa-heart-o"></i>Yêu thích
                                    </a>
                                    <a href="<?php echo e(URL::action('Frontend\ProductController@detailsProduct',['category_slug'=>$product->category_slug,'product_slug'=>$related_product->product_slug,'product_id'=>$related_product->product_id])); ?>">
                                        <i class="fa fa-search"></i>Chi tiết
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-share-alt"></i>Chia sẻ
                                    </a>
                                    <div class="rating">
                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span></div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
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
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 4,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true
        });
        $('.play').on('click', function () {
            owl.trigger('play.owl.autoplay', [1000])
        });
        $('.stop').on('click', function () {
            owl.trigger('stop.owl.autoplay')
        });

        $('.qty').change(function () {
            var quantity = $(this).val();
            var product_sku = $('#product_sku').val();
            $('.quantity form').attr('action', 'http://localhost/truyentranh-2/public/fix-quantity-product/' + product_sku + '/' + quantity);
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>