<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buyer extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'buyers';
    protected $fillable = [
        'user_id',
        'buyer_code',
        'first_name',
        'last_name',
        'address',
        'phone',
        'bank_account',
    ];

    protected $appends = [
        'name',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * relationship to user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * relationship to event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function events()
    {
        return $this->belongsToMany(Event::class, 'tickets')->active()->withPivot('qrcode_check');
    }


    /**
     * get name attr
     *
     * @param $value
     * @return mixed
     */
    public function getNameAttribute($value)
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
