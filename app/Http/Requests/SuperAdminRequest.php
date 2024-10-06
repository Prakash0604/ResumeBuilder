<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuperAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|unique:users,email,except,id',
            'password'=>'required|min:6',
            'gender'=>'required',
            'address'=>'required',
            'dob'=>'required|date'
        ];
    }

    public function messages(){
        return [
            'first_name.required'=>'Please Enter your Fist Name',
            'last_name.required'=>'Please Enter your Last Name',
            'email.required'=>'Please Enter your Email',
            'email.unique'=>'Email Already Taken',
            'password.required'=>'Please Enter your password',
            'password.min'=>'Password should be at least of 6 character',
            'gender.required'=>'Please Select the gender',
            'address.required'=>'Please Enter your address',
            'dob.required'=>'Please Enter your Date of Birth',
            'dob.date'=>'Date of birth should be of type date',
        ];
    }
}
