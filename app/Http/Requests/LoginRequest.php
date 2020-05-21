<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:3|max:10'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required or not empty!',
            'email.email' => 'You must to be enter a email format correctly!',
            'password.required' => 'Password is required!',
            'password.min' => 'Password must to be 3 characters',
            'password.max' => 'Password is only maximize 10 characters'
        ];
    }
}
