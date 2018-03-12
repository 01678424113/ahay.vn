<?php $__env->startSection('main_content'); ?>
    <div class="main-slider hidden-sm hidden-xs">
        <ul class="cp-child-slider">
            <li><img src="<?php echo e(env('APP_URL')); ?>/theme/images/mslider1.jpg" alt=""/>
                <div class="caption">
                    <div class="container">
                        <div class="slider-data">
                            <h2>Play is the highest <br>
                                form of research</h2>
                            <a class="shopping-button" href="#">Shop Now</a></div>
                    </div>
                </div>
            </li>
            <li><img src="<?php echo e(env('APP_URL')); ?>/theme/images/mslider2.jpg" alt=""/>
                <div class="caption">
                    <div class="container">
                        <div class="slider-data">
                            <h2>Every Thing you can <br>
                                imagine is real</h2>
                            <a class="shopping-button" href="#">Shop Now</a></div>
                    </div>
                </div>
            </li>
            <li><img src="<?php echo e(env('APP_URL')); ?>/theme/images/mslider3.jpg" alt=""/>
                <div class="caption">
                    <div class="container">
                        <div class="slider-data">
                            <h2>Some first steps are <br>
                                bigger than others.</h2>
                            <a class="shopping-button" href="#">Shop Now</a></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="cp-page-content">
        <?php ($i = 1); ?>
        <?php foreach($comics as $comic): ?>
            <div class="cp-home-welcome">
                <div class="container">
                    <?php if($i == 1): ?>
                        <h2 class="sec-title">Sản phẩm nổi bật</h2>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-6 <?php echo e($i % 2 == 0 ? 'col-md-push-6' : ''); ?>">
                            <img src="<?php echo e(env('APP_URL') . $comic->comic_featured); ?>"
                                 alt="<?php echo e($comic->comic_meta_title); ?>">
                        </div>
                        <div class="col-md-6 <?php echo e($i % 2 == 0 ? 'col-md-pull-6' : ''); ?>">
                            <div class="welcome-content">
                                <h3><?php echo $comic->comic_name; ?></h3>
                                <p><?php echo $comic->comic_description; ?></p>
                                <a href="<?php echo e(URL::action('Frontend\ComicController@detailComic', ['comic_slug' => $comic->comic_slug, 'comic_id' => $comic->comic_id])); ?>" class="readmore-bg">Tạo câu chuyện</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php ($i++); ?>
        <?php endforeach; ?>
        <?php foreach($products as $product): ?>
            <div class="cp-home-welcome">
                <div class="container">
                    <?php if($i == 1): ?>
                        <h2 class="sec-title">Sản phẩm nổi bật</h2>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-6 <?php echo e($i % 2 == 0 ? 'col-md-push-6' : ''); ?>">
                            <img src="<?php echo e(env('APP_URL') . $product->product_featured); ?>"
                                 alt="<?php echo e($product->product_meta_title); ?>">
                        </div>
                        <div class="col-md-6 <?php echo e($i % 2 == 0 ? 'col-md-pull-6' : ''); ?>">
                            <div class="welcome-content">
                                <h3><?php echo $product->product_name . ' - ' . $product->product_sku; ?></h3>
                                <p><?php echo $product->product_description; ?></p>
                                <a href="<?php echo e(URL::action('Frontend\ProductController@detailProduct', ['product_slug' => $product->product_slug, 'product_id' => $product->product_id])); ?>" class="readmore-bg">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php ($i++); ?>
        <?php endforeach; ?>
        <div class="inner-page-content">
            <div class="container">
                <h2 class="sec-title2">Tin tức - Sự kiện</h2>
                <?php echo $__env->make('frontend.widgets.articlesGrid', $articles, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
        <?php echo $__env->make('frontend.widgets.partners', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>