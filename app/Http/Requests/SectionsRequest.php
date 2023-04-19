<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'section_name_ar' => 'required',
            'section_name_en' => 'required',
            'grade_id' => 'required',
            'class_id' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'section_name_ar.required' => __('validation.required'),
            'section_name_en.required' => __('validation.required'),
            'grade_id.required' => __('validation.required'),
            'class_id.required' => __('validation.required')
        ];
    }
}
