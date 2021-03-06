<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class DeleteRequest extends Request {

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
            'txt-id' => "required|alpha_num"
        ];
    }

    public function messages() {
        return [
            'txt-id.required' => 'ID không hợp lệ',
            'txt-id.alpha_num' => 'ID không hợp lệ',
        ];
    }

}
