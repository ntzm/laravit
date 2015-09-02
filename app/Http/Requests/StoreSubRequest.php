<?php

namespace App\Http\Requests;

class StoreSubRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|between:3,20|alpha_num|unique:subs',
        ];
    }
}
