<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StoreLevels extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:levels,name->ar,'.$this->id,
            'name_en' => 'required|unique:levels,name->en,'.$this->id,
            'notes' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.required'),
            'name.unique' => trans('validation.unique'),
            'name_en.required' => trans('validation.required'),
            'name_en.unique' => trans('validation.unique'),
            'notes' => trans('validation.required')
        ];
    }
}
