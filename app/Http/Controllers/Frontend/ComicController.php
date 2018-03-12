<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\ComicRequest;
use App\Models\Banner;
use App\Models\OrderComicDetail;
use App\Models\Product;
use App\Models\Review;
use App\Models\SettingSaleComic;
use App\Models\Story;
use App\Models\Website;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comic;
use DB;

class ComicController extends Controller
{
    //Convert bỏ dấu
    function convert_name($string)
    {
        if (!$string) return false;
        $utf8 = array(
            'a' => ['á', 'à', 'ạ', 'ả', 'ã', 'Á', 'À', 'Ạ', 'Ả', 'Ã'],
            'ă' => ['ắ', 'ằ', 'ặ', 'ẳ', 'ẵ', 'Ắ', 'Ằ', 'Ặ', 'Ẳ', 'Ẵ'],
            'â' => ['ấ', 'ầ', 'ậ', 'ẩ', 'ẫ', 'Ấ', 'Ầ', 'Ậ', 'Ẩ', 'Ẫ'],
            'e' => ['é', 'è', 'ẹ', 'ẻ', 'ẽ', 'É', 'È', 'Ẹ', 'Ẻ', 'Ẽ'],
            'ê' => ['Ế', 'Ề', 'Ệ', 'Ể', 'Ễ', 'ế', 'ề', 'ệ', 'ể', 'ễ'],
            'i' => ['í', 'ì', 'ị', 'ỉ', 'ĩ', 'Í', 'Ì', 'Ị', 'Ỉ', 'Ĩ'],
            'o' => ['ó', 'ò', 'ọ', 'ỏ', 'õ', 'Ó', 'Ò', 'Ọ', 'Ỏ', 'Õ'],
            'ơ' => ['ớ', 'ờ', 'ợ', 'ở', 'ỡ', 'Ớ', 'Ờ', 'Ợ', 'Ở', 'Ỡ'],
            'ô' => ['ố', 'ồ', 'ộ', 'ổ', 'ỗ', 'Ố', 'Ồ', 'Ộ', 'Ổ', 'Ỗ'],
            'u' => ['ú', 'ù', 'ụ', 'ủ', 'ũ', 'Ú', 'Ù', 'Ụ', 'Ủ', 'Ũ'],
            'ư' => ['ứ', 'ừ', 'ự', 'ử', 'ữ', 'Ứ', 'Ừ', 'Ự', 'Ử', 'Ữ'],
            'y' => ['ý', 'ỳ', 'ỵ', 'ỷ', 'ỹ', 'Ý', 'Ỳ', 'Ỵ', 'Ỷ', 'Ỹ'],
        );
        $string = str_replace($utf8['a'], "a", $string);
        $string = str_replace($utf8['ă'], "ă", $string);
        $string = str_replace($utf8['â'], "â", $string);
        $string = str_replace($utf8['e'], "e", $string);
        $string = str_replace($utf8['ê'], "ê", $string);
        $string = str_replace($utf8['i'], "i", $string);
        $string = str_replace($utf8['o'], "o", $string);
        $string = str_replace($utf8['ơ'], "ơ", $string);
        $string = str_replace($utf8['ô'], "ô", $string);
        $string = str_replace($utf8['u'], "u", $string);
        $string = str_replace($utf8['ư'], "ư", $string);
        $string = str_replace($utf8['y'], "y", $string);
        return $string;
    }


    //End convert bỏ dấu

