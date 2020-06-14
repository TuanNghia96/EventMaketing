<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\Coupon;
use App\Models\Type;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class UserUpdateRequest extends FormRequest
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
            'confirm_password' => 'nullable|string|min:6|same:password',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bank_account' => 'nullable|string|min:12',
            'phone' => 'required|string|min:10',
            'address' => 'required|string|max:255',
            "event_category" => "nullable|numeric|in:" . implode(',', Category::pluck('id')->toArray()),
            "event_type" => "nullable|numeric|in:" . implode(',', Type::pluck('id')->toArray()),
        ];
    }
}
