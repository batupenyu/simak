<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'nis' => 'unique:students|max:7|required',
            'name' => 'required',
            'gender' => 'required',
            'class_id' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'class_id' => 'class',
        ];
    }

    public function messages()
    {
        return [
            'nis.required' => 'NIS Wajib di isi !',
            'nis.max' => 'NIS maksimal :max karakter',
        ];
    }
}
