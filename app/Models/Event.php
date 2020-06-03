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

    const WAITING = 0;
    const VALIDATED = 1;
    const PUBLIC = 2;
    const CANCEL = 3;

    public $timestamps = true;
    protected $table = 'events';
    protected $fillable = [
        'name',
        'title',
        'code',
        'location',
        'summary',
        'avatar',
        'type_id',
        'public_date',
        'start_date',
        'end_date',
        'voucher_id',
        'point',
        'category_id',
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

    public static $status = [
        self::WAITING => 'Chua kiem duyet',
        self::VALIDATED => 'Da kiem duyet',
        self::PUBLIC => 'Da cong bo',
        self::CANCEL => 'Huy bo',
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
        $query = $this->active()->orderBy('id');

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

    /**
     * relationship to enterprise
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function enterprises()
    {
        return $this->belongsToMany(Enterprise::class, 'enterprise_events');
    }

    /**
     * relationship to enterprise
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function buyer()
    {
        return $this->belongsToMany(Buyer::class, 'tickets');
    }

    /**
     * relationship to type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * relationship to category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Scope a query to only active.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->whereIn('status', [Event::VALIDATED, Event::PUBLIC]);
    }
}
