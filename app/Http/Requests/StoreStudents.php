<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StoreStudents extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'email|required|unique:students'.$this->id,
            'password' => 'required',
            'name' => 'required|unique:students'.$this->id,
            'gender_id' => 'required',
            'nationality_id' => 'required',
            'date_birth' => 'required|date',
            'level_id' => 'required',
            'classroom_id' => 'required',
            'section_id' => 'required',
            'parent_id' => 'required',
            'academic_year' => 'required',
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
            'gender_id.required' => trans('validation.required'),
            'nationality_id.required' => trans('validation.required'),
            'date_birth.required' => trans('validation.required'),
            'date_birth.date' => trans('validation.date'),
            'level_id.required' => trans('validation.required'),
            'classroom_id.required' => trans('validation.required'),
            'section_id.required' => trans('validation.required'),
            'academic_year.required' => trans('validation.required'),
        ];
    }
}
