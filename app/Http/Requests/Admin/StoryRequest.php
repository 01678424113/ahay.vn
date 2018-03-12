<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class StoryRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
   public function rules() {
        return [
            'txt-name' => 'required',
            'sl-comic' => 'required|alpha_num',
            'txt-alpha' => 'required|min:1',
        ];
    }

    public function messages() {
        return [
            'txt-name.required' => "Tên truyện không được để trống",
            'sl-comic.required' => "Truyện cha không hợp lệ",
            'sl-comic.alpha_num' => "Truyện cha không hợp lệ",
            'txt-alpha.required' => "Chữ cái không được để trống",
            'txt-alpha.min' => "Chữ cái không hợp lệ",
        ];
    }
}
