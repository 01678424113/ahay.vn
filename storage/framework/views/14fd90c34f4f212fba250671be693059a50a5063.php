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
            <div class="home-banner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner-container"><img src="<?php echo e(env('APP_URL')); ?>/theme/images/banner-bg.png" alt="">
                            <div class="banner-caption">
                                <h3>Newborn Collection
                                    Winter 2016</h3>
                                <h4>Now in store</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-listing">
                <ul class="row">
                    <?php if(count($products) > 0): ?>
                        <?php foreach($products as $product): ?>
                            <li class="col-md-3 col-sm-6">
                                <div class="pro-list">
                                    <?php /* <div class="saletag">Sale</div>*/ ?>
                                    <div class="thumb"><a
                                                href="<?php echo e(URL::action('Frontend\ProductController@detailsProduct',['category_slug'=>$product->category_slug,'product_slug'=>$product->product_slug,'product_id'=>$product->product_id])); ?>"><img
                                                    src="<?php echo e($product->product_featured); ?>" alt=""></a>
                                    </div>
                                    <div class="text">
                                        <div class="pro-name">
                                            <h4 style="height: 50px;"><?php echo e($product->product_name); ?> - <?php echo e($product->product_sku); ?></h4>
                                            <p class="price"><?php echo e(number_format($product->product_price)); ?> VND</p>
                                        </div>
                                    </div>
                                    <div class="cart-options">
                                        <a href="<?php echo e(URL::action('Frontend\ActionBuyController@buyProductNow',['product_sku'=>$product->product_sku])); ?>">
                                            <i class="fa fa-shopping-cart"></i>Mua ngay
                                        </a>
                                        <a class="add_to_cart" data-sku="<?php echo e($product->product_sku); ?>">
                                            <i class="fa fa-heart-o"></i>Yêu thích
                                        </a>
                                        <a href="<?php echo e(URL::action('Frontend\ProductController@detailsProduct',['category_slug'=>$product->category_slug,'product_slug'=>$product->product_slug,'product_id'=>$product->product_id])); ?>">
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
                    <?php endif; ?>
                </ul>
                <div class="paging">

                    <ul class="pagination">

                        <?php echo e($products->links()); ?>

                        <script>
                            window.onload = function () {
                                $('.disabled span').remove();
                                $('.disabled').append("<a href=\"#\" aria-label=\"Next\"> <span aria-hidden=\"true\"><i class=\"fa fa-angle-right\"></i></span> </a>");
                            };
                        </script>
                    </ul>
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
        $('.add_to_cart').click(function () {
            var product_sku = $(this).attr('data-sku');
            $.get('/truyentranh-2/public/add-to-cart/' + product_sku, function (data) {
                alert(data);
            })
        })

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>