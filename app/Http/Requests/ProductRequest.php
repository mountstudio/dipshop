<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:150|string',
            'image' => 'required_if:edit,1|file|mimes:jpeg,jpg,png',
            'price' => 'required|numeric|max:99999|min:0',
            'category_id' => 'required'
        ];
    }
}
