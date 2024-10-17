<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalInformationRequest extends FormRequest
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
            'first_name'=>'required|string|max:255',
            'middle_name'=>'nullable|string|max:255',
            'last_name'=>'required|string|max:255',
            'email'=>'required|email',
            'address'=>'required|string|max:500',
            'contact'=>'required|numeric|min:7',
            'dob'=>'required|date',
            'gender'=>'required|in:Male,Female,Others',
            'image'=>'nullable|image',
            'summary'=>'nullable|string|max:1000',
        ];
    }

    public function messages(){
        return[
            'first_name.required'=>'First Name Field is Required',
            'last_name.required'=>'Last Name Field is Required',
            'email.required'=>'Email Field is Required',
            'email.email'=>'Email should be type of email eg:prakash@gmail.com',
            'address.required'=>'Address Field is required',
            'contact.required'=>'Contact Field is required',
            'contact.numeric'=>'Contact Field must be a type of number',
            'contact.min'=>'Minimun 7 letter of number is required'
        ];
    }
}
