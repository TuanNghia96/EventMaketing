<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'admins';
    protected $fillable = [
        'user_id',
        'admin_code',
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
}
