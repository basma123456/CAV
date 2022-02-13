<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerStoreRequest extends FormRequest
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
            "full_name"     => 'required',
            'email'         => 'required|unique:customers,email',
            'phone'         => 'required|unique:customers,phone|max:11|min:11',
            'password'      => 'required|max:10|min:6',
            'nid'           => 'required|min:14|max:14|unique:customers,nid',
            'address'       => 'required',
            "customer_type" => 'required|'. Rule::in(['personal', 'company']),
            'cr_no'         =>  'required_if:customer_type,company|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pic_nid'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];

    }
}
