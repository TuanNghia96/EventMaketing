<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|email|max:100|unique:users,email,' . $this->id . ',id,deleted_at,NULL',
            'password_confirmation' => 'required_with:password|same:password|max:255',
            'name' => 'required|max:255',
            'address' => 'nullable|max:255',
            'phone' => 'digits_between:0, 15',
            'password' => 'max:255|string|' . (($this->method() == 'POST') ? 'required' : 'nullable'),
            'role' => 'required',
            'classroom_id' => 'required',
        ];
    }

    /**
     * change attributes name
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'email' => 'địa chỉ email',
            'password' => 'mật khẩu',
            'password_confirmation' => 'mật khẩu xác nhận',
            'name' => 'tên',
            'address' => 'địa chỉ',
            'phone' => 'số điện thoại',
            'role' => 'vai trò',
            'classroom_id' => 'lớp',
        ];
    }
}
