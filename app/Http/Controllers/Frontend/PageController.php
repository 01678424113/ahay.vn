<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use Cookie;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{

    //
    public function cart()
    {
        $response['title'] = "Giỏ hàng";
        $products = [];
        if (!isset($_COOKIE['order_total_price'])) {
            setcookie('order_total_price', 0, time() + (86400 * 30), "/");
            $response['products'] = [];
            return view('frontend.pages.cart', $response);
        }

        if ($_COOKIE['order_total_price'] == 0) {
            foreach ($_COOKIE as $cookie_product) {
                $product = json_decode($cookie_product);
                if (isset($product->product_sku)) {
                    setcookie($product->product_sku, "", time() - (86400 * 30), "/");
                };
            }
            $response['products'] = [];
            return view('frontend.pages.cart', $response);
        }

        foreach ($_COOKIE as $cookie_product) {
            $product = json_decode($cookie_product);
            if (isset($product->product_id) || isset($product->comic_name)) {
                $products[] = $product;
            }
        }
        $response['products'] = $products;
        return view('frontend.pages.cart', $response);
    }

    public function contact()
    {
        $response['title'] = "Liên hệ";
        $categories = Category::where('category_type',2)->get();
        $response['categories'] =$categories;
        return view('frontend.pages.contact', $response);
    }

}
