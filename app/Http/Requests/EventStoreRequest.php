<?php

namespace App\Http\Requests;

use App\Models\Event;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class EventStoreRequest extends FormRequest
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
            "name" => "required|string|max:30",
            "title" => "required|string|max:30",
            "location" => "nullable|string|max:30",
            "summary" => "nullable|string|max:255",
            "type" => "required|numeric|in:" . implode(',', array_keys(Event::TYPE)),
            "classify" => "required|numeric|in:" . implode(',', array_keys(Event::$classify)),
            "ticket_number" => "required|numeric|min:100",
            "public_date" => "required|date_format:Y-m-d|after:" . Carbon::now()->addDay(2)->format('Y-m-d'),
            "public_time" => "required|date_format:H:i",
            "start_date" => "required|date_format:Y-m-d|after:" . Carbon::parse($this->get('public_date'))->addDay(1),
            "start_time" => "required|date_format:H:i",
            "end_date" => "required|date_format:Y-m-d|after:start_date",
            "end_time" => "required|date_format:H:i",
            "images.*.image" => "required|image",
            "images.*.title" => "required|string|max:30",
            "avatar" => "required|image",
        ];
    }
}
