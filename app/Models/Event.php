<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

//use Illuminate\Support\Facades\Gate;


class Event extends Model
{
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
        'note',
        'images',
        'ticket_number',
    ];

    protected $appends = [
        'rating'
    ];

    const WAITING = 0;
    const VALIDATED = 1;
    const CANCEL = 2;

    public static $status = [
        self::WAITING => 'Chờ kiểm duyệt',
        self::VALIDATED => 'Đã kiểm duyệt',
        self::CANCEL => 'Hủy bỏ',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        if (Gate::allows('supplier')) {
            static::addGlobalScope('supplier', function (Builder $builder) {
                $builder->where('status', '<>', Event::WAITING)->orWhereHas('mainSupplier', function ($query) {
                    $query->where('supplier_id', \Auth::user()->user->id);
                });
            });
        }
        if (Gate::allows('buyer') || Auth::guest()) {
            static::addGlobalScope('buyer', function (Builder $builder) {
                $builder->where('status', '=', Event::VALIDATED)->where('public_date', '<', now());
            });
        }
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
     * relationship to coupon
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coupon()
    {
        return $this->belongsTo('App\Models\Coupon');
    }

    /**
     * relationship to supplier
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'supplier_events')->where('role', 2);

    }

    /**
     * relationship to supplier
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function mainSupplier()
    {
        return $this->belongsToMany(Supplier::class, 'supplier_events')->where('role', 1);
    }

    /**
     * check is belong main supplier
     */
    public function isMain()
    {
        if ($this->mainSupplier()->find(\Auth::user()->user->id)) {
            return true;
        }
        return false;
    }

    public function isPublic()
    {
        if ($this->public_date < now()) {
            return true;
        }
        return false;
    }

    /**
     * relationship to buyer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function buyer()
    {
        return $this->belongsToMany(Buyer::class, 'tickets')->withPivot('qrcode_check', 'supplier_id');
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
     * relationship to category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Scope a query to only active.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', Event::VALIDATED);
    }

    /**
     * get images attr
     *
     * @param $value
     * @return mixed
     */
    public function getImagesAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * get images attr
     *
     * @param $value
     * @return mixed
     */
    public function getRatingAttribute($value)
    {
        return $this->comments->avg('rating');
    }
}
