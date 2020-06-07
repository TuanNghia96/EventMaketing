<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

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
        'coupon_id',
        'point',
        'category_id',
        'status',
        'images',
        'ticket_number',
    ];

    const WAITING = 0;
    const VALIDATED = 1;
    const PUBLIC = 2;
    const CANCEL = 3;

    public static $status = [
        self::WAITING => 'Chưa kiểm duyệt',
        self::VALIDATED => 'Đã kiểm duyệt',
        self::PUBLIC => 'Đã công bố',
        self::CANCEL => 'Hủy bố',
    ];

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
        $query = $this->active()->with('coupon')->orderBy('id');

        //check like
        if (isset($input['name'])) {
            $query->where('name', 'like', '%' . $input['name'] . '%')->orWhere('title', 'like', '%' . $input['name'] . '%');
        }
        //check input to type
        if (isset($input['type'])) {
            $query->where('type_id', $input['type']);
        }
        //check input to classify
        if (isset($input['category'])) {
            $query->where('category_id', $input['category']);
        }
        //check input to coupon
        if (isset($input['coupon'])) {
            //started
            if ($input['coupon'] == 1) {
                $query->where('coupon_id', null);
            } else {
                $query->where('coupon_id', '<>', null);
            }
        }
        //check input to status
        if (isset($input['status'])) {
            //started
            if ($input['status'] == 1) {
                $query->where('start_date', '>', now());
            } else {
                $query->where('start_date', '<', now())->where('end_date', '>', now());
            }
        }
        return $query->get();
    }

    /**
     * relationship to coupon
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coupon()
    {
        return $this->belongsTo('App\Models\Coupon');
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
     * relationship to buyer
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
