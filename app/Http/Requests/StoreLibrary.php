<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLibrary extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'file_name' => 'required|mimes:pdf',
            'level_id' => 'required',
            'classroom_id' => 'required',
            'section_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('validation.required'),
            'file_name.required' => trans('validation.required'),
            'file_name.file' => trans('validation.file'),
            'level_id.required' => trans('validation.required'),
            'classroom_id.required' => trans('validation.required'),
            'section_id.required' => trans('validation.required')
        ];
    }
}
