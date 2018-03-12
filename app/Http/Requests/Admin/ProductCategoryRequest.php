<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ProductCategoryRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'txt-name' => "required"
        ];
    }

    public function messages() {
        return [
            'txt-name.required' => "Tên chuyên mục không được để trống"
        ];
    }

}
