<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\Coupon;
use App\Models\Event;
use App\Models\Type;
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
            "location" => "nullable|string|max:100",
            "summary" => "nullable|string",
            "type_id" => "required|numeric|in:" . implode(',', Type::pluck('id')->toArray()),
            "category_id" => "required|numeric|in:" . implode(',', Category::pluck('id')->toArray()),
            "coupon_id" => "nullable|numeric|in:" . implode(',', Coupon::pluck('id')->toArray()),
            "ticket_number" => "required|numeric|min:100",
            "public_date" => "required|date_format:d-m-Y H:i:s|after:" . Carbon::now()->addDay(2)->format('Y-m-d  H:i:s'),
//            "start_date" => "required|date_format:d-m-Y H:i:s|after:" . Carbon::parse($this->get('public_date'))->addDay(1),
            "start_date" => "required|date_format:d-m-Y H:i:s|after:public_date",
            "end_date" => "required|date_format:d-m-Y H:i:s|after:start_date",
            "images.*.image" => "required|image",
            "images.*.title" => "required|string|max:30",
            "avatar" => "required|image",
        ];
    }

    public function attributes()
    {
        return[
            "name" => "Tên",
            "title" => "Tiêu đề",
            "location" => "Đại điểm chính",
            "summary" => "",
            "type_id" => "Thể loại",
            "category_id" => "Danh mục",
            "coupon_id" => "Mã giảm giá",
            "ticket_number" => "Số vé",
            "public_date" => "Ngày công bố",
            "public_time" => "Giờ công bố",
            "start_date" => "Ngày bắt đầu",
            "start_time" => "Giờ bắt đầu",
            "end_date" => "Ngày kết thúc",
            "end_time" => "Thời gian kết thúc",
            "images.*.image" => "Tiêu đề ảnh",
            "images.*.title" => "Ảnh thêm",
            "avatar" => "Ảnh đại diện",
        ];
    }
}
