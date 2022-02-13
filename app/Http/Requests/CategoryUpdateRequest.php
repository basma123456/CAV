<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryUpdateRequest extends FormRequest
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
            'name_ar' => ['required', Rule::unique('categories', 'name->ar')->ignore($this->x)],
            'name_en' => ['required', Rule::unique('categories', 'name->en')->ignore($this->x)],
            'status'  => 'required|boolean',
        ];
    }
}
