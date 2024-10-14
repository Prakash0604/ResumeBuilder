<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
            "skill_names.*"=>'required|unique:skills,skill_name'
        ];
    }

    public function messages(){
        return [
            "skill_names.*.required"=>'Please enter the name of the skill',
            "skill_names.*.unique"=>'Name has been already taken',
        ];
    }
}
