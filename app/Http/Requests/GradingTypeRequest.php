<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradingTypeRequest extends FormRequest
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
            'grading_types.*'=>'required|unique:grading_types,grading_type',
        ];
    }

    public function messages(){
        return [
            'grading_types.*.required'=>'Please Enter the grading type name',
            'grading_types.*.unique'=>'Name already exists'
        ];
    }
}
