<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
            'degree_id'=>'required',
            'field_id'=>'required',
            'institute'=>'required',
            'university'=>'required',
            'grading_type_id'=>'required',
            'joined_year_id'=>'required',
            'passed_year_id'=>'nullable',
            'current_studying'=>'nullable'
        ];
    }

    public function messages(){
        return [
            'degree_id.required'=>'Please Select Degree',
            'field_id.required'=>'Please Select Field',
            'institute.required'=>'Please Enter Institute Name',
            'university.required'=>'Please Enter University Name',
            'grading_type_id.required'=>'Please Select Grading Type',
            'joined_year_id.required'=>'Please Select Join Date',
        ];
    }
}
