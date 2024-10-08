<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobLevelRequest extends FormRequest
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
            'job_level_names.*'=>'required|unique:job_levels,job_level_name',
        ];
    }

    public function messages(){
        return [
                'job_level_names.*.required'=>'Please enter the Job Level name',
                'job_level_names.*.unique'=>'Name has already been taken'
            ];
    }
}
