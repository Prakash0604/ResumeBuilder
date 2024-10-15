<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradingRequest extends FormRequest
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
            'grading_names.*'=>'required|unique:gradings,grading_name'
        ];
    }

    public function messages(){
        return [
            'grading_names.*.required'=>'Please Enter the grading name',
            'grading_names.*.unique'=>'Name has been already taken'
        ];
    }
}
