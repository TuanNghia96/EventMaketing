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
        'avatar',
        'type',
        'public_date',
        'start_date',
        'end_date',
        'voucher_id',
        'point',
        'classify',
        'status',
        'images',
        'ticket_number',
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
    const STATUS = [
        0 => 'Chua kiem duyet',
        1 => 'Da kiem duyet',
        2 => 'Da cong bo',
        3 => 'Huy bo',
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

    /**
     * Scope a query by phone
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $phone
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfPhone($query, $phone)
    {
        return $query->where('phone', $phone);
    }

    /**
     * Pagination data of model
     *
     * @param array $input input data to search
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getSearch($input)
    {
        $query = $this->query();

        //check like
        if (isset($input['name'])) {
            $query->where('name', 'like', '%' . $input['name'] . '%')->orWhere('title', 'like', '%' . $input['name'] . '%');
        }
        //check input to type
        if (isset($input['type'])) {
            $query->where('type', $input['type']);
        }
        //check input to classify
        if (isset($input['classify'])) {
            $query->where('classify', $input['classify']);
        }
        //check input to status
        if (isset($input['status'])) {
            //started
            if ($input['status']) {
                $query->where('start_date', '<', now())->where('end_date', '>', now());
            } else {
                $query->where('start_date', '>', now());
            }
        }
        return $query->select('type', 'classify', 'name', 'title', 'id', 'avatar')->get();
    }
}
