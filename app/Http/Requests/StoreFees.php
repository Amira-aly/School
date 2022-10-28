<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StoreFees extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'title_en' => 'required',
            'amount' => 'required|numeric',
            'level_id' => 'required',
            'classroom_id' => 'required',
            'year' => 'required',
            'fee_type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('validation.required'),
            'title_en.required' => trans('validation.required'),
            'amount.required' => trans('validation.required'),
            'amount.numeric' => trans('validation.numeric'),
            'level_id.required' => trans('validation.required'),
            'classroom_id.required' => trans('validation.required'),
            'year.required' => trans('validation.required'),
            'fee_type.required' => trans('validation.required'),
        ];
    }
}
