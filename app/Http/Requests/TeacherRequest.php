<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
                'address_ar' => 'required|string',
                'address_en' => 'required|string',
                'email' => 'required|email|unique:teachers,email,' . $this->id,
                'date' => 'required|date',
                'password' => 'required|string',
                'special_id' => 'required',
                'gender_id' => 'required',
            ];
        } else {
            return [
                'name_ar' => 'required|string',
                'name_en' => 'required|string',
                'address_ar' => 'required|string',
                'address_en' => 'required|string',
                'email' => 'required|email|unique:teachers,email,' . $this->id,
                'date' => 'required|date',
                'special_id' => 'required',
                'gender_id' => 'required',
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
            'address_ar.required' => __('validation.required'),
            'address_ar.string' => __('validation.min'),
            'address_en.required' => __('validation.required'),
            'address_en.string' => __('validation.min'),
            'email.unique' => __('validation.exists_trans'),
            'email.required' => __('validation.required'),
            'password.required' => __('validation.required'),
            'special_id.required' => __('validation.required'),
            'gender_id.required' => __('validation.required'),
            'date.required' => __('validation.required'),
        ];
    }
}
