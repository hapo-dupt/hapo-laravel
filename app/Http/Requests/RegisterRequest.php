<?php

namespace App\Http\Requests;

use http\Env\Request;
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
            'name' => 'required|regex:/^[a-zA-Z ]+$/|max:50',
            'email' => 'required|email|unique:members',
            'gender' => 'required',
            'username' => 'required|max:25|unique:members',
            'password' => 'required|min:3|max:10',
            'repassword' => 'required|min:3|max:10|same:password'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'name.regex' => 'Name is only included alphabets! Example: John Wick',
            'name.max' => 'Name only have maximize 50 characters!',
            'email.required' => 'Email is required!',
            'email.email' => 'You must be enter correct email!',
            'gender.required' => 'Name is required!',
            'username.required' => 'Username is required!',
            'username.max' => 'Username is only maximize 25 characters!',
            'password.required' => 'Password is required!',
            'password.min' => 'Password is required minimize 3 characters!',
            'password.max' => 'Password is required maximize 10 characters!',
            'repassword.required' => 'Repassword is required!',
            'repassword.min' => 'Repassword is required minimize 3 characters!',
            'repassword.max' => 'Repassword is only maximize 10 characters!',
            'repassword.same' => 'Repassword must to be same with password!'
        ];
    }
}
