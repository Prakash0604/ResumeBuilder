<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndustryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'industry_names'=>'required|unique:industries,industry_name',
        ];
    }


    public function messages(){
        return [
            [
                'industry_names.required'=>'Please the industry name',
                'industry_names.unique'=>'Name has already been taken'
            ]
            ];
    }
}
