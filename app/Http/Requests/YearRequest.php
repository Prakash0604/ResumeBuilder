<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YearRequest extends FormRequest
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
            "year_names.*"=>'required|unique:years,year_name',
        ];
    }

    public function messages()
    {
        return [
            "year_names.*.required"=>'Please enter year name',
            "year_names.*.unique"=>'Name has been already taken',
        ];
    }
}
