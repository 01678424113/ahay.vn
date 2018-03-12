<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\OrderComicDetail;
use App\Models\OrderDetail;
use App\Models\Product;
use Cookie;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

class ActionBuyController extends Controller
{

    public function buyProductNow($product_id)
    {
        $product_query = Product::select([
            'products.product_id',
            'products.product_sku',
            'products.product_name',
            'products.product_featured',
            'products.product_price',
            'products.product_sale_percent',
            'products.product_meta_title',
            'products.product_status',
            'products.product_slug',
            'categories.category_id',
            'categories.category_name',
            'categories.category_slug',
        ])
            ->join('categories', 'categories.category_id', '=', 'products.category_id');
        $product = $product_query->where('product_id', $product_id)->firstOrFail();
        $product_sku = $product->product_sku;
        if ($product->product_sale_percent == 0) {
            $product_price = $product->product_price;
        } else {
            $product_price = $product->product_price - $product->product_price * $product->product_sale_percent / 100;
        }
        if (!isset($_COOKIE[$product_sku])) {
            $product['quantity'] = 1;
            setcookie($product_sku, $product, time() + (86400 * 30), "/");

            if (!isset($_COOKIE['order_total_price'])) {
                setcookie('order_total_price', $product_price, time() + (86400 * 30), "/");
            } else {
                $order_total_price = $_COOKIE['order_total_price'];
                setcookie('order_total_price', "", time() - (86400 * 30), "/");
                $order_total_price = $order_total_price + $product_price;
                setcookie('order_total_price', $order_total_price, time() + (86400 * 30), "/");
            }
            return redirect()->action('Frontend\PageController@cart')->with('success', 'Bạn đã thêm sản phẩm vào giỏ hàng thành công !');
        } else {
            $product['quantity'] = json_decode($_COOKIE[$product_sku])->quantity + 1;
            $order_total_price = $_COOKIE['order_total_price'];
            $order_total_price = $order_total_price + $product_price;
            setcookie('order_total_price', "", time() - (86400 * 30), "/");
            setcookie('order_total_price', $order_total_price, time() + (86400 * 30), "/");
            setcookie($product_sku, $product, time() - (86400 * 30), "/");
            setcookie($product_sku, $product, time() + (86400 * 30), "/");
            return redirect()->action('Frontend\PageController@cart')->with('success', 'Bạn đã thêm sản phẩm vào giỏ hàng thành công !');
        }
    }

    public function fixQuantityProduct(Request $request)
    {
        $product_sku = $request->product_sku;
        $quantity = $request->quantity;
        $product_query = Product::select([
            'products.product_id',
            'products.product_sku',
            'products.product_name',
            'products.product_featured',
            'products.product_price',
            'products.product_sale_percent',
            'products.product_meta_title',
            'products.product_status',
            'products.product_slug',
            'categories.category_id',
            'categories.category_name',
            'categories.category_slug',
        ])
            ->join('categories', 'categories.category_id', '=', 'products.category_id');
        $product = $product_query->where('product_sku', $product_sku)->firstOrFail();
        if ($product->product_sale_percent == 0) {
            $product_price = $product->product_price;
        } else {
            $product_price = $product->product_price - $product->product_price * $product->product_sale_percent / 100;
        }
        if (!isset($_COOKIE[$product_sku])) {
            $product['quantity'] = $quantity;
            setcookie($product_sku, $product, time() + (86400 * 30), "/");

            if (!isset($_COOKIE['order_total_price'])) {
                setcookie('order_total_price', $product_price * $quantity, time() - (86400 * 30), "/");
            } else {
                $order_total_price = $_COOKIE['order_total_price'];
                setcookie('order_total_price', "", time() - (86400 * 30), "/");
                $order_total_price = $order_total_price + $product_price * $quantity;
                setcookie('order_total_price', $order_total_price, time() + (86400 * 30), "/");
            }
            return redirect()->action('Frontend\PageController@cart')->with('success', 'Bạn đã thêm sản phẩm vào giỏ hàng thành công !');
        } else {
            $product['quantity'] = json_decode($_COOKIE[$product_sku])->quantity + $quantity;
            setcookie($product_sku, $product, time() - (86400 * 30), "/");
            setcookie($product_sku, $product, time() + (86400 * 30), "/");

            $order_total_price = $_COOKIE['order_total_price'];
            setcookie('order_total_price', "", time() - (86400 * 30), "/");
            $order_total_price = $order_total_price + $product_price * $quantity;
            setcookie('order_total_price', $order_total_price, time() + (86400 * 30), "/");

            return redirect()->action('Frontend\PageController@cart')->with('success', 'Bạn đã thêm sản phẩm vào giỏ hàng thành công !');
        }
    }

