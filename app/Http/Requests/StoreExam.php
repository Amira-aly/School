<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExam extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'name_en' => 'required',
            'subject_id' => 'required',
            'level_id' => 'required',
            'classroom_id' => 'required',
            'section_id' => 'required',
            'teacher_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.required'),
            'name_en.required' => trans('validation.required'),
            'subject_id.required' => trans('validation.required'),
            'level_id.required' => trans('validation.required'),
            'classroom_id.required' => trans('validation.required'),
            'section_id.required' => trans('validation.required'),
            'teacher_id.required' => trans('validation.required')
        ];
    }
}
