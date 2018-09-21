<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelpPost extends FormRequest
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
           'title' => 'required',
           'description' => 'required',
           'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '请填写标题',
            'description.required' => '请填写描述',
            'content.required'  => '请填写内容',
        ];
    }
}
