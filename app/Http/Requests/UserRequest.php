<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $user = Auth::user();
        return [
            'name' => 'required|between:3,25|unique:users,name,'.$user->id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'introduction' => 'max:80',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => '用户名已被占用，请重新填写。',
            'name.between' => '用户名必须介于 3 - 25 个字符之间。',
            'name.required' => '用户名不能为空。',
            'email.unique' => '邮箱已被占用，请重新填写',
        ];
    }
}
