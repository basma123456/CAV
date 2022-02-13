<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerUpdateRequest extends FormRequest
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
     * @param Customer $customer
     * @return array
     */
    public function rules()
    {

        return [
            "full_name"     => 'required',
            'email'         => ['required','email', Rule::unique('customers', 'email')->ignore($this->customer)],
            'phone'         => ['required','min:11','max:11', Rule::unique('customers', 'phone')->ignore($this->customer)],
            'password'      => 'sometimes|nullable|max:10|min:6',
            'nid'           => ['required','max:14', 'min:14', Rule::unique('customers', 'nid')->ignore($this->customer)],
            'address'       => 'required',
            "customer_type" => 'required|'. Rule::in(['personal', 'company']),
            'status'        => 'required|' .Rule::in(['1','0']),
            ''

        ];
    }
}
