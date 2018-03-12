<?php $__env->startSection('main_content'); ?>
    <div class="inner-title">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a> <a href="#">Hướng dẫn</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="cp-page-content inner-page-content blog-posts blog-with-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="blog-post">
                        <div class="post-thumb"><img src="<?php echo e(env('APP_URL')); ?>/theme/images/bf-img1.jpg" alt="">
                            <div class="blog-hover"><a href="#"><i class="fa fa-search"></i></a> <a
                                        href="<?php echo e(env('APP_URL')); ?>/theme/blog-details-sidebar.html"><i class="fa fa-link"></i></a></div>
                        </div>
                        <div class="post-tools">
                            <ul>
                                <li>
                                    <h4 class="user"><i class="fa fa-user"></i> by admin</h4>
                                </li>
                                <li><i class="fa fa-calendar"></i> 01 March 2016</li>
                                <li>
                                    <div class="post-tags"><a href="#">children</a>, <a href="#">toys</a>, <a href="#">baby
                                            sitter</a>, <a href="#">prams</a>, <a href="#">bornbaby cloths</a></div>
                                </li>
                                <li>
                                    <div class="post-comments">27 comments</div>
                                </li>
                            </ul>
                        </div>
                        <h3><a href="<?php echo e(env('APP_URL')); ?>/theme/blog-details-sidebar.html">We are selling children products like baby sitter
                                prams...</a></h3>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse viverra mauris eget
                            tortor imperdiet vehicula. Proin egestas diam ac mauris molestie hendrerit. Quisque nec nisi
                            tortor. Etiam at mauris sit amet magna suscipit hend merit non sed ligula. Vivamus purus
                            odio, mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <p> Proin egestas diam ac mauris molestie hendrerit. Quisque nec nisi tortor. Etiam at mauris
                            sit amet magna. Quisque nec nisi tortor. Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Suspendisse viverra mauris eget tortor imperdiet vehicula. Proin egestas diam ac
                            mauris molestie hendrerit. Quisque nec nisi tortor.Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
                            viverra mauris eget tortor imperdiet vehicula. Proin egestas diam ac mauris molestie
                            hendrerit. Quisque nec nisi tortor. Etiam at mauris sit amet magna suscipit hend merit
                            non. </p>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse viverra mauris eget
                            tortor imperdiet vehicula. Proin egestas diam ac mauris molestie hendrerit. Quisque nec nisi
                            tortor. Etiam at mauris sit amet magna suscipit hend merit non sed ligula. Vivamus purus
                            odio, mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse viverra
                            mauris eget tortor imperdiet vehicula. </p>
                        <blockquote> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse viverra mauris
                            eget tortor imperdiet vehicula. Proin egestas diam ac mauris molestie hendrerit. Quisque nec
                            nisi tortor. Etiam at mauris sit amet magna suscipit hend merit non sed ligula. Vivamus
                            purus odio, mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </blockquote>
                        <p> Proin egestas diam ac mauris molestie hendrerit. Quisque nec nisi tortor. Etiam at mauris
                            sit amet magna. Quisque nec nisi tortor. Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Suspendisse viverra mauris eget tortor imperdiet vehicula. Proin egestas diam ac
                            mauris molestie hendrerit. Quisque nec nisi tortor.Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
                            viverra mauris eget tortor imperdiet vehicula. Proin egestas diam ac mauris molestie
                            hendrerit. Quisque nec nisi tortor. Etiam at mauris sit amet magna suscipit hend merit
                            non.mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse viverra
                            mauris eget tortor imperdiet vehicula. </p>
                        <ul class="list-group">
                            <li>Cras vulputate justo vitae tempus rhoncus.</li>
                            <li>Donec vitae felis eget orci eleifend viverra eget ac massa.</li>
                            <li>Pellentesque varius dui ac diam iaculis maximus.</li>
                            <li>Nullam vestibulum odio eget lectus varius, vel vestibulum erat consectetur.</li>
                            <li>Suspendisse interdum ex et felis gravida consequat.</li>
                            <li>In at justo posuere, accumsan enim non, gravida risus.</li>
                        </ul>
                    </div>
                  <?php echo $__env->make('frontend.widgets.commentForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>

                <aside class="col-md-3">
                    <?php echo $__env->make('frontend.widgets.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </aside>

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
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>