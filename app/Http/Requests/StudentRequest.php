<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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

        if ($this->password) {
            return [
                'name_ar' => 'required|string',
                'name_en' => 'required|string',
                'email' => 'required|email|unique:students,email,' . $this->id,
                'password' => 'required|min:6|max:15',
                'date' => 'required|date',
                'year' => 'required|string',
                'grade' => 'required',
                'gender' => 'required',
                'nationalitie' => 'required',
                'blood' => 'required',
                'guardian' => 'required',
                'classroom' => 'required',
                'section' => 'required',
            ];
        } else {
            return [
                'name_ar' => 'required|string',
                'name_en' => 'required|string',
                'email' => 'required|email|unique:students,email,' . $this->id,
                'date' => 'required|date',
                'year' => 'required|string',
                'grade' => 'required',
                'gender' => 'required',
                'nationalitie' => 'required',
                'blood' => 'required',
                'guardian' => 'required',
                'classroom' => 'required',
                'section' => 'required',
            ];
        }
    }

    public function messages(): array
    {
        return [
            'name_ar.required' => __('validation.required'),
            'name_ar.string' => __('validation.min'),
            'name_en.required' => __('validation.required'),
            'name_en.string' => __('validation.min'),
            'password.required' => __('validation.required'),
            'password.min' => __('validation.min'),
            'password.max' => __('validation.max'),
            'email.required' => __('validation.required'),
            'email.unique' => __('validation.exists_trans'),
            'date.required' => __('validation.required'),
            'year.required' => __('validation.required'),
            'year.string' => __('validation.min'),
            'grade.required' => __('validation.required'),
            'gender.required' => __('validation.required'),
            'nationalitie.required' => __('validation.required'),
            'blood.required' => __('validation.required'),
            'guardian.required' => __('validation.required'),
            'classroom.required' => __('validation.required'),
            'section.required' => __('validation.required'),
        ];
    }
}
