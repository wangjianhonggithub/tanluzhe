<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPost extends FormRequest
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
            'username'=>'required|unique:users',
            'email'=>'required|unique:users|email',
            'mobile'=>'required|unique:users',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'answer'=>'required',
            'checkCode'=>'required',
            'verCode'=>'required',
            'events'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '请填写用户名',
            'username.unique' => '用户名重复',
            'email.required'  => '请填写邮箱',
            'email.unique'  => '您填写的邮箱已经被使用',
            'email.email'  => '请输入正确的电子邮箱地址',
            'mobile.required'  => '请填写手机号',
            'mobile.unique'  => '您填写的手机号已经被使用',
            'password.required'  => '请填写密码',
            'password.confirmed'  => '两次密码不一致哦',
            'password_confirmation.required'=>'确认密码不能为空哦',
            'answer.required'  => '请填写密保答案',
            'verCode.required'  => '短信验证码不正确',
            'checkCode.required'  => '请填写验证码',
            'events.required'  => '请勾选注册会员须知',
        ];
    }
}
