<?php

namespace App\Http\Requests;

use App\Rules\PasswordChecker;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'current_password' => ['required', 'string', new PasswordChecker()],
            'new_password' => 'required|string',
            'repeated_password' => 'required|string|same:new_password',
        ];
    }
}
