<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryStoreRequest extends FormRequest
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
            'name_ar'   => 'required|unique:sub_categories,name->ar',
            'name_en'   => 'required|unique:sub_categories,name->en',
            'category'  => 'required|exists:categories,id',
            'status'    => 'required|boolean',
        ];
    }
}
