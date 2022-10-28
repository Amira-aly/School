<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreZoom extends FormRequest
{
    public function authorize()
    {
        return true;

    }

    public function rules()
    {
        return [
            'level_id' => 'required',
            'classroom_id' => 'required',
            'section_id' => 'required',
            'topic' => 'required',
            'start_time' => 'required',
            'duration' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'level_id.required' => trans('validation.required'),
            'classroom_id.required' => trans('validation.required'),
            'section_id.required' => trans('validation.required'),
            'topic.required' => trans('validation.required'),
            'start_time.required' => trans('validation.required'),
            'duration.required' => trans('validation.required')
        ];
    }
}
