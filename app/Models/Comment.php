<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class Comment extends Model
{
    protected $table = 'comments';
    public $timestamps = true;

    protected $appends = [
        'buyer_name',
    ];
    protected $fillable = [
        'event_id',
        'buyer_id',
        'message',
        'rating',
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
     * relationship to buyer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id', 'id');
    }

    /**
     * get buyer_name attr
     *
     * @param $value
     * @return mixed
     */
    public function getBuyerNameAttribute($value)
    {
        return $this->buyer->first_name ?? null;
    }
}
