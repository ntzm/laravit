<?php

namespace App\Http\Requests;

class StorePostRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'   => 'required|max:100',
            'content' => 'required',
        ];
    }
}
