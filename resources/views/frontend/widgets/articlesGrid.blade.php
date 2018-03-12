<div class="row">
    @foreach($articles as $article)
    <div class="col-md-4 col-sm-4">
        <div class="howto-box">
            <div class="thumb">
                <a href="{{ URL::action('Frontend\ArticleController@detailArticle', [
                    'article_slug' => $article->article_slug,
                    'article_id' => $article->article_id
                ]) }}"><img style="height: 240px;" src="{{ env('APP_URL') . $article->article_featured }}" alt="{{ $article->article_meta_title }}"></a>
            </div>
            <h3 style="margin-bottom: 10px;min-height: 60px">{!! str_limit($article->article_title,45,'...') !!}</h3>
            <p>{!! str_limit($article->article_summary,70,'...') !!}</p>
            <div class="box-footer">
                <a href="{{ URL::action('Frontend\ArticleController@detailArticle', [
                    'article_slug' => $article->article_slug,
                    'article_id' => $article->article_id
                ]) }}" class="readmore-bg">Đọc thêm</a> 
            </div>
        </div>
    </div>
    @endforeach
</div>