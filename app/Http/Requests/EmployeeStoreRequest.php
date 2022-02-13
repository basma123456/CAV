<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
            'name'          => 'required|max:100',
            'password'      => 'required|min:6|max:12',
            'email'         => 'required|unique:employees,email',
            'department'    => 'required|exists:departments,id',
            'status'        => 'required|boolean',
            'balance'       => 'required',
            'phone'         => 'required|unique:employees,phone|min:11|max:11',
            'nid'           => 'required|unique:employees,nid|max:14|min:14',
            'avatar'        => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pic_nid'       => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }
}
