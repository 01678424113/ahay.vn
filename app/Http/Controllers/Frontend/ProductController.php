<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    public function listProducts(Request $request)
    {
        $response['title'] = "Sản phẩm khác";
        $product_query = Product::select([
            'products.product_id',
            'products.product_sku',
            'products.product_name',
            'products.product_featured',
            'products.product_price',
            'products.product_sale_percent',
            'products.product_description',
            'products.product_meta_title',
            'products.product_status',
            'products.product_slug',
            'categories.category_id',
            'categories.category_name',
            'categories.category_slug',
        ])
            ->join('categories', 'categories.category_id', '=', 'products.category_id')
            ->orderBy('products.product_created_at', 'DESC');
        $response['products'] = $product_query->paginate(20);
        if(isset($request->product_name)){
            $products = Product::where('product_name','LIKE','%'.$request->product_name.'%')->paginate(20);
            $response['products'] = $products;
        }
        $response['banner'] = Banner::find(2);
        return view('frontend.pages.listProducts', $response);
    }

    public function detailProduct($product_slug, $product_id)
    {
        $response['title'] = "Chi tiết sản phẩm";
        $product_query = Product::select([
            'products.product_id',
            'products.product_sku',
            'products.product_name',
            'products.product_featured',
            'products.product_images',
            'products.product_price',
            'products.product_sale_percent',
            'products.product_description',
            'products.product_meta_title',
            'products.product_status',
            'products.product_slug',
            'categories.category_id',
            'categories.category_name',
            'categories.category_slug',
        ])
            ->join('categories', 'categories.category_id', '=', 'products.category_id');
        $product = $product_query->where('product_id', $product_id)->first();
        $response['product'] = $product;
        $product_related_query = Product::select([
            'products.product_id',
            'products.product_sku',
            'products.product_name',
            'products.product_featured',
            'products.product_price',
            'products.product_sale_percent',
            'products.product_meta_title',
            'products.product_status',
            'products.product_slug',
            'products.category_id',
        ]);

        $response['related_products'] = $product_related_query->where('category_id', $product->category_id)->where('product_id', '<>', $product_id)->paginate(9);

        return view('frontend.pages.detailProduct', $response);
    }
}
