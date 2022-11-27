<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username' => 'required|min:3|max:50|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required_with:repeat|min:3|max:50',
            'repeat' => 'required|same:password',
        ];
    }
}