    public function ajaxFixQuantityProduct(Request $request)
    {
        $product_sku = $request->product_sku;
        $quantity = $request->quantity;

        $product = json_decode($_COOKIE[$product_sku]);
        $product->quantity = $quantity;

        $product_present = json_decode($_COOKIE[$product_sku]);
        if ($product_present->product_sale_percent == 0) {
            $product_present_price = $product_present->product_price;
        } else {
            $product_present_price = $product_present->product_price - $product_present->product_price * $product_present->product_sale_percent / 100;
        }
        $order_total_price = $_COOKIE['order_total_price'];
        if ($quantity > $product_present->quantity) {
            $order_total_price = $order_total_price + ($quantity - $product_present->quantity) * $product_present_price;
        } elseif ($quantity < $product_present->quantity) {
            $order_total_price = $order_total_price - ($product_present->quantity - $quantity) * $product_present_price;
        }

        setcookie('order_total_price', "", time() - (86400 * 30), "/");
        setcookie('order_total_price', $order_total_price, time() + (86400 * 30), "/");
        $product = json_encode($product);
        setcookie($product_sku, $product, time() - (86400 * 30), "/");
        setcookie($product_sku, $product, time() + (86400 * 30), "/");
        $response['quantity'] = $quantity;
        $response['order_total_price'] = $order_total_price;

        return $response;
    }

    public function buyMoreComic(Request $request)
    {
        $product_sku = $request->product_sku;
        $comic_present = json_decode($_COOKIE[$product_sku]);
        do {
            $product_sku_new = str_random(7);
            $check_product_sku = OrderComicDetail::where('product_sku', $product_sku_new)->get();
        } while (!isset($check_product_sku) && !isset($_COOKIE[$product_sku_new]));

        $comic_new = [
            'comic_id' => $comic_present->comic_id,
            'comic_slug' => $comic_present->comic_slug,
            'comic_name' => $comic_present->comic_name,
            'comic_user' => $comic_present->comic_user,
            'comic_gender' => $comic_present->comic_gender,
            'comic_message' => $comic_present->comic_message,
            'comic_featured' => $comic_present->comic_featured,
            'comic_id_story_present' => $comic_present->comic_id_story_present,
            'comic_name_story_present' => $comic_present->comic_name_story_present,
            'quantity' => 1,
            'product_sku' => $product_sku_new,
            'product_price' => $comic_present->product_price,
            'comic_unit_price' => $comic_present->comic_unit_price,
            'product_sale_percent' => $comic_present->product_sale_percent
        ];
        $comic_new = json_encode($comic_new);
        setcookie($product_sku_new, $comic_new, time() + (86400 * 30), "/");
        if (!isset($_COOKIE['order_total_price'])) {
            setcookie('order_total_price', $comic_present->product_price, time() + (86400 * 30), "/");
        } else {
            $order_total_price = $_COOKIE['order_total_price'];
            setcookie('order_total_price', "", time() - (86400 * 30), "/");
            $order_total_price = $order_total_price + $comic_present->product_price - $comic_present->product_sale_percent;
            setcookie('order_total_price', $order_total_price, time() + (86400 * 30), "/");
        }
        return redirect()->action('Frontend\PageController@cart')->with('success', 'Bạn đã mua thêm 1 cuốn truyện thành công !');
    }

    public function deleteProductToCart(Request $request)
    {
        $product_sku = $request->del_product_sku;
        $product = $_COOKIE[$product_sku];
        $product = json_decode($product);
        if ($product->product_sale_percent == 0) {
            $product_price = $product->product_price;
        } else {
            $product_price = $product->product_price - $product->product_sale_percent;
        }
        $order_total_price = $_COOKIE['order_total_price'];
        setcookie('order_total_price', "", time() - (86400 * 30), "/");
        $order_total_price = $order_total_price - $product_price * $product->quantity;
        setcookie('order_total_price', $order_total_price, time() + (86400 * 30), "/");
        setcookie($product_sku, "", time() - (86400 * 30), "/");
        return redirect()->back();
    }

