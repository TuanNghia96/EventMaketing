<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    const SALE = 1;
    const NEW = 2;
    const FAIR = 3;
    const SPECIAL = 4;
    const MEETING = 5;
    const HOLIDAY = 6;

    public $timestamps = true;
    protected $table = 'events';
    protected $fillable = [
        'name',
        'title',
        'code',
        'location',
        'summary',
        'image',
        'type',
        'public_date',
        'start_date',
        'end_date',
        'voucher_id',
        'point',
    ];

    public static $classify = [
        self::SALE => 'Giảm giá',
        self::NEW => 'Ra mắt sp mới',
        self::FAIR => 'Hội chợ',
        self::SPECIAL => 'Kỷ niệm thày lập, khai trương',
        self::MEETING => 'Hội nghị, hội thảo',
        self::HOLIDAY => 'Ngày lễ',
    ];
    const TYPE = [
        1 => 'Thời trang',
        2 => 'Điện tử',
        3 => 'Phong cách số',
        4 => 'Hàng tiêu dùng',
        5 => 'Đồ ăn',
        6 => 'Khác',
    ];

    public function user()
    {
        return $this->hasOne('App\Models\Voucher');
    }

    /**
     * Pagination data of model
     *
     * @param array $input input data to search
     * @return Illuminate\Pagination\Paginator
     */
    public function getPaginate($input)
    {
        return self::get();
    }
}
