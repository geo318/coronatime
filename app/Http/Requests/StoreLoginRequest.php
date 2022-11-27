<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username' => 'required_without:email|min:3|max:50',
            'email' => 'required_without:username|email|exists:users,email',
            'password' => 'required|min:3|max:50',
            'remember' => 'sometimes|in:true',
        ];
    }
}
