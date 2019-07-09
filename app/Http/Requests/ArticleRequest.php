<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch ($this->method()) {
            // CREATE
            case 'POST':
            // UPDATE
            case 'PUT':
            case 'PATCH':
                return [
                    'title' => 'required|min:2',
                    'content' => 'required|min:3',
                    'category_id' => 'required|numeric|exists:categories,id',
                ];
            case 'GET':
            case 'DELETE':
            default:
                return [];
        }
    }

    public function messages()
    {
        return [
            'title.min' => '标题必须至少两个字符',
            'content.min' => '文章内容必须至少三个字符',
        ];
    }
}