    public function saveOrder(Request $request)
    {
        $order = new Order();
        if (isset($request->order_email)) {
            $order->order_email = $request->order_email;
        }
        $order->order_name = $request->order_name;
        $order->order_phone = $request->order_phone;
        if (isset($request->order_email)) {
            $order->order_email = $request->order_email;
        }
        if (isset($request->details_address)) {
            $details_address = $request->details_address . " - ";
        } else {
            $details_address = "";
        }
        if (isset($request->order_ward)) {
            $order->order_destination = $details_address . $request->order_ward;
        }
        if (isset($request->order_district) && isset($request->order_ward)) {
            $order->order_destination = $details_address . $request->order_ward . " - " . $request->order_district;
        }
        if (isset($request->order_district) && isset($request->order_ward) && isset($request->order_country)) {
            $order->order_destination = $details_address . $request->order_ward . " - " . $request->order_district . " - " . $request->order_country;
        }
        $order->order_total_price = $request->order_total_price;
        $order->order_status = 0;
        $order->order_created_at = microtime(true);
        try {
            $order->save();
            $order_id = $order->order_id;
            setcookie('order_total_price', "", time() - (86400 * 30), "/");
            foreach ($_COOKIE as $cookie_product) {
                $product = json_decode($cookie_product);
                if (isset($product->product_id)) {
                    $order_detail = new OrderDetail();
                    $order_detail->order_id = $order_id;
                    $order_detail->product_id = $product->product_id;
                    $order_detail->product_name = $product->product_name;
                    if ($product->product_sale_percent == 0) {
                        $order_detail->unit_price = $product->product_price;
                        $order_detail->unit_price_sale = $product->product_price;
                        $order_detail->amount = $order_detail->unit_price_sale * $product->quantity;
                    } else {
                        $order_detail->unit_price = $product->product_price;
                        $order_detail->unit_price_sale = $product->product_price - $product->product_price * $product->product_sale_percent / 100;
                        $order_detail->amount = $order_detail->unit_price_sale * $product->quantity;
                    }
                    $order_detail->quantity = $product->quantity;
                    try {
                        $order_detail->save();
                        setcookie($product->product_sku, "", time() - (86400 * 30), "/");
                    } catch (Exception $e) {

                    }
                }
                if (isset($product->comic_id)) {

                    $order_comic_detail = new OrderComicDetail();

                    $order_comic_detail->order_id = $order_id;

                    $order_comic_detail->comic_id = $product->comic_id;
                    $order_comic_detail->comic_name = $product->comic_name;
                    $order_comic_detail->comic_user = $product->comic_user;
                    $order_comic_detail->comic_slug = $product->comic_slug;
                    $order_comic_detail->product_sku = $product->product_sku;
                    $order_comic_detail->comic_gender = $product->comic_gender;
                    if ($product->comic_message == "") {
                        $order_comic_detail->comic_message = "Gửi " . $product->comic_user . " câu truyện của tôi !";
                    } else {
                        $order_comic_detail->comic_message = $product->comic_message;
                    }
                    $order_comic_detail->comic_featured = $product->comic_featured;
                    $order_comic_detail->comic_id_story_present = implode(', ', array_unique($product->comic_id_story_present));
                    $order_comic_detail->comic_name_story_present = $product->comic_name_story_present;
                    $order_comic_detail->product_price = $product->product_price;
                    $order_comic_detail->product_sale_percent = $product->product_sale_percent;
                    $order_comic_detail->comic_status = 0;
                    $order_comic_detail->comic_created_at = microtime(true);
                    try {
                        $order_comic_detail->save();
                        setcookie($product->product_sku, "", time() - (86400 * 30), "/");
                    } catch (Exception $e) {

                    }
                }
            }
            return redirect()->back()->with('order_successfully', $order->order_id);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Lỗi cơ sở dữ liệu');
        }
    }
}
