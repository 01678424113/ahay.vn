<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comic;
use App\Models\Product;
use App\Models\Article;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $response = [
            'title' => 'Trang chủ'
        ];
        $response['comics'] = Comic::select([
            'comic_id',
            'comic_name',
            'comic_slug',
            'comic_featured',
            'comic_description',
            'comic_meta_title'
        ])
            ->orderBy('comic_created_at', 'DESC')
            ->where('comic_status', 1)
            ->take(3)->get();
        $response['products'] = Product::select([
            'product_id',
            'product_sku',
            'product_name',
            'product_slug',
            'product_featured',
            'product_description',
            'product_meta_title',
        ])
            ->orderBy('product_created_at', 'DESC')
            ->where('product_status', 1)
            ->take(3)->get();
        $response['articles'] = Article::select([
            'article_id',
            'article_title',
            'article_slug',
            'article_featured',
            'article_summary',
            'article_meta_title',
            'categories.category_slug'
        ])
            ->join('categories', 'categories.category_id', '=', 'articles.article_category_id')
            ->where('article_status', 1)
            ->where('article_suggest',1)
            ->take(3)->get();

        $response['slider_1'] = Banner::where('id',4)->get();
        $response['slider_2'] = Banner::where('id',5)->get();
        $response['slider_3'] = Banner::where('id',6)->get();
        $response['banner'] = Banner::find(1);
        return view('frontend.pages.home', $response);
    }

}
