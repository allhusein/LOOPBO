<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'name' => 'required|min:3|max:255',
                'username' =>'required|unique:users,username|max:255|min:4',
                'nim' =>'required|unique:users,nim|max:255|min:4',
                'nim' =>'required|max:255',
                'email' => 'email|required|unique:users,email|min:7|max:255',
                'password' => 'required|min:7|confirmed'
        ];
    }
}
