<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
            'txt-sku' => "required",
            'txt-name' => "required",
            'txt-price' => "alpha_num",
            'sl-category' => "required|alpha_num",
            'file-featured' => "image",
        ];
    }

    public function messages() {
        return [
            'txt-sku.required' => "Mã sản phẩm không được để trống",
            'txt-name.required' => "Tên sản phẩm không được để trống",
            'txt-price.alpha_num' => "Giá sản phẩm không hợp lệ",
            'sl-category.required' => "Chưa chọn chuyên mục",
            'sl-category.alpha_num' => "Chuyên mục không hợp lệ",
            'file-featured.image' => "Ảnh tiêu biểu không hợp lệ",
        ];
    }
}
