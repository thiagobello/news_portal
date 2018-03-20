<?php

namespace news_portal\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return 
        [
            'users_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'title' => 'required|min:3',
            'date' => 'required|max:255',
            'notice' => 'required|max:255'
        ];
    }
}
