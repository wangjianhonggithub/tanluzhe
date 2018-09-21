<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdate extends FormRequest
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
            'email'=>'email',
            'mobile'=>'regex:/^1[34578][0-9]{9}$/',
        ];
    }


    public function messages()
    {
        return [
            'email.email' => '请输入正确的邮箱',
            'mobile.regex'  => '请输入正确的手机号',
        ];
    }
}
