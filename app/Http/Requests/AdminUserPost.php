<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserPost extends FormRequest
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
           'username' => 'required|unique:admin_users,username',
           'password' => 'required',
           'nickname' => 'required|unique:admin_users,nickname',
        ];
    }

    /**
     * 验证信息
     */
    public function messages()
    {
        return [
            'username.required' => '请填写用户名',
            'username.unique' => '已经有用户名了,请更换',
            'password.required'  => '请填写密码',
            'nickname.required'  => '请填写您的昵称',
            'nickname.unique'  => '已经有昵称了,请更换',
        ];
    }
}
