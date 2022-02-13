<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PlanStoreRequest extends FormRequest
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
            'name_ar'           => ['required','unique:plans,name->ar'],
            'name_en'           => ['required','unique:plans,name->en'],
            'description_ar'    => 'required',
            'description_en'    => 'required',
            'image'             => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price'             => 'required|regex:/^[0-9]+$/',
            'discount'          => 'sometimes|nullable|regex:/^[0-9]+$/',
            'discount_type'     => 'required_if:discount,!=,NULL|' . Rule::in(['percentage', 'fixed']),
            'status'            => 'required|boolean',
            'subCategory'       => 'required|exists:sub_categories,id',
        ];
    }
}
