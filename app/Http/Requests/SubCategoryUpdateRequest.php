<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubCategoryUpdateRequest extends FormRequest
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
            'name_ar'   => ['required', Rule::unique('sub_categories', 'name->ar')->ignore($this->subCategory)],
            'name_en'   => ['required', Rule::unique('sub_categories', 'name->en')->ignore($this->subCategory)],
            'category'  => 'required|exists:categories,id',
            'status'    => 'required|boolean',
        ];
    }
}
