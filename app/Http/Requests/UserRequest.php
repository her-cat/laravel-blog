<?php

namespace App\Http\Requests;

use App\Handlers\ImageUploadHandler;
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
        $extensions = ImageUploadHandler::getAllowedExtensions();
        return [
            'name' => 'required|between:3,25|unique:users,name,'.$user->id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'introduction' => 'max:80',
            'avatar' => 'image|dimensions:min_width=208,min_height=208|mimes:'.implode(',', $extensions),
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => '用户名已被占用，请重新填写。',
            'name.between' => '用户名必须介于 3 - 25 个字符之间。',
            'name.required' => '用户名不能为空。',
            'email.unique' => '邮箱已被占用，请重新填写。',
            'avatar.dimensions' => '图片的清晰度不够，宽和高需要 208px 以上',
        ];
    }

    public function attributes()
    {
        return [
            'avatar' => '头像',
        ];
    }
}
