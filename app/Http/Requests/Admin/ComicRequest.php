<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ComicRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
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
            'txt-unit-price' => 'required|alpha_num',
        ];
    }

    public function messages() {
        return [
            'txt-name.required' => "Tên truyện không được để trống",
            'txt-unit-price.required' => "Đơn giá không được để trống",
            'txt-unit-price.alpha_num' => "Đơn giá không hợp lệ",
        ];
    }

}
