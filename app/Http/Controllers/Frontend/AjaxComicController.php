<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Story;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AjaxComicController extends Controller
{
    //
    public function changeStory()
    {
        $id_comic_present = $_GET['data_story_present'];
        $id_comic_change = $_GET['data_story_change'];
        $comic_change = Story::where('story_id', $id_comic_change)->first();
        $response['comic_change'] = $comic_change;
        $image_change = json_decode($comic_change->story_images);
        $response['image_change'] = $image_change;
        $response['id_comic_present'] = $id_comic_change;
        $response['id_comic_change'] = $id_comic_present;
        $response['story_icon_change'] = $comic_change->story_icon;
        $response['story_name_change'] = $comic_change->story_name;
        return $response;

    }
}
