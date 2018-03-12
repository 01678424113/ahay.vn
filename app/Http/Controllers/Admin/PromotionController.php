<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUpload;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\PromotionRequest;
use App\Models\Promotion;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PromotionController extends Controller
{
    public function listPromotion(Request $request)
    {
        $response = [
            'title'=>'Danh sách khuyến mại'
        ];
        $promotions_query = Promotion::select([
            'promotion_id',
            'promotion_name',
            'promotion_type',
            'promotion_condition',
            'promotion_percent_discount',
            'promotion_start',
            'promotion_expired',
            'promotion_featured'
        ])->orderBy('promotion_start','DESC');
        if ($request->has('title') && $request->input('title') != "") {
            $promotions_query->where('promotion_name', 'LIKE', '%' . $request->input('title') . '%');
        }

        $response['promotions'] = $promotions_query->paginate(20);
        return view('admin.promotion.listPromotion',$response);
    }

    public function addPromotion(Request $request)
    {
        $response = [
            'title'=>'Tạo khuyến mại'
        ];
        return view('admin.promotion.addPromotion',$response);
    }

    public function doAddPromotion(PromotionRequest $request)
    {
        $promotion = new Promotion();
        $promotion->promotion_name = trim($request->input('txt-name'));
        $promotion->promotion_type = $request->input('txt-type');
        $promotion->promotion_condition = $request->input('txt-condition');
        $promotion->promotion_percent_discount = $request->input('txt-percent-discount');
        $promotion->promotion_start = $request->input('txt-start');
        $promotion->promotion_expired = $request->input('txt-expired');
        if ($request->has('txt-featured-type')) {
            if ($request->hasFile('file-featured') && $request->input('txt-featured-type') == 'file') {
                $promotion->promotion_featured = ImageUpload::image($request->file('file-featured'), md5('promotion_' . $promotion->promotion_name . time()));
            } elseif ($request->input('txt-featured') != "" && $request->input('txt-featured-type') == 'url') {
                $promotion->promotion_featured = ImageUpload::image($request->input('txt-featured'), md5('promotion_' . $promotion->promotion_name . time()));
            }
        }
        try {
            $promotion->save();
            return redirect()->action('Admin\PromotionController@editPromotion',$promotion->promotion_id)->with('success', 'Đã thêm khuyến mại thành công !');
        } catch (\Exception $exc) {
            dd($exc);
            return redirect()->back()->with('error', "Lỗi trong quá trình xử lý dữ liệu");
        }
    }

    public function editPromotion(Request $request, $promotion_id) {
        try {
            $promotion = Promotion::where('promotion_id', $promotion_id)->first();

            if (!empty($promotion)) {

                $response = [
                    'title' => "Sửa khuyến mại: " . $promotion->promotion_name
                ];

                $response['promotion'] = $promotion;

                return view('admin.promotion.editPromotion', $response);
            } else {
                return redirect()->action('Admin\ArticleController@listArticle')->with('error', 'Khuyến mại không tồn tại');
            }
        } catch (\Exception $exc) {
            return redirect()->action('Admin\ArticleController@listArticle')->with('error', 'Lỗi trong quá trình xử lý dữ liệu');
        }
    }

    public function doEditPromotion(PromotionRequest $request, $promotion_id) {
        try {
            $promotion = Promotion::where('promotion_id', $promotion_id)->first();
            if (!empty($promotion)) {
                $promotion->promotion_name = trim($request->input('txt-name'));
                $promotion->promotion_type = $request->input('txt-type');
                $promotion->promotion_condition = $request->input('txt-condition');
                $promotion->promotion_percent_discount = $request->input('txt-percent-discount');
                $promotion->promotion_start = $request->input('txt-start');
                $promotion->promotion_expired = $request->input('txt-expired');
                if ($request->has('txt-featured-type')) {
                    if ($request->hasFile('file-featured') && $request->input('txt-featured-type') == 'file') {
                        $promotion->promotion_featured = ImageUpload::image($request->file('file-featured'), md5('promotion_' . $promotion->promotion_name . time()));
                    } elseif ($request->input('txt-featured') != "" && $request->input('txt-featured-type') == 'url') {
                        $promotion->promotion_featured = ImageUpload::image($request->input('txt-featured'), md5('promotion_' . $promotion->promotion_name . time()));
                    }
                }
                try {
                    $promotion->save();
                    return redirect()->back()->with('success', 'Đã sửa khuyến mại thành công !');
                } catch (\Exception $exc) {
                    return redirect()->back()->with('error', "Lỗi trong quá trình xử lý dữ liệu");
                }
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Lỗi trong quá trình xử lý dữ liệu');
        }
    }

    public function doDeletePromotion(DeleteRequest $request) {
        try {
            $promotion = Promotion::select(['promotion_name', 'promotion_id'])->where('promotion_id', $request->input('txt-id'))->first();
            if (!empty($promotion)) {
                try {
                    $title = $promotion->promotion_name;
                    $promotion->delete();

                    return redirect()->back()->with('success', 'Xóa khuyến mại "' . $title . '" thành công');
                } catch (\Exception $exc) {
                    return redirect()->back()->with('error', 'Lỗi trong quá trình xử lý dữ liệu');
                }
            } else {
                return redirect()->back()->with('error', 'Khuyến mại không tồn tại');
            }
        } catch (\Exception $exc) {
            return redirect()->back()->with('error', 'Lỗi trong quá trình xử lý dữ liệu');
        }
    }
}
