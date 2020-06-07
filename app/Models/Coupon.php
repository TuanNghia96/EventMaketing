<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function event()
    {
        return $this->hasOne('App\Models\Event', 'coupon_id');
    }

    /**
     * Pagination data of model
     *
     * @return Coupon[]|Builder[]|Collection
     */
    public function getPaginate()
    {
        return self::with('event')->get();
    }
}
