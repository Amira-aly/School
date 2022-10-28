<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StoreClassrooms extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:classrooms,name->ar,'.$this->id,
            'name_en' => 'required|unique:classrooms,name->en,'.$this->id,
            'level_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.required'),
            'name.unique' => trans('validation.unique'),
            'name_en.required' => trans('validation.required'),
            'name_en.unique' => trans('validation.unique'),
            'level_id.required' => trans('validation.required')
        ];
    }
}
