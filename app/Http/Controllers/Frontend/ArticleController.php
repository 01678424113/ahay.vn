<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Comic;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{

    public function __construct()
    {
        $product_suggest = Product::where('product_suggest', 2)->orWhere('product_suggest', 3)->get();
        $comic_suggest = Comic::where('comic_suggest', 2)->orWhere('comic_suggest', 3)->get();
        view()->share('product_suggest', $product_suggest);
        view()->share('comic_suggest', $comic_suggest);
    }

    public function searchArticle(Request $request)
    {
        $response['title'] = "Tìm kiếm bài viết";
        $articles = [];
        if (isset($request->article_title)) {
            $articles = Article::where('article_title', 'LIKE', '%' . $request->article_title . '%')->orderBy('article_created_at', 'DESC')->paginate(9);
        }
        $categories = Category::where('category_type', 2)->get();
        $response['categories'] = $categories;
        $response['articles'] = $articles;
        return view('frontend.pages.list-articles', $response);
    }

    public function listArticles($type_article)
    {
        if ($type_article == 'nghe-thuat') {
            $category_id = 7;
            $response['title'] = "Nghệ thuật";
        } elseif ($type_article == 'kien-truc') {
            $category_id = 9;
            $response['title'] = "Kiến trúc";
        } elseif ($type_article == 'tong-hop') {
            $category_id = 10;
            $response['title'] = "Tổng hợp";
        } elseif ($type_article == 'thiet-ke') {
            $category_id = 11;
            $response['title'] = "Thiết kế";
        }
        $article_query = Article::select([
            'articles.article_id',
            'articles.article_title',
            'articles.article_slug',
            'articles.article_featured',
            'articles.article_summary',
            'articles.article_content',
            'articles.article_meta_title',
            'articles.article_meta_desc',
            'articles.article_created_at',
            'categories.category_id',
            'categories.category_name',
            'categories.category_slug',
            'categories.category_meta_title',
            'users.user_fullname',
        ])
            ->join('categories', 'categories.category_id', '=', 'articles.article_category_id')
            ->join('users', 'users.user_id', '=', 'articles.article_created_by');

        $articles = $article_query->where('article_category_id', $category_id)->orderBy('article_created_at', 'DESC')->paginate(9);

        $categories = Category::where('category_type', 2)->get();
        $response['categories'] = $categories;
        $response['articles'] = $articles;
        return view('frontend.pages.list-articles', $response);
    }

    public function detailArticle($article_slug, $article_id)
    {
        try {
            $article = Article::select([
                'articles.article_id',
                'articles.article_title',
                'articles.article_slug',
                'articles.article_category_id',
                'articles.article_featured',
                'articles.article_summary',
                'articles.article_content',
                'articles.article_meta_title',
                'articles.article_meta_desc',
                'articles.article_created_at',
                'categories.category_id',
                'categories.category_name',
                'categories.category_slug',
                'categories.category_meta_title',
                'users.user_fullname',
            ])
                ->join('categories', 'categories.category_id', '=', 'articles.article_category_id')
                ->join('users', 'users.user_id', '=', 'articles.article_created_by')
                ->where('articles.article_id', $article_id)
                ->where([
                    'articles.article_status' => 1,
                    'categories.category_type' => 2
                ])
                ->first();
            if (!empty($article)) {
                if ($article_slug == $article->article_slug) {
                    $response = [
                        'title' => $article->article_meta_title
                    ];
                    $article->article_content = preg_replace("/src=\"uploads\//", 'src="' . env('APP_URL') . "uploads/", $article->article_content);
                    $response['article'] = $article;
                    $category = $article->article_category_id;
                    $articles_r = Article::where('article_category_id', $category)->take(3)->get();
                    $response['articles_r'] = $articles_r;
                    return view('frontend.pages.article', $response);
                } else {
                    return redirect()->action('Frontend\ArticleController@listArticles', [
                        'slug' => $article->article_slug,
                        'id' => $article->article_id
                    ]);
                }
            }
        } catch (\Exception $exc) {

        }
        abort(404);
    }

    public function service()
    {
        $response['title'] = "Dịch vụ";
        $article_query = Article::select([
            'articles.article_id',
            'articles.article_title',
            'articles.article_slug',
            'articles.article_featured',
            'articles.article_summary',
            'articles.article_content',
            'articles.article_meta_title',
            'articles.article_meta_desc',
            'articles.article_created_at',
            'categories.category_id',
            'categories.category_name',
            'categories.category_slug',
            'categories.category_meta_title',
            'users.user_fullname',
        ])
            ->join('categories', 'categories.category_id', '=', 'articles.article_category_id')
            ->join('users', 'users.user_id', '=', 'articles.article_created_by');

        $articles = $article_query->where('article_category_id', 6)->orderBy('article_created_at', 'DESC')->paginate(9);

        $categories = Category::where('category_type', 2)->get();
        $response['categories'] = $categories;
        $response['articles'] = $articles;
        return view('frontend.pages.list-articles', $response);
    }

    public function support()
    {
         $response['title'] = "Hỗ trợ";
        $article_query = Article::select([
            'articles.article_id',
            'articles.article_title',
            'articles.article_slug',
            'articles.article_featured',
            'articles.article_summary',
            'articles.article_content',
            'articles.article_meta_title',
            'articles.article_meta_desc',
            'articles.article_created_at',
            'categories.category_id',
            'categories.category_name',
            'categories.category_slug',
            'categories.category_meta_title',
            'users.user_fullname',
        ])
            ->join('categories', 'categories.category_id', '=', 'articles.article_category_id')
            ->join('users', 'users.user_id', '=', 'articles.article_created_by');

        $articles = $article_query->where('article_category_id', 1)->orderBy('article_created_at', 'DESC')->paginate(9);

        $categories = Category::where('category_type', 2)->get();
        $response['categories'] = $categories;
        $response['articles'] = $articles;
        return view('frontend.pages.list-articles', $response);
    }

    public function QandA()
    {
         $response['title'] = "Hỏi đáp";
        $article_query = Article::select([
            'articles.article_id',
            'articles.article_title',
            'articles.article_slug',
            'articles.article_featured',
            'articles.article_summary',
            'articles.article_content',
            'articles.article_meta_title',
            'articles.article_meta_desc',
            'articles.article_created_at',
            'categories.category_id',
            'categories.category_name',
            'categories.category_slug',
            'categories.category_meta_title',
            'users.user_fullname',
        ])
            ->join('categories', 'categories.category_id', '=', 'articles.article_category_id')
            ->join('users', 'users.user_id', '=', 'articles.article_created_by');

        $articles = $article_query->where('article_category_id', 5)->orderBy('article_created_at', 'DESC')->paginate(9);

        $categories = Category::where('category_type', 2)->get();
        $response['categories'] = $categories;
        $response['articles'] = $articles;
        return view('frontend.pages.list-articles', $response);
    }


}
