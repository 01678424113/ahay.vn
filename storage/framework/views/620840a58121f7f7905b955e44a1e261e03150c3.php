<?php $__env->startSection('main_content'); ?>
    <div class="inner-title">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="breadcrumb">
                        <li><a href="#">Trang chủ</a> <a href="#">Dịch vụ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="cp-page-content inner-page-content blog-posts blog-with-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <?php foreach($articles as $article): ?>

                        <div class="blog-post">
                            <div class="post-thumb"><img src="<?php echo e($article->article_featured); ?>" alt="">
                                <div class="blog-hover"><a href="#"><i class="fa fa-search"></i></a> <a
                                            href="blog-details-sidebar.html"><i class="fa fa-link"></i></a></div>
                            </div>
                            <div class="post-tools">
                                <ul>
                                    <li>
                                        <h4 class="user"><i class="fa fa-user"></i> by <?php echo e($article->user_fullname); ?></h4>
                                    </li>
                                    <li><i class="fa fa-calendar"></i> <?php echo e(date('d M Y',$article->article_created_at)); ?>

                                    </li>
                                    <li>
                                        <div class="post-tags"><a href="#">children</a>, <a href="#">toys</a>, <a
                                                    href="#">baby
                                                sitter</a>, <a href="#">prams</a>, <a href="#">bornbaby cloths</a></div>
                                    </li>
                                    <li>
                                        <div class="post-comments">27 comments</div>
                                    </li>
                                </ul>
                            </div>
                            <h3><a href="blog-details-sidebar.html"><?php echo e($article->article_title); ?></a></h3>
                            <p><?php echo e($article->article_summary); ?></p>
                            <a href="<?php echo e(URL::action('Frontend\ArticleController@article', [
                                            'category_slug'=> $article->category_slug,
                                            'slug' => $article->article_slug,
                                            'id' => $article->article_id
                            ])); ?>" class="readmore-blue">Read More <i
                                        class="fa fa-caret-right"></i></a></div>

                    <?php endforeach; ?>
                    <div class="paging">
                        <ul class="pagination">
                            <?php echo e($articles->links()); ?>

                            <script>
                                window.onload = function () {
                                    $('.disabled span').remove();
                                    $('.disabled').append("<a href=\"#\" aria-label=\"Next\"> <span aria-hidden=\"true\"><i class=\"fa fa-angle-right\"></i></span> </a>");
                                };
                            </script>
                        </ul>
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
                                    <div class="thumb"><img src="theme/images/ppimg1.jpg" alt=""></div>
                                </li>
                                <li>
                                    <div class="thumb"><img src="theme/images/ppimg2.jpg" alt=""></div>
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
                                    <div class="thumb"><img src="theme/images/rp1.jpg" alt=""></div>
                                </li>
                                <li>
                                    <div class="thumb"><img src="theme/images/rp2.jpg" alt=""></div>
                                </li>
                                <li>
                                    <div class="thumb"><img src="theme/images/rp3.jpg" alt=""></div>
                                </li>
                                <li>
                                    <div class="thumb"><img src="theme/images/rp4.jpg" alt=""></div>
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