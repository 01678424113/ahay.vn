<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class PromotionRequest extends Request
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
            'txt-name' => "required",
            'txt-type' => "required",
            'txt-condition' => "required",
            'txt-percent-discount' => "required",
            'txt-start' => "required",
            'txt-expired' => "required"

        ];
    }

    public function messages() {
        return [
            'txt-name.required' => "Tên khuyến mại không được để trống",
            'txt-type.required' => "Kiểu không được để trống",
            'txt-condition.required' => "Điều kiện không được để trống",
            'txt-percent-discount.required' => "Số phần trăm giảm không được để trống",
            'txt-start.required' => "Thời gian bắt đầu không được để trống",
            'txt-expired.required' => "Thời gian kết thúc không được để trống",

        ];
    }
}
