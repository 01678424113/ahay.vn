<?php

namespace App\Http\Requests\Frontend;

use App\Http\Requests\Request;

class ComicRequest extends Request
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
    public function rules()
    {
        return [
            'comic_user' => "required|min:3|max:12",
            'comic_gender' => "required",
        ];
    }

    public function messages()
    {
        return [
            'comic_user.required' => "Tên không được để trống",
            'comic_user.min' => "Tên phải chứa lớn hơn 3 ký tự",
            'comic_user.max' => "Tên nhóm phải nhỏ hơn 12 ký tự",
            'comic_gender.required' => "Bạn chưa chọn giới tính",
        ];
    }
}
