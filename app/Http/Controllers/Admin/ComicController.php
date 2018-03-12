<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ComicRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Models\Comic;
use ImageUpload;
use DB;

class ComicController extends Controller {

    public function listComic(Request $request) {
        $response = [
            'title' => "Truyện tranh"
        ];
        $comic_query = Comic::select([
                    'comic_id',
                    'comic_name',
                    'comic_featured',
                    'comic_suggest',
                    'comic_unit_price',
                    'comic_increase_price',
                    'comic_meta_title',
                    'comic_status',
                ])
                ->orderBy('comic_created_at', 'DESC');
        if ($request->has('name') && $request->input('name') != "") {
            $comic_query->where('comic_name', 'LIKE', '%' . $request->input('name') . '%');
        }
        if ($request->has('status') && is_numeric($request->input('status'))) {
            $comic_query->where('comic_status', $request->input('status'));
        }
        if ($request->has('suggest') && is_numeric($request->input('suggest'))) {
            $comic_query->where('comic_suggest', $request->input('suggest'));
        }
        if ($request->has('id_comic') && is_numeric($request->input('id_comic'))) {
            $comic_query->where('comic_id', $request->input('id_comic'));
        }
        $response['comics'] = $comic_query->paginate(env('PAGINATE_ITEM', 20));
        return view('admin.comic.listComic', $response);
    }

    public function addComic() {
        $response = [
            'title' => "Thêm truyện tranh"
        ];
        return view('admin.comic.addComic', $response);
    }

    public function doAddComic(ComicRequest $request) {
        $comic = new Comic;
        $comic->comic_name = trim($request->input('txt-name'));
        $comic->comic_slug = str_slug($request->input('txt-name'));
        $comic->comic_description = trim($request->input('txt-description'));
        $comic->comic_video = $request->input('txt-video');
        $comic->comic_suggest = $request->input('comic_suggest');
        $comic->comic_unit_price = $request->input('txt-unit-price');
        $comic->comic_increase_price = $request->input('txt-increase-price');
        if ($request->has('txt-featured-type')) {
            if ($request->hasFile('file-featured') && $request->input('txt-featured-type') == 'file') {
                $comic->comic_featured = ImageUpload::image($request->file('file-featured'), md5('comic_' . $comic->comic_name . time()));
            } elseif ($request->input('txt-featured') != "" && $request->input('txt-featured-type') == 'url') {
                $comic->comic_featured = ImageUpload::image($request->input('txt-featured'), md5('comic_' . $comic->comic_name . time()));
            }
        }
        if ($request->has('txt-images')) {
            $comic->comic_images = json_encode(array_slice($request->input('txt-images'), 0, 6));
        } else {
            $comic->comic_images = json_encode([]);
        }
        if ($request->input('txt-meta-title') != "") {
            $comic->comic_meta_title = trim($request->input('txt-meta-title'));
        } else {
            $comic->comic_meta_title = $comic->comic_name;
        }
        $comic->comic_meta_desc = trim($request->input('txt-meta-desc'));
        $comic->comic_status = $request->input('rd-status');
        $comic->comic_created_at = microtime(true);
        $comic->comic_created_by = $request->session()->get('user')->user_id;
        try {
            $comic->save();
            $comic_contents = [];
            for ($i = 1; $i <= 5; $i++) {
                $comic_content = [];
                $comic_content['comic_id'] = $comic->comic_id;
                $comic_content['content_index'] = $i;
                if ($request->has('txt-content-image-type-' . $i)) {
                    if ($request->hasFile('file-content-image-' . $i) && $request->input('txt-content-image-type-' . $i) == 'file') {
                        $comic_content['content_image'] = ImageUpload::image($request->file('file-content-image-' . $i), md5('comic_content_' . $i . '_' . $comic->comic_name . time()));
                    } elseif ($request->input('txt-content-image-' . $i) != "" && $request->input('txt-content-image-type-' . $i) == 'url') {
                        $comic_content['content_image'] = ImageUpload::image($request->input('txt-content-image-' . $i), md5('comic_content_' . $i . '_' . $comic->comic_name . time()));
                    } else {
                        $comic_content['content_image'] = "";
                    }
                }
                $comic_content['content_title'] = $request->has('txt-content-title-' . $i) ? trim($request->input('txt-content-title-' . $i)) : '';
                $comic_content['content_text'] = $request->has('txt-content-text-' . $i) ? trim($request->input('txt-content-text-' . $i)) : '';
                array_push($comic_contents, $comic_content);
            }
            DB::table('comic_contents')->insert($comic_contents);
            return redirect()->action('Admin\ComicController@listComic')->with('success', 'Thêm truyện tranh "' . $comic->comic_name . '" thành công');
        } catch (\Exception $exc) {
            return redirect()->back()->with('error', "Lỗi trong quá trình xử lý dữ liệu ");
        }
    }

