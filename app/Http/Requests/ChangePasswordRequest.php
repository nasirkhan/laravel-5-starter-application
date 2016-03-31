<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class ChangePasswordRequest
 * @package App\Http\Requests\Frontend\Access
 */
class ChangePasswordRequest extends Request {

    public function authorize() {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ];
    }

}
