<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'full_name' => 'required|regex:/^[a-zA-Z ]+$/|max:50',
            'email' => 'required|email',
            'gender' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|min:3|max:10',
            'repassword' => 'nullable|min:3|max:10|same:password'
        ];
    }

    /**
     * Send message when invalid validation.
     */
    public function messages()
    {
        return [
            'full_name.required' => 'Full name is required!',
            'full_name.regex' => 'You must to enter the correct format of name!',
            'full_name.max' => 'Name is only maximize 50 characters of alphabet!',
            'email.required' => 'Email is required!',
            'email.email' => 'Format email was not correct!',
            'gender.required' => 'Gender is required!',
            'phone.required' => 'Phone is required!',
            'phone.numberic' => 'Format phone was not correct!',
            'address.required' => 'Address is required!',
            'address.string' => 'Format address was not correct!',
            'address.max' => 'Address is only maximize 255 characters!',
            'image.max' => 'Avatar image is only maximize 2048 KB',
            'image.mimes' => 'You are only allowed to upload image (included: jpeg,png,jpg,gif,svg)',
            'password.min' => 'Password is required minimize 3 characters!',
            'password.max' => 'Password is required maximize 10 characters!',
            'repassword.min' => 'Repassword is required minimize 3 characters!',
            'repassword.max' => 'Repassword is only maximize 10 characters!',
            'repassword.same' => 'Repassword must to be same with password!'
        ];
    }
}
