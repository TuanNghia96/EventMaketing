<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class Contacts extends Model
{
    protected $table = 'contacts';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'company_name',
        'subject',
        'message',
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

}
