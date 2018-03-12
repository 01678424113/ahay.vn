<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoryRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Controllers\Controller;
use App\Models\Comic;
use App\Models\Story;
use ImageUpload;

class StoryController extends Controller
{

    public function listStory(Request $request)
    {
        $response = [
            'title' => "Truyện theo chữ cái"
        ];
        $story_query = Story::select([
            'stories.story_id',
            'stories.story_icon',
            'stories.story_name',
            'stories.story_gender',
            'stories.story_alpha',
            'stories.story_status',
            'comics.comic_name',
        ])
            ->join('comics', 'comics.comic_id', '=', 'stories.comic_id')
            ->orderBy('story_created_at', 'DESC');
        if ($request->has('name') && $request->input('name') != "") {
            $story_query->where('stories.story_name', 'LIKE', '%' . $request->input('name') . '%');
        }
        if ($request->has('alpha') && $request->input('alpha') != "") {
            $story_query->where('stories.story_alpha', $request->input('alpha'));
        }
        if ($request->has('comic') && is_numeric($request->input('comic'))) {
            $story_query->where('stories.comic_id', $request->input('comic'));
        }
        if ($request->has('status') && is_numeric($request->input('status'))) {
            $story_query->where('stories.story_status', $request->input('status'));
        }
        $response['comics'] = Comic::select([
            'comic_id',
            'comic_name'
        ])
            ->get();
        $response['stories'] = $story_query->paginate(env('PAGINATE_ITEM', 20));
        return view('admin.story.listStory', $response);
    }

    public function addStory()
    {
        $response = [
            'title' => "Thêm truyện"
        ];
        $response['comics'] = Comic::select([
            'comic_id',
            'comic_name'
        ])
            ->get();
        return view('admin.story.addStory', $response);
    }

    public function doAddStory(StoryRequest $request)
    {
        $story = new Story;
        $story->story_name = trim($request->input('txt-name'));
        $story->story_gender = $request->input('txt-gender');
        $story->comic_id = trim($request->input('sl-comic'));
        $story->story_alpha = mb_strtoupper(trim($request->input('txt-alpha')), 'UTF-8');
        if ($request->has('txt-icon-type')) {
            if ($request->hasFile('file-icon') && $request->input('txt-icon-type') == 'file') {
                $story->story_icon = ImageUpload::image($request->file('file-icon'), md5('story_' . $story->story_name . time()));
            } elseif ($request->input('txt-icon') != "" && $request->input('txt-icon-type') == 'url') {
                $story->story_icon = ImageUpload::image($request->input('txt-icon'), md5('story_' . $story->story_name . time()));
            }
        }
        if ($request->has('txt-images')) {
            $story->story_images = json_encode($request->input('txt-images'));
        } else {
            $story->story_images = json_encode([]);
        }
        $story->story_status = $request->input('rd-status');
        $story->story_created_at = microtime(true);
        $story->story_created_by = $request->session()->get('user')->user_id;
        try {
            $story->save();
            return redirect()->action('Admin\StoryController@listStory')->with('success', 'Thêm truyện "' . $story->story_name . '" thành công');
        } catch (\Exception $exc) {
            return redirect()->back()->with('error', "Lỗi trong quá trình xử lý dữ liệu");
        }
    }

    public function editStory(Request $request, $story_id)
    {
        try {
            $story = Story::where('story_id', $story_id)->first();
            if (!empty($story)) {
                $response = [
                    'title' => "Sửa truyện tranh: " . $story->story_name,
                ];
                $story->story_images = json_decode($story->story_images);
                $response['story'] = $story;
                $response['comics'] = Comic::select([
                    'comic_id',
                    'comic_name'
                ])
                    ->get();
                return view('admin.story.editStory', $response);
            } else {
                return redirect()->action('Admin\StoryController@listStory')->with('error', 'Truyện tranh không tồn tại');
            }
        } catch (\Exception $exc) {
            return redirect()->action('Admin\StoryController@listStory')->with('error', 'Lỗi trong quá trình xử lý dữ liệu');
        }
    }

    public function doEditStory(StoryRequest $request, $story_id)
    {
        try {
            $story = Story::select(['story_id'])
                ->where('story_id', $story_id)->first();
            if (!empty($story)) {
                $story->story_name = trim($request->input('txt-name'));
                $story->story_gender = $request->input('txt-gender');
                $story->comic_id = trim($request->input('sl-comic'));
                $story->story_alpha = mb_strtoupper(trim($request->input('txt-alpha')), 'UTF-8');
                if ($request->has('txt-icon-type')) {
                    if ($request->hasFile('file-icon') && $request->input('txt-icon-type') == 'file') {
                        $story->story_icon = ImageUpload::image($request->file('file-icon'), md5('story_' . $story->story_name . time()));
                    } elseif ($request->input('txt-icon') != "" && $request->input('txt-icon-type') == 'url') {
                        $story->story_icon = ImageUpload::image($request->input('txt-icon'), md5('story_' . $story->story_name . time()));
                    }
                }
                if ($request->has('txt-images')) {
                    $story->story_images = json_encode($request->input('txt-images'));
                } else {
                    $story->story_images = json_encode([]);
                }
                $story->story_status = $request->input('rd-status');
                $story->story_updated_at = microtime(true);
                $story->story_updated_by = $request->session()->get('user')->user_id;
                try {
                    $story->save();
                    return redirect()->back()->with('success', 'Sửa truyện "' . $story->story_name . '" thành công');
                } catch (\Exception $exc) {
                    return redirect()->back()->with('error', "Lỗi trong quá trình xử lý dữ liệu");
                }
            }
        } catch (\Exception $exc) {
            return redirect()->back()->with('error', 'Lỗi trong quá trình xử lý dữ liệu');
        }
    }

    public function doDeleteStory(DeleteRequest $request)
    {
        try {
            $story = Story::select(['story_name', 'story_id'])
                ->where('story_id', $request->input('txt-id'))->first();
            if (!empty($story)) {
                try {
                    $story->delete();
                    return redirect()->back()->with('success', 'Xóa truyện tranh "' . $story->story_name . '" thành công');
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
