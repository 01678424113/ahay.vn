<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WebsiteRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Models\Website;
use App\Models\UserActivity;
use App\Models\Audience;
use App\Models\Adsense;
use ImageUpload;
use DB;

class WebsiteController extends Controller
{

    public function getSettingBanner1()
    {
        $response = [
            'title' => 'Chỉnh sửa banner 1'
        ];
        $banner = Banner::find(1);
        $response['banner'] = $banner;
        return view('admin.website.settingBanner', $response);
    }

    public function getSettingBanner2()
    {
        $response = [
            'title' => 'Chỉnh sửa banner 2'
        ];
        $banner = Banner::find(2);
        $response['banner'] = $banner;
        return view('admin.website.settingBanner', $response);
    }

    public function getSettingBanner3()
    {
        $response = [
            'title' => 'Chỉnh sửa banner 3'
        ];
        $banner = Banner::find(3);
        $response['banner'] = $banner;
        return view('admin.website.settingBanner', $response);
    }

    public function getSettingBanner4()
    {
        $response = [
            'title' => 'Chỉnh sửa banner 4'
        ];
        $banner = Banner::find(4);
        $response['banner'] = $banner;
        return view('admin.website.settingBanner', $response);
    }

    public function getSettingBanner5()
    {
        $response = [
            'title' => 'Chỉnh sửa banner 5'
        ];
        $banner = Banner::find(5);
        $response['banner'] = $banner;
        return view('admin.website.settingBanner', $response);
    }

    public function getSettingBanner6()
    {
        $response = [
            'title' => 'Chỉnh sửa banner 6'
        ];
        $banner = Banner::find(6);
        $response['banner'] = $banner;
        return view('admin.website.settingBanner', $response);
    }

    public function postSettingBanner(Request $request)
    {
        $banner_id = $request->banner_id;
        $banner = Banner::find($banner_id);
        if ($request->has('txt-featured-type')) {
            if ($request->hasFile('file-featured') && $request->input('txt-featured-type') == 'file') {
                $banner->image = ImageUpload::image($request->file('file-featured'), md5('banner_' . time()));
            } elseif ($request->input('txt-featured') != "" && $request->input('txt-featured-type') == 'url') {
                $banner->image = ImageUpload::image($request->input('txt-featured'), md5('banner_' . time()));
            }
        }
        $banner->save();
        return redirect()->back()->with('success', 'Đã sửa banner thành công !');
    }
}
