<?php

namespace App\Http\Requests\Api;

class ReplyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required|string|min:6'
        ];
    }

    public function attributes()
    {
        return [
            'content' => '回复内容'
        ];
    }
}
