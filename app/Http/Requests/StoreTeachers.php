<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StoreTeachers extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'email|required|unique:teachers'.$this->id,
            'password' => 'required',
            'name' => 'required|unique:teachers,'.$this->id,
            'name_en' => 'required|unique:teachers,'.$this->id,
            'specialization_id' => 'required',
            'gender_id' => 'required',
            'joining_date' => 'required',
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans('validation.required'),
            'email.unique' => trans('validation.unique'),
            'password.required' => trans('validation.required'),
            'name.required' => trans('validation.required'),
            'name.unique' => trans('validation.unique'),
            'name_en.required' => trans('validation.required'),
            'name_en.unique' => trans('validation.unique'),
            'joining_date.required' => trans('validation.required'),
            'joining_date.date' => trans('validation.date'),
            'address.required' => trans('validation.required'),
            'specialization_id.required' => trans('validation.required'),
            'gender_id.required' => trans('validation.required'),
        ];
    }
}
