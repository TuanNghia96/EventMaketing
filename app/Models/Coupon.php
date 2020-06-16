<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Gate;

class Coupon extends Model
{

    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'coupons';
    protected $fillable = [
        'name',
        'title',
        'code',
        'image',
        'type',
        'value',
    ];

    public static $values = [
        5 => '5%',
        10 => '10%',
        20 => '20%',
        30 => '30%',
        40 => '40%',
        50 => '50%',
        60 => '60%',
        70 => '70%',
        80 => '80%',
        90 => '90%',
    ];

    /**
     * relationship to event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function event()
    {
        return $this->hasMany('App\Models\Event', 'coupon_id');
    }

    /**
     * Scope a query to only include active.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', '=', true);
    }

    /**
     * disable status
     *
     * @return bool
     */
    public function disable()
    {
        if ($this->status) {
            $this->status = false;
            return $this->save();
        }
        return false;
    }

    /**
     * disable status
     *
     * @return bool
     */
    public function enable()
    {
        if (!$this->status) {
            $this->status = true;
            return $this->save();
        }
        return false;
    }
}
