<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Gate;

class Enterprise extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'enterprises';
    protected $fillable = [
        'user_id',
        'enterprise_code',
        'name',
        'address',
        'city',
        'avatar',
        'phone',
        'bank_account',
    ];

    protected $appends = [
        'status',
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

    const CITY = [
        1 => 'Hà Nội',
        2 => 'Đà nẵng',
        3 => 'Tp. Hồ Chí Minh',
        4 => 'Tp khác',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * relation to user
     *
     */
    public function user()
    {
        return $this->hasOne(\App\Models\User::class, 'id', 'user_id');
    }

    /**
     * relationship to event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function events()
    {
        return $this->belongsToMany(Event::class, 'enterprise_events')->where('enterprise_events.role', '=', 2);
    }

    /**
     * relationship to event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function mainEvent()
    {
        return $this->belongsToMany(Event::class, 'enterprise_events')->where('enterprise_events.role', '=', 1);
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