    public function listComics(Request $request)
    {
        $response = [
            'title' => "Sách quà tặng"
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
            ->get();
        if (isset($request->search_comic)) {
            $comics = Comic::where('comic_name', 'LIKE', '%' . $request->search_comic . '%')->where('comic_status', 1)->orderBy('comic_created_at', 'DESC')->get();
            $response['comics'] = $comics;
        }
        return view('frontend.pages.comics', $response);
    }

    public function detailComic(Request $request, $comic_slug, $comic_id)
    {
        try {
            $website = Website::find(1);
            $banner = $website->website_banner;
            $comic = Comic::where('comic_id', $comic_id)
                ->where('comic_status', 1)
                ->first();
            if (!empty($comic)) {
                if ($comic_slug == $comic->comic_slug) {
                    $response = [
                        'title' => $comic->comic_meta_title
                    ];
                    $comic->comic_images = json_decode($comic->comic_images);
                    $comic->comic_content = DB::table('comic_contents')
                        ->where('comic_id', $comic_id)
                        ->orderBy('content_index', 'ASC')
                        ->get();
                    $response['comic'] = $comic;
                    //Create product sku
                    do {
                        $product_sku = str_random(7);
                        $check_product_sku = OrderComicDetail::where('product_sku', $product_sku)->get();
                    } while (!isset($check_product_sku) && !isset($_COOKIE[$product_sku]));
                    $response['product_sku'] = $product_sku;
                    $response['reviews'] = Review::where('id', '>', 0)->take(5)->get();
                    $response['banner'] = Banner::find(3);

                    $response['comic_suggest'] = Comic::where('comic_suggest', 1)->orWhere('comic_suggest', 3)->get();
                    $response['product_suggest'] = Product::where('product_suggest', 1)->orWhere('product_suggest', 3)->get();
                    return view('frontend.pages.comicDetail', $response);
                } else {
                    return redirect()->action('Frontend\ComicController@detailComic', [
                        'comic_slug' => $comic->comic_slug,
                        'comic_id' => $comic->comic_id
                    ]);
                }
            }
        } catch (Exception $exc) {

        }
        abort(404);
    }

    public function previewComic(Request $request, $comic_slug, $comic_id, $product_sku)
    {
        if (!isset($_COOKIE[$product_sku])) {
            try {
                //Convert font to UTF 8
                $comic_name = mb_strtoupper($this->convert_name($request->comic_user), 'UTF-8');
                //Delete space
                $comic_name = str_replace(" ", "", $comic_name);
                //Split comic user
                $array_comic_word = preg_split('//u', $comic_name);
                array_pop($array_comic_word);
                array_shift($array_comic_word);
                //Lay cac truyen con hien thi vaf id cua chung
                $stories = [];
                foreach ($array_comic_word as $item) {
                    $stories_query = Story::select([
                        'story_id',
                        'story_name',
                        'story_icon',
                        'story_gender',
                        'story_alpha',
                        'story_images'
                    ])->where('story_gender', $request->comic_gender)->where('story_alpha', $item)->where('comic_id', $comic_id);
                    if (count($stories) > 0) {
                        foreach ($stories as $item2) {
                            $stories_query = $stories_query->where('story_id', '<>', $item2[0]->story_id);
                        }
                    }
                    $stories[] = $stories_query->take(1)->get();
                }
                foreach ($stories as $item2) {
                    $list_id_stories[] = $item2[0]->story_id;
                }
                //Take all stories co lien quan den ten duoc tao
                $stories_all_query = Story::select([
                    'story_id',
                    'story_name',
                    'story_icon',
                    'story_gender',
                    'story_alpha',
                    'story_images'
                ])->where('comic_id', $comic_id);
                foreach ($array_comic_word as $item2) {
                    $stories_all_query = $stories_all_query->orWhere('story_alpha', $item2);
                }
                $stories_all = $stories_all_query->get();
                //Lay thong tin truyen lon
                $comic = Comic::where('comic_id', $comic_id)
                    ->where('comic_status', 1)
                    ->first();
                if (isset($comic)) {
                    $comic->comic_images = json_decode($comic->comic_images);
                    $comic->comic_content = DB::table('comic_contents')
                        ->where('comic_id', $comic_id)
                        ->orderBy('content_index', 'ASC')
                        ->get();

                    $response = [
                        'title' => $comic->comic_meta_title
                    ];
                    $response['product_sku'] = $product_sku;
                    $response['comic_user'] = ucfirst($request->comic_user);
                    $response['comic_gender'] = $request->comic_gender;
                    $response['array_comic_word'] = $array_comic_word;
                    $response['stories'] = $stories;
                    $response['list_id_stories'] = $list_id_stories;
                    $response['stories_all'] = $stories_all;
                    $response['comic'] = $comic;
                    //Lay cac trang mo dau va ket thuc truyen
                    $bm = Story::where('comic_id', $comic_id)->where('story_alpha', 'BM')->first();
                    $tm1 = Story::where('comic_id', $comic_id)->where('story_alpha', 'TM1')->first();
                    $tm2 = Story::where('comic_id', $comic_id)->where('story_alpha', 'TM2')->first();
                    $tk = Story::where('comic_id', $comic_id)->where('story_alpha', 'TK')->first();
                    $bk = Story::where('comic_id', $comic_id)->where('story_alpha', 'BK')->first();
                    $response['bm'] = $bm;
                    $response['tm1'] = $tm1;
                    $response['tm2'] = $tm2;
                    $response['tk'] = $tk;
                    $response['bk'] = $bk;
                    $response['number_change'] = $request->number_change - 1;
                    if ($response['number_change'] == 0) {
                        $response['number_change'] = 4;
                    }
                    return view('frontend.pages.comicPreview', $response);
                } else {
                    return redirect()->action('Frontend\ComicController@detailComic', [
                        'comic_slug' => $comic->comic_slug,
                        'comic_id' => $comic->comic_id
                    ]);
                }
            } catch (Exception $exc) {
                return redirect()->back()->with('error', 'Xin lỗi! Câu truyện này chưa đủ dữ liệu.');
            }
        } else {
            return redirect()->route('editComic', ['comic_slug' => $comic_slug, 'comic_id' => $comic_id, 'product_sku' => $product_sku])->with('error', 'Xin lỗi! Bạn không thể tạo mới 1 quyển truyện đã có trong giỏ hàng. Bạn có thể sửa hoặc tạo 1 quyển truyện mới !');
        }
    }

    public function createComic(ComicRequest $request)
    {
        if (!isset($_COOKIE[$request->product_sku])) {
            $comic_name = $request->comic_name;
            $comic_user = mb_strtoupper($this->convert_name($request->comic_user), 'UTF-8');
            //
            $comic_user_trim = str_replace(" ", "", $comic_user);
            $count_user = mb_strlen($comic_user_trim);

            $setting_sale_comics = SettingSaleComic::all();
            $comic_sale_percent = 0;
            if (count($setting_sale_comics) > 0) {
                foreach ($setting_sale_comics as $setting_sale_comic) {
                    if ($count_user >= $setting_sale_comic->quantity_word) {
                        $comic_sale_percent = $setting_sale_comic->comic_sale_percent;
                    }
                }
            }
            $list_id_story_present = array_unique($request->comic_id_story_present);
            $list_name_story_present = [];
            foreach ($list_id_story_present as $item) {
                $name_story_present = Story::select('story_name')->where('story_id', $item)->first();
                $list_name_story_present[] = $name_story_present->story_name;
            }
            $product_price = $request->comic_unit_price + $request->comic_unit_price * mb_strlen($comic_user_trim, 'UTF-8');
            $product_sku = $request->product_sku;
            $comic = [
                'comic_id' => $request->comic_id,
                'comic_slug' => $request->comic_slug,
                'comic_name' => $comic_name,
                'comic_user' => $request->comic_user,
                'comic_gender' => $request->comic_gender,
                'comic_message' => $request->comic_message,
                'comic_featured' => $request->comic_featured,
                'comic_id_story_present' => $request->comic_id_story_present,
                'comic_name_story_present' => json_encode($list_name_story_present),
                'quantity' => 1,
                'product_sku' => $product_sku,
                'product_price' => $product_price,
                'comic_unit_price' => $request->comic_unit_price,
                'product_sale_percent' => $comic_sale_percent,
            ];
            $product_price_sale = $product_price - $comic_sale_percent;
            $comic = json_encode($comic);
            setcookie($product_sku, $comic, time() + (86400 * 30), "/");
            if (!isset($_COOKIE['order_total_price'])) {
                setcookie('order_total_price', $product_price_sale, time() + (86400 * 30), "/");
            } else {
                $order_total_price = $_COOKIE['order_total_price'];
                setcookie('order_total_price', "", time() - (86400 * 30), "/");
                $order_total_price = $order_total_price + $product_price_sale;
                setcookie('order_total_price', $order_total_price, time() + (86400 * 30), "/");
            }
            return redirect()->action('Frontend\PageController@cart')->with('success', 'Bạn đã thêm truyện vào giỏ hàng thành công !');
        } else {
            return redirect()->route('editComic', ['comic_slug' => $request->comic_slug, 'comic_id' => $request->comic_id, 'product_sku' => $request->product_sku])->with('error', 'Xin lỗi ! Bạn không thể tạo mới 1 quyển truyện đã có trong giỏ hàng. Bạn có thể sửa hoặc tạo 1 quyển truyện mới !');
        }
    }

    public function editComic(Request $request, $comic_slug, $comic_id, $product_sku)
    {

        $comic_cookie = $_COOKIE[$product_sku];
        $comic_cookie = json_decode($comic_cookie);
        //Se chay doan if nay neu nguoi tao truyen chi sua ten chua an luu truyen
        if (isset($request->comic_user)) {
            $comic_user_edit = $request->comic_user;
            $comic_user_edit = mb_strtoupper($this->convert_name($comic_user_edit), 'UTF-8');
            $comic_user_edit = str_replace(" ", "", $comic_user_edit);

            //Split comic user
            $array_comic_word = preg_split('//u', $comic_user_edit);
            //Xoa 2 phan tu rong o 2 dau
            array_pop($array_comic_word);
            array_shift($array_comic_word);
            //Lay cac truyen con hien thi vaf id cua chung
            $stories = [];
            foreach ($array_comic_word as $item) {
                $stories_query = Story::select([
                    'story_id',
                    'story_name',
                    'story_icon',
                    'story_gender',
                    'story_alpha',
                    'story_images'
                ])->where('story_gender', $request->comic_gender)->where('story_alpha', $item)->where('comic_id', $comic_id);
                if (count($stories) > 0) {
                    foreach ($stories as $item2) {
                        $stories_query = $stories_query->where('story_id', '<>', $item2[0]->story_id);
                    }
                }
                $stories[] = $stories_query->take(1)->get();
            }
            $list_id_stories = [];
            foreach ($stories as $item2) {
                $list_id_stories[] = $item2[0]->story_id;
            }
            //Take all stories co lien quan den ten duoc tao
            $stories_all_query = Story::select([
                'story_id',
                'story_name',
                'story_icon',
                'story_gender',
                'story_alpha',
                'story_images'
            ])->where('comic_id', $comic_id);
            foreach ($array_comic_word as $item2) {
                $stories_all_query = $stories_all_query->orWhere('story_alpha', $item2);
            }
            $stories_all = $stories_all_query->get();
            //Get list image truyen con vua lay
            foreach ($stories as $story) {
                $story_image = json_decode($story[0]->story_images);
                foreach ($story_image as $item) {
                    $story_images[] = $item;
                }
            }
            //Lay trong tin truyen lon
            $comic = Comic::where('comic_id', $comic_id)
                ->where('comic_status', 1)
                ->first();
            $comic->comic_images = json_decode($comic->comic_images);
            $comic->comic_content = DB::table('comic_contents')
                ->where('comic_id', $comic_id)
                ->orderBy('content_index', 'ASC')
                ->get();

            $response = [
                'title' => $comic->comic_meta_title
            ];
            $response['product_sku'] = $product_sku;
            $response['comic_user'] = ucfirst($request->comic_user);
            $response['comic_gender'] = $request->comic_gender;
            $response['comic_message'] = $comic_cookie->comic_message;
            $response['array_comic_word'] = $array_comic_word;
            $response['stories'] = $stories;
            $response['list_id_stories'] = $list_id_stories;
            $response['stories_all'] = $stories_all;
            $response['comic'] = $comic;
            //Lay cac trang mo dau va ket thuc truyen
            $bm = Story::where('comic_id', $comic_id)->where('story_alpha', 'BM')->first();
            $tm1 = Story::where('comic_id', $comic_id)->where('story_alpha', 'TM1')->first();
            $tm2 = Story::where('comic_id', $comic_id)->where('story_alpha', 'TM2')->first();
            $tk = Story::where('comic_id', $comic_id)->where('story_alpha', 'TK')->first();
            $bk = Story::where('comic_id', $comic_id)->where('story_alpha', 'BK')->first();
            $response['bm'] = $bm;
            $response['tm1'] = $tm1;
            $response['tm2'] = $tm2;
            $response['tk'] = $tk;
            $response['bk'] = $bk;
            return view('frontend.pages.comicEdit', $response);
        } else {
            $comic_user = $comic_cookie->comic_user;
            $comic_user = mb_strtoupper($this->convert_name($comic_user), 'UTF-8');
            $comic_user = str_replace(" ", "", $comic_user);

            //Split comic user
            $array_comic_word = preg_split('//u', $comic_user);
            //Xoa 2 phan tu rong o 2 dau
            array_pop($array_comic_word);
            array_shift($array_comic_word);
            //Lay cac truyen con hien thi vaf id cua chung
            $list_id_stories = array_unique($comic_cookie->comic_id_story_present);
            $list_name_story_present = [];
            foreach ($list_id_stories as $item) {
                $name_story_present = Story::select('story_name')->where('story_id', $item)->first();
                $list_name_story_present[] = $name_story_present->story_name;
            }
            $stories = [];
            foreach ($list_id_stories as $item) {
                $stories_query = Story::select([
                    'story_id',
                    'story_name',
                    'story_icon',
                    'story_gender',
                    'story_alpha',
                    'story_images'
                ])->where('story_gender', $comic_cookie->comic_gender)->where('story_id', $item)->where('comic_id', $comic_id);
                //Chay vong for de khong lay trung 1 truyen
                if (count($stories) > 0) {
                    foreach ($stories as $item2) {
                        $stories_query = $stories_query->where('story_id', '<>', $item2[0]->story_id);
                    }
                }
                $stories[] = $stories_query->take(1)->get();
            }
            //Take all stories co lien quan den ten duoc tao
            $stories_all_query = Story::select([
                'story_id',
                'story_name',
                'story_icon',
                'story_gender',
                'story_alpha',
                'story_images'
            ])->where('comic_id', $comic_id);
            foreach ($array_comic_word as $item2) {
                $stories_all_query = $stories_all_query->orWhere('story_alpha', $item2);
            }
            $stories_all = $stories_all_query->get();
            //Get list image truyen con vua lay
            foreach ($stories as $story) {
                $story_image = json_decode($story[0]->story_images);
                foreach ($story_image as $item) {
                    $story_images[] = $item;
                }
            }
            //Lay trong tin truyen lon
            $comic = Comic::where('comic_id', $comic_id)
                ->where('comic_status', 1)
                ->first();
            $comic->comic_images = json_decode($comic->comic_images);
            $comic->comic_content = DB::table('comic_contents')
                ->where('comic_id', $comic_id)
                ->orderBy('content_index', 'ASC')
                ->get();

            $response = [
                'title' => $comic->comic_meta_title
            ];
            $response['product_sku'] = $product_sku;
            $response['comic_user'] = ucfirst($comic_cookie->comic_user);
            $response['comic_gender'] = $comic_cookie->comic_gender;
            $response['comic_message'] = $comic_cookie->comic_message;
            $response['array_comic_word'] = $array_comic_word;
            $response['stories'] = $stories;
            $response['list_id_stories'] = $list_id_stories;
            $response['stories_all'] = $stories_all;
            $response['comic'] = $comic;
            //Lay cac trang mo dau va ket thuc truyen
            $bm = Story::where('comic_id', $comic_id)->where('story_alpha', 'BM')->first();
            $tm1 = Story::where('comic_id', $comic_id)->where('story_alpha', 'TM1')->first();
            $tm2 = Story::where('comic_id', $comic_id)->where('story_alpha', 'TM2')->first();
            $tk = Story::where('comic_id', $comic_id)->where('story_alpha', 'TK')->first();
            $bk = Story::where('comic_id', $comic_id)->where('story_alpha', 'BK')->first();
            $response['bm'] = $bm;
            $response['tm1'] = $tm1;
            $response['tm2'] = $tm2;
            $response['tk'] = $tk;
            $response['bk'] = $bk;
            return view('frontend.pages.comicEdit', $response);
        }
    }

    public function doEditComic(ComicRequest $request)
    {

        $comic_user_edit = $request->comic_user;
        $comic_user_edit = mb_strtoupper($this->convert_name($comic_user_edit), 'UTF-8');
        $comic_user_edit = str_replace(" ", "", $comic_user_edit);
        $count_comic_user_edit = mb_strlen($comic_user_edit, 'UTF-8');

        $product_sku = $request->product_sku;
        $comic_cookie = json_decode($_COOKIE[$product_sku]);
        $comic_user_cookie = mb_strtoupper($this->convert_name($comic_cookie->comic_user), 'UTF-8');
        $comic_user_cookie = str_replace(" ", "", $comic_user_cookie);
        $count_comic_user_cookie = mb_strlen($comic_user_cookie, 'UTF-8');

        $count_change = $count_comic_user_edit - $count_comic_user_cookie;
        //Tinh lai phan tram duoc giam neu so chu cai thay doi
        $comic_sale_percent = $comic_cookie->product_sale_percent;
        $product_price = $comic_cookie->product_price;
        if ($count_change != 0) {
            $setting_sale_comics = SettingSaleComic::all();
            $comic_sale_percent = 0;
            if (count($setting_sale_comics) > 0) {
                foreach ($setting_sale_comics as $setting_sale_comic) {
                    if ($count_comic_user_edit >= $setting_sale_comic->quantity_word) {
                        $comic_sale_percent = $setting_sale_comic->comic_sale_percent;
                    }
                }
            }
            $product_price_new = $comic_cookie->comic_unit_price + $comic_cookie->comic_unit_price * $count_comic_user_edit - $comic_sale_percent;
            $order_total_price = $_COOKIE['order_total_price'];
            $order_total_price = $order_total_price - ($comic_cookie->product_price - $comic_cookie->product_price * $comic_cookie->product_sale_percent / 100 - $product_price_new);
            setcookie('order_total_price', "", time() - (86400 * 30), "/");
            setcookie('order_total_price', $order_total_price, time() + (86400 * 30), "/");
            //Dat lai gia cuon truyen ve 1 bien
            $product_price = $comic_cookie->comic_unit_price + $comic_cookie->comic_unit_price * $count_comic_user_edit;

        }
        //Luu lai cac story_name
        $list_id_story_present = array_unique($request->comic_id_story_present);
        $list_name_story_present = [];
        foreach ($list_id_story_present as $item) {
            $name_story_present = Story::select('story_name')->where('story_id', $item)->first();
            $list_name_story_present[] = $name_story_present->story_name;
        }
        $comic = [
            'comic_id' => $request->comic_id,
            'comic_slug' => $request->comic_slug,
            'comic_name' => $request->comic_name,
            'comic_user' => $request->comic_user,
            'comic_gender' => $request->comic_gender,
            'comic_message' => $request->comic_message,
            'comic_featured' => $request->comic_featured,
            'comic_id_story_present' => $request->comic_id_story_present,
            'comic_name_story_present' => json_encode($list_name_story_present),
            'quantity' => $comic_cookie->quantity,
            'product_sku' => $product_sku,
            'product_price' => $product_price,
            'comic_unit_price' => $comic_cookie->comic_unit_price,
            'product_sale_percent' => $comic_sale_percent
        ];
        $comic = json_encode($comic);
        if (isset($comic_cookie)) {
            setcookie($product_sku, "", time() - (86400 * 30), "/");
            setcookie($product_sku, $comic, time() + (86400 * 30), "/");
        } else {
            setcookie($product_sku, $comic, time() + (86400 * 30), "/");
        }
        return redirect()->action('Frontend\PageController@cart')->with('success', 'Bạn sửa truyện vào giỏ hàng thành công !');
    }
}

