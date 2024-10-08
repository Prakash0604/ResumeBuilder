<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DegreeRequest extends FormRequest
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
            'degree_names.*'=>'required|min:3|unique:degrees,degree_name'
        ];
    }

    public function messages(){
        return [
            'degree_names.*.required'=>'Please Enter the degree name',
            'degree_names.*.min'=>'Name should be at least 3 character long',
            'degree_names.*.unique'=>'Name already taken'
        ];
    }
}
