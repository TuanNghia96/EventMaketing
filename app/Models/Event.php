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
        'sumary',
        'image',
        'type',
        'public_date',
        'start_date',
        'end_date',
        'voucher_id',
        'point',
    ];

    public static $type = [
        self::SALE => 'Giảm giá',
        self::NEW => 'Ra mắt sp mới',
        self::FAIR => 'Hội chợ',
        self::SPECIAL => 'Kỷ niệm thày lập, khai trương',
        self::MEETING => 'Hội nghị, hội thảo',
        self::HOLIDAY => 'Ngày lễ',
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
