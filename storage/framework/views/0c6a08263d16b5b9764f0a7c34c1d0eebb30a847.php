<div class="row">
    <?php foreach($articles as $article): ?>
    <div class="col-md-4 col-sm-4">
        <div class="howto-box">
            <div class="thumb">
                <img src="<?php echo e(env('APP_URL') . $article->article_featured); ?>" alt="<?php echo e($article->article_meta_title); ?>">
            </div>
            <h3><?php echo $article->article_title; ?></h3>
            <p><?php echo $article->article_summary; ?></p>
            <div class="box-footer">
                <a href="<?php echo e(URL::action('Frontend\ArticleController@article', [
                    'category_slug'=> $article->category_slug,
                    'slug' => $article->article_slug,
                    'id' => $article->article_id
                ])); ?>" class="readmore-bg">Đọc thêm</a> 
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>