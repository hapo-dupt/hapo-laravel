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
            'name' => 'required|regex:/^[a-zA-Z ]+$/|max:50',
            'email' => 'required|email',
            'gender' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required|string|max:255',
            'image' => 'max:10000'
        ];
    }

    /**
     * Send message when invalid validation.
     */
    public function messages()
    {
        return [
            'name.required' => 'Full name is required!',
            'name.regex' => 'You must to enter the correct format of name!',
            'name.max' => 'Name is only maximize 50 characters of alphabet!',
            'email.required' => 'Email is required!',
            'email.email' => 'Format email was not correct!',
            'gender.required' => 'Gender is required!',
            'phone.required' => 'Phone is required!',
            'phone.numberic' => 'Format phone was not correct!',
            'address.required' => 'Address is required!',
            'address.string' => 'Format address was not correct!',
            'address.max' => 'Address is only maximize 255 characters!',
            'image.max' => 'Avatar image is only maximize 10000 KB'
        ];
    }
}
