<?php

namespace App\Http\Requests;

class ReplyRequest extends Request
{
    public function rules()
    {
        return [
            'content' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'content.required' => '回复内容不能为空',
            'content.min' => '回复内容太短啦，不能少于3个字符',
        ];
    }
}
