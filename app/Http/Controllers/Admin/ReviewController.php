<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function listReview()
    {
        $response = [
            'title' => 'Danh sách cảm nhận khách hàng'
        ];
        $reviews = Review::where('id', '>', 0)->get();
        $response['reviews'] = $reviews;
        return view('admin.review.listReview', $response);
    }

    public function addReview(Request $request)
    {
        $response = [
            'title' => 'Tạo cảm nhận'
        ];
        return view('admin.review.addReview', $response);
    }

    public function doAddReview(Request $request)
    {
        $review = new Review();
        $review->review_name = $request->txt_name;
        $review->review_title = $request->txt_title;
        $review->review_content = $request->txt_content;
        $review->review_status = $request->txt_status;
        $review->created_at = time();
        $review->save();
        return redirect()->route('listReview')->with('success', 'Đã tạo cảm nhận thành công !');
    }

    public function editReview(Request $request, $review_id)
    {
        $review = Review::find($review_id);
        $response = [
            'title' => 'Sửa cảm nhận'
        ];
        $response['review'] = $review;
        return view('admin.review.editReview', $response);
    }

    public function doEditReview(Request $request, $review_id)
    {
        $review = Review::find($review_id);
        $review->review_name = $request->txt_name;
        $review->review_title = $request->txt_title;
        $review->review_content = $request->txt_content;
        $review->review_status = $request->txt_status;
        $review->created_at = time();
        $review->save();
        return redirect()->route('listReview')->with('success', 'Đã sửa cảm nhận thành công !');
    }

    public function doDeleteReview(Request $request)
    {
        $review = Review::where('id', $request->input('txt-id'))->first();
        $review->delete();
        return redirect()->back()->with('success', 'Bạn đã xóa cảm nhận thành công !');
    }
}
