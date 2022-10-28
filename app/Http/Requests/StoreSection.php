<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StoreSection extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:sections,name->ar,'.$this->id,
            'name_en' => 'required|unique:sections,name->en,'.$this->id,
            'level_id' => 'required',
            'classroom_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.required'),
            'name.unique' => trans('validation.unique'),
            'name_en.required' => trans('validation.required'),
            'name_en.unique' => trans('validation.unique'),
            'level_id' => trans('validation.required'),
            'classroom_id' => trans('validation.required'),
        ];
    }
}
