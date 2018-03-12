<div class="logo-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <nav class="navbar navbar-default main-nav">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="logo" href="#"><img src="<?php echo e(env('APP_URL')); ?>/theme/images/bigmart.png" alt=""></a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav menu">
                            <li class="m1">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    Sản phẩm <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Sách quà tặng</a></li>
                                    <li><a href="<?php echo e(URL::action('Frontend\ProductController@otherProducts')); ?>">Sản phẩm
                                            khác</a></li>
                                </ul>
                            </li>
                            <li class="m2">
                                <a href="<?php echo e(URL::action('Frontend\PageController@listService')); ?>">Dịch vụ</a>
                            </li>
                            <li class="m3">
                                <a href="<?php echo e(URL::action('Frontend\PageController@listInstruction')); ?>">Hỗ trợ</a>
                            </li>
                            <li class="m4">
                                <a href="<?php echo e(URL::action('Frontend\PageController@listQandA')); ?>">Hỏi đáp</a>
                            </li>
                            <li class="m5 dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    Tin tức <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo e(URL::action('Frontend\ArticleController@listArticle')); ?>">Tin tức</a></li>
                                    <li><a href="#">Nghệ thuật</a></li>
                                    <li><a href="#">Kiến trúc</a></li>
                                    <li><a href="#">Thiết kế</a></li>
                                </ul>
                            </li>
                            <li class="m6">
                                <a href="#">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-3">
                <div class="login-container">
                    <div class="search-panel">
                        <ul>
                            <li>
                                <a role="button" class="search">
                                    <i class="fa fa-search"></i>
                                    <p>Tìm kiếm</p>
                                </a>
                                <div class="search-field">
                                    <input class="form-control" type="text" placeholder="Nhập từ khóa">
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="cart-option">
                        <div class="dropdown">
                            <a id="cart" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                            <div class="dropdown-menu" role="menu" aria-labelledby="cart">
                                <?php if(isset($_COOKIE)): ?>
                                    <?php $count = 0; ?>
                                    <?php foreach($_COOKIE as $product): ?>
                                        <?php
                                        $product = json_decode($product);
                                        ?>
                                        <?php if(isset($product->product_sku)): ?>
                                            <div style="display: flex; margin-bottom: 5px">
                                                <img style="width: 50px;margin: 0;height: 50px;margin-right: 10px;"
                                                     src="<?php echo e($product->product_featured); ?>" alt="">
                                                <a href=""><?php echo e($product->product_name); ?>(<?php echo e($product->quantity); ?>)</a>
                                            </div>
                                            <?php $count = $count + $product->quantity; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php
                                        if($count == 0)
                                            echo " <p>Không có sản phẩm</p>";
                                        ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <p><?php echo $count; ?> SP</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>