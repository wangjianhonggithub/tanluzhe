<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SoftWarePost extends FormRequest
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
           'software' => 'required',
           'cover' => 'required',
           'softwarename' => 'required',
           'platform' => 'required',
           'description' => 'required',
           'up' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'software.required' => '请选择要上传的软件',
            'cover.required' => '请选择封面图',
            'softwarename.required'  => '请定义软件的标题',
            'platform.required'  => '请填写软件适用的平台/系统',
            'description.required'  => '请填写资源描述',
            'up.required'  => '请仔细阅读须知然后勾选',
        ];
    }
}
