<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:6',
            'password_confirm' => 'nullable|string|min:6|same:password',
            'name' => 'required|string|max:255',
            'birthday' => 'nullable',
        ];
    }
}
