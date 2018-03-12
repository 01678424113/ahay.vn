<?php $__env->startSection('main_content'); ?>
<div class="inner-title">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Trang chủ</a> <a href="#">Truyện tranh</a></li>
        </ul>
    </div>
</div>
<div class="cp-page-content">
    <?php ($i = 1); ?>
    <?php foreach($comics as $comic): ?>
    <div class="cp-home-welcome">
        <div class="container">
            <h2 class="sec-title"><?php echo $title; ?></h2>
            <div class="row">
                <div class="col-md-6 <?php echo e($i % 2 == 0 ? 'col-md-push-6' : ''); ?>">
                    <img src="<?php echo e(env('APP_URL') . $comic->comic_featured); ?>"
                         alt="<?php echo e($comic->comic_meta_title); ?>">
                </div>
                <div class="col-md-6 <?php echo e($i % 2 == 0 ? 'col-md-pull-6' : ''); ?>">
                    <div class="welcome-content">
                        <h3><?php echo $comic->comic_name; ?></h3>
                        <p><?php echo $comic->comic_description; ?></p>
                        <a href="<?php echo e(URL::action('Frontend\ComicController@detailComic', ['comic_slug' => $comic->comic_slug, 'comic_id' => $comic->comic_id])); ?>" class="readmore-bg">
                            Tạo câu chuyện
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ($i++); ?>
    <?php endforeach; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>