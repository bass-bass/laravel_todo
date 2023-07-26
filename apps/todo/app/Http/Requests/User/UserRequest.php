<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'  => 'required',
            'email' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ];
    }
}