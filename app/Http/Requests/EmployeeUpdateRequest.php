<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeUpdateRequest extends FormRequest
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

            "fName"         => 'required|max:100',
            'password'      => 'sometimes|nullable|min:6|max:12',
            'email'         =>  ['required', Rule::unique('employees','email')->ignore($this->employee)],
            'department'    => 'required|exists:departments,id',
            'status'        => 'required|boolean',
            'balance'       => 'required',
            'phone'         => ['required','min:11','max:11', Rule::unique('employees', 'phone')->ignore($this->employee)],
            'nid'           => ['required','min:14','max:14', Rule::unique('employees', 'nid')->ignore($this->employee)],
            'avatar'        => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pic_nid'       => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