    public function editComic(Request $request, $comic_id) {
        try {
            $comic = Comic::where('comic_id', $comic_id)->first();
            if (!empty($comic)) {
                $response = [
                    'title' => "Sửa truyện tranh: " . $comic->comic_name
                ];
                $comic->comic_images = json_decode($comic->comic_images);
                $comic_contents_raw = DB::table('comic_contents')
                        ->where('comic_id', $comic->comic_id)
                        ->orderBy('content_index', 'ASC')
                        ->get();
                $comic_contents = [];
                foreach ($comic_contents_raw as $comic_content) {
                    array_push($comic_contents, $comic_content);
                }
                $comic->comic_contents = $comic_contents;
                $response['comic'] = $comic;
                return view('admin.comic.editComic', $response);
            } else {
                return redirect()->action('Admin\ComicController@listComic')->with('error', 'Truyện tranh không tồn tại');
            }
        } catch (\Exception $exc) {
            return redirect()->action('Admin\ComicController@listComic')->with('error', 'Lỗi trong quá trình xử lý dữ liệu');
        }
    }

    public function doEditComic(ComicRequest $request, $comic_id) {
        try {
            $comic = Comic::where('comic_id', $comic_id)->first();
            if (!empty($comic)) {
                $comic->comic_name = trim($request->input('txt-name'));
                $comic->comic_slug = str_slug($request->input('txt-name'));
                $comic->comic_description = trim($request->input('txt-description'));
                $comic->comic_suggest = $request->input('comic_suggest');
                $comic->comic_video = $request->input('txt-video');
                $comic->comic_unit_price = $request->input('txt-unit-price');
                $comic->comic_increase_price = $request->input('txt-increase-price');
                if ($request->has('txt-featured-type')) {
                    if ($request->hasFile('file-featured') && $request->input('txt-featured-type') == 'file') {
                        $comic->comic_featured = ImageUpload::image($request->file('file-featured'), md5('comic_' . $comic->comic_name . time()));
                    } elseif ($request->input('txt-featured') != "" && $request->input('txt-featured-type') == 'url') {
                        $comic->comic_featured = ImageUpload::image($request->input('txt-featured'), md5('comic_' . $comic->comic_name . time()));
                    }
                }
                if ($request->has('txt-images')) {
                    $comic->comic_images = json_encode(array_slice($request->input('txt-images'), 0, 6));
                } else {
                    $comic->comic_images = json_encode([]);
                }
                if ($request->input('txt-meta-title') != "") {
                    $comic->comic_meta_title = trim($request->input('txt-meta-title'));
                } else {
                    $comic->comic_meta_title = $comic->comic_name;
                }
                $comic->comic_meta_desc = trim($request->input('txt-meta-desc'));
                $comic->comic_status = $request->input('rd-status');
                $comic->comic_updated_at = microtime(true);
                $comic->comic_updated_by = $request->session()->get('user')->user_id;
                try {
                    $comic->save();
                    DB::table('comic_contents')->where('comic_id', $comic->comic_id)->delete();
                    $comic_contents = [];
                    for ($i = 1; $i <= 5; $i++) {
                        $comic_content = [];
                        $comic_content['comic_id'] = $comic->comic_id;
                        $comic_content['content_index'] = $i;
                        if ($request->has('txt-content-image-type-' . $i)) {
                            if ($request->hasFile('file-content-image-' . $i) && $request->input('txt-content-image-type-' . $i) == 'file') {
                                $comic_content['content_image'] = ImageUpload::image($request->file('file-content-image-' . $i), md5('comic_content_' . $i . '_' . $comic->comic_name . time()));
                            } elseif ($request->input('txt-content-image-' . $i) != "" && $request->input('txt-content-image-type-' . $i) == 'url') {
                                $comic_content['content_image'] = ImageUpload::image($request->input('txt-content-image-' . $i), md5('comic_content_' . $i . '_' . $comic->comic_name . time()));
                            } else {
                                $comic_content['content_image'] = str_replace(env('APP_URL'), "", $request->input('txt-content-image-' . $i));
                            }
                        }
                        $comic_content['content_title'] = $request->has('txt-content-title-' . $i) ? trim($request->input('txt-content-title-' . $i)) : '';
                        $comic_content['content_text'] = $request->has('txt-content-text-' . $i) ? trim($request->input('txt-content-text-' . $i)) : '';
                        array_push($comic_contents, $comic_content);
                    }
                    DB::table('comic_contents')->insert($comic_contents);
                    return redirect()->back()->with('success', 'Sửa truyện tranh "' . $comic->comic_name . '" thành công');
                } catch (\Exception $exc) {
                    dd($exc->getMessage());
                    return redirect()->back()->with('error', "Lỗi trong quá trình xử lý dữ liệu ");
                }
            } else {
                return redirect()->action('Admin\ComicController@listComic')->with('error', 'Truyện tranh không tồn tại');
            }
        } catch (\Exception $exc) {
            dd($exc->getMessage());
            return redirect()->back()->with('error', 'Lỗi trong quá trình xử lý dữ liệu');
        }
    }

    public function doDeleteComic(DeleteRequest $request) {
        try {
            $comic = Comic::select(['comic_name', 'comic_id'])->where('comic_id', $request->input('txt-id'))->first();
            if (!empty($comic)) {
                try {
                    $comic->delete();
                    return redirect()->back()->with('success', 'Xóa truyện "' . $comic->comic_name . '" thành công');
                } catch (\Exception $exc) {
                    return redirect()->back()->with('error', 'Lỗi trong quá trình xử lý dữ liệu');
                }
            } else {
                return redirect()->back()->with('error', 'Truyện tranh không tồn tại');
            }
        } catch (\Exception $exc) {
            return redirect()->back()->with('error', 'Lỗi trong quá trình xử lý dữ liệu');
        }
    }

}
