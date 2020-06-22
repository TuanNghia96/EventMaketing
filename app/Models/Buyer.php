<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Gate;

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
        'avatar',
    ];

    protected $appends = [
        'name',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        if (Gate::allows('edit-settings')) {
            static::addGlobalScope('withTrashed', function (Builder $builder) {
                $builder->withTrashed();
            });
        }
    }

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
        return $this->belongsToMany(Event::class, 'tickets')->active()->withPivot('qrcode_check', 'enterprise_id');
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

    /**
     * get name attr
     *
     * @param $value
     * @return mixed
     */
    public function getStatusAttribute($value)
    {
        return $this->user()->first()->status;
    }
}
