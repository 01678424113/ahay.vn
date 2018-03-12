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
                    <div class="post-comments-form">
                        <h3>Leave a Comment</h3>
                        <div class="row">
                            <ul class="comment-form">
                                <li class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Name">
                                </li>
                                <li class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Email">
                                </li>
                                <li class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Website">
                                </li>
                                <li class="col-md-12">
                                    <textarea placeholder="Comments"></textarea>
                                </li>
                                <li class="col-md-12">
                                    <input type="submit" value="Send" class="submit">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <aside class="col-md-3">
                    <div class="sidebar">

                        <div class="widget search">
                            <h3>Search</h3>
                            <div class="input-group"><span class="input-group-addon" id="basic-addon1"><i
                                            class="fa fa-search"></i></span>
                                <input type="text" class="form-control" placeholder="Enter keywords..."
                                       aria-describedby="basic-addon1">
                            </div>
                        </div>


                        <div class="widget popular-posts">
                            <h3>Popular Posts</h3>
                            <ul class="posts">
                                <li>
                                    <div class="thumb"><img src="<?php echo e(env('APP_URL')); ?>/theme/images/ppimg1.jpg" alt=""></div>
                                </li>
                                <li>
                                    <div class="thumb"><img src="<?php echo e(env('APP_URL')); ?>/theme/images/ppimg2.jpg" alt=""></div>
                                </li>
                            </ul>
                        </div>


                        <div class="widget categories">
                            <h3>Categories</h3>
                            <ul class="posts">
                                <li><a href="#">Children Shoes<i>(15)</i></a></li>
                                <li><a href="#">Bibs <i>(17)</i></a></li>
                                <li><a href="#">T-Shirts <i>(14)</i></a></li>
                                <li><a href="#">Children Beds <i>(12)</i></a></li>
                                <li><a href="#">Chairs <i>(54)</i></a></li>
                                <li><a href="#">Toys <i>(10)</i></a></li>
                                <li><a href="#">Pants <i>(21)</i></a></li>
                                <li><a href="#">Dresses <i>(28)</i></a></li>
                            </ul>
                        </div>


                        <div class="widget reacent-posts">
                            <h3>Reacent Posts</h3>
                            <ul class="posts">
                                <li>
                                    <div class="thumb"><img src="<?php echo e(env('APP_URL')); ?>/theme/images/rp1.jpg" alt=""></div>
                                </li>
                                <li>
                                    <div class="thumb"><img src="<?php echo e(env('APP_URL')); ?>/theme/images/rp2.jpg" alt=""></div>
                                </li>
                                <li>
                                    <div class="thumb"><img src="<?php echo e(env('APP_URL')); ?>/theme/images/rp3.jpg" alt=""></div>
                                </li>
                                <li>
                                    <div class="thumb"><img src="<?php echo e(env('APP_URL')); ?>/theme/images/rp4.jpg" alt=""></div>
                                </li>
                            </ul>
                        </div>


                        <div class="widget archives">
                            <h3>Archives</h3>
                            <ul class="posts">
                                <li>March, 2016<i>(15)</i></li>
                                <li>February, 2016 <i>(17)</i></li>
                                <li>January, 2016 <i>(14)</i></li>
                                <li>December, 2014 <i>(12)</i></li>
                                <li>November, 2014 <i>(54)</i></li>
                            </ul>
                        </div>


                        <div class="widget post-tags">
                            <h3>Tags</h3>
                            <div class="tags"><a href="#">Children</a> <a href="#">Students</a> <a href="#">Kids
                                    Toys</a> <a href="#">Children Shoes</a> <a href="#">Babies Blothes</a> <a href="#">Students</a>
                                <a href="#">Children</a> <a href="#">Kids Toys</a></div>
                        </div>

                    </div>
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