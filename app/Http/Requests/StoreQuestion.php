<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestion extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'answers' => 'required',
            'right_answer' => 'required',
            'score' => 'required',
            'exam_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('validation.required'),
            'answers.required' => trans('validation.required'),
            'right_answer.required' => trans('validation.required'),
            'score.required' => trans('validation.required'),
            'exam_id.required' => trans('validation.required')
        ];
    }
}
