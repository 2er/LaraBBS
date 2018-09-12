<?php
/**
 * Created by PhpStorm.
 * User: wuchuanchuan
 * Date: 2018/9/12
 * Time: 上午9:41
 */

namespace App\Http\Requests\Api;

use Dingo\Api\Http\FormRequest as BaseFormRequest;

class FormRequest extends BaseFormRequest
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
}