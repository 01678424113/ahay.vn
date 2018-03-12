<?php

namespace App\Http\Controllers\Admin;

use App\Models\SettingSaleComic;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class SettingSaleComicController extends Controller
{
    public function listSettingSaleComic()
    {
        $response = [
            'title' => 'Khuyến mại truyện'
        ];

        $setting_sale_comic_query = SettingSaleComic::select([
            'setting_sale_comics.id',
            'setting_sale_comics.quantity_word',
            'setting_sale_comics.comic_sale_percent',
            'setting_sale_comics.status',
        ]);
        $response['setting_sale_comics'] = $setting_sale_comic_query->paginate(env('PAGINATE_ITEM', 20));
        return view('admin.setting_sale_comic.listSettingSaleComic', $response);
    }

    public function doAddSettingSaleComic(Request $request) {
        try {
            $quantity_word = $request->input('quantity-word');
            $setting_sale_comic = SettingSaleComic::select(['quantity_word'])->where('quantity_word', $quantity_word)->first();
            if (empty($setting_sale_comic)) {
                $setting_sale_comic = new SettingSaleComic();
                $setting_sale_comic->quantity_word = $request->input('quantity-word');
                $setting_sale_comic->comic_sale_percent = $request->input('sale-percent');
                $setting_sale_comic->status = $request->input('rd-status');
                try {
                    $setting_sale_comic->save();
                    return redirect()->back()->with('success', 'Thêm khuyến mại thành công');
                } catch (\Exception $exc) {
                    return redirect()->back()->with('error', "Lỗi trong quá trình xử lý dữ liệu");
                }
            } else {
                return redirect()->back()->with('error', "Khuyến mại đã tồn tại");
            }
        } catch (\Exception $exc) {
            return redirect()->back()->with('error', "Lỗi trong quá trình xử lý dữ liệu");
        }
    }

    public function loadSettingSaleComic(Request $request) {

        if ($request->ajax()) {

            $validator = Validator::make($request->all(), [
                'setting_sale_percent_id' => "required|alpha_num",
            ], [
                'setting_sale_percent_id.required' => "Khuyến mại không hợp lệ",
                'setting_sale_percent_id.alpha_num' => "Khuyến mại không hợp lệ",
            ]);

            if (!$validator->fails()) {
                try {
                    $setting_sale_percent = SettingSaleComic::select(['id', 'quantity_word', 'comic_sale_percent', 'status'])
                        ->where('id', $request->input('setting_sale_percent_id'))->first();
                    if (!empty($setting_sale_percent)) {
                        return response()->json([
                            "status_code" => 200,
                            "data" => $setting_sale_percent
                        ]);
                    } else {
                        return response()->json([
                            "status_code" => 404,
                            "message" => "Khuyến mại không tồn tại",
                        ]);
                    }
                } catch (\Exception $ex) {
                    return response()->json([
                        "status_code" => 500,
                        "message" => "Lỗi trong quá trình xử lý dữ liệu ",
                    ]);
                }
            } else {
                return response()->json([
                    "status_code" => 422,
                    "message" => $validator->errors()->first(),
                ]);
            }
        }
        return redirect()->action('Admin\SettingSaleComicController@listSettingSaleComic')->with('error', 'Không được truy cập trực tiếp');
    }

    public function doEditSettingSaleComic(Request $request) {
        try {
            $quantity_word = $request->input('quantity-word');
            $setting_sale_comic = SettingSaleComic::where('quantity_word', $quantity_word)->first();
            if (!empty($setting_sale_comic)) {
                $setting_sale_comic->quantity_word = $request->input('quantity-word');
                $setting_sale_comic->comic_sale_percent = $request->input('sale-percent');
                $setting_sale_comic->status = $request->input('rd-status');
                try {
                    $setting_sale_comic->save();
                    return redirect()->back()->with('success', 'Sửa khuyến mại thành công');
                } catch (\Exception $exc) {
                    return redirect()->back()->with('error', "Lỗi trong quá trình xử lý dữ liệu");
                }
            } else {
                return redirect()->back()->with('error', "Khuyến mại đã tồn tại");
            }
        } catch (\Exception $exc) {
            return redirect()->back()->with('error', "Lỗi trong quá trình xử lý dữ liệu");
        }
    }

    public function doDeleteSettingSaleComic(Request $request) {
        try {
            $setting_sale_comic = SettingSaleComic::select(['id'])->where('id', $request->input('txt-id'))->first();
            if (!empty($setting_sale_comic)) {
                try {
                    $setting_sale_comic->delete();
                    return redirect()->back()->with('success', 'Xóa khuyến mại thành công');
                } catch (\Exception $exc) {
                    return redirect()->back()->with('error', 'Lỗi trong quá trình xử lý dữ liệu');
                }
            } else {
                return redirect()->back()->with('error', 'Thành viên không tồn tại');
            }
        } catch (\Exception $exc) {
            return redirect()->back()->with('error', 'Lỗi trong quá trình xử lý dữ liệu');
        }
    }
}
