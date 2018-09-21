<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreColumnPost extends FormRequest
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
           'name' => 'required',
           'icon' => 'required',
           'url' => 'required',
        ];

    }


    public function messages()
    {
        return [
            'name.required' => '栏目名是必填的',
            'icon.required'  => '栏目图标是必填的',
            'url.required'  => '栏目地址是必填的',
        ];
    }
}
