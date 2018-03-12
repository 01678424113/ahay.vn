<?php $__env->startSection('main_content'); ?>
<div class="inner-title">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Home</a> <a href="#">Blog</a></li>
        </ul>
    </div>
</div>
<div class="cp-page-content inner-page-content blog-posts blog-with-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="blog-post">
                    <div class="post-thumb">
                        <img src="<?php echo e(env('APP_URL') . $article->article_featured); ?>" alt="<?php echo e($article->article_meta_title); ?>" />
                    </div>
                    <div class="post-tools">
                        <ul>
                            <li>
                                <i class="fa fa-user"></i> <?php echo $article->user_fullname; ?>

                            </li>
                            <li>
                                <i class="fa fa-calendar"></i> <?php echo date('d F, Y', $article->article_created_at); ?>

                            </li>
                            <li>
                                <i class="fa fa-folder"></i> <a href="#" title="<?php echo e($article->category_meta_title); ?>"><?php echo $article->category_name; ?></a>
                            </li>
                           
                        </ul>
                    </div>
                    <h1><?php echo $article->article_title; ?></h1>
                    <p class="font-bold font-14"><?php echo $article->article_summary; ?></p>
                    <?php echo $article->article_content; ?>

                </div>
                <?php echo $__env->make('frontend.widgets.commentForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <aside class="col-md-3">
                <?php echo $__env->make('frontend.widgets.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </aside>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>