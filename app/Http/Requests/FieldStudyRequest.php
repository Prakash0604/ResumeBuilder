<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FieldStudyRequest extends FormRequest
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
            'field_names.*'=>'required|unique:fields,field_name'
        ];
    }

    public function messages(){
        return [
            'field_names.*.required'=>'Please Enter the filed name',
            'field_names.*.unique'=>'Name already taken'
        ];
    }
}
