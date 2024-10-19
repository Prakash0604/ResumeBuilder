<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
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
            'position'=>'required',
            'organization_name'=>'required',
            'roles_responsibility'=>'required|string',
            'industry_id'=>'required',
            'job_level_id'=>'required',
            'starting_date'=>'required|date',
            'ending_date'=>'nullable',
            'status'=>'nullable',
        ];
    }

    public function messages(){
        return [
            'position.required'=>'Please Enter your position',
            'organization_name.required'=>'Please Enter your Organization Name',
            'roles_responsibility.required'=>'Please Enter your Roles and Responsibility',
            'industry_id.required'=>'Please Select Industry',
            'job_level_id.required'=>'Please Select Job Level',
            'starting_date.required'=>'Please Enter the date',
        ];
    }
}
