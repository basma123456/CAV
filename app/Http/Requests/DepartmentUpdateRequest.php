<?php

namespace App\Http\Requests;

use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class DepartmentUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name_ar'       => ['required', Rule::unique('departments' , 'name->ar')->ignore($this->department)],
            'name_en'       => ['required', Rule::unique('departments' , 'name->en')->ignore($this->department)],
            "description"   => 'required',
            'status'        => 'required|boolean',
        ];
    }
}
